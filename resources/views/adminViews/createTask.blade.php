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
        <form action="{{route('task-store')}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="CREATOR_ID" class="form-label">CREATOR_ID</label>
                <select class="form-select {{ $errors->has('creator_id')? 'is-invalid':''}}"  id="CREATOR_ID" name="creator_id">
                    @foreach ($users as $user)
                            <option>{{$user->id}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <textarea class="form-control {{ $errors->has('title')? 'is-invalid':''}}" id="title" name="title" rows="3"> </textarea>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <textarea class="form-control {{ $errors->has('content')? 'is-invalid':''}}" id="content" name="content" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="STATUS_ID" class="form-label">STATUS_ID</label>
                <select class="form-select {{ $errors->has('status_id')? 'is-invalid':''}}" aria-label="Default select example" id="STATUS_ID" name="status_id">
                    @foreach ($statuses as $status)
                        <option >{{$status->id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Created</button>
            </div>
        </form>
            <div class="d-grid">
                <a class="btn btn-primary" href="{{route('task-index')}}" role="button">Back</a>
            </div>
    </div>
@endsection
