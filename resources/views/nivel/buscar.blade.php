@extends('template/base')

@section('content')
    
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">BUSCAR NIVEL</h3>
            </div>
            <form role="form" method="POST" action="{{ url('nivel/buscar') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="nivel">Nivel</label>
                                <input autofocus type="text" name="hora" class="form-control" id="hora" placeholder="Escriba la Nivel">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                {{-- Boton de Nuevo --}}
                                @can('niveles-create')
                                <a href="{{ url('nivel/nuevo') }}" class="btn btn-danger">
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
                                    <th>Area</th>
                                    <th>Nivel</th>
                                    <th>Horas</th>
                                    <th>Tiempo</th>
                                    <th>Salario</th>
                                    <th>Literal</th>
                                    <th>Estado</th>
                                    @canany(['niveles-edit','niveles-delete'])
                                    <th>Acciones</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($find as $f)
                                <tr>
                                    <td>{{ $f->id_niv }}</td>
                                    <td>{{ $f->tipo }}</td>
                                    <td>{{ $f->nivel }}</td>
                                    <td>{{ $f->horas }}</td>
                                    <td>{{ $f->tiempo }}</td>
                                    <td>{{ $f->salario }}</td>
                                    <td>{{ $f->literal }}</td>
                                    <td>
                                        @if ($f->estado == 1)
                                            <i class="fas fa-check" style="color:green"></i>
                                        @else
                                            <i class="fas fa-times" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Boton de Modificar --}}
                                        @can('niveles-edit')
                                        <a href="{{ url('nivel/editar/'.$f->id_niv) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>                                            
                                        @endcan
                                        {{-- Boton de Eliminar --}}
                                        @can('niveles-confirma')
                                        <a href="{{ url('nivel/confirma/'.$f->id_niv) }}" class="btn btn-danger">
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