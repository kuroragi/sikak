<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopefilter($query, array $filter){
        $query->when($filter['skpd'] ?? false, fn($query, $skpd) =>
            $query->whereHas('skpd', fn($query) =>
                $query->where('kode', $skpd)
             )
        );
    }

    public function skpd()
    {
        return $this->belongsTo('App\SKPD', 'kode_skpd', 'kode');
    }

    public function subunit()
    {
        return $this->belongsTo('App\SubUnit', 'kode_sub', 'kode');
    }

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_slug', 'slug');
    }
}
