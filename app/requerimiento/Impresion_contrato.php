<?php

namespace App\requerimiento;

use Illuminate\Database\Eloquent\Model;

class Impresion_contrato extends Model
{
    protected $table = 'impresion_contratos';
    protected $primaryKey = 'id_imp';
    public $timestamps = true;

    public static function modifica($id){
        $imp = Impresion_contrato::find($id);

        if($imp->modifica){
            return true;
        }else{
            return false;
        }
    }
}
