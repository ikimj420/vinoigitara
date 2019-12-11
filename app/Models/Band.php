<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Band extends Model
{
    protected $guarded = [];

    //url pathTitle
    public function pathTitle()
    {
        return url("/band-artist/{$this->id}-".Str::slug($this->name, '_'));
    }

    //url bandPics
    public function bandPics()
    {
        return asset('/storage/bands/'.$this->pics);
    }

    //belongsTo Category
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    //hasMany Songs
    public function songs()
    {
        return $this->hasMany(\App\Models\Song::class);
    }
}
