<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorActress extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    //Relations.
    //Relations many to many.
    public function arts()
    {
        return $this->belongsToMany(Art::class);
    }
}
