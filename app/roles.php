<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name',];
    protected $primaryKey = 'id_rol';
    public $timestamps = false;

    public function usuarios(){
    	return $this->belongsTo('App\user', 'id_usuario');
    }
}
