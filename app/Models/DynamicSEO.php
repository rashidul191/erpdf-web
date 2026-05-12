<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicSEO extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_link',
        'meta_script',
    ];
}
