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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->creator_id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->status_id }}</td>
                </tr>
            </tbody>
        </table>
            <form action="{{route('task-destroy', $task->id)}}" method="post">
                @csrf ()
                @method('delete')
                <div class="d-grid">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </div>
            </form>
            <div class="d-grid">
                <a class="btn btn-primary" href="{{route('task-index')}}" role="button">Back</a>
            </div>
    </div>

@endsection
