<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datakeg extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function dataakt()
    {
        return $this->hasMany('App\Dataakt', 'datakeg_slug', 'slug');
    }
}
