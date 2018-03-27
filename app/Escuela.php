<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model{
    
    private $primariKey = 'id';
	protected $fillable = ['nombre', 'municipios_id', 'ueg_id'];
    protected $table = 'uog';
    public $timestamps = false;

    public function municipio(){
    	return $this->belongsTo('App\Municipio', 'municipios_id');
    }

    public function ueg() {
    	return $this->belongsTo('App\ueg', 'ueg_id');
    }
}
