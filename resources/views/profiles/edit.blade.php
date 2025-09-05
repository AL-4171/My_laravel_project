@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container">
    <h1>Edit My Profile</h1>

    <form method="POST" action="{{ route('profiles.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="Name" class="form-control" 
                   value="{{ old('Name', $user->Name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="Email" class="form-control" 
                   value="{{ old('Email', $user->Email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="Age" class="form-control" 
                   value="{{ old('Age', $user->Age) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="Phone" class="form-control" 
                   value="{{ old('Phone', $user->Phone) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Bio</label>
            <textarea name="Bio" rows="4" class="form-control">{{ old('Bio', $profile->Bio) }}</textarea>
        </div>

        <button class="btn btn-success">Save Changes</button>
        <a href="{{ route('profiles.my') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection