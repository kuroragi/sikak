<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kebutuhanakt extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function ssh()
    {
        return $this->belongsTo('App\Ssh', 'kode_item', 'id');
    }

    public function usulanssh()
    {
        return $this->belongsTo('App\Usulanssh', 'kode_item', 'id');
    }

    public function sbu()
    {
        return $this->belongsTo('App\Sbu', 'kode_item', 'id');
    }

    public function usulansbu()
    {
        return $this->belongsTo('App\Usulansbu', 'kode_item', 'id');
    }

    public function satuan()
    {
        return $this->belongsTo('App\Satuan', 'satuan_id', 'id');
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

    public function rekapSsh(){
        //
    }
}
