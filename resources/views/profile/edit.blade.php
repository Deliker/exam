@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <h2>Edit Profile</h2>
        <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-input">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-input">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-input">
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input">
            </div>
            <button type="submit" class="btn save-btn">Save Changes</button>
        </form>
    </div>
</div>
@endsection
