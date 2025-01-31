<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidurus extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function urusan()
    {
        return $this->belongsTo('App\Urusan', 'kode_urusan', 'kode');
    }

    public function progbid()
    {
        return $this->hasMany('App\Progbid', 'kode_bidurus', 'kode');
    }

    public function bidangskpd()
    {
        return $this->hasMany('App\BidangSkpd', 'kode_bidurus', 'kode');
    }

    public function skpds(){
        return $this->belongsTOMany('App\SKPD', 'Bidang_skpds', 'kode_bidurus', 'kode_skpd', 'kode', 'kode');
    }
}
