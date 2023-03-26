<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    protected static function booted()
    {
        static::addGlobalScope('deleted_at', function (Builder $builder) {
            $builder->where('status', self::ROOM_STATUSES['AVAILABLE_STATUS']);
        });
    }

    public function bookingSlots()
    {
        return $this->hasMany(BookingSlot::class)->orderBy('day_of_week');
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class, 'room_id');
    }
}
