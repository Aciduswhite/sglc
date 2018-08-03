<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historial_creacion_orden extends Model
{
    protected $table = 'historial_creacion_orden';
    protected $fillable = ['id_motivo','id_usuario','id_orden','fecha_modificacion',];
    public $timestamps = false;

    public function motivo(){
    	return $this->belongsTo('App\motivos','id_motivo');
    }
    public function orden(){
    	return $this->hasMany('App\ordenes','id_orden');
    }
    public function usuario(){
    	return $this->hasMany('App\User','id_usuario');
    }
}
