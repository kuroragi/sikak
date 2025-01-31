<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sksu extends Model
{
    protected $guarded = ['id'];

    public function subunit()
    {
        return $this->belongsTo('App\SubUnit', 'kode_subunit', 'kode');
    }

    public function subkeg()
    {
        return $this->belongsTo('App\Subkeg', 'kode_subkeg', 'kode');
    }

    public function scopeFilter($query, array $filters){
        $query->when(
            $filters['periode'] ?? false,
            fn($query, $periode) => $query->where('periode', $periode)
        );
    }
}
