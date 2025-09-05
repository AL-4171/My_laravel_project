@extends('layouts.app')
@section('title','Create Category')

@section('content')
<h1>Create Category</h1>
<form method="POST" action="{{ route('categories.store') }}">
  @csrf
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="Name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Description</label>
    <input type="text" name="Description" class="form-control">
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
