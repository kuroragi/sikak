<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $guarded = ['id'];

    public function kelurahan(){
        return $this->hasMany('App\Kelurahan', 'kecamatan_id', 'id');
    }
}
