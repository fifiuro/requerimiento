@extends('template.base')

@section('content')
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">BUSCAR ROL</h3>
            </div>
    
            <form role="form" method="POST" action="{{ url('roles/buscar') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <input autofocus type="text" name="rol" class="form-control" id="rol" placeholder="Esriba el Rol a Buscar">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group text-center">
                                {{-- Boton de Buscar --}}
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                {{-- Boton de Nuevo --}}
                                @can('roles-create')
                                    <a href="{{ url('roles/nuevo') }}" class="btn btn-danger">
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
                                    <th>Estado Civil</th>
                                    @canany(['roles-edit','roles-delete'])
                                    <th>Acciones</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($find as $f)
                                <tr>
                                    <td>{{ $f->id }}</td>
                                    <td>{{ $f->name }}</td>
                                    <td>
                                        {{-- Boton de Modificar --}}
                                        @can('roles-edit')
                                        <a href="{{ url('roles/editar/'.$f->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        {{-- Boton de Eliminar --}}
                                        @can('roles-delete')
                                        <a href="{{ url('roles/confirma/'.$f->id) }}" class="btn btn-danger">
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
@endsection