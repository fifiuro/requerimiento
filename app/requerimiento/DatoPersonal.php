<?php

namespace App\requerimiento;

use Illuminate\Database\Eloquent\Model;

class DatoPersonal extends Model
{
    protected $table = 'datos_personales';
    protected $primaryKey = 'id_per';
    public $timestamps = true;
}
