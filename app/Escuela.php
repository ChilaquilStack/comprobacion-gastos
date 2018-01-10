<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model{
    
    private $primariKey = 'id';
	protected $fillable = ['nombre', 'regiones_id'];
    protected $table = 'escuelas';
    public $timestamps = false;

    public function region(){
    	return $this->belongsTo('App\Region', 'regiones_id');
    }
}
