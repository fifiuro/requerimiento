<?php

namespace App\requerimiento;

use Illuminate\Database\Eloquent\Model;

class Impresion_contrato extends Model
{
    protected $table = 'impresion_contratos';
    protected $primaryKey = 'id_imp';
    public $timestamps = true;
}
