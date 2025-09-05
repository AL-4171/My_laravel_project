@extends('layouts.app')
@section('title','Admin Dashboard')

@section('content')
<h1>Admin Dashboard</h1>
<p>Welcome {{ Auth::user()->Name }}</p>
<div class="list-group">
  <a href="{{ route('users.index') }}" class="list-group-item">Manage Users</a>
  <a href="{{ route('categories.index') }}" class="list-group-item">Manage Categories</a>
  <a href="{{ route('tags.index') }}" class="list-group-item">Manage Tags</a>
</div>
@endsection