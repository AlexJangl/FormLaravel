@extends('adminViews.adminLayouts.layout')

@section('viewTable')
    <div class="container">
        @if ($errors->any())
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>
            <div class="alert alert-danger d-flex align-items-center" role="alert">

                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <form action="{{route('task-update', $task->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="ID" class="form-label">ID</label>
                <input type="number" class="form-control " id = "ID" name="id" value="{{$task->id}}" disabled readonly>
           </div>
            <div class="mb-3">
                <label for="CREATOR_ID" class="form-label">CREATOR_ID</label>
                <select class="form-select {{ $errors->has('creator_id')? 'is-invalid':''}}"  id="CREATOR_ID" name="creator_id">
                    @foreach ($users as $user)
                        @if ($user->id === $task->creator_id)
                            <option selected>{{$user->id}}</option>
                        @else
                            <option>{{$user->id}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <textarea class="form-control {{ $errors->has('title')? 'is-invalid':''}}" id="title" name="title" rows="2">{{$task->title}}</textarea>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <textarea class="form-control {{ $errors->has('content')? 'is-invalid':''}}" id="content" name="content" rows="3">{{$task->content}}</textarea>
                @if ($errors->has('title'))
                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="STATUS_ID" class="form-label">STATUS_ID</label>
                <select class="form-select {{ $errors->has('status_id')? 'is-invalid':''}}" aria-label="Default select example" id="STATUS_ID" name="status_id">
                    @foreach ($statuses as $status)
                        @if ($status->id === $task->status_id)
                            <option selected>{{$status->id}}</option>
                        @else
                            <option >{{$status->id}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="created_at" class="form-label">created_at</label>
                <input type="text" class="form-control" id="created_at" name="created_at" aria-describedby="emailHelp" placeholder="{{$task->created_at}}" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="updated_at" class="form-label">updated_at</label>
                <input type="number" class="form-control" id="updated_at" name="updated_at" aria-describedby="emailHelp" placeholder="{{$task->updated_at}}" disabled readonly>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Edit</button>
            </div>
        </form>
        <div class="d-grid">
            <a class="btn btn-primary" href="{{route('task-index')}}" role="button">Back</a>
        </div>
    </div>
@endsection
