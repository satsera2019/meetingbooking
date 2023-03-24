<?php

namespace App\Repositories\Interfaces;

use App\Models\Room;
use Illuminate\Http\Request;

interface RoomRepositoryInterface
{
    public function getRoomsWithFilters(Request $request);
    public function createRoom(Request $request);
    public function updateRoom(Room $room, Request $request);
}
