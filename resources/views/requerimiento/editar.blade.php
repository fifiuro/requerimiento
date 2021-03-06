@extends('template/base')

@section('content')
    @if ($errors->any())
        <div class="col-md-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="loader text-center" id="loader">
        <img src="{{ asset('images/img/Spinner-1s-200px.gif') }}" class="img">
        <h3>Espere mientras trabajamos en su solicitud.</h3>
    </div>
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">AGREGAR REQUERIMIENTO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('requerimiento/actualizar') }}">
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
                                    {{-- ES EL FORMULARIO DE BUSQUEDA --}}
                                    <div id="buscador" class="row" style="display: none">
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
                                    {{-- MUESTRA EL RESULTADO DE LA BUSQUEDA --}}
                                    <div id="resul" class="row" style="display: none">
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
                                    {{-- MUESTRA LOS DATOS DEL PERSONAL SELECCIONADO --}}
                                    <div id="seleccionado" style="display:flex">
                                        <table class="table">
                                            <tr>
                                                <td colspan="2">
                                                    <a href="#" id="close"><i class="fas fa-times"></i></a>
                                                    <h2>PERSONA SELECCIONADA</h2>
                                                    <input type="hidden" name="id_req" id="id_req" value="{{ $find->id_req }}">
                                                    <input type="hidden" name="id_per" id="id_per" value="{{ $find->id_per }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nombre:</td>
                                                <td>
                                                    <input type="text" id="name" class="form-control" value="{{ $find->nombre }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Telefono:</td>
                                                <td>
                                                    <input type="text" id="phone" class="form-control" value="{{ $find->paterno }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Celular:</td>
                                                <td>
                                                    <input type="text" id="cellphone" class="form-control" value="{{ $find->materno }}" disabled>
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
                                                    @if ($find->id_cen == $cs->id_cen)
                                                        <option value="{{ $cs->id_cen }}" selected>{{ $cs->nombre }}</option>
                                                    @else
                                                        <option value="{{ $cs->id_cen }}">{{ $cs->nombre }}</option>
                                                    @endif
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
                                                    @if ($find->id_con == $c->id_con)
                                                        <option value="{{ $c->id_con }}" selected>{{ $c->contrato }}</option>
                                                    @else
                                                        <option value="{{ $c->id_con }}">{{ $c->contrato }}</option>
                                                    @endif
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
                                        <label for="id_are">Tipo de Cargo * {{ $find->id_are }}</label>
                                        <select id="id_are" class="form-control" required>
                                            <option value=""></option>
                                            @foreach ($area as $a)
                                                @if ($find->id_are == $a->id_are)
                                                    <option value="{{ $a->id_are }}" selected>{{ $a->tipo }}</option>
                                                @else
                                                    <option value="{{ $a->id_are }}">{{ $a->tipo }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="cargo_nivel" class="row">
                                        <div class="form-group col-md-6">
                                            <label for="id_car">Cargo *</label>
                                            <select name="id_car" id="id_car" class="form-control" required>
                                                @foreach ($cargo as $ca)
                                                    @if ($find->id_car == $ca->id_car)
                                                        <option value="{{ $ca->id_car }}" selected>{{ $ca->cargo }}</option>
                                                    @else
                                                        <option value="{{ $ca->id_car }}">{{ $ca->cargo }}</option>
                                                    @endif
                                                @endforeach
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
                                                @foreach ($nivel as $ni)
                                                    @if ($find->id_niv == $ni->id_niv)
                                                        <option value="{{ $ni->id_niv }}" selected>{{ $ni->nivel }} {{ $ni->horas }} hrs {{ $ni->tiempo }}</option>
                                                    @else
                                                        <option value="{{ $ni->id_niv }}">{{ $ni->nivel }} {{ $ni->horas }} hrs {{ $ni->tiempo }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_niv'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('id_niv') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="motivo">Motivo de Contrato *</label>
                                            <textarea name="motivo" id="motivo" cols="30" rows="3" class="form-control" required>{{ $find->motivo }}</textarea>
                                            @if ($errors->has('motivo'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('motivo') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="duracion">Duracion en Fechas:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="duracion" value="{{ $find->fecha_inicio1 }} - {{ $find->fecha_fin2 }}">
                                            </div>
                                            <input type="hidden" name="fecha_inicio" id="fecha_inicio" value="{{ $find->fecha_inicio }}" required>
                                            <input type="hidden" name="fecha_fin" id="fecha_fin" value="{{ $find->fecha_fin }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- FROMULARIO NOTA REQUERIMIENTO --}}
                            <div class="tab-pane fade" id="vert-tabs-requerimiento" role="tabpanel" aria-labelledby="vert-tabs-requerimiento-tab">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nota_requerimiento">Nota de Requerimiento *</label>
                                        <input type="text" name="nota_requerimiento" id="nota_requerimiento" class="form-control" value="{{ $find->nota_requerimiento }}" required>
                                        @if ($errors->has('nota_requerimiento'))
                                            <small class="form-text text-danger">
                                                {{ $errors->first('nota_requerimiento') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_nota_requerimiento">Nota de Requerimiento *</label>
                                        <input type="date" name="fecha_nota_requerimiento" id="fecha_nota_requerimiento" class="form-control" value="{{ $find->fecha_nota_requerimiento }}" required>
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
                                                            @if (in_array($d->id_doc,$requisito))
                                                                <input type="checkbox" id="documento" name="documento[]" value="{{ $d->id_doc }}" checked>
                                                            @else
                                                                <input type="checkbox" id="documento" name="documento[]" value="{{ $d->id_doc }}">
                                                            @endif
                                                            {{ $d->documento }}
                                                        </td>
                                                    <?php $col = $col +1; ?>
                                                    @break
                                                @case(2)
                                                        <td>
                                                            @if (in_array($d->id_doc,$requisito))
                                                                <input type="checkbox" id="documento" name="documento[]" value="{{ $d->id_doc }}" checked>
                                                            @else
                                                                <input type="checkbox" id="documento" name="documento[]" value="{{ $d->id_doc }}">
                                                            @endif
                                                            {{ $d->documento }}
                                                        </td>
                                                    <?php $col = $col +1; ?>
                                                    @break
                                                @case(3)
                                                        <td>
                                                            @if (in_array($d->id_doc,$requisito))
                                                                <input type="checkbox" id="documento" name="documento[]" value="{{ $d->id_doc }}" checked>
                                                            @else
                                                                <input type="checkbox" id="documento" name="documento[]" value="{{ $d->id_doc }}">
                                                            @endif
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
                                        <textarea name="observaciones" id="observaciones" cols="30" rows="3" class="form-control" required>{{ $find->observaciones }}</textarea>
                                        @if ($errors->has('observaciones'))
                                            <small class="form-text text-danger">
                                                {{ $errors->first('observaciones') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado Requerimiento</label>
                                        <select name="estado" id="estado" class="form-control">
                                            @if ($find->estado == '1')
                                                <option value="1" selected>EN ESPERA</option>
                                            @else
                                                <option value="1">EN ESPERA</option>
                                            @endif
                                            @if ($find->estado == '2')
                                                <option value="2" selected>RECHAZADO</option>
                                            @else
                                                <option value="2">RECHAZADO</option>
                                            @endif
                                            @if ($find->estado == '3')
                                                <option value="3" selected>ACEPTADO</option>    
                                            @else
                                                <option value="3">ACEPTADO</option>
                                            @endif
                                            @if ($find->estado == '4')
                                                <option value="4" selected>CONFIRMADO</option>
                                            @else
                                                <option value="4">CONFIRMADO</option>
                                            @endif
                                            @if ($find->estado == '5')
                                                <option value="5" selected>HABILITADO</option>
                                            @else
                                                <option value="5">HABILITADO</option>
                                            @endif
                                            @if ($find->estado == '6')
                                                <option value="6" selected>CONTRATO ANULADO</option>
                                            @else
                                                <option value="6">CONTRATO ANULADO</option>
                                            @endif
                                            @if ($find->estado == '7')
                                                <option value="7" selected>NUEVO REQUERIMIENTO</option>
                                            @else
                                                <option value="7">NUEVO REQUERIMIENTO</option>
                                            @endif
                                            @if ($find->estado == '8')
                                                <option value="7" selected>NUEVO REQUERIMIENTO</option>
                                            @else
                                                <option value="7">NUEVO REQUERIMIENTO</option>
                                            @endif
                                        </select>
                                        @if ($errors->has('observaciones'))
                                            <small class="form-text text-danger">
                                                {{ $errors->first('observaciones') }}
                                            </small>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">EDITAR</button>
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
    // EL CONTROL DEL RAGO DE FECHAS
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
    // CAPTURAR Y CONVERTIR LOS DATOS AL FORMATO DE LA FECHA QUE SE REQUIERE EN LA BASE DE DATOS
    $('#duracion').on('apply.daterangepicker', function(ev, picker) {
        var fechas = $('#duracion').val();
        var divide = fechas.split(' - ');
        $('#fecha_inicio').val(formato(divide[0]));
        $('#fecha_fin').val(formato(divide[1]));
    });
    function formato(fecha){
        var f = fecha.split('/');

        return f[2] + '-' + f[1] + '-' + f[0];
    }
    // BUSQUEDA DE DATOS PERSONAS
    $('#buscar').click(function(){
        $('#resultado').html('');
        if($('#nombre').val() != '') {
            $.ajax({
                url: "{{ url('personal/buscar') }}",
                data: "nombre="+$('#nombre').val()+"&_token={{ csrf_token() }}"+"&data=1",
                dataType: "json",
                method: "POST",
                success: function(result)
                {
                    $("#resul").show(1000);
                    $.each(result, function(i,item){
                        $('#resultado').append('<tr><td>' + result[i].nombre + ' ' + result[i].paterno + ' ' + result[i].materno + '</td><td>' + result[i].telefono + '</td><td>' + result[i].celular + '</td><td>' + result[i].email + '</td><td><input type="radio" id="seleccion" value="' + result[i].id_per + '"></td></tr>');
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
    // SELECCIONA AL PERSONAL 
    $('body').on("click","#seleccion", function(){
        var id = $(this).val();
        $("#seleccionado").show(1000);
        $("#buscador").hide(1000);
        $("#resul").hide(1000);

        var todo = $(this).parent().parent();
        todo.each(function() {
            $("#id_per").val(id);
            $("#name").val($(this).find("td").eq(0).html());
            $("#phone").val($(this).find("td").eq(1).html());
            $("#cellphone").val($(this).find("td").eq(2).html());
        })
    });
    // CERRAR EL PERSONAL SELECCIONADO
    $("#close").click(function(){
        event.preventDefault();
        $("#id_per").val('');
        $("#seleccionado").hide(1000);
        $("#buscador").show(1000);
        $("#resul").hide(1000);
        $("#nombre").val('');
    });
    // CAPTURAR EL DATO SELECCIONADO PARA BUSCAR EL CARGO Y EL NIVEL
    $("#id_are").on('change',function(){
        // BUSCAR CARGO SEGUN EL TIPO DE CARGO
        if($(this).val() != ''){
            $("#cargo_nivel").show(1000);
            $('#id_car').html('');
            $('#id_niv').html('');
            // BUSCAR CARGO SEGUN TIPO DE NIVEL
            $.ajax({
                url: "{{ url('cargo/buscar') }}",
                data: "cargo="+$(this).val()+"&_token={{ csrf_token() }}",
                dataType: "json",
                method: "POST",
                success: function(result)
                {
                    $.each(result, function(i,item){
                        $('#id_car').append('<option value="'+result[i].id_car+'">'+result[i].cargo+'</option>');
                    });
                    $('#loader').css('display','none');
                },
                fail: function() {
    
                },
                beforeSend: function() {
                    $('#loader').css('display','inline');
                }
            });
            // BUSCAR NIVEL SEGUN TIPO DE NIVEL
            $.ajax({
                url: "{{ url('nivel/buscar') }}",
                data: "nivel="+$(this).val()+"&_token={{ csrf_token() }}&data=1",
                dataType: "json",
                method: "POST",
                success: function(result)
                {
                    $.each(result, function(i,item){
                        $('#id_niv').append('<option value="'+result[i].id_niv+'">'+result[i].nivel+', '+result[i].horas+' hrs.'+', '+result[i].tiempo+'</option>');
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
@stop