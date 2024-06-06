@extends('layouts.app')

@section('content')
<div class="container">
    <div class="slot-controls">
        <div class="balance">
            Balance: $<span id="balance">{{ auth()->user()->balance }}</span>
        </div>
        <div class="bet-controls">
            <label for="bet-amount">Bet Amount: $</label>
            <input type="number" id="bet-amount" value="0.1" min="0.1" step="0.1">
        </div>
        <button id="spin-btn" class="spin-btn">Spin</button>
    </div>

    <div class="slot-machine">
        <div id="reel1" class="reel">📖</div>
        <div id="reel2" class="reel">🧙‍♂️</div>
        <div id="reel3" class="reel">🧝‍♀️</div>
    </div>

    <div id="result" class="result"></div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/slot-magical-tales.js') }}"></script>
@endsection
