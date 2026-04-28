<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Enums\CommonStatus;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'page_banner_image',
        'image',
        'title',
        'slug',
        'status',
        'short_description',
        'description',
        'others',
    ];

    protected $casts = [
        'image' => ImageField::class . ':content/image,images/no-image.png',
        'page_banner_image' => ImageField::class . ':content/banner_image,images/no-image.png',
        'status' => CommonStatus::class,
    ];

    public function menu()
    {
        return $this->hasMany(MenuItem::class, 'page_id');
    }

}
