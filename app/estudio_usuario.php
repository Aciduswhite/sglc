<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estudio_usuario extends Model
{
	protected $table = 'estudio_usuario';
    protected $fillable = ['id_estudio','id_usuario','fecha','id_motivo',];
    public $timestamps = false;

    public function estudio(){
    	return $this->hasMany('App\estudios','id_estudio');
    }
    public function usuario(){
    	return $this->belongsTo('App\User','id_usuario');
    }
    
    public function motivo(){
    	return $this->belongsTo('App\motivos','id_motivo');
    }
}
