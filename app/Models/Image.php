<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_content',
        'extension',
        'imageable_id',
        'imageable_type',
    ];

    //Relations.
    //Polymorphic relation.
    public function imageable()
    {
        return $this->morphTo();
    }
}
