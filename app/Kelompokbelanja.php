<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompokbelanja extends Model
{
    protected $guarded = ['id'];

    protected $table = 'kelompokbelanjas';

    protected $fillable = [
        'ket',
        'ururan',
        'status',
        'start_periode',
        'end_periode',
        'is_kak',
        'is_satuan_needed',
    ];

    public function kak()
    {
        return $this->hasMany('App\Kak', 'kelompokbelanja_id', 'id');
    }
}
