<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordenes extends Model
{
    protected $table = 'ordenes';
    protected $fillable = ['fecha_creacion',
                            'status_orden',
                            'id_paciente',
                            'id_convenio',
							'id_descuento',
                            'estatus_pago',];
    protected $primaryKey = 'id_orden';
    public $timestamps = false;

    public function pacientes(){
    	return $this->belongsTo('App\pacientes', 'id_paciente');
    }
    public function orden_estudio(){
        return $this->hasMany('App\orden_estudio','id_orden', 'id_orden');
    }    
    public function descuento(){
        return $this->belongsTo('App\descuentos','id_descuento');
    }
}
