<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, DeletesImage;
    protected $fillable = ['image', 'title', 'sub_title'];

    protected $casts = [
        'image' => ImageField::class . ':services,images/no-image.png',
    ];
}
