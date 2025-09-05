@extends('layouts.app')
@section('title','Category Details')

@section('content')
<h1>Category: {{ $category->Name }}</h1>
<p><strong>Description:</strong> {{ $category->Description }}</p>

<a href="{{ route('categories.edit',$category->CategoryID) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('categories.destroy',$category->CategoryID) }}" method="POST" class="d-inline">
  @csrf @method('DELETE')
  <button class="btn btn-danger">Delete</button>
</form>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
@endsection