@extends('layouts.app')
@section('title','Edit Profile')
@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl mb-4">Edit Profile</h2>
  <form method="POST" action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data">@csrf @method('PUT')
    <label>Name</label>
    <input name="name" value="{{ old('name',$user->name) }}" class="w-full p-2 border mb-2">
    <label>Bio</label>
    <textarea name="bio" rows="3" class="w-full p-2 border mb-2">{{ old('bio',$user->bio) }}</textarea>
    <label>Avatar</label>
    <input type="file" name="avatar" class="mb-2">
    <button class="px-3 py-1 bg-green-600 text-white rounded">Save</button>
  </form>
</div>
@endsection
