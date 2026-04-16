<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Enums\CommonStatus;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentManage extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'menu_id',
        'title',
        'slug',
        'image',
        'status',
        'short_description',
        'description',
    ];

    protected $casts = [
        'image' => ImageField::class . ':content,images/no-image.png',
        'status' => CommonStatus::class,
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

}
