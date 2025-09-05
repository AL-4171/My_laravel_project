@extends('layouts.app')
@section('title','Edit Comment')
@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl mb-4">Edit Comment</h2>
  <form method="POST" action="{{ route('comments.update',$c->id) }}">@csrf @method('PUT')
    <textarea name="body" rows="3" class="w-full p-2 border mb-2">{{ old('body',$c->body) }}</textarea>
    <button class="px-3 py-1 bg-blue-600 text-white rounded">Save</button>
  </form>
</div>
@endsection
