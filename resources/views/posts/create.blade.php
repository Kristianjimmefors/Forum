@extends('layouts.base')

@section('content')
    <h1>Create Post</h1>
    @include('layouts.errors')
    <form method="POST" action="/posts" class="mb-40">
        @csrf
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="categoryddl" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="postContent">Content of the post</label>
            <textarea id="postContent" class="form-control" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection