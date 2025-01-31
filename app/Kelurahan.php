<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $guarded = ['id'];

    public function kecamatan(){
        return $this->belongsTo('App\Kecamatan', 'kecamatan_id', 'id');
    }
}
