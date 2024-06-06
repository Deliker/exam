<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index()
    {
        return view('slots');
    }

    public function fairiesDragons()
    {
        return view('slot-fairies-dragons');
    }

    public function magicalTales()
    {
        return view('slot-magical-tales');
    }

    public function mysticAdventure()
    {
        return view('slot-mystic-adventure');
    }

    public function mythicalCreatures()
    {
        return view('slot-mythical-creatures');
    }

    public function piratesTreasures()
    {
        return view('slot-pirates-treasures');
    }
    public function updateBalance(Request $request)
{
    $user = auth()->user();
    $betAmount = $request->input('bet_amount');
    $spinResult = rand(0, 1);
    $winAmount = $spinResult ? $betAmount * 2 : 0;

    // Обновление баланса
    $user->balance -= $betAmount;
    $user->balance += $winAmount;
    $user->save();

    return response()->json([
        'balance' => $user->balance,
        'result' => $spinResult ? 'win' : 'lose',
        'win_amount' => $winAmount
    ]);
}

}

