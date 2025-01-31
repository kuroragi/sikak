<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompokbelanja extends Model
{
    protected $guarded = ['id'];

    public function kak()
    {
        return $this->hasMany('App\Kak', 'kelompokbelanja_id', 'id');
    }
}
