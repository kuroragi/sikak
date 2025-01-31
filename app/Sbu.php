<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sbu extends Model
{
    protected $guarded = ['id'];

    public function satuan()
    {
        return $this->belongsTo('App\Satuan', 'satuan_slug', 'id');
    }

    public function kebutuhanakt()
    {
        return $this->hasMany('App\Kebutuhanakt', 'kode_item', 'id');
    }

    public function scopefilter($query, array $filter){
        $query->when($filter['barang'] ?? false, fn($query, $barang) =>
            $query->where('ket', 'like', '%'. $barang .'%')->orderBy('updated_at', 'DESC')
        );
    }
}
