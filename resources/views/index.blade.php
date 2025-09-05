@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">All Posts</h1>

    @auth
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
    @endauth

    @if($posts->count())
        <div class="list-group">
            @foreach($posts as $post)
                <a href="{{ route('posts.show', $post->PostID) }}" class="list-group-item list-group-item-action">
                    <h5>{{ $post->Title }}</h5>
                    <p>{{ Str::limit($post->Body, 100) }}</p>
                    <small>By {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}</small>
                </a>
            @endforeach
        </div>
    @else
        <p>No posts available yet.</p>
    @endif
</div>
@endsection