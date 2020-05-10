@extends('template/base')

@section('content')
    
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">BUSCAR REQUERIMIENTO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('requerimiento/buscar') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="estado">Estado Requerimiento</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="1">EN ESPERA</option>
                                    <option value="2">RECHAZADO</option>
                                    <option value="3">ACEPTADO</option>
                                    <option value="4">CONFIRMADO</option>
                                    <option value="5">HABILITADO</option>
                                    <option value="6">CONTRATO ANULADO</option>
                                    <option value="7">NUEVO REQUERIMIENTO</option>
                                    <option value="0">TODOS LOS ESTADOS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ci">C.I.</label>
                                <input type="number" name="ci" id="ci" class="form-control" placeholder="Ingrese el CI">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="centro">Centro de Salud</label>
                                <select name="centro" id="centro" class="form-control">
                                    @foreach ($centro as $c)
                                        <option value="{{ $c->id_cen }}">{{ $c->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group text-center">
                                {{-- Boton de Buscar --}}
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                {{-- Boton de Nuevo --}}
                                <a href="{{ url('requerimiento/nuevo') }}" class="btn btn-danger">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @isset($estado)
        @if ($estado == 1)
            <div class="row">
                <div class="card card-info col-md-12">
                    <div class="card-header">
                        <h3 class="card-title">Resultado de la busqueda</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nota Requerimiento</th>
                                    <th>Centro de Salud</th>
                                    <th>Nombre Completo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($find as $f)
                                <tr>
                                    <td>{{ $f->nota_requerimiento }}</td>
                                    <td>{{ $f->centro }}</td>
                                    <td>{{ $f->nombre }} {{ $f->paterno }} {{ $f->materno }}</td>
                                    <td>
                                        @switch($f->estado)
                                            @case(1)
                                                EN ESPERA
                                                @break
                                            @case(2)
                                                RECHAZADO
                                                @break
                                            @case(3)
                                                ACEPTADO
                                                @break
                                            @case(4)
                                                CONFIRMADO
                                                @break
                                            @case(5)
                                                HABILITADO
                                                @break
                                            @case(6)
                                                CONTRATO ANULADO
                                                @break
                                            @case(7)
                                                NUEVO REQUERIMIENTO
                                                @break
                                            @default
                                                NO TIENE ASIGNADO
                                        @endswitch
                                    </td>
                                    <td>
                                        {{-- Boton de Modificar --}}
                                        <a href="{{ url('requerimiento/editar/'.$f->id_req) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- Boton de Eliminar --}}
                                        <a href="{{ url('requerimiento/confirma/'.$f->id_req) }}" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        {{-- Boton para agregar Paso --}}
                                        <a href="{{ url('pasos/nuevo/'.$f->id_req) }}" class="btn btn-success">
                                            <i class="fas fa-retweet"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @elseif($estado == 0)
            <div class="row">
                <div class="card card-info col-md-12">
                    <div class="card-header">
                        <h3 class="card-title">Resultado de la busqueda</h3>
                    </div>
                    <div class="card-body p-0">
                        <h3>{{ $mensaje }}</h3>
                    </div>
                </div>
            </div>
        @endif
    @endisset
@stop

@section('extra')
    
@stop