@extends('layouts.app')
@section('title','Edit User')

@section('content')
<h1>Edit User</h1>
<form method="POST" action="{{ route('users.update', $user->UserID) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="Name" value="{{ $user->Name }}" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="Email" value="{{ $user->Email }}" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>New Password (leave blank to keep)</label>
    <input type="password" name="pass" class="form-control">
  </div>
  <div class="mb-3">
    <label>Role</label>
    <select name="Role" class="form-control" required>
      <option value="user" {{ $user->Role === 'user' ? 'selected' : '' }}>user</option>
      <option value="admin" {{ $user->Role === 'admin' ? 'selected' : '' }}>admin</option>
    </select>
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection