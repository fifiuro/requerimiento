<?php

namespace App\configuracion;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';
    protected $primaryKey = 'id_con';
    public $timestamps = true;
}
