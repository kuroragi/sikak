<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangSkpd extends Model
{
    protected $guarded = ['id'];

    public function skpd()
    {
        return $this->belongsTo('App\SKPD', 'kode_skpd', 'kode');
    }

    public function bidurus()
    {
        return $this->belongsTo('App\Bidurus', 'kode_bidurus', 'kode');
    }
}
