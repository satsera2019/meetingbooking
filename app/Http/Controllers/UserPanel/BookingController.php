<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)->orderBy('id', "DESC")->get();
        return view('user-panel.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('user-panel.bookings.create', compact('rooms'));
    }
    
    public function store(Room $room, BookingRequest $request)
    {
        // dd($request->all(), $room);
        Booking::create([
            'user_id' => auth()->user()->id,
            'room_id' => $room->id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => Booking::BOOKING_STATUSES['PENDING'],
        ]);
        return back()->with(['message' => 'Booked successfully.']);
    }

    
}
