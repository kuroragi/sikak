<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruakt extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_instruakt';
    }

    public function aktivitas()
    {
        return $this->belongsTo('App\AktivitasKak', 'kode_thp', 'kode');
    }

    public function instrumen()
    {
        return $this->belongsTo('App\Instrumen', 'instruakt_slug', 'slug');
    }
}
