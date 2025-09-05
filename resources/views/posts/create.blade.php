@extends('layouts.app')
@section('title','Create Post')
@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl mb-4">Create Post</h2>
  <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">@csrf
    <textarea name="content" rows="4" class="w-full p-2 border mb-2" placeholder="Write something...">{{ old('content') }}</textarea>
    <input type="file" name="image" class="mb-2">
    <select name="privacy" class="border p-1 mb-2">
      <option value="public">Public</option>
      <option value="friends">Friends</option>
      <option value="private">Only me</option>
    </select>
    <button class="px-4 py-2 bg-green-600 text-white rounded">Publish</button>
  </form>
</div>
@endsection
