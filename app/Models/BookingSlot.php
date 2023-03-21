<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingSlot extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'booking_slots';

    protected $fillable = [
        'room_id',
        'start_time',
        'end_time',
        'day_of_week',
        'day',
        'is_active',
    ];

    const DAY_OF_WEEK = [
        0 => 'monday',
        1 => 'tuesday',
        2=> 'wednesday',
        3 => 'thursday',
        4 => 'friday',
        5 => 'saturday',
        6 => 'sunday',
    ];
}
