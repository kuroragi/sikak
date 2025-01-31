<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahapKak extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function kak()
    {
        return $this->belongsTo('App\Kak', 'kode_kak', 'kode');
    }

    public function aktivitas()
    {
        return $this->hasMany('App\AktivitasKak', 'kode_thp', 'kode');
    }

}
