<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Traits\DeletesImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory, DeletesImage;

    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'message',
        'image',
    ];

    protected $casts =[
        'image' => ImageField::class . ':blog_comments',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
