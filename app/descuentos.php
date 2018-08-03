<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class descuentos extends Model
{
	protected $table = 'descuentos';
    protected $fillable = ['name','fecha_creacion','status_descuento','descuento',
							'observaciones','porcentaje',];
    protected $primaryKey = 'id_descuento';
    public $timestamps = false;
}
