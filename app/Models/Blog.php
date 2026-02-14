<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, DeletesImage;
    protected $fillable = [
        'blog_category_id',
        'name',
        'slug',
        'image',
        'gallery_image',
        'short_description',
        'description',
    ];

    protected $casts = [
        'image' => ImageField::class . ':blogs,images/no-image.png',
        'gallery_image' => \App\Casts\MultipleImageField::class . ':blogs/gallery,images/no-image.png',

    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}
