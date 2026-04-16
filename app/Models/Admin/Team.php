<?php

namespace App\Models\Admin;

use App\Casts\ImageField;
use App\Enums\CommonStatus;
use App\Enums\TeamCategoryType;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'serial',
        'category_type',
        'image',
        'name',
        'designation',
        'description',
        'status',
        'fb_link',
        'linkedin_link',
        'twitter_link',
        'instagram_link'
    ];

    protected $casts = [
        'image' => ImageField::class . ':team,images/avatar.png',
        'category_type' => TeamCategoryType::class,
        'status' => CommonStatus::class,

    ];
}
