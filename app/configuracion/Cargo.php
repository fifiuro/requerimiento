<?php

namespace App\configuracion;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $primaryKey = 'id_car';
    public $timestamps = true;
}
