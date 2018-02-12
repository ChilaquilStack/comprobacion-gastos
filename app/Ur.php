<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ur extends Model {
	protected $primaryKey = 'id';
    protected $fillable = ['clave', 'descripcion', 'año', 'up_id'];
    protected $table = 'ur';
    public $timestamps = false;

    public function up() {
    	return $this->hasOne('App\Up', 'id', 'up_id');
    }

    public function scopeBuscar($query, $clave){
        if(trim($clave) != ''){
            return $query->where([
                ['estatus', 1],
                ['clave', 'like', "%$clave%"],
            ])->get();     
        }
    }

    public function scopeActivos($query){
        return $query->where('estatus', 1)->orderBy('id', 'asc')->paginate(5);
    }
}
