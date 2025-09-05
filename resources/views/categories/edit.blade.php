@extends('layouts.app')
@section('title','Edit Category')

@section('content')
<h1>Edit Category</h1>
<form method="POST" action="{{ route('categories.update',$category->CategoryID) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="Name" value="{{ $category->Name }}" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Description</label>
    <input type="text" name="Description" value="{{ $category->Description }}" class="form-control">
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection