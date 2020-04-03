@extends('template/base')

@section('content')
    
    @isset($estado)
        @if ($estado == 1)
            <div class="row">
                <div class="card card-info col-md-12">
                    <div class="card-header text-right">
                        <h3 class="card-title">AREA: {{ $titulo }}</h3>
                        {{-- Boton de Nuevo --}}
                        <a href="{{ url('cargo/nuevo/'.$id) }}" class="btn btn-info">
                            <i class="fas fa-plus"></i>
                        </a>
                        {{-- Boton de Busqueda de Area --}}
                        <a href="{{ url('area/buscar') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Cargo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($find as $f)
                                <tr>
                                    <td>{{ $f->cargo }}</td>
                                    <td>
                                        @if ($f->estado == 1)
                                            <i class="fas fa-check" style="color:green"></i>
                                        @else
                                            <i class="fas fa-times" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Boton de Modificar --}}
                                        <a href="{{ url('cargo/editar/'.$f->id_car.'/'.$id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- Boton de Eliminar --}}
                                        <a href="{{ url('cargo/confirma/'.$f->id_car.'/'.$id) }}" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Cargo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        @elseif($estado == 0)
            <div class="row">
                <div class="card card-info col-md-12">
                    <div class="card-header text-right">
                        <h3 class="card-title">AREA: {{ $titulo }}</h3>
                        {{-- Boton de Nuevo --}}
                        <a href="{{ url('cargo/nuevo/'.$id) }}" class="btn btn-info">
                            <i class="fas fa-plus"></i>
                        </a>
                        {{-- Boton de Busqueda de Area --}}
                        <a href="{{ url('area/buscar') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i>
                        </a>
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
    $(function () {
        $("#example1").DataTable(
            {
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            }
        );
    });
@stop