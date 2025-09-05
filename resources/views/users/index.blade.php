@extends('layouts.app')
@section('title','Users')
@section('content')
<div class="max-w-4xl mx-auto">
  <h2 class="text-xl mb-4">Users</h2>
  <form method="GET" class="mb-4"><input name="q" value="{{ $q ?? '' }}" class="p-2 border" placeholder="Search users"><button class="px-2 py-1 bg-blue-600 text-white">Search</button></form>
  @foreach($users as $u)
    <div class="bg-white p-3 rounded mb-2 flex justify-between items-center">
      <div>
        <a href="{{ route('users.show',$u->id) }}" class="font-bold">{{ $u->name }}</a>
        <div class="text-sm text-gray-600">{{ $u->email }}</div>
      </div>
      <div>
        @auth
          @if(auth()->user()->isAdmin())
            <a href="/users/{{ $u->id }}/edit" class="mr-2">Edit</a>
            <form method="POST" action="/users/{{ $u->id }}" style="display:inline">@csrf @method('DELETE')<button class="text-red-600">Delete</button></form>
          @endif
        @endauth
      </div>
    </div>
  @endforeach
  {{ $users->links() }}
</div>
@endsection
