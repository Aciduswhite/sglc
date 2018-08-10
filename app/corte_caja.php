<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class corte_caja extends Model
{
	protected $table = 'corte_caja';
	protected $fillable = [
		'monto',
		'fecha_corte',
		'id_usuario',
		'hora_inicio',
		'hora_fin',
	];
	protected $primaryKey = 'id_corte';
	public $timestamps = false;
	public function usuarios(){
		return $this->belongsTo('App\user', 'id_usuario');
	}
}