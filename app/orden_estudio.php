<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orden_estudio extends Model
{
    protected $table = 'orden_estudio';
    protected $fillable = ['id_orden',
                            'id_estudio',
                            'status_estudio',
                            'id_resultado',
                        ];
public $timestamps = false;
/*
public function ordenes(){
   return $this->belongsTo('App\ordenes', 'id_orden');
}*/
public function estudio(){
   return $this->belongsTo('App\estudios', 'id_estudio');
}
public function resultado(){
   return $this->belongsTo('App\resultados','id_resultado');
}
}
