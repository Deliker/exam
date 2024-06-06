@extends('layouts.app')

@section('content')
<div class="container">
    <div class="search-bar">
        <input type="text" id="search" placeholder="Search slots..." class="search-input">
    </div>

    <div class="slot-list" id="slot-list">
        <a href="{{ route('slots.fairies-dragons') }}" class="slot-link">
            <img src="images/fairies-dragons-icon.png" alt="Fairies & Dragons">
        </a>
        <a href="{{ route('slots.magical-tales') }}" class="slot-link">
            <img src="images/magical-tales-icon.png" alt="Magical Tales">
        </a>
        <a href="{{ route('slots.mystic-adventure') }}" class="slot-link">
            <img src="images/mystic-adventure-icon.png" alt="Mystic Adventure">
        </a>
        <a href="{{ route('slots.mythical-creatures') }}" class="slot-link">
            <img src="images/mythical-creatures-icon.png" alt="Mythical Creatures">
        </a>
        <a href="{{ route('slots.pirates-treasures') }}" class="slot-link">
            <img src="images/pirates-treasures-icon.png" alt="Pirates & Treasures">
        </a>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/slots.js') }}"></script>
@endsection
