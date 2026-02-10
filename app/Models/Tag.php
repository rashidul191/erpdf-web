<?php

namespace App\Models;

use App\Enums\CommonStatus;
use App\Enums\IsAgreeStatus;
use App\Enums\IsHomeStatus;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'is_home',
        'position',
    ];

    protected $casts = [
        'is_home' => IsHomeStatus::class,
    ];

    public function getProductsAttribute()
    {
        return Product::query()
            ->whereJsonContains('tag_ids', $this->id)
            ->where(function ($q) {
                $q->where('is_publish', CommonStatus::Active);
            })
            ->latest('quantity')
            ->take(10)
            ->get();
    }
}
