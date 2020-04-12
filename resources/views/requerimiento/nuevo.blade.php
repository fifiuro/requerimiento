@extends('template/base')

@section('content')
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">AGREGAR REQUERIMIENTO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('estadocivil/nuevo') }}">
                @csrf
                {{--  <div class="card-body">  --}}
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="vert-tabs-personal-tab" data-toggle="pill" href="#vert-tabs-personal" role="tab" aria-controls="vert-tabs-personal" aria-selected="true">1. Datos Personales</a>
                                <a class="nav-link" id="vert-tabs-contrato-tab" data-toggle="pill" href="#vert-tabs-contrato" role="tab" aria-controls="vert-tabs-contrato" aria-selected="false">2. Contrato</a>
                                <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">3. Nota Requerimiento</a>
                                <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">4. Documentos Presentados</a>
                            </div>
                        </div>
                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                <div class="tab-pane text-left fade show active" id="vert-tabs-personal" role="tabpanel" aria-labelledby="vert-tabs-personal-tab">
                                    <form role="form" method="POST" action="{{ url('personal/buscar') }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre / Paterno / Materno</label>
                                                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Escriba Nombre / Paterno / Materno">
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group text-center">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                        {{-- Boton de Nuevo --}}
                                                        <a href="{{ url('personal/nuevo') }}" class="btn btn-danger">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-body" id="resultado">
                                        AQUI SE MUESTRA EL RESULTADO DE LA BUSQUEDA!!!
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vert-tabs-contrato" role="tabpanel" aria-labelledby="vert-tabs-contrato-tab">
                                    <div class="card-body">
                                        AQUI EL REGISTRO DEL CONTRATO
                                        <div class="form-group">
                                            <label for="id_cen">Centro de Salud *</label>
                                            <select name="id_cen" id="id_cen" class="form-control" required>
                                                {{--  @foreach ($centro_salud as $cs)
                                                    <option value="{{ $cs->id_cen }}">{{ $cs->nombre }}</option>
                                                @endforeach  --}}
                                            </select>
                                            @if ($errors->has('id_cen'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('id_cen') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="id_con">Tipo de Contrato *</label>
                                            <select name="id_con" id="id_con" class="form-control" required>>
                                                {{--  @foreach ($contrato as $c)
                                                    <option value="{{ $c->id_con }}">{{ $c->contrato }}</option>
                                                @endforeach  --}}
                                            </select>
                                            @if ($errors->has('id_con'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('id_con') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="id_are">Tipo de Cargo *</label>
                                            <select name="id_are" id="id_are" class="form-control" required>
                                                {{--  @foreach ($area as $a)
                                                    <option value="{{ $c->id_are }}">{{ $ca->tipo }}</option>
                                                @endforeach  --}}
                                            </select>
                                            @if ($errors->has('id_are'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('id_are') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="id_car">Cargo *</label>
                                            <select name="id_car" id="id_car" class="form-control" required>
                                                {{--  @foreach ($cargo as $ca)
                                                    <option value="{{ $ca->id_car }}">{{ $ca->cargo }}</option>
                                                @endforeach  --}}
                                            </select>
                                            @if ($errors->has('id_car'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('id_car') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="id_niv">Nivel *</label>
                                            <select name="id_niv" id="id_niv" class="form-control" required>
                                                {{--  @foreach ($nivel as $n)
                                                    <option value="{{ $n->id_niv }}">{{ $n->nivel }}</option>
                                                @endforeach  --}}
                                            </select>
                                            @if ($errors->has('id_niv'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('id_niv') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="motivo">Motivo de Contrato *</label>
                                            <textarea name="motivo" id="motivo" cols="30" rows="5" class="form-control" required></textarea>
                                            @if ($errors->has('motivo'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('motivo') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha_inicio">Fecha Inicio y Fin *</label>
                                            <input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                                            @if ($errors->has('fecha_inicio'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('fecha_inicio') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Date range:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                    AQUI EL REGISTRO DE NOTA DE REQUERIMIENTO
                                </div>
                                <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                                    DOCUMENTOS PRESENTADOS
                                </div>
                            </div>
                        </div>
                    </div>
                {{--  </div>  --}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                    <a href="{{ url('estadocivil/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('extra')
    $('#reservation').daterangepicker({
        "drops": "up",
        "locale": {
            "format": "DD/MM/YYYY",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": ["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
            "monthNames": ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
        }
    });
@stop