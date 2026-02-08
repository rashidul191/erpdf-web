<?php

namespace App\Models\Admin;

use App\Casts\ImageField;
use App\Enums\IsHomeStatus;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'image',
        'page_link',
        'is_home'
    ];

    protected $casts = [
        'image' => ImageField::class . ':sliders',
        'is_home' => IsHomeStatus::class,
    ];
}
