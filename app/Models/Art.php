<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $fillable = [
        'imdb_id',
        'title',
        'slug',
        'type',
        'year',
        'releaseDate',
        'duration',
        'plot',
        'userRating',
        'imdbRating',
        'director',
        'videoLink',
    ];

    //Relations.
    //Relations one to many.
    public function casts()
    {
        return $this->hasMany(Cast::class);
    }

    public function critics()
    {
        return $this->hasMany(Critic::class);
    }

    //Relations many to many.
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //Relations polymorphic one to one.
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    } 
}
