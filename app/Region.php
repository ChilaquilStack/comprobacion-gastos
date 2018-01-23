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
}
