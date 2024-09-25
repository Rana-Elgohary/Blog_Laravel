@extends('layouts.app')

@section('title')
    Create
@endsection

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action={{ route("posts.store") }} class="container mt-5">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Enter Title" value="{{ old('title') }}"> {{-- value="{{ old('title') }}" ==> to avoid deleting the value after i submit and there are errors to be handled --}}
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="formGroupExampleInput2" placeholder="Enter Description" value="{{ old('description') }}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput3" class="form-label">Post Creator</label>
            <select id="formGroupExampleInput3" name="post_creator" class="form-control">
                @foreach($users as $user)
                    <option value={{ $user->id }}>{{ $user->name }}</option>
                @endforeach
            </select> 
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
