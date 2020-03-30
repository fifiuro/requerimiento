<?php

namespace App\configuracion;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $primaryKey = 'id_doc';
    public $timestamps = true;
}
