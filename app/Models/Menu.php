<?php

namespace App\Models;

use App\Enums\CommonStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id',
        'menu_id',
        'sub_menu_id',
        'serial',
        'status',
    ];

    protected $casts = [
        'status' => CommonStatus::class,
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
        // return $this->belongsTo(Page::class, 'id');
    }

    public function subMenus()
    {
        return $this->hasMany(Menu::class, 'menu_id', 'id');
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function subOfSubMenus()
    {
        return $this->hasMany(Menu::class, 'sub_menu_id', 'id');
    }
    public function subMenu()
    {
        return $this->belongsTo(Menu::class, 'sub_menu_id');
    }

}
