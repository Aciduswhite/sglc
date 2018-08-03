<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campos_estudio extends Model
{
    protected $table = 'campos_estudio';
    protected $fillable = ['name','valor','unidad','id_estudio',];
    protected $primaryKey = 'id_campo';
    public $timestamps = false;

    public function estudio(){
    	return $this->belongsTo('App\estudio','id_estudio');
    }
}
