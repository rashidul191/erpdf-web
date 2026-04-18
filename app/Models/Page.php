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
        'title',
        'slug',
        'image',
        'status',
        'short_description',
        'description',
        'others',
    ];

    protected $casts = [
        'image' => ImageField::class . ':content,images/no-image.png',
        'status' => CommonStatus::class,
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'page_id');
    }

}
