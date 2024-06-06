<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function slotFairiesDragons()
    {
        return view('slot-fairies-dragons');
    }

    public function slotMagicalTales()
    {
        return view('slot-magical-tales');
    }

    public function slotMythicalCreatures()
    {
        return view('slot-mythical-creatures');
    }

    public function slotPiratesTreasures()
    {
        return view('slot-pirates-treasures');
    }

    public function slots()
    {
        return view('slots');
    }

    public function support()
    {
        return view('support');
    }
}

