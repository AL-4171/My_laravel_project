@extends('layouts.app')
@section('title',$post->Title)

@section('content')
<div class="card mt-4">
  <div class="card-header">Post Info</div>
  <div class="card-body">
    <h5 class="card-title">{{ $post->Title }}</h5>
    <p class="card-text">{{ $post->Body }}</p>
    <p><small>By {{ $post->user->Name ?? 'Unknown' }} — {{ $post->CreatedAt }}</small></p>
    <p>
      @foreach($post->categories as $c)
        <span class="badge bg-light text-primary">{{ $c->Name }}</span>
      @endforeach
      @foreach($post->tags as $t)
        <span class="badge bg-light text-secondary">{{ $t->Name }}</span>
      @endforeach
    </p>
  </div>
</div>

<hr>
<h4>Comments</h4>
@foreach($post->comments as $comment)
  <div class="border rounded p-2 mb-2">
    <strong>{{ $comment->user->Name ?? 'Unknown' }}:</strong>
    <p>{{ $comment->Body }}</p>
    <small>{{ $comment->CreatedAt }}</small>
    @if(Auth::check() && (Auth::user()->Role === 'admin' || Auth::id() === $comment->UserID))
      <form action="{{ route('comments.destroy',$comment->CommentID) }}" method="POST" class="d-inline">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger">Delete</button>
      </form>
    @endif
  </div>
@endforeach

@if(Auth::check())
  <form method="POST" action="{{ route('comments.store',$post->PostID) }}">
    @csrf
    <div class="mb-3">
      <textarea name="body" rows="3" class="form-control" placeholder="Write a comment..." required></textarea>
    </div>
    <button class="btn btn-primary">Add Comment</button>
  </form>
@else
  <p><a href="{{ route('login') }}">Login</a> to add a comment.</p>
@endif
@endsection
