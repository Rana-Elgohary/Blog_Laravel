@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')
    <form method="POST" action={{ route("posts.update", 1) }} class="container mt-5">
        @csrf
        @method('PUT') 
        {{-- to avoid this error as it routs to put route but the method is post as the form only understand post and get
        The POST method is not supported for route post/1. Supported methods: GET, HEAD, PUT. --}}
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
                <option value="a">Ahmed</option>
                <option value="m">Mohamed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
