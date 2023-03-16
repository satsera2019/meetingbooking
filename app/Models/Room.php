<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rooms';

    const ROOM_STATUSES = [
        'AVAILABLE_STATUS' => 'available',
        'UNAVAILABLE_STATUS' => 'unavailable',
        'BOOKED_STATUS' => 'booked',
    ];

    protected $fillable = [
        'room_number',
        'room_name',
        'location',
        'capacity',
        'equipment',
        'status',
    ];


    public function bookingSlots()
    {
        return $this->hasMany(BookingSlot::class);
    }
}
