<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'usuarios';
    protected $fillable = [
        'nombre',
		'app_paterno',
		'app_materno',
		'curp',
		'user',
		'rfc',
		'clave_seguro',
		'tel_casa',
		'tel_celular_personal',
		'tel_celular_empresa',
		'tel_emergencia',
		'dir_calle',
		'dir_colonia',
		'dir_numero',
		'fecha_nacimiento',
		'fecha_ingreso',
		'estado_civil',
		'status_user',
		'titulo',
		'id_rol',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    public function roles(){
        return $this->belongsTo('App\roles', 'id_rol');
    }
}
