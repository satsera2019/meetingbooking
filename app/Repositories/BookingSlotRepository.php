<?php

namespace App\Repositories;

use App\Models\BookingSlot;
use App\Repositories\Interfaces\BookingSlotRepositoryInterface;
use Carbon\Carbon;

class BookingSlotRepository implements BookingSlotRepositoryInterface
{
    public function createBookingSlot(int $room_id)
    {
        $day_of_weeks = BookingSlot::DAY_OF_WEEK;
        foreach ($day_of_weeks as $key => $value) {
            BookingSlot::create([
                'room_id' => $room_id,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'day_of_week' => $key,
                'day' => $value,
                'is_active' => (in_array($key, [5, 6])) ? 0 : 1,
            ]);
        }
        return;
    }

    public function getSlotByDay(string $start_time, int $room_id)
    {
        $parsed_start_time = Carbon::parse($start_time);
        $carbonDatetime = Carbon::createFromFormat('Y-m-d H:i:s', $parsed_start_time);
        $dayOfWeek = $carbonDatetime->format('l');
        return BookingSlot::where('room_id', $room_id)->where('day', $dayOfWeek)->first();
    }

    public function updateBookinkSlot(array $days_of_week, int $room_id)
    {
        foreach ($days_of_week as $value) {
            $slot = BookingSlot::where('room_id', $room_id)->where('day_of_week', $value['day_of_week']);
            $slot->update([
                'start_time' => $value['start_time'],
                'end_time' => $value['end_time'],
                'is_active' => (isset($value['is_active'])) ? 1 : 0,
            ]);
        }
        return ["success" => true, "message" => "Booking slot updated successfully."];
    }
}
