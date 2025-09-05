@extends('layouts.app')
@section('title','Profile')
@section('content')
<div class="max-w-3xl mx-auto">
  <div class="bg-white p-4 rounded shadow mb-4">
    <div class="flex items-center">
      <div class="mr-4">
        @if($user->avatar)<img src="{{ asset('storage/'.$user->avatar) }}" class="w-20 h-20 rounded-full">@endif
      </div>
      <div>
        <div class="font-bold text-xl">{{ $user->name }}</div>
        <div class="text-sm text-gray-600">{{ $user->email }}</div>
        <div class="mt-2">{{ $user->bio }}</div>
      </div>
      @auth
        @if(auth()->id() == $user->id || auth()->user()->isAdmin())
          <div class="ml-auto"><a href="{{ route('profile.edit',$user->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit Profile</a></div>
        @endif
      @endauth
    </div>
  </div>

  <div class="bg-white p-4 rounded shadow">
    <h3 class="font-bold mb-2">Posts by {{ $user->name }}</h3>
    @foreach($user->posts as $p)
      <div class="mb-3 border-b pb-2">
        <a href="{{ route('posts.show',$p->id) }}" class="font-semibold">{{ Str::limit($p->content,80) }}</a>
        <div class="text-sm text-gray-600">{{ $p->created_at }}</div>
      </div>
    @endforeach
  </div>
</div>
@endsection
