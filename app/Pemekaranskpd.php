<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemekaranskpd extends Model
{
    protected $guarded = ['id'];

    public function skpd()
    {
        return $this->belongsTo('App\SKPD', 'kode_pemekaran', 'kode');
    }
}
