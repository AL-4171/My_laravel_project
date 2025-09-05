@extends('layouts.app')
@section('title','Edit Post')
@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl mb-4">Edit Post</h2>
  <form method="POST" action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data">@csrf @method('PUT')
    <textarea name="content" rows="4" class="w-full p-2 border mb-2">{{ old('content',$post->content) }}</textarea>
    <input type="file" name="image" class="mb-2">
    <select name="privacy" class="border p-1 mb-2">
      <option value="public" {{ $post->privacy=='public' ? 'selected' : '' }}>Public</option>
      <option value="friends" {{ $post->privacy=='friends' ? 'selected' : '' }}>Friends</option>
      <option value="private" {{ $post->privacy=='private' ? 'selected' : '' }}>Only me</option>
    </select>
    <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
  </form>
</div>
@endsection
