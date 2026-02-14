<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomComment extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'room_id',
        'name',
        'email',
        'message',
        'image',
    ];

    protected $casts = [
        'image' => ImageField::class . ':room_comments,images/avatar.png',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
