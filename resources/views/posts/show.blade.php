@extends('layouts.app')
@section('title','Post')
@section('content')
<div class="max-w-2xl mx-auto">
  <div class="bg-white p-4 rounded shadow mb-4">
    <div class="flex justify-between items-center">
      <div><strong>{{ $post->user->name }}</strong> <div class="text-sm text-gray-500">{{ $post->created_at }}</div></div>
      @auth
        @if(auth()->id() == $post->user_id || auth()->user()->isAdmin())
          <div>
            <a href="{{ route('posts.edit',$post->id) }}" class="mr-2 text-sm text-blue-600">Edit</a>
            <form method="POST" action="{{ route('posts.destroy',$post->id) }}" style="display:inline">@csrf @method('DELETE')
              <button class="text-sm text-red-600">Delete</button>
            </form>
          </div>
        @endif
      @endauth
    </div>
    <div class="mt-3">{{ $post->content }}</div>
    @if($post->image)<div class="mt-3"><img src="{{ asset('storage/'.$post->image) }}" alt="post image" class="max-w-full"></div>@endif
  </div>

  <div class="bg-white p-4 rounded shadow mb-4">
    <h3 class="font-bold mb-2">Comments</h3>
    @foreach($post->comments as $comment)
      <div class="border-b py-2">
        <div class="text-sm text-gray-700"><strong>{{ $comment->user->name }}</strong> - {{ $comment->created_at }}</div>
        <div class="mt-1">{{ $comment->body }}</div>
        @auth
          @if(auth()->id() == $comment->user_id || auth()->user()->isAdmin())
            <div class="mt-1">
              <a href="{{ route('comments.edit',$comment->id) }}" class="text-sm text-blue-600 mr-2">Edit</a>
              <form method="POST" action="{{ route('comments.destroy',$comment->id) }}" style="display:inline">@csrf @method('DELETE')<button class="text-sm text-red-600">Delete</button></form>
            </div>
          @endif
        @endauth
      </div>
    @endforeach
  </div>

  @auth
  <div class="bg-white p-4 rounded shadow">
    <form method="POST" action="{{ route('comments.store',$post->id) }}">@csrf
      <textarea name="body" rows="3" class="w-full p-2 border mb-2" placeholder="Add a comment..."></textarea>
      <button class="px-3 py-1 bg-blue-600 text-white rounded">Comment</button>
    </form>
  </div>
  @else
    <p class="text-center">Please <a href="/login" class="text-blue-600">login</a> to comment.</p>
  @endauth
</div>
@endsection
