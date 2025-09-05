@extends('layouts.app')
@section('title','Feed')
@section('content')
<div class="grid grid-cols-3 gap-6">
  <div class="col-span-2">
    <div class="bg-white p-4 rounded shadow mb-6 flex justify-between items-center">
      <div class="font-bold">What's happening</div>
      @auth
        <a href="{{ route('posts.create') }}" class="px-3 py-1 bg-blue-600 text-white rounded">Create Post</a>
      @else
        <a href="/login" class="px-3 py-1 bg-blue-600 text-white rounded">Login to post</a>
      @endauth
    </div>

    @foreach($posts as $post)
      <div class="bg-white p-4 rounded shadow mb-4">
        <div class="flex items-center mb-2 justify-between">
          <div>
            <a href="{{ route('profile.show',$post->user->id) }}" class="font-bold mr-3">{{ $post->user->name }}</a>
            <div class="text-sm text-gray-500">{{ $post->created_at }}</div>
          </div>
          <a href="{{ route('posts.show',$post->id) }}" class="text-sm text-blue-600">View</a>
        </div>
        <div class="mb-2">{{ Str::limit($post->content, 250) }}</div>
        <div class="text-sm text-gray-600">Comments ({{ $post->comments->count() }})</div>
      </div>
    @endforeach

    {{ $posts->links() }}
  </div>

  <aside>
    <div class="bg-white p-4 rounded shadow">
      <h3 class="font-bold mb-2">Profile</h3>
      @auth
        <p>{{ auth()->user()->name }}</p>
        <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
        <p><a href="{{ route('profile.show', auth()->id()) }}" class="text-blue-600">View profile</a></p>
      @else
        <p class="text-sm">Visitor</p>
      @endauth
    </div>
  </aside>
</div>
@endsection
