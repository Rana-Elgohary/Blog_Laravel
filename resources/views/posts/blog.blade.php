@extends('layouts.app')

@section("title")
Blog
@endsection

@section("content")
{{-- @dd($allPosts) // Print The data and stop excecution  --}}

<div class="container">
    <div class="text-center mt-5">
        <button type="button" class="btn btn-success">Create Post</button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allPosts as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['posted_by'] }}</td>
                    <td>{{ $post['created_at'] }}</td>
                    <td>
                        {{-- <a href="/post/{{$post["id"]}}" type="button" class="btn btn-secondary">View</a> --}}
                        {{-- Or using the route shortcut --}}
                        <a href={{ route('posts.show', $post['id']) }} type="button" class="btn btn-secondary">View</a>
                        <a type="button" class="btn btn-primary">Edit</a>
                        <a type="button" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
