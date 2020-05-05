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
            <form role="form" method="POST" action="{{ url('requerimiento/nuevo') }}">
                @csrf
                <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="vert-tabs-personal-tab" data-toggle="pill" href="#vert-tabs-personal" role="tab" aria-controls="vert-tabs-personal" aria-selected="true">1. DATOS PRESONALES</a>
                            <a class="nav-link" id="vert-tabs-contrato-tab" data-toggle="pill" href="#vert-tabs-contrato" role="tab" aria-controls="vert-tabs-contrato" aria-selected="false">2. CONTRATO</a>
                            <a class="nav-link" id="vert-tabs-requerimiento-tab" data-toggle="pill" href="#vert-tabs-requerimiento" role="tab" aria-controls="vert-tabs-requerimiento" aria-selected="false">3. NOTA REQUERIMIENTO</a>
                            <a class="nav-link" id="vert-tabs-documento-tab" data-toggle="pill" href="#vert-tabs-documento" role="tab" aria-controls="vert-tabs-documento" aria-selected="false">4. DOCUMENTOS</a>
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            {{-- FORMULARIO DE DATOS PERSONALES --}}
                            <div class="tab-pane text-left fade show active" id="vert-tabs-personal" role="tabpanel" aria-labelledby="vert-tabs-personal-tab">
                                <div class="card-body">
                                    {{-- ES EL FORMULARIO DE BUSQUEDA --}}
                                    <div id="buscador" class="row" style="display: flex">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label for="nombre">NOMBRE / PATERNO / MATERNO</label>
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
                                    <div id="seleccionado" style="display:none">
                                        <table class="table">
                                            <tr>
                                                <td colspan="2">
                                                    <a href="#" id="close"><i class="fas fa-times"></i></a>
                                                    <h2>PERSONA SELECCIONADA</h2>
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
                                            <label for="id_cen">CENTRO DE SALUD *</label>
                                            <select name="id_cen" id="id_cen" class="form-control" required>
                                                <option value=""></option>
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
                                            <label for="id_con">TIPO DE CONTRATO *</label>
                                            <select name="id_con" id="id_con" class="form-control" required>>
                                                <option value=""></option>
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
                                        <label for="id_are">TIPO DE CARGO *</label>
                                        <select id="id_are" class="form-control" required>
                                            <option value=""></option>
                                            @foreach ($area as $a)
                                                <option value="{{ $a->id_are }}">{{ $a->tipo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="cargo_nivel" class="row" style="display: none">
                                        <div class="form-group col-md-4">
                                            <label for="id_car">CARGO *</label>
                                            <select name="id_car" id="id_car" class="form-control" required>
                                                
                                            </select>
                                            @if ($errors->has('id_car'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('id_car') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="id_niv">NIVEL *</label>
                                            <select name="id_niv" id="id_niv" class="form-control" required>
                                                
                                            </select>
                                            @if ($errors->has('id_niv'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('id_niv') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="salario">Salario *</label>
                                            <input type="text" id="salario" value="" class="form-control" disabled>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="motivo">MOTIVIO DE CONTRATO *</label>
                                            <textarea name="motivo" id="motivo" cols="30" rows="3" class="form-control" required></textarea>
                                            @if ($errors->has('motivo'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('motivo') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="duracion">DURACION EN FECHAS:</label>
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
                            </div>
                            {{-- FROMULARIO NOTA REQUERIMIENTO --}}
                            <div class="tab-pane fade" id="vert-tabs-requerimiento" role="tabpanel" aria-labelledby="vert-tabs-requerimiento-tab">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nota_requerimiento">NOTA DE REQUERIMIENTO *</label>
                                        <input type="text" name="nota_requerimiento" id="nota_requerimiento" class="form-control" required>
                                        @if ($errors->has('nota_requerimiento'))
                                            <small class="form-text text-danger">
                                                {{ $errors->first('nota_requerimiento') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_nota_requerimiento">FECHA DEREQUERIMIENTO *</label>
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
                                        <label for="observaciones">OBSERVACIONES *</label>
                                        <textarea name="observaciones" id="observaciones" cols="30" rows="3" class="form-control"></textarea>
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
            $('#salario').val('');
            // BUSCAR CARGO SEGUN TIPO DE NIVEL
            $.ajax({
                url: "{{ url('cargo/buscar') }}",
                data: "cargo="+$(this).val()+"&_token={{ csrf_token() }}",
                dataType: "json",
                method: "POST",
                success: function(result)
                {
                    $('#id_car').append('<option value=""></option>');
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
                    $('#id_niv').append('<option value=""></option>')
                    $.each(result, function(i,item){
                        $('#id_niv').append('<option value="'+result[i].id_niv+'" data-sal="'+result[i].salario+'">'+result[i].nivel+', '+result[i].horas+' hrs.'+', '+result[i].tiempo+'</option>');
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

    $('#id_niv').on('change',function(){
        var sal = $('option:selected', $(this)).attr('data-sal');
        $('#salario').val(sal);
    });
@stop