<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model {
	private $primariKey = 'id';
	protected $fillable = ['nombre'];
    protected $table = 'municipios';
    public $timestamps = false;

    public function regiones(){
    	return $this->hasMany('App\Region');
    }
}