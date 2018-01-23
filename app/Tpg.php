<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tpg extends Model {
    private $primariKey = 'id';
	protected $table = 'tpg';
	protected $fillable = ['descripcion'];
    public $timestamps = false;
}
