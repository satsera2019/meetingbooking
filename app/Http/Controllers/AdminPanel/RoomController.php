<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoomRequest;
use App\Models\BookingSlot;
use App\Models\Room;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms =  $this->roomRepository->getRoomsWithFilters($request);
        $room_statuses = Room::ROOM_STATUSES;
        return view('admin-panel.rooms.index', compact('rooms', 'room_statuses'));
    }

    public function create()
    {
        return view('admin-panel.rooms.create');
    }

    public function store(CreateRoomRequest $request)
    {
        $room = Room::create([
            'room_number' => $request->room_number,
            'room_name' => $request->room_name,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'equipment' => $request->equipment,
        ]);

        foreach ($request['day_of_week'] as $key => $value) {
            BookingSlot::create([
                'room_id' => $room->id,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'day_of_week' => $key,
                'day' => $value,
            ]);
        }

        return redirect()->route('admin-panel.rooms.index')->with(['success', "Room created successfully."]);
    }

    public function edit(Room $room)
    {
        $room_statuses = Room::ROOM_STATUSES;
        return view('admin-panel.rooms.edit', compact('room', 'room_statuses'));
    }

    public function update(Request $request, Room $room)
    {
        dd($request->all(), $room);
        $room->update([
            'room_number' => $request->room_number,
            'room_name' => $request->room_name,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'equipment' => $request->equipment,
            'status' => $request->status,
        ]);

        return redirect()->route('admin-panel.users.index')->with(['success', "User updated successfully."]);
    }
}
