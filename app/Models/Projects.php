<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Projects extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'teknologi',
        'image',
        'status',
    ];

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('bootstrap-5.3.8-dist/images/default.png');
        }
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        if (str_contains($this->image, '/')) {
            return Storage::url($this->image);
        }
        return asset('bootstrap-5.3.8-dist/images/' . $this->image);
    }
}