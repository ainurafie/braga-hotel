<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $room = Room::all();

        return view('front.index', compact('room'));
    }

    public function detail()
    {
        return view('front.room');
    }
}
