<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {
	
	private $primariKey = 'id';
	protected $fillable = ['nombre','municipios_id'];
    protected $table = 'regiones';
    public $timestamps = false;

    public function municipio(){
    	return $this->belongsTo('App\Municipio', 'municipios_id');
    }
}
