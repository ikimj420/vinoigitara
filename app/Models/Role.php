<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    protected $guarded = [];

    //hasOne User
    public function role()
    {
        return $this->hasOne(\App\User::class);
    }

    //url pathTitle
    public function pathTitle()
    {
        return url("/role/{$this->id}-".Str::slug($this->userLevel, '_'));
    }
}
