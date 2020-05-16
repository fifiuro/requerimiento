@extends('template/base')

@section('content')
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">BUSCAR CONFIGURACION DE IMPRESION DE CONTRATO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('config_contratos/buscar') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="gestion">Gestión</label>
                                <input autofocus type="number" name="gestion" class="form-control" id="gestion" placeholder="Escriba la Gestión">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                {{-- Boton de Nuevo --}}
                                @can('estadocivil-create')
                                    <a href="{{ url('config_contratos/nuevo') }}" class="btn btn-danger">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                @endcan
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
                                    <th style="width: 10px">#</th>
                                    <th>Inicial</th>
                                    <th>Correlativo</th>
                                    <th>Gestión</th>
                                    <th>Estado</th>
                                    @canany(['estadocivil-edit','estadocivil-delete'])
                                    <th>Acciones</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($find as $f)
                                <tr>
                                    <td>{{ $f->id_conf }}</td>
                                    <td>{{ $f->inicial }}</td>
                                    <td>{{ $f->correlativo }}</td>
                                    <td>{{ $f->gestion }}</td>
                                    <td>
                                        @if ($f->estado == 1)
                                            <i class="fas fa-check" style="color:green"></i>
                                        @else
                                            <i class="fas fa-times" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Boton de Modificar --}}
                                        @can('estadocivil-edit')
                                        <a href="{{ url('config_contratos/editar/'.$f->id_conf) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        {{-- Boton de Eliminar --}}
                                        @can('estadocivil-delete')
                                        <a href="{{ url('config_contratos/confirma/'.$f->id_conf) }}" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        @endcan
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