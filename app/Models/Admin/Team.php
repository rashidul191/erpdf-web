<?php

namespace App\Models\Admin;

use App\Casts\ImageField;
use App\Enums\CommonStatus;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        // 'team_category_id',
        'serial',
        'image',
        'name',
        'slug',
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
        'status' => CommonStatus::class,

    ];

    public function categories()
    {
        return $this->belongsToMany(
            TeamCategory::class,
            'team_join_team_categories',
            'team_id',
            'team_category_id'
        )->withTimestamps();
    }

}
