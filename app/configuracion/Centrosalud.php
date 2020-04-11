<?php

namespace App\configuracion;

use Illuminate\Database\Eloquent\Model;

class Centrosalud extends Model
{
    protected $table = 'centro_salud';
    protected $primaryKey = 'id_cen';
    public $timestamps = true;
}
