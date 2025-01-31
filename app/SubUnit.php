<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubUnit extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function skpd()
    {
        return $this->belongsTo('App\SKPD', 'kode_skpd', 'kode');
    }

    public function sksu()
    {
        return $this->hasMany('App\Sksu', 'kode_subunit', 'kode');
    }
}
