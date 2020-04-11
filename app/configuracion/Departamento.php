<?php

namespace App\configuracion;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'id_dep';
    public $timestamps = true;
}
