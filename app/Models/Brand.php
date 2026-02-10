<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Models\Admin\Product;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    protected $casts = [
        'image' => ImageField::class . ':brands',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
