<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use Carbon\Carbon;

class BookingRepository implements BookingRepositoryInterface
{
    public function getBookingWithFilters($request)
    {
        $query = Booking::where('start_time', '>=', Carbon::today())->where('end_time', '<=', Carbon::tomorrow());
        if ($request->has('start_time') and $request->get('start_time') !== null) {
            $query->where('start_time', '>=', $request->get('start_time'));
        }
        if ($request->has('end_time') and $request->get('end_time') !== null) {
            $query->where('end_time', '<=', $request->get('end_time'));
        }
        return $query->get()->sortByDesc('id');
    }

    public function getBookingByRoom($room_id)
    {
        $query = Booking::where('room_id', $room_id)->where('start_time', '>=', Carbon::today())->where('end_time', '<=', Carbon::tomorrow());
        return $query->get();
    }

    public function getUserBookingWithFilters($request)
    {
        $query = Booking::where('user_id', auth()->user()->id);
        if ($request->has('start_time') and $request->get('start_time') !== null) {
            $query->where('start_time', '>=', $request->get('start_time'));
        }
        if ($request->has('end_time') and $request->get('end_time') !== null) {
            $query->where('end_time', '<=', $request->get('end_time'));
        }
        return $query->get()->sortByDesc('id');
    }

    public function checkBookingValid(string $start_time, string $end_time, int $room_id)
    {
        $slotRepo = new BookingSlotRepository;
        $slot = $slotRepo->getSlotByDay($start_time, $room_id);
        // Non-working day check
        if ($slot->is_active === 0) {
            return ["success" => false, "message" => "Booking is not possible today."];
        }
        // Check during the day
        if (date('H:i:s', strtotime($start_time)) < $slot->start_time || date('H:i:s', strtotime($end_time)) > $slot->end_time) {
            return ["success" => false, "message" => "Booking is available from $slot->start_time to $slot->end_time."];
        }
        // Checking existing bookings
        $bookings = Booking::where('start_time', '>=', $start_time)->where('end_time', '<=', $end_time)->first();
        if (!is_null($bookings)) {
            return ["success" => false, "message" => "The room is booked at this time."];
        }

        return ["success" => true, "message" => "Booking is possible."];
    }

    public function createBooking(int $user_id, int $room_id, string $start_time, string $end_time)
    {
        return Booking::create([
            'user_id' => $user_id,
            'room_id' => $room_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);
    }

    public function updateBooking(Booking $booking, string $start_time, string $end_time)
    {
        return $booking->update([
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);
    }
}
