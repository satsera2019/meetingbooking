<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Booking;
use App\Models\BookingSlot;
use App\Models\Room;
use App\Models\RoomImage;
use App\Repositories\Interfaces\BookingSlotRepositoryInterface;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Repositories\RoomImageRepository;

class RoomController extends Controller
{
    private $roomRepository;
    private $bookingSlotRepository;

    public function __construct(RoomRepositoryInterface $roomRepository, BookingSlotRepositoryInterface $bookingSlotRepository)
    {
        $this->roomRepository = $roomRepository;
        $this->bookingSlotRepository = $bookingSlotRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = $this->roomRepository->getRoomsWithFilters($request);
        $room_statuses = Room::ROOM_STATUSES;
        return view('admin-panel.rooms.index', compact('rooms', 'room_statuses'));
    }

    public function create()
    {
        $day_of_weeks = BookingSlot::DAY_OF_WEEK;
        return view('admin-panel.rooms.create', compact('day_of_weeks'));
    }

    public function store(CreateRoomRequest $request)
    {
        $validatedData = $request->validated();
        $room = $this->roomRepository->createRoom($validatedData);
        $this->bookingSlotRepository->createBookingSlot($room->id);
        if ($request->images) {
            $roomImageRepository = new RoomImageRepository();
            $roomImageRepository->createRoomImages($request->images, $room->id);
        }

        return redirect()->route('admin-panel.rooms.index')->with(['message' => "Room created successfully."]);
    }

    public function edit(Room $room)
    {
        $room_statuses = Room::ROOM_STATUSES;
        $day_of_weeks = BookingSlot::DAY_OF_WEEK;
        return view('admin-panel.rooms.edit', compact('room', 'room_statuses', 'day_of_weeks'));
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $validatedData = $request->validated();
        $this->roomRepository->updateRoom($room, $validatedData);
        $this->bookingSlotRepository->updateBookinkSlot($request['day_of_week'], $room->id);
        if ($request->images && $request->images[0] != null) {
            $roomImageRepository = new RoomImageRepository();
            $roomImageRepository->createRoomImages($request->images, $room->id);
        }
        return redirect()->route('admin-panel.rooms.edit', $room)->with(['message' => "Room updated successfully."]);
    }

    public function destroyRoom(Room $room): RedirectResponse
    {
        $room->delete();
        BookingSlot::where('room_id', $room->id)->delete();
        Booking::where('room_id', $room->id)->delete();
        RoomImage::where('room_id', $room->id)->delete();
        return back()->with(['success' => true, 'message' => "Room deleted successfully."]);
    }


    public function destroyImage(RoomImage $image): RedirectResponse
    {
        $image->delete();
        return back()->with(['success' => true, 'message' => "Image deleted successfully."]);
    }
}
