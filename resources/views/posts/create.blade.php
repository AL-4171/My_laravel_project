@extends('layouts.app')
@section('title','Create Post')

@section('content')
<h1>Create Post</h1>
<form method="POST" action="{{ route('posts.store') }}">
  @csrf
  <div class="mb-3">
    <label>Title</label>
    <input type="text" name="Title" class="form-control" value="{{ old('Title') }}" required>
  </div>
  <div class="mb-3">
    <label>Body</label>
    <textarea name="Body" rows="6" class="form-control" required>{{ old('Body') }}</textarea>
  </div>
  <div class="mb-3">
    <label>Post Creator</label>
    <select name="UserID" class="form-control" required>
      @foreach($users as $user)
      <option value="{{ $user->UserID }}" {{ auth()->id() == $user->UserID ? 'selected' : '' }}>{{ $user->Name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>Categories</label>
    <select name="categories[]" multiple class="form-control">
      @foreach($categories as $cat)
      <option value="{{ $cat->CategoryID }}">{{ $cat->Name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>Tags</label>
    <select name="tags[]" multiple class="form-control">
      @foreach($tags as $tag)
      <option value="{{ $tag->TagID }}">{{ $tag->Name }}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-primary">Submit</button>
</form>
@endsection