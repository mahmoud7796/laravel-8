<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImages extends Model
{
    protected $fillable = [
        'id',
        'images'
    ];

    public function getImagesAttribute($val)
    {
        return ($val !== null) ? asset($val) : "";

    }
}
