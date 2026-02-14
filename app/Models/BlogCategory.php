<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
     use HasFactory, DeletesImage;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    protected $casts = [
        'image' => ImageField::class . ':blog-categories,image/no-image.png',
    ];
    
    // public function products()
    // {
    //     return $this->belongsToMany(Product::class);
    // }
}
