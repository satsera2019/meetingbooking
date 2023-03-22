<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface RoomImageRepositoryInterface
{
    public function createRoomImages(Request $request);
}
