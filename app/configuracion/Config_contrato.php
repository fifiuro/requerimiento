<?php

namespace App\configuracion;

use Illuminate\Database\Eloquent\Model;

class Config_contrato extends Model
{
    protected $table = 'config_contratos';
    protected $primaryKey = 'id_conf';
    public $timestamps = true;
}
