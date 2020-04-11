<?php

namespace App\configuracion;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';
    protected $primaryKey = 'id_niv';
    public $timestamps = true;
}
