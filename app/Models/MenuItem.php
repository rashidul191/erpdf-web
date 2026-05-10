<?php

namespace App\Models;

use App\Enums\CommonStatus;
use App\Enums\IsAgreeStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'menu_id',
        'sub_menu_id',
        'menu_manage_id',
        'name',
        'slug',
        'serial',
        'is_custom',
        'status',
    ];

    protected $casts = [
        'status' => CommonStatus::class,
        'is_custom' => IsAgreeStatus::class,
    ];

    // 🔗 Page
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    // ======================
    // 🔹 LEVEL 1 → LEVEL 2
    // ======================

    public function subMenus()
    {
        return $this->hasMany(MenuItem::class, 'menu_id', 'id');
    }

    public function menu()
    {
        return $this->belongsTo(MenuItem::class, 'menu_id', 'id');
    }

    // ======================
    // 🔹 LEVEL 2 → LEVEL 3
    // ======================

    public function subOfSubMenus()
    {
        return $this->hasMany(MenuItem::class, 'sub_menu_id', 'id');
    }

    public function subMenu()
    {
        return $this->belongsTo(MenuItem::class, 'sub_menu_id', 'id');
    }

    // Menu Manage menu
    public function menuManage()
    {
        return $this->belongsTo(MenuManage::class, 'menu_manage_id', 'id');
    }
}
