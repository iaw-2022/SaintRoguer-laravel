<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;
    protected $fillable = [
        'art_id',
        'actor/actress',
        'character',
    ];

    //Relations.
    //Relations many to one.
    public function art()
    {
        return $this->belongsTo(Art::class);
    }
}
