@extends('layouts.base')

@section('title')
    edit comment
@endsection

@section('content')
            <div class="col-sm-12 border-bottom d-flex mb-4">
                <div class="d-flex flex-column">
                    <img src="{{ asset('profile_pictures/default.png') }}" class="default mr-5 user-icon">
                    <span>
                        {{ $comment->user->name }}    
                    </span>
                    <span>
                        {{ $comment->created_at->format('d F Y')}}
                    </span>
                </div>
                <div class="w-100 mb-4">
                    @include('layouts.errors')
                    <form method="POST" action="/posts/{{ $comment->post->id }}/comments/{{ $comment->id }}">
                        @csrf
                        @method('put')
                        <textarea name="edditedComment" id="edit-comment" class="form-control mb-2">{{ $comment->comment }}</textarea>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-12">
                <h2>Original comment </h2>
                <p>
                    {{ $comment->comment }}
                </p>
            </div>
@endsection