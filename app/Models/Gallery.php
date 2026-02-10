<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'image',
        'title',
    ];

    protected $casts = [
        'image' => ImageField::class . ':gallery',
    ];
}
