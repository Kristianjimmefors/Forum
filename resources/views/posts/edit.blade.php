@extends('layouts.base')

@section('title')
    edit comment
@endsection

@section('content')
            <div class="col-sm-12 border-bottom d-flex mb-4">
                <div class="d-flex flex-column">
                    <img src="{{ asset('profile_pictures/default.png') }}" class="default mr-5 user-icon">
                    <span>
                        {{ $post->user->name }}    
                    </span>
                    <span>
                        {{ $post->created_at->format('d F Y')}}
                    </span>
                </div>
                <div class="w-100 mb-4">
                    @include('layouts.errors')
                    <form method="POST" action="/posts/{{ $post->id }}">
                        @csrf
                        @method('put')
                        <input type="text" name="title" id="edit-title" class="form-control mb-2" value="{{ $post->title }}">
                        <textarea name="body" id="edit-body" class="form-control mb-2">{{ $post->body }}</textarea>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-12">
                <h2 class="mb-3">Original post </h2>
                <h3>{{ $post->title }}</h3>
                <p>
                    {{ $post->body }}
                </p>
            </div>
@endsection