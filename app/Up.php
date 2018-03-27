<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Up extends Model {

	protected $primariKey = 'id';
	protected $fillable = ['clave', 'descripcion', 'año'];
    protected $table = 'up';
    public $timestamps = false;

    public function scopeBuscar($query, $clave){
    	if(trim($clave) != ''){
            return $query->where([
                ['estatus', 1],
                ['clave', 'like', "%$clave%"],
            ])->get();     
        }
    }
}