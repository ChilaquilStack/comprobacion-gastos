<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Up extends Model {

	protected $primariKey = 'id';
	protected $fillable = ['id', 'descripcion', 'año'];
    protected $table = 'up';
    public $timestamps = false;
    public $incrementing = false;

}