<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $guarded = ['id'];

    public function subkeg()
    {
        return $this->hasMany('App\Subkeg', 'satuan_id', 'id');
    }

    public function kebutuhanakt()
    {
        return $this->hasMany('App\Kebutuhanakt', 'satuan_id', 'id');
    }
}
