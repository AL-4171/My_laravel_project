@extends('layouts.app')
@section('title','Notifications')
@section('content')
<div class="max-w-3xl mx-auto">
  <h2 class="text-xl mb-4">Notifications</h2>
  @foreach($notes as $n)
    <div class="bg-white p-3 rounded mb-2">
      <div class="text-sm">{{ $n->type }} - {{ json_encode($n->data) }}</div>
      <div class="text-xs text-gray-500">{{ $n->created_at }}</div>
      @if(!$n->read)<form method="POST" action="/notifications/{{ $n->id }}/read">@csrf<button class="px-2 py-1 bg-blue-600 text-white">Mark read</button></form>@endif
    </div>
  @endforeach
  {{ $notes->links() }}
</div>
@endsection
