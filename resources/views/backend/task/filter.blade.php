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
