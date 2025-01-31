<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrumen extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function instruakt()
    {
        return $this->hasMany('App\Instruak', 'instruakt_slug', 'slug');
    }
}
