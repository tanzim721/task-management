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
                            Task List
                            <div class="">
                                <a href="{{ route('task.add') }}" class="btn btn-success btn-sm my-2 p-2" style=""><i class="bi bi-plus-circle"></i> Add new</a>
                                <div class="float-end">
                                    <select name="status" id="status" class="form-control w-auto d-inline">
                                        <option value="">Select status</option>
                                        <option {{ request('status') == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                        <option {{ request('status') == 'in_progress' ? 'selected' : '' }} value="in_progress">In Progress</option>
                                        <option {{ request('status') == 'completed' ? 'selected' : '' }} value="completed">Completed</option>
                                    </select>
                                </div>
                            </div>
                        </h5>
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Due Date</th>
                                <th scope="col" style="width:150px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $key => $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->status }}</td>
                                        <td>{{ $task->due_date }}</td>
                                        <td>
                                            <a href="{{ route('task.edit', $task) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $task->id }}"><i class="bi bi-trash-fill"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal-{{ $task->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $task->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel-{{ $task->id }}">Delete Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this task?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('task.delete', $task) }}" method="POST" style="display:inline-block">
                                                                @csrf
                                                                @method('GET')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#status').change(function() {
            var status = $(this).val();
            $.ajax({
                url: "{{ route('task.filter') }}",
                method: 'GET',
                data: { status: status },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        });
    });
</script>
@endsection
