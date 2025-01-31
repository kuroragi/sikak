<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataakt extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_dataakt';
    }

    public function aktivitas()
    {
        return $this->belongsTo('App\AktivitasKak', 'kode_thp', 'kode');
    }

    public function datakeg()
    {
        return $this->belongsTo('App\Datakeg', 'datakeg_slug', 'slug');
    }
}
