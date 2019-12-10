<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $guarded = [];

    //url pathTitle
    public function pathTitle()
    {
        return url("/category/{$this->id}-".Str::slug($this->name, '_'));
    }

    //url categoryPics
    public function categoryPics()
    {
        return asset('/storage/categories/'.$this->pics);
    }

    //hasMany Bands Artist
    public function bands()
    {
        return $this->hasMany(\App\Models\Band::class);
    }
}
