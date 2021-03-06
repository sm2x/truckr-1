<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'truckr_id', 'telephone', 'account_type', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFirstNameAttribute($first_name)
    {
        return $this->attributes['first_name'] = ucwords($first_name);
    }

    public function getLastNameAttribute($last_name)
    {
        return $this->attributes['last_name'] = ucfirst($last_name);
    }

    public function loader()
    {
        return $this->hasOne(Loader::class);
    }

    public function owner()
    {
        return $this->hasOne(Owner::class);
    }
}
