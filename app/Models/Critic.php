<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critic extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'art_id',
        'comment',
    ];
    //Relations.
    //Relations many to one.
    public function art()
    {
        return $this->belongsTo(Art::class);
    }
}
