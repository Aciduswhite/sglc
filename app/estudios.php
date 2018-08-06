<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estudios extends Model
{
	protected $table = 'estudios';
    protected $fillable = ['nombre_estudio','status_estudio','duracion_estudio','indicaciones','costo_estudio'];
    protected $primaryKey = 'id_estudio';
    public $timestamps = false;

    public function campos(){
    	return $this->hasMany('App\campos_estudio','id_estudio');
    }
    
}
