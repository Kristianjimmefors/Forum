@extends('layouts.base')

@section('content')
    <div class="info-titles d-flex border-bottom mb-2">
        <p class="d-inline-block  width-posts">Title</p>
        <p class="d-inline-block mr-4">Catecory</p>
        <p class="d-inline-block ml-5">Comments</p>
        <p class="d-inline-block ml-5">Active</p>
    </div>
    @foreach ($posts as $post)
        <div id="{{ $post->id }}" class="d-flex justify-content-start mb-3 border-bottom">
            <div class="width-posts mb-2 text-truncate">
                <a class="post-title" href="/posts/{{ $post->id }}">
                <h3 class="mb-0">
                        {{ $post->title }}
                    </h3>
                </a>
                <span>Created by: {{ $post->user->name }}</span>
            </div>
            <span class="mt-2 category">
                <a class="category-link" href="posts/category/{{ $post->category->name }}">
                    {{ $post->category->name }}
                </a>
            </span>
            <span class="ml-5 pr-5 mt-2">
                <i class="fas fa-comment"></i> {{ count($post->comments) }}
            </span>
            <span class="mt-2 active">
                @if (count($post->comments) > 0)
                    {{ $post->comments->last()->created_at->format('d F') }}
                @else
                    {{ $post->created_at->format('d F') }}
                @endif
            </span>
        </div>
    @endforeach
@endsection