<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutLeftSide extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'image',
        'title',
        'short_description',
    ];

    protected $casts = [
        'image' => ImageField::class . ':about-page',
    ];
}
