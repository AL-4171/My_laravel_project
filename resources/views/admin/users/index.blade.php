@extends('layouts.app')
@section('title','Users')

@section('content')
<h1>Users</h1>
<a href="{{ route('users.create') }}" class="btn btn-success mb-3">Create User</a>

<table class="table table-bordered">
  <tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
  @foreach($users as $user)
  <tr>
    <td>{{ $user->UserID }}</td>
    <td>{{ $user->Name }}</td>
    <td>{{ $user->Email }}</td>
    <td>{{ $user->Role }}</td>
    <td>
      <a href="{{ route('users.show',$user->UserID) }}" class="btn btn-info btn-sm">View</a>
      <a href="{{ route('users.edit',$user->UserID) }}" class="btn btn-warning btn-sm">Edit</a>
      <form action="{{ route('users.destroy',$user->UserID) }}" method="POST" class="d-inline">
        @csrf @method('DELETE')
        <button class="btn btn-danger btn-sm">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection