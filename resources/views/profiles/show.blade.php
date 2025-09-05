@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container">
    <h1>My Profile</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5>Name: {{ $user->Name }}</h5>
            <p>Email: {{ $user->Email }}</p>
            <p>Age: {{ $user->Age ?? '—' }}</p>
            <p>Phone: {{ $user->Phone ?? '—' }}</p>
            <p><strong>Bio:</strong> {{ $profile->Bio ?? 'No bio yet.' }}</p>
        </div>
    </div>

    <a href="{{ route('profiles.edit') }}" class="btn btn-primary">Edit Profile</a>
</div>
@endsection