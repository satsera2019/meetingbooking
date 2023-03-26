<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $roomRepository;
    private $bookingRepository;

    public function __construct(RoomRepositoryInterface $roomRepository, BookingRepositoryInterface $bookingRepository) {
        $this->roomRepository = $roomRepository;
        $this->bookingRepository = $bookingRepository;
    }

    public function index(Request $request)
    {
        $bookings = $this->bookingRepository->getUserBookingWithFilters($request);
        return view('user-panel.bookings.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $rooms =  $this->roomRepository->getRoomsWithFilters($request);
        return view('user-panel.bookings.create', compact('rooms'));
    }

    public function store(Room $room, Request $request)
    {
        $checkbookingValid = $this->bookingRepository->checkBookingValid($request->start_time, $request->end_time, $room->id);
        if (!$checkbookingValid['success']) {
            return back()->with(['success' => false, 'error' => $checkbookingValid['message']]);
        }
        $this->bookingRepository->createBooking(auth()->user()->id, $room->id, $request->start_time, $request->end_time);
        return back()->with(['success' => true, 'message' => 'Booking created successfully.']);
    }

    public function edit(Booking $booking, Request $request)
    {
        $checkbookingValid = $this->bookingRepository->checkBookingValid($request->start_time, $request->end_time, $booking->room_id);
        if (!$checkbookingValid['success']) {
            return back()->with(['success' => false, 'error' => $checkbookingValid['message']]);
        }
        $this->bookingRepository->updateBooking($booking,  $request->start_time, $request->end_time);
        return back()->with(['success' => true, 'message' => 'Booking updated successfully.']);
    }

    public function destroyBooking(Booking $booking): RedirectResponse
    {
        $booking->delete();
        return back()->with(['success' => true, 'message' => "Booking deleted successfully."]);
    }
}
