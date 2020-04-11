@extends('template/base')

@section('content')
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">EDITAR DATOS PERSONALES</h3>
            </div>

            <form role="form" method="POST" action="{{ url('personal/actualizar') }}">
                @csrf
                <input type="hidden" name="id_per" id="id_per" value="{{ $find->id_per }}">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre *</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Escriba Nombre" value="{{ $find->nombre }}" maxlength="100" required>
                            @if ($errors->has('nombre'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('nombre') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="paterno">Apellido Paterno *</label>
                            <input type="text" name="paterno" class="form-control" id="paterno" placeholder="Escriba Apellido Paterno" value="{{ $find->paterno }}" maxlength="100" required>
                            @if ($errors->has('paterno'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('paterno') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="materno">Apellido Materno *</label>
                            <input type="text" name="materno" class="form-control" id="materno" placeholder="Escriba Apellido materno" value="{{ $find->materno }}" maxlength="100" required>
                            @if ($errors->has('materno'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('materno') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="ci">CI *</label>
                            <input type="text" name="ci" class="form-control" id="ci" placeholder="Escriba CI" value="{{ $find->ci }}" maxlength="20" required>
                            @if ($errors->has('ci'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('ci') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-grou col-md-6">
                            <label for="id_dep">Expedido *</label>
                            <select name="id_dep" id="id_dep" class="form-control">
                                @foreach ($departamento as $d)
                                    @if ($find->id_dep == $d->id_dep)
                                        <option value="{{ $d->id_dep }}" selected>{{ $d->departamento }}</option>
                                    @else
                                        <option value="{{ $d->id_dep }}">{{ $d->departamento }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('id_dep'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('id_dep') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="matricula">Matricula *</label>
                            <input type="text" name="matricula" class="form-control" id="matricula" placeholder="Escriba Matricula" value="{{ $find->matricula }}" maxlength="50" required>
                            @if ($errors->has('matricula'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('matricula') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_est">Estado Civil *</label>
                            <select name="id_est" id="id_est" class="form-control">
                                @foreach ($estado_civil as $e)
                                    @if ($e->id_est == $find->id_est)
                                        <option value="{{ $e->id_est }}" selected>{{ $e->estado_civil }}</option>
                                    @else
                                        <option value="{{ $e->id_est }}">{{ $e->estado_civil }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('id_est'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('id_est') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_afp">AFP *</label>
                            <select name="id_afp" id="id_afp" class="form-control">
                                @foreach ($afp as $a)
                                    @if ($a->id_afp == $find->id_afp)
                                        <option value="{{ $a->id_afp }}" selected>{{ $a->nombre }}</option>
                                    @else
                                        <option value="{{ $a->id_afp }}">{{ $a->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('id_afp'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('id_afp') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="telefono">Teléfono *</label>
                            <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Escriba Teléfono" value="{{ $find->telefono }}" maxlength="50" required>
                            @if ($errors->has('telefono'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('telefono') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="celular">Celular *</label>
                            <input type="text" name="celular" class="form-control" id="celular" placeholder="Escriba Celular" value="{{ $find->celular }}" maxlength="50" required>
                            @if ($errors->has('celular'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('celular') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Correo Electrónico *</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Escriba Correo Electrónico" value="{{ $find->email }}" maxlength="100" required>
                        @if ($errors->has('email'))
                            <small class="form-text text-danger">
                                {{ $errors->first('email') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="domicilio">Domicilio *</label>
                        <textarea name="domicilio" id="domicilio" cols="30" rows="5" class="form-control" required>{{ $find->domicilio }}</textarea>
                        @if ($errors->has('domicilio'))
                            <small class="form-text text-danger">
                                {{ $errors->first('domicilio') }}
                            </small>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">EDITAR</button>
                    <a href="{{ url('personal/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
    </div>
@stop