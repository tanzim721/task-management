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
                            <a class="btn btn-success btn-sm p-2" href="{{route('task.view')}}" style="float:right;"><i class="bi bi-list"></i>Task list</a>
                        </h5>
                        <br>
                        <form class="g-3" action="{{ route('task.store') }}" method="post" id="myForm" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" value=""  name="title" class="form-control" id="title">
                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-2">
                                           {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-6 mt-2">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="" selected>Select Status</option>
                                        <option value="pending" @if(old('status') == 'pending') selected @endif>Pending</option>
                                        <option value="in_progress" @if(old('status') == 'in_progress') selected @endif>In Progress</option>
                                        <option value="completed" @if(old('status') == 'completed') selected @endif>Completed</option>
                                    </select>
                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-2">
                                           {{ $errors->first('status') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" name="description" id="description" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input type="date" id="datepicker" name="due_date" class="form-control" required>
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
