<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $guarded = ['id'];

    public function kak()
    {
        return $this->hasMany('App\Kak', 'lokasi', 'id');
    }

    public function clokasi(){
        return $this->hasMany('App\Lokasi', 'parent', 'id');
    }
}
