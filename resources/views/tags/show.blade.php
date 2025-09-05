@extends('layouts.app')
@section('title','Tag Details')

@section('content')
<h1>Tag: {{ $tag->Name }}</h1>

<a href="{{ route('tags.edit',$tag->TagID) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('tags.destroy',$tag->TagID) }}" method="POST" class="d-inline">
  @csrf @method('DELETE')
  <button class="btn btn-danger">Delete</button>
</form>
<a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
@endsection