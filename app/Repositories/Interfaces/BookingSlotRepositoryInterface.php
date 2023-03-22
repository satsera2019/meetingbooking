<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface BookingSlotRepositoryInterface
{
    public function createBookingSlot(int $room_id);
    public function getSlotByDay(string $start_time, int $room_id);
}
