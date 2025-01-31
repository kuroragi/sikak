<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urusan extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function bidurus()
    {
        return $this->hasMany('App\Bidurus', 'kode_urusan', 'kode');
    }
}
