@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">AGREGAR CONTRATO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('contrato/nuevo') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="contrato">Contrato *</label>
                        <input type="text" name="contrato" class="form-control" id="contrato" placeholder="Escriba el nombre del Contrato" value="{{ old('contrato') }}" maxlength="255" required>
                        @if ($errors->has('contrato'))
                            <small class="form-text text-danger">
                                {{ $errors->first('contrato') }}
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
                    <a href="{{ url('contrato/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop