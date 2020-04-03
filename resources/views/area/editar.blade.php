@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">EDITAR AREA</h3>
            </div>
            <form role="form" method="POST" action="{{ url('area/actualizar') }}">
                @csrf
                <input type="hidden" name="id_are" id="id_are" value="{{ $find->id_are }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="tipo">Area *</label>
                        <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Escriba el Tipo Area" value="{{ $find->tipo }}" maxlength="100" required>
                        @if ($errors->has('tipo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('tipo') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                    <label for="estado">Estado *</label>
                        <select name="estado" id="estado" class="form-control" required>
                            @if ($find->estado == 1)
                            <option value="1" selected>ACTIVADO</option>
                            <option value="0">DESACTIVADO</option>
                        @else
                            <option value="1">ACTIVADO</option>
                            <option value="0" selected>DESACTIVADO</option>
                        @endif
                        </select>
                        @if ($errors->has('estado'))
                            <small class="form-text text-danger">
                                {{ $errors->first('estado') }}
                            </small>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">EDITAR</button>
                    <a href="{{ url('area/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop