<?php

namespace App\Repositories;

use App\Models\Room;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use Illuminate\Http\Request;

class RoomRepository implements RoomRepositoryInterface
{
    public function getRoomsWithFilters($request)
    {
        $query = Room::query();
        if ($request->has('room_name') and $request->get('room_name') !== null) {
            $query->where('room_name', $request->get('room_name'));
        }
        if ($request->has('room_number') and $request->get('room_number') !== null) {
            $query->where('room_number', $request->get('room_number'));
        }
        if ($request->has('location') and $request->get('location') !== null) {
            $query->where('location', 'LIKE', '%' . $request->get('location') . '%');
        }
        if ($request->has('capacity') and $request->get('capacity') !== null) {
            $query->where('capacity', $request->get('capacity'));
        }
        if ($request->has('equipment') and $request->get('equipment') !== null) {
            $query->where('equipment', 'LIKE', '%' . $request->get('equipment') . '%');
        }
        return $query->orderBy('id', 'DESC')->paginate(15);
    }

    public function createRoom($request)
    {
        return Room::create([
            'room_number' => $request['room_number'],
            'room_name' => $request['room_name'],
            'location' => $request['location'],
            'capacity' => $request['capacity'],
            'equipment' => $request['equipment'],
        ]);
    }

    public function updateRoom(Room $room, $request)
    {
        return $room->update([
            'room_number' => $request['room_number'],
            'room_name' => $request['room_name'],
            'location' => $request['location'],
            'capacity' => $request['capacity'],
            'equipment' => $request['equipment'],
            'status' => $request['status'],
        ]);
    }
}
