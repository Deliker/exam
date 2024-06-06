@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h2>Welcome to Casino Slot Wars</h2>
            <p>Experience the best online slot games.</p>
            <a href="{{ route('slots.index') }}" class="hero-btn">Play Now</a>
        </div>
    </section>
@endsection
