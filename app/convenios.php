<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class convenios extends Model
{
    protected $table = 'convenio';
    protected $fillable = ['name','fecha_creacion','status_convenio','aplica_descuento',
							'descuento','observaciones','name_empresa','porcentaje',];
    protected $primaryKey = 'id_convenio';
    public $timestamps = false;
}
