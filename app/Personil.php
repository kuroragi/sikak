<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personil extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function personalakt()
    {
        return $this->hasMany('App\Personalakt', 'personil_slug', 'slug');
    }
}
