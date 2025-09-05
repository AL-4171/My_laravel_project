@extends('layouts.app')
@section('title','Edit Tag')

@section('content')
<h1>Edit Tag</h1>
<form method="POST" action="{{ route('tags.update',$tag->TagID) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="Name" value="{{ $tag->Name }}" class="form-control" required>
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection