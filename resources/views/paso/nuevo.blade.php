@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="card card-info col-md-10">
            <div class="card-header">
                <h3 class="card-title">DATOS DEL REQUERIMIENTO</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Centro de Salud:</label> {{ $req->centro_salud }}
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tipo de Contrato:</label> {{ $req->contrato }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Nombre:</label> {{ $req->nombre }} {{ $req->paterno }} {{ $req->materno }}
                    </div>
                    <div class="form-group col-md-4">
                        <label>C.I.:</label> {{ $req->ci }} {{ $req->dedpartamento }}
                    </div>
                    <div class="form-group col-md-4">
                        <label>Matricula:</label> {{ $req->matricula }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Cargo:</label> {{ $req->cargo }}
                    </div>
                    <div class="form-group col-md-4">
                        <label>Nivel:</label> {{ $req->nivel }} {{ $req->horas }} Hrs. {{ $req->tiempo }}
                    </div>
                    <div class="form-group col-md-4">
                        <label>Salario:</label> {{ $req->salario }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="card card-info col-md-10">
            <div class="card-header">
                <h3 class="card-title">LISTADO DE ESTADOS</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Fecha / Hora</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                        @can('estadorequerimiento-edit')
                            @if($cerrar != 0)
                                <th>Acciones</th>
                            @endif
                        @endcan
                    </thead>
                    @foreach ($paso as $p)
                        <tr>
                            <td>{{ $p->fecha }} / {{ $p->hora }}</td>
                            <td>
                                @if ($p->estado == 1)
                                    EN ESPERA
                                @endif
                                @if ($p->estado == 2)
                                    RECHAZADO
                                @endif
                                @if ($p->estado == 3)
                                    ACEPTADO
                                @endif
                                @if ($p->estado == 4)
                                    CONFIRMADO
                                @endif
                                @if ($p->estado == 5)
                                    HABILITADO
                                @endif
                                @if ($p->estado == 6)
                                    CONTRATO ANULADO
                                @endif
                                @if ($p->estado == 0)
                                    NUEVO REQUERIMIENTO
                                @endif
                            </td>
                            <td>{{ $p->observaciones }}</td>
                            <td>
                                {{-- Boton de Modificar --}}
                                @can('paso-edit')
                                    @if($cerrar != 0)
                                        <a href="{{ url('pasos/editar/'.$p->id_pas) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endif
                                @endcan 
                                {{-- Boton de Eliminar --}}
                                @can('paso-delete')
                                    @if($cerrar != 0)
                                        <a href="{{ url('pasos/confirma/'.$p->id_pas) }}" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    @endif
                                @endcan 
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer">
                @can('paso-create')
                    @if($cerrar != 0)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">AGREGAR ESTADO</button>
                    @endif
                @endcan
                <a href="{{ url('requerimiento/buscar') }}" class="btn btn-danger">CERRAR</a>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    {{--  VENTANA MODAL NUEVO  --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">AGREGAR ESTADO AL REQUERIMIENTO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form-add" method="POST" action="{{ url('pasos/nuevo') }}">
                    @csrf
                    <input type="hidden" name="id_req" value="{{ $req->id_req }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="estado">Estado *</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value=""></option>
                                @if (in_array("1",$e))
                                    
                                @else
                                    <option value="1">EN ESPERA</option>
                                @endif
                                @if (in_array("2",$e))
                                    
                                @else
                                    <option value="2">RECHAZADO</option>    
                                @endif
                                @if (in_array("3",$e))
                                    
                                @else
                                    <option value="3">ACEPTADO</option>
                                @endif
                                @if (in_array("4",$e))
                                
                                @else
                                    <option value="4">CONFIRMADO</option>
                                @endif
                                @if (in_array("5",$e))
                                    
                                @else
                                    <option value="5">HABILITADO</option>
                                @endif
                                @if (in_array("6",$e))
                                    
                                @else
                                    <option value="6">CONTRATO ANULADO</option>
                                @endif
                                @if (in_array("0",$e))
                                    
                                @else
                                    <option value="0">NUEVO REQUERIMIENTO</option>
                                @endif
                            </select>
                            @if ($errors->has('estado'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('estado') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control" placeholder="Observaciones" required></textarea>
                            @if ($errors->has('observaciones'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('estado') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                        @can('paso-create')
                            <button type="submit" class="btn btn-primary">GUARDAR</button>
                        @endcan
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('extra')
    // ENVIAR DATOS A GUARDAR
    $("#form-add").submit(function (ev) {
        $.ajax({
            type: $("#form").attr("method"),
            url: $("#form").attr("action"),
            data: $("#form").serialize(),
            success: function(data) {
                alert("todo bien!!!");
            }
        });
        ev.preventDefault();
    });
@stop