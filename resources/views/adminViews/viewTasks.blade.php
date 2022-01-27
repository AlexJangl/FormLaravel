@extends('adminViews.adminLayouts.layout')

@section('viewTable')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">CreatorID</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">StatusID</th>
                <th scope="col">####</th>

            </tr>
            </thead>
            <tbody>
        @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->creator_id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->status_id }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('task-edit', $task->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('task-delete', $task->id)}}" class="btn btn-danger" >Delete</a>
                        </div>
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>
        <div class="d-grid">
            <a href="{{route('task-create')}}" class="btn btn-success btn-lg" >Creating a new row in a table</a>
        </div>
    </div>
@endsection
