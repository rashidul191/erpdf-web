<?php

namespace App\Models;

use App\Enums\CommonStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'serial',
        'status'
    ];

    protected $casts = [
        'status' => CommonStatus::class,
    ];
}
