@extends('layouts.app')
@section('title','Likes')
@section('content')
<div class="max-w-3xl mx-auto">
  <h2 class="text-xl mb-4">Recent Likes</h2>
  @foreach($likes as $like)
    <div class="bg-white p-3 rounded mb-2">
      <div><strong>{{ $like->user->name }}</strong> liked item #{{ $like->likeable_id }} ({{ class_basename($like->likeable_type) }})</div>
      <div class="text-sm text-gray-600">{{ $like->created_at }}</div>
      @if(auth()->id() == $like->user_id || auth()->user()->isAdmin())
        <form method="POST" action="/likes/{{ $like->id }}">@csrf @method('DELETE')<button class="text-red-600">Remove</button></form>
      @endif
    </div>
  @endforeach
  {{ $likes->links() }}
</div>
@endsection
