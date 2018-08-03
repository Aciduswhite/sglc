<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    protected $table = 'pacientes';
    protected $fillable = [
	    'nombre',
		'app_paterno',
		'app_materno',
		'curp',
		'tel_casa',
		'tel_celular',
		'dir_calle',
		'dir_colonia',
		'dir_numero',
		'fecha_nacimiento',
		'fecha_registro',
		'password',
		'rfc',
	];
	protected $hidden = [
        'password',
    ];
    protected $primaryKey = 'id_paciente';
    public $timestamps = false;

    public function historial(){
    	return $this->hasMany('App\historial_pacientes', 'id_paciente');
    }
    public function ordenes(){
    	return $this->hasMany('App\ordenes', 'id_orden');
    }
}
