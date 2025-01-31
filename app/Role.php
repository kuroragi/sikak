<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->hasMany('App\User', 'role_slug', 'slug');
    }
}
