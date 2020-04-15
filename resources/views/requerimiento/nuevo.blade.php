@extends('template/base')

@section('content')
    <div class="loader text-center" id="loader">
        <img src="{{ asset('images/img/Spinner-1s-200px.gif') }}" class="img">
        <h3>Espere mientras trabajamos en su solicitud.</h3>
    </div>
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">AGREGAR REQUERIMIENTO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('estadocivil/nuevo') }}">
                @csrf
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
                                                    <button type="button" class="btn btn-primary" id="buscar">
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
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <th>Nombre Completo</th>
                                            <th>Celular</th>
                                            <th>Telefono</th>
                                            <th>Correo Electronico</th>
                                        </thead>
                                        <tbody id="resultado"></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vert-tabs-contrato" role="tabpanel" aria-labelledby="vert-tabs-contrato-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="id_cen">Centro de Salud *</label>
                                            <select name="id_cen" id="id_cen" class="form-control" required>
                                                @foreach ($centro as $cs)
                                                    <option value="{{ $cs->id_cen }}">{{ $cs->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_cen'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('id_cen') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="id_con">Tipo de Contrato *</label>
                                            <select name="id_con" id="id_con" class="form-control" required>>
                                                @foreach ($contrato as $c)
                                                    <option value="{{ $c->id_con }}">{{ $c->contrato }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_con'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('id_con') }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="id_are">Tipo de Cargo *</label>
                                        <select name="id_are" id="id_are" class="form-control" required>
                                            @foreach ($area as $a)
                                                <option value="{{ $a->id_are }}">{{ $a->tipo }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_are'))
                                            <small class="form-text text-danger">
                                                {{ $errors->first('id_are') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
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
                                        <div class="form-group col-md-6">
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
                                    </div>
                                    <div class="form-group">
                                        <label for="motivo">Motivo de Contrato *</label>
                                        <textarea name="motivo" id="motivo" cols="30" rows="3" class="form-control" required></textarea>
                                        @if ($errors->has('motivo'))
                                            <small class="form-text text-danger">
                                                {{ $errors->first('motivo') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="duracion">Duracion en Fechas:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control float-right" id="duracion">
                                        </div>
                                        <input type="date" name="fecha_inicio" id="fecha_inicio" required>
                                        <input type="date" name="fecha_fin" id="fecha_fin" required>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                AQUI EL REGISTRO DE NOTA DE REQUERIMIENTO
                            </div>
                            <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                                DOCUMENTOS PRESENTADOS
                                <button type="submit" class="btn btn-primary">GUARDAR</button>
                                <a href="{{ url('estadocivil/buscar') }}" class="btn btn-danger">CANCELAR</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                    <a href="{{ url('estadocivil/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('extra')
    $('#duracion').daterangepicker({
        "drops": "up",
        "locale": {
            "format": "DD/MM/YYYY",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": ["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
            "monthNames": ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
        }
    });

    $('#duracion').on('apply.daterangepicker', function(ev, picker) {
        alert($('#duracion').val());
    });

    $('#buscar').click(function(){
        $.ajax({
            url: "{{ url('personal/buscar') }}",
            data: "nombre="+$('#nombre').val()+"&_token={{ csrf_token() }}"+"&data=1",
            dataType: "json",
            method: "POST",
            success: function(result)
            {
                $.each(result, function(i,item){
                    $('#resultado').html('<tr><td>' + result[i].nombre + ' ' + result[i].paterno + ' ' + result[i].materno + '</td><td>' + result[i].telefono + '</td><td>' + result[i].celular + '</td><td>' + result[i].email + '</td></tr>');
                });
                $('#loader').css('display','none');
            },
            fail: function() {

            },
            beforeSend: function() {
                $('#loader').css('display','inline');
            }
        });
    });
@stop