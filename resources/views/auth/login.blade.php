@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-2xl mb-4">Login</h2>
  <form method="POST" action="/login">@csrf
    <label>Email</label><input name="email" class="w-full p-2 border mb-2" value="{{ old('email') }}">
    <label>Password</label><input type="password" name="password" class="w-full p-2 border mb-4">
    <button class="w-full bg-blue-600 text-white p-2 rounded">Login</button>
  </form>
</div>
@endsection
