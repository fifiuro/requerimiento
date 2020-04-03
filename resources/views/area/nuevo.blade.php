@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">AGREGAR AREA</h3>
            </div>
            <form role="form" method="POST" action="{{ url('area/nuevo') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="tipo">Area *</label>
                        <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Escriba el Tipo Area" value="{{ old('tipo') }}" maxlength="100" required>
                        @if ($errors->has('tipo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('tipo') }}
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
                    <a href="{{ url('area/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop