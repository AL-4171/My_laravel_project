@extends('layouts.app')
@section('title','Settings')
@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl mb-4">Settings</h2>
  <form method="POST" action="/settings">@csrf @method('PUT'>
    <label>Email</label><input name="email" value="{{ auth()->user()->email }}" class="w-full p-2 border mb-2">
    <label>New password (leave blank to keep)</label><input type="password" name="password" class="w-full p-2 border mb-4">
    <button class="px-3 py-1 bg-green-600 text-white rounded">Save</button>
  </form>
</div>
@endsection
