@extends('layouts.app')
@section('title','Friend Requests')
@section('content')
<div class="max-w-3xl mx-auto">
  <h2 class="text-xl mb-4">Friendship requests</h2>
  <h3 class="font-bold">Received</h3>
  @foreach($received as $r)
    <div class="bg-white p-3 rounded mb-2">From: {{ $r->requester->name }} - Status: {{ $r->status }}
      <form method="POST" action="/friends/{{ $r->id }}/accept">@csrf<button class="px-2 py-1 bg-green-600 text-white">Accept</button></form>
      <form method="POST" action="/friends/{{ $r->id }}/reject">@csrf<button class="px-2 py-1 bg-red-600 text-white">Reject</button></form>
    </div>
  @endforeach

  <h3 class="font-bold mt-4">Sent</h3>
  @foreach($sent as $s)
    <div class="bg-white p-3 rounded mb-2">To: {{ $s->addressee->name }} - Status: {{ $s->status }}
      <form method="POST" action="/friends/{{ $s->id }}/delete">@csrf @method('DELETE')<button class="px-2 py-1 bg-red-600 text-white">Cancel</button></form>
    </div>
  @endforeach
</div>
@endsection
