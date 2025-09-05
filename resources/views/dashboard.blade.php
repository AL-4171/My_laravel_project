@extends('layouts.app')
@section('title','User Dashboard')

@section('content')
<h1>Welcome {{ $user->Name }}</h1>
<p>Email: {{ $user->Email }}</p>

<form method="POST" action="{{ route('account.delete') }}">
  @csrf
  @method('DELETE')
  <button class="btn btn-danger">Delete Account</button>
</form>
@endsection