<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subkeg extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function kegprog()
    {
        return $this->belongsTo('App\Kegprog', 'kode_kegprog', 'kode');
    }

    public function satuan()
    {
        return $this->belongsTo('App\Satuan', 'satuan_id', 'id');
    }

    public function kak()
    {
        return $this->hasMany('App\Kak', 'kode_subkeg', 'kode');
    }

    public function indikator()
    {
        return $this->hasMany('App\Indikator', 'kode_perencanaan', 'kode');
    }
}
