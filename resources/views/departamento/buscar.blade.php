@extends('template/base')

@section('content')    
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">BUSCAR DEPARTAMENTO</h3>
            </div>
            {{ Form::open(array('url' => 'departamento/buscar')) }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                {{ Form::label('departamento','Departamento')}}
                                {{ Form::text('departemento', '', ['class' => 'form-control', 'placeholder' => 'Departamento', 'autofocus' => 'true']) }}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                {{-- Boton de Nuevo --}}
                                @can('departamento-create')
                                    <a href="{{ url('departamento/nuevo') }}" class="btn btn-danger">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
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
                                    <th>Departamento</th>
                                    <th>Sigla</th>
                                    <th>Estado</th>
                                    @canany(['departamento-edit','departamento-delete'])
                                    <th>Acciones</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($find as $f)
                                <tr>
                                    <td>{{ $f->id_dep }}</td>
                                    <td>{{ $f->departamento }}</td>
                                    <td>{{ $f->sigla}}</td>
                                    <td>
                                        @if ($f->estado == 1)
                                            <i class="fas fa-check" style="color:green"></i>
                                        @else
                                            <i class="fas fa-times" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Boton de Modificar --}}
                                        @can('departamento-edit')
                                            <a href="{{ url('departamento/editar/'.$f->id_dep) }}" class="btn btn-warning" id="btn1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        {{-- Boton de Eliminar --}}
                                        @can('departamento-delete')
                                            <a href="{{ url('departamento/confirma/'.$f->id_dep) }}" class="btn btn-danger">
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