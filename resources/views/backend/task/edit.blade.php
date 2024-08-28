@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Task</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('backend.layouts._message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Task Add
                            <a class="btn btn-success btn-sm" href="{{route('task.view')}}" style="float:right;"><i class="bi bi-list"></i>Task list</a>
                        </h5>
                        <br>
                        <form class="g-3" action="{{ route('task.update', $task) }}" method="post" id="myForm" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" value="{{ $task->title }}"  name="title" class="form-control" id="title">
                                </div>
                                <div class="col-6 mt-2">
                                    <label for="status" class="form-label">Status</label>
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="" {{ $task->status == '' ? 'selected' : '' }}>Select Status</option>
                                        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="5" class="form-control">{{ $task->description }}</textarea>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input type="date" id="datepicker" name="due_date" class="form-control" value="{{ $task->due_date }}">
                                </div>
                            </div>
                            <div class="m-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5'
        });
    </script>
@endsection

@section('script')
@endsection
