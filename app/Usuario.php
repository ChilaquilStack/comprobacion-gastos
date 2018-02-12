<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable{
	public $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno','email', 'password',];
    protected $hidden = ['password'];
}