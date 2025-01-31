<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ssh extends Model
{
    protected $guarded = ['id'];

    public function satuan()
    {
        return $this->belongsTo('App\Satuan', 'satuan_id', 'id');
    }

    public function kebutuhanakt()
    {
        return $this->hasMany('App\Kebutuhanakt', 'satuan_id', 'id');
    }

    public function scopefilter($query, array $filter){
        $query->when($filter['barang'] ?? false, fn($query, $barang) =>
            $query->where('ket', 'like', '%'. $barang .'%')->orderBy('updated_at', 'DESC')
        );
    }
}
