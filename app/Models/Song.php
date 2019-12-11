<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Song extends Model
{
    protected $guarded = [];

    //url pathTitle
    public function pathTitle()
    {
        return url("/song/{$this->id}-".Str::slug($this->title, '_'));
    }

    //belongsTo Bend
    public function band()
    {
        return $this->belongsTo(\App\Models\Band::class, 'band_id');
    }
}
