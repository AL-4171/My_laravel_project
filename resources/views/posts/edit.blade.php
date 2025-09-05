@extends('layouts.app')
@section('title','Edit Post')

@section('content')
<h1>Edit Post</h1>
<form method="POST" action="{{ route('posts.update', $post->PostID) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Title</label>
    <input type="text" name="Title" class="form-control" value="{{ old('Title', $post->Title) }}" required>
  </div>
  <div class="mb-3">
    <label>Body</label>
    <textarea name="Body" rows="6" class="form-control" required>{{ old('Body', $post->Body) }}</textarea>
  </div>
  <div class="mb-3">
    <label>Categories</label>
    <select name="categories[]" multiple class="form-control">
      @foreach($categories as $cat)
      <option value="{{ $cat->CategoryID }}" {{ $post->categories->contains('CategoryID',$cat->CategoryID) ? 'selected' : '' }}>{{ $cat->Name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>Tags</label>
    <select name="tags[]" multiple class="form-control">
      @foreach($tags as $tag)
      <option value="{{ $tag->TagID }}" {{ $post->tags->contains('TagID',$tag->TagID) ? 'selected' : '' }}>{{ $tag->Name }}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection