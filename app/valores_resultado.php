<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class valores_resultado extends Model
{
    protected $table = 'valores_resultado';
    protected $fillable = ['name',
							'valor_referencia',
							'valor_registrado',
							'id_resultado',
							'unidad_referencia',];
    protected $primaryKey = 'id_resultadovalor';
    public $timestamps = false;
    public function resultado(){
    	return $this->belongsTo('App\resultados','id_resultado');
    }
}
