<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
    protected $table = 'pagos';
    protected $fillable = ['fecha_pago',
							'monto',
							'id_orden',
							'file',];
    protected $primaryKey = 'id_pago';
    public $timestamps = false;

	public function orden(){
    	return $this->belongsTo('App\ordenes', 'id_orden');
    }
}
