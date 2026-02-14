<?php

namespace App\Casts;

use App\Casts\ImageField;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MultipleImageField implements CastsAttributes
{
    protected $path;
    protected $imageField;

    public function __construct(string $path = null)
    {
        $this->path = $path;
        $this->imageField = new ImageField($this->path);
    }

    public function get($model, string $key, $value, array $attributes)
    {
        $images = json_decode($value, true) ?: [];

        return array_map(function ($img) use ($model, $key, $attributes) {

            // ⚡️ Check if $img already full path or URL
            if (str_starts_with($img, '/storage/')) {
                return $img; // old image string 그대로 return
            }

            return $this->imageField->get($model, $key, $img, $attributes);
        }, $images);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        $stored = [];

        foreach ($value as $img) {
            // ⚡️ Only UploadedFile handle
            if (is_string($img)) {
                $stored[] = $img; // old string 그대로 store
            } else {
                $stored[] = $this->imageField->set($model, $key, $img, $attributes);
            }
        }

        return json_encode($stored);
    }
}
