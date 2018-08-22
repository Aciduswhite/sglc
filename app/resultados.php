<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resultados extends Model
{
    protected $table = 'resultados';
    protected $fillable = ['observaciones',
							'fecha_registro',
							'id_usuario',
                            'file',
                            ];
    protected $primaryKey = 'id_resultado';
    public $timestamps = false;

    public function resultado(){
    	return $this->hasMany('App\valores_resultado','id_resultado', 'id_resultado');
    }
    public function usuario(){
    	return $this->belongsTo('App\User','id_usuario');
    }
    public function orden_estudio(){
        return $this->belongsTo('App\orden_estudio','id_resultado', 'id_resultado');
    }
}

