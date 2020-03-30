<?php

namespace App\configuracion;

use Illuminate\Database\Eloquent\Model;

class Afp extends Model
{
    protected $table = 'afp';
    protected $primaryKey = 'id_afp';
    public $timestamps = true;
}
