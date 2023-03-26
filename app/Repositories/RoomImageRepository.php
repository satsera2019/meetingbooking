<?php

namespace App\Repositories;

use App\Models\RoomImage;

class RoomImageRepository
{
    public function createRoomImages(array $images, $room_id)
    {
        foreach ($images as $image) {
            $imageName = time() . rand(1, 99) . '.' . $image->extension();
            $image->move(public_path('images/room_image'), $imageName);
            $images[]['name'] = $imageName;

            RoomImage::create([
                'room_id' => $room_id,
                'image_url' => $imageName,
            ]);
        }
        return;
    }
}
