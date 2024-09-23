@extends('layouts.app')

@section('title')
    Create
@endsection

@section('content')
    <form method="POST" action={{ route("posts.store") }} class="container mt-5">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Enter Title">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="formGroupExampleInput2" placeholder="Enter Description">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput3" class="form-label">Post Creator</label>
            <select name="creator" class="form-control">
                @foreach($users as $user)
                    <option value={{ $user->id }}>{{ $user->name }}</option>
                @endforeach
            </select> 
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
