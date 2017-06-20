<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirmation_code',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('\App\Role')->withTimestamps();
    }

    public function hasRole($name)
    {
        foreach ($this->name as $role) {
            if ($role->name == $role) {
                return true;
            };
        return false;
        };
    }

    public function assignRole($role)   
    {
        return $this->roles()->attach($role);
    }
    public function removeRole($role)   
    {
        return $this->roles()->detach($role);
    }
}
