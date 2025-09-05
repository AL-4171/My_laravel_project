@extends('layouts.app')
@section('title','Categories')

@section('content')
<h1>Categories</h1>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create Category</a>

<table class="table table-bordered">
  <tr><th>ID</th><th>Name</th><th>Description</th><th>Actions</th></tr>
  @foreach($categories as $cat)
  <tr>
    <td>{{ $cat->CategoryID }}</td>
    <td>{{ $cat->Name }}</td>
    <td>{{ $cat->Description }}</td>
    <td>
      <a href="{{ route('categories.show',$cat->CategoryID) }}" class="btn btn-info btn-sm">View</a>
      <a href="{{ route('categories.edit',$cat->CategoryID) }}" class="btn btn-warning btn-sm">Edit</a>
      <form action="{{ route('categories.destroy',$cat->CategoryID) }}" method="POST" class="d-inline">
        @csrf @method('DELETE')
        <button class="btn btn-danger btn-sm">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection