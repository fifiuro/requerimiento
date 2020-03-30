@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">EDITAR CONTRATO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('contrato/actualizar') }}">
                @csrf
                <input type="hidden" name="id_con" id="id_con" value="{{ $find->id_con }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="contrato">Contrato *</label>
                        <input type="text" name="contrato" class="form-control" id="contrato" placeholder="Escriba el nombre del Contrato" value="{{ $find->contrato }}" maxlength="255" required>
                        @if ($errors->has('contrato'))
                            <small class="form-text text-danger">
                                {{ $errors->first('contrato') }}
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
                    <a href="{{ url('contrato/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop