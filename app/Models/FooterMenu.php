<?php

namespace App\Models;

use App\Enums\CommonStatus;
use App\Enums\IsAgreeStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_manage_id',
        'page_id',
        'serial',
    ];


    public function menuManage()
    {
        return $this->belongsTo(MenuManage::class, 'menu_manage_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
