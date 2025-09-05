@extends('layouts.app')
@section('title','Admin Dashboard')
@section('content')
<h1 class="text-2xl mb-4">Admin Dashboard</h1>
<div class="grid grid-cols-2 gap-6">
  <div class="bg-white p-4 rounded shadow">
    <h3 class="font-bold mb-2">Users</h3>
    <table class="w-full text-left">
      <thead><tr><th>Name</th><th>Email</th><th>Admin</th><th>Actions</th></tr></thead>
      <tbody>
      @foreach($users as $u)
        <tr><td>{{ $u->name }}</td><td>{{ $u->email }}</td><td>{{ $u->is_admin ? 'Yes' : 'No' }}</td>
        <td>
          <form method="POST" action="/admin/users/{{ $u->id }}/toggle-admin">@csrf<button class="px-2 py-1 bg-yellow-500 text-white rounded">Toggle Admin</button></form>
        </td></tr>
      @endforeach
      </tbody>
    </table>
    {{ $users->links() }}
  </div>

  <div class="bg-white p-4 rounded shadow">
    <h3 class="font-bold mb-2">Recent Posts</h3>
    @foreach($posts as $p)
      <div class="mb-3 border-b pb-2">
        <div class="font-bold">{{ $p->user->name }}</div>
        <div class="text-sm">{{ $p->content }}</div>
        <form method="POST" action="/admin/posts/{{ $p->id }}/delete">@csrf<button class="mt-2 px-2 py-1 bg-red-600 text-white rounded">Delete</button></form>
      </div>
    @endforeach
    {{ $posts->links() }}
  </div>
</div>
@endsection
