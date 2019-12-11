<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Chord extends Model
{
    protected $guarded = [];

    //url pathTitle
    public function pathTitle()
    {
        return url("/chord/{$this->id}-".Str::slug($this->name, '_'));
    }

    //url chordPics
    public function chordPics()
    {
        return asset('/storage/chords/'.$this->pics);
    }

    //belongsTo Category
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
}
