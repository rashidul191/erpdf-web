<?php

namespace App\Models;

use App\Enums\CommonStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuManage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'serial',
        'menu_type',
    ];

    protected $casts = [
        'menu_type' => CommonStatus::class,
    ];

    public function menus()
    {
        return $this->hasMany(FooterMenu::class);
    }

}
