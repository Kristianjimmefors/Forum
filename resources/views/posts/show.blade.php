@extends('layouts.base')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="col-sm-12 border-bottom mb-3 d-flex">
        <div class="d-flex flex-column">
            <img src="{{ asset('profile_pictures/default.png') }}" class="default mr-5 user-icon">
            <span>
               {{ $post->user->name }}
            </span>
            <span>
                {{ $post->created_at->format('d F Y') }}
            </span>
        </div>
        <div class="w-100">
            <h1 class="mb-4">
                {{ $post->title }}
            </h1>
            <p> 
                {{ $post->body }}
            </p>
        </div>
        @if (auth::id() == $post->user_id)
            <i id="comment-opt-{{ $post->id }}" class="fas fa-chevron-down float-right pointer" onclick="postOpt(this)"></i>
            <div id="post-opt" class="ddlopt border pl-2">
                <a href="/posts/{{ $post->id }}/edit">edit</a>
            </div>
        @endif
    </div>
    
        {{-- visar alla kommentarer --}}
        @foreach($post->comments as $comment)
            <div class="col-sm-12 border-bottom d-flex mb-4">
                <div class="d-flex flex-column mb-2">
                    <img src="{{ asset('profile_pictures/default.png') }}" class="default mr-5 user-icon">
                    <span>
                        {{ $comment->user->name }}    
                    </span>
                    <span>
                        {{ $comment->created_at->format('d F Y')}}
                    </span>
                </div>
                <div class="w-100">
                    <p>
                    @if (auth::id() == $comment->user_id)
                        <i id="comment-opt-{{ $comment->id }}" class="fas fa-chevron-down float-right pointer" onclick="commentOpt(this)"></i>
                        <div id="comment-opt" class="ddlopt border pl-2">
                            <a href="/posts/{{ $post->id }}/comments/{{ $comment->id }}/edit">edit</a>
                            <form action="/posts/{{ $post->id }}/comments/{{ $comment->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="no-button" type="submit">remove</button>
                            </form>
                        </div>
                    @endif
                        {{ $comment->comment }}
                    </p>
                    
                </div>
            </div>
        @endforeach

        {{-- kollar om användaren är inloggad och visar formuläret för en ny kommentar --}}
        @auth
            @include('layouts.errors')
            <div class="col-sm-12 pt-4">
                <form method="POST" action="/posts/{{ $post->id }}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea id="new-comment" class="form-control" name="newComment" placeholder="Your comment" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        @endauth
@endsection