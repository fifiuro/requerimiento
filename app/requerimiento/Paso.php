<?php

namespace App\requerimiento;

use Illuminate\Database\Eloquent\Model;

class Paso extends Model
{
    protected $table = 'pasos';
    protected $primaryKey = 'id_pas';
    public $timestamps = true;
}
