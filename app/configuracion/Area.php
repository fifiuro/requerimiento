<?php

namespace App\configuracion;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'id_are';
    public $timestamps = true;
}
