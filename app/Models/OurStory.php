<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurStory extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'image',
        'date',
        'title',
        'description',
    ];

    protected $casts = [
        'image' => ImageField::class . ':our-story',
    ];
}
