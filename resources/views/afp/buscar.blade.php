@extends('template/base')

@section('content')
    
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">BUSCAR AFP</h3>
            </div>
            <form role="form" method="POST" action="{{ url('afp/buscar') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="afp">AFP</label>
                                <input autofocus type="text" name="afp" class="form-control" id="afp" placeholder="Escriba el AFP">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                {{-- Boton de Nuevo --}}
                                @can('afp-create')
                                <a href="{{ url('afp/nuevo') }}" class="btn btn-danger">
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
                                    <th>AFP</th>
                                    <th>Estado</th>
                                    @canany(['afp-edit', 'afp-delete'])
                                        <th>Acciones</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($find as $f)
                                <tr>
                                    <td>{{ $f->id_dep }}</td>
                                    <td>{{ $f->nombre }}</td>
                                    <td>
                                        @if ($f->estado == 1)
                                            <i class="fas fa-check" style="color:green"></i>
                                        @else
                                            <i class="fas fa-times" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Boton de Modificar --}}
                                        @can('afp-edit')
                                        <a href="{{ url('afp/editar/'.$f->id_afp) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        {{-- Boton de Eliminar --}}
                                        @can('afp-delete')
                                        <a href="{{ url('afp/confirma/'.$f->id_afp) }}" class="btn btn-danger">
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