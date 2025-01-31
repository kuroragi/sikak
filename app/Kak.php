<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kak extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function skpd()
    {
        return $this->belongsTo('App\SKPD', 'kode_skpd', 'kode');
    }

    public function subkeg()
    {
        return $this->belongsTo('App\Subkeg', 'kode_subkeg', 'kode');
    }

    public function kelompokbelanja()
    {
        return $this->belongsTo('App\Kelompokbelanja', 'kelompokbelanja_id', 'id');
    }

    public function pencetus()
    {
        return $this->belongsTo('App\Pencetuskebe', 'pencetuskebe_id', 'id');
    }

    public function tahap()
    {
        return $this->hasMany('App\TahapKak', 'kode_kak', 'kode');
    }

    public function kebutuhanakt()
    {
        return $this->hasMany('App\Kebutuhanakt', 'kode_kak', 'kode');
    }

    public function subunit()
    {
        return $this->belongsTo('App\SubUnit', 'kode_sub', 'kode');
    }

    public function bidangsek()
    {
        return $this->belongsTo('App\SubUnit', 'bidang_sekretariat', 'kode');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'username', 'username');
    }

    public function lokasikak()
    {
        return $this->belongsTo('App\Lokasi', 'lokasi', 'id');
    }
}
