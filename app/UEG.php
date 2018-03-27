<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UEG extends Model {
    
    private $primariKey = 'id';
	protected $fillable = ['clave', 'descripcion', 'año','ur_id'];
    protected $table = 'ueg';
    public $timestamps = false;

    public function ur() {
    	//Relacion uno a uno de Unidad Ejecutora de Gasto to Unidad Responsable
    	return $this->hasOne('App\Ur', 'id', 'ur_id' );
    }

    public function scopeActivos($query){
    	return $query->where('estatus', 1)->orderBy('clave','des')->paginate(5);
    }
    
}
