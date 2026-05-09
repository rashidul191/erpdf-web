<?php

namespace App\Models\Admin;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    protected $casts = [
        'image' => ImageField::class . ':team-categories,images/no-image.png',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
