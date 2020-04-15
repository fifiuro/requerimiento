<?php

namespace App\requerimiento;

use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    protected $table = 'requerimientos';
    protected $primaryKey = 'id_req';
    public $timestamps = true;
}
