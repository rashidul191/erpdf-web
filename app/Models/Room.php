<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Casts\MultipleImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'room_category_id',
        'room_type_id',
        'name',
        'slug',
        'time_duration',
        'price',
        'adult',
        'child',
        'size',
        'view',
        'image',
        'gallery_image',
        'description',
    ];

    protected $casts = [
        'image' => ImageField::class . ':room,images/no-image.png',
        'gallery_image' => MultipleImageField::class . ':rooms/gallery,images/no-image.png',
    ];

    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id');
    }

    public function type()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
