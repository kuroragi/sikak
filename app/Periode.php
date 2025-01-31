<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $guarded = ['id'];

    public function indikator()
    {
        return $this->hasMany('App\Indikator', 'kode_perencanaan', 'kode');
    }
}
