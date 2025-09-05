@extends('layouts.app')
@section('title','My Posts')

@section('content')
<h2>My Posts</h2>
@if($posts->isEmpty())
  <div class="alert alert-info mt-3">You haven’t written any posts yet.</div>
@else
  <div class="list-group mt-3">
    @foreach($posts as $post)
      <div class="list-group-item d-flex justify-content-between align-items-start">
        <div>
          <h5 class="mb-1">{{ $post->Title }}</h5>
          <small>By {{ $post->user->Name ?? '—' }} — {{ $post->CreatedAt }}</small>
        </div>
        <div>
          <a href="{{ route('posts.show', $post->PostID) }}" class="btn btn-sm btn-outline-primary">View</a>
          <a href="{{ route('posts.edit', $post->PostID) }}" class="btn btn-sm btn-outline-warning">Edit</a>
          <form action="{{ route('posts.destroy', $post->PostID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this post?')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-outline-danger">Delete</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
@endif
@endsection