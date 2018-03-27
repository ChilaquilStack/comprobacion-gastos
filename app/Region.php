<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {
	
	private $primariKey = 'id';
	protected $fillable = ['nombre'];
    protected $table = 'regiones';
    public $timestamps = false;

    public function municipios() {
    	return $this->hasManyTo('App\Municipio', 'regiones_id', 'id');
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
        return $query->where('estatus', 1)->orderBy('folio', 'asc')->paginate(5);
    }
}
