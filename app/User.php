<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;

class User extends Authenticatable
{
    protected $primaryKey = 'id_user';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($role_name){
        if (Auth::user()->role->name == $role_name) {
            return true;
        } else {
            return false;
        }
    }

    public function role(){
        return $this->belongsTo(Role::class,'id_role','id_role');
    }

    public function calonSiswa(){
        return $this->belongsTo(CalonSiswa::class,'id_user','id_user');
    }

    public function panitia(){
        return $this->hasOne(Panitia::class,'id_user','id_user');
    }
}
