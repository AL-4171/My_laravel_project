@extends('layouts.app')
@section('title','Posts')

@section('content')
<h1>Posts</h1>
<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>

<table class="table table-bordered">
  <tr><th>ID</th><th>Title</th><th>Author</th><th>Created</th><th>Actions</th></tr>
  @foreach($posts as $post)
  <tr>
    <td>{{ $post->PostID }}</td>
    <td>{{ $post->Title }}</td>
    <td>{{ $post->user->Name ?? 'Unknown' }}</td>
    <td>{{ $post->CreatedAt }}</td>
    <td>
      <a href="{{ route('posts.show',$post->PostID) }}" class="btn btn-info btn-sm">View</a>
      @if(Auth::user()->Role === 'admin' || Auth::id() == $post->UserID)
        <a href="{{ route('posts.edit',$post->PostID) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('posts.destroy',$post->PostID) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">Delete</button>
        </form>
      @endif
    </td>
  </tr>
  @endforeach
</table>
@endsection