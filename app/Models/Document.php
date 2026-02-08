<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'serial',
        'image',
    ];

    protected $casts = [
        'image' => ImageField::class . ':document',
    ];
}
