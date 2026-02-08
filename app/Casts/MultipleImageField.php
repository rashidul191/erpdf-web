<?php

namespace App\Casts;

use App\Casts\ImageField;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MultipleImageField implements CastsAttributes
{
    protected $path;
    protected $imageField;      public function __construct(string $path = null)
    {
        $this->path = $path;
        // Reuse ImageField with 'products/gallery' path
        $this->imageField = new ImageField($this->path);
    }
    // public function __construct()
    // {
    //     // Reuse ImageField with 'products/gallery' path
    //     $this->imageField = new ImageField('products/gallery');
    // }

    public function get($model, string $key, $value, array $attributes)
    {
        $images = json_decode($value, true) ?: [];

        return array_map(function ($img) use ($model, $key, $attributes) {
            return $this->imageField->get($model, $key, $img, $attributes);
        }, $images);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        // Expecting $value to be an array of UploadedFile or string filenames
        $stored = [];

        foreach ($value as $img) {
            $stored[] = $this->imageField->set($model, $key, $img, $attributes);
        }

        return json_encode($stored);
    }
}
