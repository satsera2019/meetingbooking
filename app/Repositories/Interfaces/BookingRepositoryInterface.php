<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface BookingRepositoryInterface
{
    public function getBookingWithFilters(Request $request);
    public function getUserBookingWithFilters(Request $request);
    public function checkBookingValid(string $start_time, string $end_time, int $room_id);
    public function createBooking(int $user_id, int $room_id, string $start_time, string $end_time);
}
