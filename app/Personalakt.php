<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personalakt extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_pers';
    }

    public function aktivitas()
    {
        return $this->belongsTo('App\AktivitasKak', 'kode_thp', 'kode');
    }

    public function personil()
    {
        return $this->belongsTo('App\Personil', 'personil_slug', 'slug');
    }
}
