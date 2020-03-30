@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">EDITAR AFP</h3>
            </div>
            <form role="form" method="POST" action="{{ url('afp/actualizar') }}">
                @csrf
                <input type="hidden" name="id_afp" id="id_afp" value="{{ $find->id_afp }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre AFP *</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Escriba nombre AFP" value="{{ $find->nombre }}" maxlength="255" required>
                        @if ($errors->has('nombre'))
                            <small class="form-text text-danger">
                                {{ $errors->first('nombre') }}
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
                    <a href="{{ url('afp/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop