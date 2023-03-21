<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\BookingSlot;
use App\Models\Room;
use App\Models\RoomImage;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Image;

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
        $day_of_weeks = BookingSlot::DAY_OF_WEEK;
        return view('admin-panel.rooms.create', compact('day_of_weeks'));
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

        $day_of_weeks = BookingSlot::DAY_OF_WEEK;
        foreach ($day_of_weeks as $key => $value) {
            BookingSlot::create([
                'room_id' => $room->id,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'day_of_week' => $key,
                'day' => $value,
                'is_active' => (in_array($key, [5, 6])) ? 0 : 1,
            ]);
        }

        if ($request->images) {
            foreach ($request->images as $key => $image) {
                $imageName = time() . rand(1, 99) . '.' . $image->extension();
                $image->move(public_path('images/room_image'), $imageName);
                $images[]['name'] = $imageName;

                RoomImage::create([
                    'room_id' => $room->id,
                    'image_url' => $imageName,
                ]);
            }
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
        $room->update([
            'room_number' => $request->room_number,
            'room_name' => $request->room_name,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'equipment' => $request->equipment,
            'status' => $request->status,
        ]);

        foreach ($request['day_of_week'] as $value) {
            $slot = BookingSlot::where('room_id', $room->id)->where('day_of_week', $value['day_of_week']);
            $slot->update([
                'start_time' => $value['start_time'],
                'end_time' => $value['end_time'],
                'is_active' => (isset($value['is_active'])) ? 1 : 0,
            ]);
        }

        return redirect()->route('admin-panel.rooms.index')->with(['message' => "Room updated successfully."]);
    }

    public function destroyRoom(Room $room): RedirectResponse
    {
        $room->delete();
        BookingSlot::where('room_id', $room->id)->delete();
        return back()->with(['success' => true, 'message' => "Room deleted successfully."]);
    }
}
