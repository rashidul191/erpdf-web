<?php

namespace App\Models\Admin;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    protected $casts = [
        'image' => ImageField::class . ':categories,image/no-image.png',
    ];
    
    // public function products()
    // {
    //     return $this->belongsToMany(Product::class);
    // }
}
