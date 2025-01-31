<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usulanssh extends Model
{
    protected $guarded = ['id'];

    public function satuan()
    {
        return $this->belongsTo('App\Satuan', 'satuan_id', 'id');
    }
}
