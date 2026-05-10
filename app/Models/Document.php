<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Enums\CommonStatus;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'document_category_id',
        'name',
        'slug',
        'file',
        'serial',
        'status',
    ];

    protected $casts = [
        'file' => ImageField::class . ':document',
        'status' => CommonStatus::class
    ];

    public function category()
    {
        return $this->belongsTo(DocumentCategory::class, 'document_category_id', 'id');
    }
}
