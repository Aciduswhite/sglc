<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historial_pacientes extends Model
{
    protected $table = 'historial_pacientes';
    protected $fillable = ['id_paciente','id_usuario','id_motivo','fecha','	peso','estatura'];
    public $timestamps = false;

    public function usuario(){
    	return $this->hasMany('App\User', 'id_usuario');
    }
    public function paciente(){
    	return $this->belongsTo('App\pacientes', 'id_paciente' , 'id_paciente');
    }
    public function motivo(){
    	return $this->belongsTo('App\motivos', 'id_motivo');
    }
}
