<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ChordsSong extends Model
{
    protected $guarded = [];

    public function chord()
    {
        return $this->belongsTo(\App\Models\Chord::class, 'chord_id');
    }

    public function song()
    {
        return $this->belongsTo(\App\Models\Song::class, 'song_id');
    }
    //url pathTitle
    public function pathTitle()
    {
        return url("/chordsSong/{$this->song_id}-".Str::slug($this->chord['name'], '_'));
    }

}
