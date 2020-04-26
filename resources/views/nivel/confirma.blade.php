@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">ELIMINAR NIVEL</h3>
            </div>
            @can('niveles-delete')
            <form role="form" method="POST" action="{{ url('nivel/eliminar') }}">
                @csrf
            @endcan
                <div class="card-body">
                    <p>¿Esta seguro de eliminar el Nivel?</p>
                    <input type="hidden" name="id" value="{{ $id }}">
                <div class="card-footer text-center">
                    @can('niveles-delete')
                    <button type="submit" class="btn btn-primary">SI</button>
                    @endcan
                    <a href="{{ url('nivel/buscar') }}" class="btn btn-danger">NO</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop