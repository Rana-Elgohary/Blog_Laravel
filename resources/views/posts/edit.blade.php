@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')
    <form method="POST" action={{ route("posts.update", $post->id) }} class="container mt-5">
        @csrf
        @method('PUT') 
        {{-- to avoid this error as it routs to put route but the method is post as the form only understand post and get
        The POST method is not supported for route post/1. Supported methods: GET, HEAD, PUT. --}}
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Title</label>
            <input type="text" value="{{ $post->title }}" name="title" class="form-control" id="formGroupExampleInput" placeholder="Enter Title">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input type="text" value="{{ $post->description }}" name="description" class="form-control" id="formGroupExampleInput2" placeholder="Enter Description">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput3" class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                @foreach ($users as $item)
                    {{-- <option @if($item->id == $post->user_id) selected @endif value={{ $item->id }}>{{ $item->name }}</option> --}}
                    <option @selected($item->id == $post->user_id) value={{ $item->id }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
