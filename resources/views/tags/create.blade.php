@extends('layouts.app')
@section('title','Create Tag')

@section('content')
<h1>Create Tag</h1>
<form method="POST" action="{{ route('tags.store') }}">
  @csrf
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="Name" class="form-control" required>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
