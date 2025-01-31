<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegprog extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function progbid()
    {
        return $this->belongsTo('App\Progbid', 'kode_progbid', 'kode');
    }

    public function subkeg()
    {
        return $this->hasMany('App\Subkeg', 'kode_kegprog', 'kode');
    }

    public function indikator()
    {
        return $this->hasMany('App\Indikator', 'kode_perencanaan', 'kode');
    }
}
