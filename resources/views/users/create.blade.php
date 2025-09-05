@extends('layouts.app')
@section('title','Create User')

@section('content')
<h1>Create User</h1>
<form method="POST" action="{{ route('users.store') }}">
  @csrf
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="Name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="Email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="pass" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Role</label>
    <select name="Role" class="form-control" required>
      <option value="user">user</option>
      <option value="admin">admin</option>
    </select>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection