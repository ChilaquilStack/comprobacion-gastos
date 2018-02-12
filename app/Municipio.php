<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model {
	private $primariKey = 'id';
	protected $fillable = ['nombre', 'regiones_id'];
    protected $table = 'municipios';
    public $timestamps = false;

    public function region(){
    	return $this->belongsTo('App\Region', 'regiones_id');
    }

    public function escuelas () {
    	return $this->hasManyTo('App\Escuela');
    }

    public function scopeBuscar($query, $nombre){
        if(trim($nombre) != ''){
            return $query->where([
                ['estatus', 1],
                ['nombre', 'like', "%$nombre%"],
            ])->get();     
        }
    }

    public function scopeActivos($query){
        return $query->where('estatus', 1)->orderBy('id', 'asc')->paginate(5);
    }

}