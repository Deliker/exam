@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <h2>Profile</h2>
            <a href="{{ route('profile.edit') }}" class="btn">Edit Profile</a>
        </div>
        <div class="profile-content">
            <div class="profile-picture">
                <img src="https://via.placeholder.com/150" alt="Profile Picture">
            </div>
            <div class="profile-info">
                <h3>{{ $user->name }}</h3>
                <p>{{ $user->email }}</p>
                <p>Balance: ${{ number_format($user->balance, 2) }}</p>
            </div>
        </div>
        <div class="profile-actions">
            <form method="POST" action="{{ route('profile.add-balance') }}" class="balance-form">
                @csrf
                <label for="amount" class="balance-label">Add Balance</label>
                <input type="number" name="amount" id="amount" step="0.01" class="balance-input">
                <button type="submit" class="btn add-balance-btn">Add Balance</button>
            </form>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn logout-btn">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
