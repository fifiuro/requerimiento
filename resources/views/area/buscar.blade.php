@extends('template/base')

@section('content')
    
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">BUSCAR AREA</h3>
            </div>
            <form role="form" method="POST" action="{{ url('area/buscar') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="text" name="area" class="form-control" id="area" placeholder="Escriba el Area">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                {{-- Boton de Nuveo --}}
                                <a href="{{ url('area/nuevo') }}" class="btn btn-danger">
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
                                    <th style="width: 10px">#</th>
                                    <th>Area</th>
                                    <th>Estado</th>
                                    <th>Lista</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($find as $f)
                                <tr>
                                    <td>{{ $f->id_are }}</td>
                                    <td>{{ $f->tipo }}</td>
                                    <td>
                                        @if ($f->estado == 1)
                                            <i class="fas fa-check" style="color:green"></i>
                                        @else
                                            <i class="fas fa-times" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('cargo/buscar/'.$f->id_are) }}">Ver Cargos</a>
                                    </td>
                                    <td>
                                        {{-- Boton de Modificar --}}
                                        <a href="{{ url('area/editar/'.$f->id_are) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- Boton de Eliminar --}}
                                        <a href="{{ url('area/confirma/'.$f->id_are) }}" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
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