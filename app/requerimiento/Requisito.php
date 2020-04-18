<?php

namespace App\requerimiento;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    protected $table = 'requisitos';
    protected $primaryKey = 'id_pre';
    public $timestamps = true;
}
