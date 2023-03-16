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
        return $query->get()->sortByDesc('id');
    }
}
