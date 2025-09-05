@extends('layouts.app')
@section('title','Tags')

@section('content')
<h1>Tags</h1>
<a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Create Tag</a>

<table class="table table-bordered">
  <tr><th>ID</th><th>Name</th><th>Actions</th></tr>
  @foreach($tags as $tag)
  <tr>
    <td>{{ $tag->TagID }}</td>
    <td>{{ $tag->Name }}</td>
    <td>
      <a href="{{ route('tags.show',$tag->TagID) }}" class="btn btn-info btn-sm">View</a>
      <a href="{{ route('tags.edit',$tag->TagID) }}" class="btn btn-warning btn-sm">Edit</a>
      <form action="{{ route('tags.destroy',$tag->TagID) }}" method="POST" class="d-inline">
        @csrf @method('DELETE')
        <button class="btn btn-danger btn-sm">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection