@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">AGREGAR CENTRO DE SALUD</h3>
            </div>
            <form role="form" method="POST" action="{{ url('centrosalud/nuevo') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="codigo">Código *</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Escriba Código" value="{{ old('codigo') }}" maxlength="10" required>
                        @if ($errors->has('codigo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('codigo') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre del Centro de Salud *</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Escriba nombre del Centro de Salud" value="{{ old('nombre') }}" maxlength="100" required>
                        @if ($errors->has('nombre'))
                            <small class="form-text text-danger">
                                {{ $errors->first('nombre') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección Centro de Salud</label>
                        <textarea name="direccion" id="direccion" class="form-control" cols="30" rows="5" maxlength="255" placeholder="Escriba dirección Centro de Salud" >{{ old('direccion') }}</textarea>
                        @if ($errors->has('direccion'))
                            <small class="form-text text-danger">
                                {{ $errors->first('direccion') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                    <label for="estado">Estado *</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="1">Activo</option>
                            <option value="0">Desactivado</option>
                        </select>
                        @if ($errors->has('estado'))
                            <small class="form-text text-danger">
                                {{ $errors->first('estado') }}
                            </small>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                    <a href="{{ url('centrosalud/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop