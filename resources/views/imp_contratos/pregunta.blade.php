@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">ACCION A REALIZAR IMPRIMIR CONTRATO</h3>
            </div>
            <div class="card-body">
                <p>Nota: Luego de imprimir el contrato no se puede volver a modificar ningun dato.</p>
                <p>¿Que desea hacer con el Contrato?</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ url('imp_contrato/editar/'.$id) }}" class="btn btn-primary">EDITAR</a>
                <a href="{{ url('imp_contrato/pdf/'.$id) }}" class="btn btn-success">IMPRIMIR</a>
                <a href="{{ url('requerimiento/buscar') }}" class="btn btn-danger">VOLVER</a>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop