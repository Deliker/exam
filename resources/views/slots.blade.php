@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Slots</h1>
    <input type="text" id="slotSearch" placeholder="Search for a slot...">

    <div class="slot-list">
        <div class="slot-item" data-slot-name="Mystic Adventure">
            <a href="{{ route('slots.mystic-adventure') }}">
                <img src="{{ asset('images/mystic-adventure.jpg') }}" alt="Mystic Adventure">
                <div class="slot-name">Mystic Adventure</div>
            </a>
        </div>
        <div class="slot-item" data-slot-name="Fairies & Dragons">
            <a href="{{ route('slots.fairies-dragons') }}">
                <img src="{{ asset('images/fairies-dragons.jpg') }}" alt="Fairies & Dragons">
                <div class="slot-name">Fairies & Dragons</div>
            </a>
        </div>
        <div class="slot-item" data-slot-name="Magical Tales">
            <a href="{{ route('slots.magical-tales') }}">
                <img src="{{ asset('images/magical-tales.jpg') }}" alt="Magical Tales">
                <div class="slot-name">Magical Tales</div>
            </a>
        </div>
        <div class="slot-item" data-slot-name="Mythical Creatures">
            <a href="{{ route('slots.mythical-creatures') }}">
                <img src="{{ asset('images/mythical-creatures.jpg') }}" alt="Mythical Creatures">
                <div class="slot-name">Mythical Creatures</div>
            </a>
        </div>
        <div class="slot-item" data-slot-name="Pirates & Treasures">
            <a href="{{ route('slots.pirates-treasures') }}">
                <img src="{{ asset('images/pirates-treasures.jpg') }}" alt="Pirates & Treasures">
                <div class="slot-name">Pirates & Treasures</div>
            </a>
        </div>
    </div>
</div>

<script>
    document.getElementById('slotSearch').addEventListener('input', function() {
        let searchValue = this.value.toLowerCase();
        document.querySelectorAll('.slot-item').forEach(function(slot) {
            let slotName = slot.getAttribute('data-slot-name').toLowerCase();
            if (slotName.includes(searchValue)) {
                slot.style.display = 'block';
            } else {
                slot.style.display = 'none';
            }
        });
    });
</script>

@endsection

<style>
.container {
    margin-top: 50px;
}

#slotSearch {
    margin-bottom: 20px;
    padding: 10px;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
}

.slot-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.slot-item {
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
    width: 200px;
}

.slot-item img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

.slot-name {
    margin-top: 10px;
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.slot-item a {
    text-decoration: none;
    color: #333;
}

.slot-item a:hover {
    text-decoration: underline;
}
</style>
