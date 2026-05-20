<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory, DeletesImage;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'education',
        'occupation',
        'birth_date',
        'address',
        'image',
    ];

    protected $casts = [
        'image' => ImageField::class . ':career,images/no-image.png',
    ];

}
