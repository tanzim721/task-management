<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function view()
    {
        // $tasks = Task::where('user_id', Auth::id())->get();
        // dd($tasks);
        $query = Task::where('user_id', Auth::id())->orderBy('due_date', 'desc');
        if(request()->has('status')) {
            $query->where('status', request('status'));
        }
        if(request()->has('sort')) {
            $query->orderBy('due_date', request('sort'));
        }
        $tasks = $query->paginate(10);
        // dd($tasks);
        return view('backend.task.view', compact('tasks'));
    }

    public function add()
    {
        return view('backend.task.add');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('task.view')->with('success', 'Task Added Successfully');
    }
    public function edit(Task $task)
    {
        return view('backend.task.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->all());
        return redirect()->route('task.view')->with('success', 'Task Updated Successfully');
    }
    public function delete(Task $task)
    {
        $task->delete();
        return redirect()->route('task.view')->with('success', 'Task Deleted Successfully');
    }
    public function filter(Request $request)
    {
        $tasks = Task::where('user_id', Auth::id());
        if ($request->status) {
            $tasks->where('status', $request->status);
        }
        $tasks = $tasks->get();
        // dd($tasks);
        return view('backend.task.filter', compact('tasks'))->render();
    }

}
