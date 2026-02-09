<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSay extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'image',
        'name',
        'address',
        'description',
    ];

    protected $casts = [
        'image' => ImageField::class . ':client',
    ];
}
