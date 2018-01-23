<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ur extends Model {
    protected $fillable = ['id', 'descripcion', 'año', 'up_id'];
    protected $table = 'ur';
    public $incrementing  = false;
    protected $keyType = "string";
    public $timestamps = false;

    public function up() {
    	return $this->hasOne('App\Up', 'id', 'up_id');
    }
}
