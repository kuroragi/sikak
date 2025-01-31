<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivitasKak extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function tahap()
    {
        return $this->belongsTo('App\TahapKak', 'kode_thp', 'kode');
    }

    public function personalakt()
    {
        return $this->hasMany('App\Personalakt', 'kode_akt', 'kode');
    }

    public function instruakt()
    {
        return $this->hasMany('App\Instruakt', 'kode_akt', 'kode');
    }

    public function dataakt()
    {
        return $this->hasMany('App\Dataakt', 'kode_akt', 'kode');
    }

    public function kebutuhanakt()
    {
        return $this->hasMany('App\Kebutuhanakt', 'kode_akt', 'kode');
    }
}
