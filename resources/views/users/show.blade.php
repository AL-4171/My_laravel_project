@extends('layouts.app')
@section('title','User Details')

@section('content')
<h1>User: {{ $user->Name }}</h1>
<p><strong>Email:</strong> {{ $user->Email }}</p>
<p><strong>Role:</strong> {{ $user->Role }}</p>
<a href="{{ route('users.edit', $user->UserID) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('users.destroy', $user->UserID) }}" method="POST" class="d-inline">
  @csrf @method('DELETE')
  <button class="btn btn-danger">Delete</button>
</form>
<a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
@endsection