<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    protected $casts = [
        'image' => ImageField::class . ':document-categories,images/no-image.png',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
