<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Slot;

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

    public function mysticAdventures()
    {
        return view('slot-mystic-adventures');
    }

    public function spin(Request $request)
    {
        $user = Auth::user();
        $betAmount = $request->input('betAmount');
        $winAmount = $request->input('winAmount');
        $slotName = $request->input('slotName');

        // Обновление баланса пользователя
        $user->balance = $user->balance - $betAmount + $winAmount;
        $user->save();

        // Обновление данных слота
        $slot = Slot::firstOrCreate(
            ['name' => $slotName, 'user_id' => $user->id],
            ['spent_amount' => 0, 'won_amount' => 0, 'spin_count' => 0]
        );
        $slot->spent_amount += $betAmount;
        $slot->won_amount += $winAmount;
        $slot->spin_count += 1;
        $slot->save();

        return response()->json(['balance' => $user->balance]);
    }
}
