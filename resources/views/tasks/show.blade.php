@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Workspace {{ $task->name }}</div>

                <div class="card-body">
                    <table class="table">
                        @if ($task->status == 'true')
                        <thead>
                            <tr>
                              <th scope="col">Description</th>
                              <th scope="col">Status</th>
                              <th scope="col">Due Complete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">{{ $task->description }}</th>
                              <td>Complete</td>
                              <td>{{ $task->due_completed }}</td>
                            </tr>
                          </tbody>
                        @else
                        <thead>
                            <tr>
                              <th scope="col">Description</th>
                              <th scope="col">Due Date</th>
                              <th scope="col">Due Time</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">{{ $task->description }}</th>
                              <td>{{ $task->due_date }}</td>
                              <td>{{ $task->due_time }}</td>
                              <td>Ongoing</td>
                            </tr>
                          </tbody>
                        @endif
                      </table>
                      <a onclick="return confirm('Are you sure go back task?')" href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection