<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progbid extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function bidurus()
    {
        return $this->belongsTo('App\Bidurus', 'kode_bidurus', 'kode');
    }

    public function kegprog()
    {
        return $this->hasMany('App\Kegprog', 'kode_progbid', 'kode');
    }

    public function indikator()
    {
        return $this->hasMany('App\Indikator', 'kode_perencanaan', 'kode');
    }
}
