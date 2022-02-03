@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Workspace {{ $workspace->name }}</div>

                <div class="card-body">
                    {{ $workspace->description }}
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <div class="card mt-2">
                <div class="card-header">{{ __('Task') }}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#createtask"><i class="fa fa-plus-square"></i>
                        Create Task
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="createtask" tabindex="-1" aria-labelledby="createtasklabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createtasklabel">Create new task</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ route('task:store', $workspace) }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Task Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" rows="7" name="description" placeholder="Task Description"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date">Due Date</label>
                                        <input type="date" class="form-control" id="due_date" name="due_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="time">Due Time</label>
                                        <input type="time" class="form-control" id="due_time" name="due_time" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        
                <div class="card-body">
                    @if( session()->has('alert-message'))
                        <div class="alert {{ session()->get('alert-type') }}">
                            {{ session()->get('alert-message') }}
                        </div>
                    @endif
                    @if(count($tasks))
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $task->name }}</td>
                                        @if ($task->status == 'true')
                                            <td>{{ $task->due_completed }}</td>
                                            <td>Completed</td>
                                            <td><a onclick="return confirm('Are you sure to show this task?')" href="{{ route('task:show', $task) }}" class="btn btn-success">Show</a>
                                                <a onclick="return confirm('Are you sure to delete task?')" href="{{ route('task:delete', $task) }}" class="btn btn-danger">Delete</a></td>
                                        @else
                                            <td>{{ $task->due_time }}{{ $task->due_date }}</td>
                                            <td>Incompleted</td>
                                            <td><a onclick="return confirm('Are you sure to show this task?')" href="{{ route('task:show', $task) }}" class="btn btn-success">Show</a>
                                                <a onclick="return confirm('Are you sure to update status to complete?')" href="{{ route('task:update', $task) }}" class="btn btn-warning">Complete</a>
                                                <a onclick="return confirm('Are you sure to delete task?')" href="{{ route('task:delete', $task) }}" class="btn btn-danger">Delete</a></td>
                                        @endif
                                          
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                    <p class="text-center mt-3">No task yet! Please create new task </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection