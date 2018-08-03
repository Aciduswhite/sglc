<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class motivos extends Model
{
    protected $table = 'motivos';
    protected $fillable = ['name',];
    protected $primaryKey = 'id_motivo';
    public $timestamps = false;
}
