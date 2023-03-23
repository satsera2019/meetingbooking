<?php

namespace App\Http\Controllers\TabletPanel;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use App\Repositories\BookingRepository;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\RoomRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class TabletController extends Controller
{
    private $bookingRepository;
    private $userRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository, UserRepositoryInterface $userRepository)
    {
        $this->bookingRepository = $bookingRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Room $room, Request $request)
    {
        $room_id = 8;
        $room_bookings = $this->bookingRepository->getBookingByRoom($room_id);
        return view('tablet-panel.index', compact('room_bookings'));
    }

    public function rooms(Request $request)
    {
        $roomRepo = new RoomRepository;
        $rooms = $roomRepo->getRoomsWithFilters($request);
        return view('tablet-panel.rooms.index', compact('rooms'));
    }

    public function roomDetail(Room $room, Request $request)
    {
        $userRepo = new UserRepository;
        $users = $userRepo->getUsersWithFilters($request);
        return view('tablet-panel.rooms.room-details', compact('room', 'users'));
    }

    public function meetings(Request $request)
    {
        $bookingRepo = new BookingRepository;
        $bookings = $bookingRepo->getBookingWithFilters($request);
        return view('tablet-panel.meetings.index', compact('bookings'));
    }

    public function createBooking(Room $room, Request $request)
    {
        $checkUserValid = $this->userRepository->checkUserValid($request->user_id, $request->password);
        if (!$checkUserValid['success']) {
            return back()->with(['success' => false, 'error' => $checkUserValid['message']]);
        }
        $checkbookingValid = $this->bookingRepository->checkBookingValid($request->start_time, $request->end_time, $room->id);
        if (!$checkbookingValid['success']) {
            return back()->with(['success' => false, 'error' => $checkbookingValid['message']]);
        }
        $this->bookingRepository->createBooking($request->user_id, $room->id, $request->start_time, $request->end_time);
        return back()->with(['success' => true, 'message' => 'Booked successfully.']);
    }
}
