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
                            <a class="nav-link" id="vert-tabs-requerimiento-tab" data-toggle="pill" href="#vert-tabs-requerimiento" role="tab" aria-controls="vert-tabs-requerimiento" aria-selected="false">3. Nota Requerimiento</a>
                            <a class="nav-link" id="vert-tabs-documento-tab" data-toggle="pill" href="#vert-tabs-documento" role="tab" aria-controls="vert-tabs-documento" aria-selected="false">4. Documentos</a>
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            {{-- FORMULARIO DE DATOS PERSONALES --}}
                            <div class="tab-pane text-left fade show active" id="vert-tabs-personal" role="tabpanel" aria-labelledby="vert-tabs-personal-tab">
                                <div class="card-body">
                                    <div id="buscador" class="row" style="display: flex">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label for="nombre">Nombre / Paterno / Materno</label>
                                                <input type="text" class="form-control" id="nombre" placeholder="Escriba Nombre / Paterno / Materno">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group text-center">
                                                {{-- Boton de Buscar --}}
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
                                    <div id="resul" class="row" style="display: flex">
                                        <table class="table">
                                            <thead>
                                                <th>Nombre Completo</th>
                                                <th>Telefono</th>
                                                <th>Celular</th>
                                                <th>Correo Electronico</th>
                                                <th>Acciones</th>
                                            </thead>
                                            <tbody id="resultado"></tbody>
                                        </table>
                                    </div>
                                    <div id="seleccionado" style="display:none">
                                        <table class="table">
                                            <tr>
                                                <td colspan="2">
                                                    <h2>PERSONA SELECCIONADA</h2>
                                                    <a href="#" id="close">CERRAR</a>
                                                    <input type="hidden" name="id_per" id="id_per">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nombre:</td>
                                                <td>
                                                    <input type="text" id="name" class="form-control" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Telefono:</td>
                                                <td>
                                                    <input type="text" id="phone" class="form-control" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Celular:</td>
                                                <td>
                                                    <input type="text" id="cellphone" class="form-control" disabled>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- FORMULARIO DE CONTRATO --}}
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
                                        <input type="hidden" name="fecha_inicio" id="fecha_inicio" required>
                                        <input type="hidden" name="fecha_fin" id="fecha_fin" required>
                                    </div>
                                </div>
                            </div>
                            {{-- FROMULARIO NOTA REQUERIMIENTO --}}
                            <div class="tab-pane fade" id="vert-tabs-requerimiento" role="tabpanel" aria-labelledby="vert-tabs-requerimiento-tab">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nota_requerimiento">Nota de Requerimiento *</label>
                                        <input type="text" name="nota_requerimiento" id="nota_requerimiento" class="form-control" required>
                                        @if ($errors->has('nota_requerimiento'))
                                            <small class="form-text text-danger">
                                                {{ $errors->first('nota_requerimiento') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_nota_requerimiento">Nota de Requerimiento *</label>
                                        <input type="date" name="fecha_nota_requerimiento" id="fecha_nota_requerimiento" class="form-control" required>
                                        @if ($errors->has('fecha_nota_requerimiento'))
                                            <small class="form-text text-danger">
                                                {{ $errors->first('fecha_nota_requerimiento') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- FORMULARIO DOCUMENTOS --}}
                            <div class="tab-pane fade" id="vert-tabs-documento" role="tabpanel" aria-labelledby="vert-tabs-documento-tab">
                                <div class="card-body">
                                    <h2>Documentos a Presentar</h2>
                                    <table class="table">
                                        <?php
                                        $row = 1;
                                        $col = 1;
                                        ?>
                                        @foreach ($documento as $d)
                                            @switch($col)
                                                @case(1)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" id="documento" name="documento[]" value="{{ $d->id_doc }}">
                                                            {{ $d->documento }}
                                                        </td>
                                                    <?php $col = $col +1; ?>
                                                    @break
                                                @case(2)
                                                        <td>
                                                            <input type="checkbox" id="documento" name="documento[]" value="{{ $d->id_doc }}">
                                                            {{ $d->documento }}
                                                        </td>
                                                    <?php $col = $col +1; ?>
                                                    @break
                                                @case(3)
                                                        <td>
                                                            <input type="checkbox" id="documento" name="documento[]" value="{{ $d->id_doc }}">
                                                            {{ $d->documento }}
                                                        </td>
                                                    </tr>
                                                    <?php $col = 1; ?>
                                                    @break
                                            @endswitch
                                        @endforeach
                                    </table>
                                    <div class="form-group">
                                        <label for="observaciones">Observaciones *</label>
                                        <textarea name="observaciones" id="observaciones" cols="30" rows="3" class="form-control" required></textarea>
                                        @if ($errors->has('observaciones'))
                                            <small class="form-text text-danger">
                                                {{ $errors->first('observaciones') }}
                                            </small>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                                    <a href="{{ url('requerimiento/buscar') }}" class="btn btn-danger">CANCELAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
        var fechas = $('#duracion').val();
        var divide = fechas.split(' - ');
        $('#fecha_inicio').val(divide[0]);
        $('#fecha_fin').val(divide[1]);
    });

    $('#buscar').click(function(){
        if($('#nombre').val() != '') {
            $.ajax({
                url: "{{ url('personal/buscar') }}",
                data: "nombre="+$('#nombre').val()+"&_token={{ csrf_token() }}"+"&data=1",
                dataType: "json",
                method: "POST",
                success: function(result)
                {
                    $.each(result, function(i,item){
                        $('#resultado').html('<tr><td>' + result[i].nombre + ' ' + result[i].paterno + ' ' + result[i].materno + '</td><td>' + result[i].telefono + '</td><td>' + result[i].celular + '</td><td>' + result[i].email + '</td><td><input type="radio" id="seleccion" value="' + result[i].id_per + '"></td></tr>');
                    });
                    $('#loader').css('display','none');
                },
                fail: function() {
    
                },
                beforeSend: function() {
                    $('#loader').css('display','inline');
                }
            });
        }
    });

    $('body').on("click","#seleccion", function(){
        var id = $(this).val();
        $("#seleccionado").css("display","flex");
        $("#buscador").css("display","none");
        $("#resul").css("display","none");

        var todo = $(this).parent().parent();
        todo.each(function() {
            $("#id_per").val(id);
            $("#name").val($(this).find("td").eq(0).html());
            $("#phone").val($(this).find("td").eq(1).html());
            $("#cellphone").val($(this).find("td").eq(2).html());
        })
    });

    $("#close").click(function(){
        event.preventDefault();
        $("#id_per").val('');
        $("#seleccionado").css("display","none");
        $("#buscador").css("display","flex");
        $("#resul").css("display","flex");
    });
@stop