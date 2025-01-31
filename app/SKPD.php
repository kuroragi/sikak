<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKPD extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }

    public function subunit()
    {
        return $this->hasMany('App\SubUnit', 'kode_skpd', 'kode');
    }

    public function bidangskpd()
    {
        return $this->hasMany('App\BidangSkpd', 'kode_skpd', 'kode');
    }

    public function biduruses(){
        return $this->belongsToMany('App\Bidurus', 'bidang_skpds', 'kode_skpd', 'kode_bidurus', 'kode', 'kode');
    }

    public function pemekaran()
    {
        return $this->hasMany('App\Pemekaranskpd', 'kode_skpd', 'kode');
    }

    public function pemekarans(){
        return $this->belongsToMany('App\SKPD', 'pemekaranskpds', 'kode_skpd', 'kode_pemekaran', 'kode', 'kode');
    }

    public function usulanssh()
    {
        return $this->hasMany('App\Usulanssh', 'kode_skpd', 'kode');
    }

    public function usulansbu()
    {
        return $this->hasMany('App\Usulansbu', 'kode_skpd', 'kode');
    }

    public function kak()
    {
        return $this->hasMany('App\Kak', 'kode_skpd', 'kode');
    }
}