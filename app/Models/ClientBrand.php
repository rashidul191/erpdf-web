<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientBrand extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'image',
        'title',
        'link',
    ];

    protected $casts = [
        'image' => ImageField::class . ':client-brand,images/no-image.png',
    ];
}
