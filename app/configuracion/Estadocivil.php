<?php

namespace App\configuracion;

use Illuminate\Database\Eloquent\Model;

class Estadocivil extends Model
{
    protected $table = 'estado_civil';
    protected $primaryKey = 'id_est';
    public $timestamps = true;
}
