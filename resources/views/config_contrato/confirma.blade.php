@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">ELIMINAR CONFIGURACION DE IMPRESION DE CONTRATO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('config_contratos/eliminar') }}">
                @csrf
                <div class="card-body">
                    <p>¿Esta seguro de eliminar la Configuración de Contrato?</p>
                    <input type="hidden" name="id" value="{{ $id }}">
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">SI</button>
                    <a href="{{ url('config_contratos/buscar') }}" class="btn btn-danger">NO</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop