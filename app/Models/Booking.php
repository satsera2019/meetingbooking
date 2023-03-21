<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $fillable = ['user_id', 'room_id', 'start_time', 'end_time', 'status'];

    const BOOKING_STATUSES = [
        'CURRENT' => 'current',
        'FINISHED' => 'finished',
        'PENDING' => 'pending'
    ];


    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
