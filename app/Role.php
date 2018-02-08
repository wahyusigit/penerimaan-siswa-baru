<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	// public $incrementing = false;
    protected $primaryKey = 'id_role';

    public function users($name){
    	$id_role = Role::where('name', $name)->first()->id_role;
    	return $this->hasMany(User::class)->where('id_role',$id_role)->get();
    }

    public function user(){
    	return $this->hasMany(User::class);
    }
}
