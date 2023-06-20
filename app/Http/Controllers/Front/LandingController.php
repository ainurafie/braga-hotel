<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $room = Room::all();
        // $photos = [];

        // foreach ($room as $item) {
        //     $photos[] = json_decode($item->photo, true);
        // }
        // dd($room);
        $category = RoomCategory::all();

        $event = Event::orderBy('updated_at', 'desc')->paginate(4);

        return view('front.index', compact('room', 'category', 'event'));
    }

    public function checkRoom(Request $request)
    {
        $params = $request->capacity;
        $categoryID = $request->category_id;

        if (empty($params) || empty($categoryID)) {
            // Jika pencarian kosong
            $rooms = [];
        } else {
            // Jika pencarian ada
            $validatedData = $request->validate([
                'capacity' => 'required|min:1',
                'category_id' => 'required|min:1'
            ]);

            $rooms = Room::where('capacity', '>=', $validatedData['capacity'])
                ->where('category_id', $validatedData['category_id'])
                ->take(3)
                ->get();
        }

        $category = RoomCategory::all();


        return view('front.room', compact('rooms', 'category'));
    }

    public function bookNow($id)
    {

        $room = Room::with('categories')->findOrFail($id);

        return view('front.checkout', compact('room'));
    }





    // public function resultRoom($data)
    // {
    //     dd($data);
    //     $rooms = Room::where('capacity', $data->capacity)
    //         ->where('category_id', $data->category_id)
    //         ->get();

    //     $category = RoomCategory::all();


    //     return view('front.room', compact('rooms', 'category'));
    // }
}
