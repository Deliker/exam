@extends('layouts.app')

@section('content')
<div class="slot-machine-container">
    <h1>Magical Tales</h1>
    <div>Balance: $<span id="balance">{{ Auth::user()->balance }}</span></div>
    <div>
        <label for="betAmount">Bet Amount: $</label>
        <input type="number" id="betAmount" min="1" value="1">
    </div>
    <div class="slot-machine">
        <div class="reel" id="reel1">
            <div class="symbol">📖</div>
            <div class="symbol">🧚‍♂️</div>
            <div class="symbol">🌟</div>
            <div class="symbol">🦄</div>
            <div class="symbol">🔮</div>
            <div class="symbol">🧙‍♀️</div>
            <div class="symbol">🍀</div>
            <div class="symbol">🔥</div>
            <div class="symbol">🌈</div>
        </div>
        <div class="reel" id="reel2">
            <div class="symbol">📖</div>
            <div class="symbol">🧚‍♂️</div>
            <div class="symbol">🌟</div>
            <div class="symbol">🦄</div>
            <div class="symbol">🔮</div>
            <div class="symbol">🧙‍♀️</div>
            <div class="symbol">🍀</div>
            <div class="symbol">🔥</div>
            <div class="symbol">🌈</div>
        </div>
        <div class="reel" id="reel3">
            <div class="symbol">📖</div>
            <div class="symbol">🧚‍♂️</div>
            <div class="symbol">🌟</div>
            <div class="symbol">🦄</div>
            <div class="symbol">🔮</div>
            <div class="symbol">🧙‍♀️</div>
            <div class="symbol">🍀</div>
            <div class="symbol">🔥</div>
            <div class="symbol">🌈</div>
        </div>
    </div>
    <button id="spinButton">Spin</button>
    <div id="resultMessage"></div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{ asset('js/slot-magical-tales.js') }}"></script>

@endsection

<style>
.slot-machine-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 50px;
}

.slot-machine {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.reel {
    display: flex;
    flex-direction: column;
    margin: 0 10px;
    overflow: hidden;
    border: 2px solid #ccc;
    height: 200px;
    width: 100px;
    position: relative;
}

.symbol {
    font-size: 2em;
    padding: 5px;
    text-align: center;
}

button {
    padding: 10px 20px;
    font-size: 1em;
}

#resultMessage {
    margin-top: 20px;
    font-size: 1.5em;
}

.spin {
    animation: spinAnimation 2s ease-out;
}

@keyframes spinAnimation {
    0% { transform: translateY(0); }
    100% { transform: translateY(-200%); }
}
</style>
