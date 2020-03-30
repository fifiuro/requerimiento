@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">EDITAR DEPARTAMENTO</h3>
            </div>
            @if ($mensaje == '')
                <form role="form" method="POST" action="{{ url('departamento/actualizar') }}">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id_dep" id="id_dep" value="{{ $find->id_dep }}">
                        <div class="form-group">
                            <label for="departamento">Departamento *</label>
                            <input type="text" name="departamento" class="form-control" id="departamento" placeholder="Escriba el Departamento" value="{{ $find->departamento }}" maxlength="15" required>
                            @if ($errors->has('departamento'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('departamento') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sigla">Sigla *</label>
                            <input type="text" name="sigla" class="form-control" id="sigla" placeholder="Esrciba la Sigla" value="{{ $find->sigla }}" maxlength="4" required>
                            @if ($errors->has('sigla'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('sigla') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sigla">Estado *</label>
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
                        <a href="{{ url('departamento/buscar') }}" class="btn btn-danger">CANCELAR</a>
                    </div>
                </form>
            @else
                <div class="card-body">
                    <h3>{{ $mensaje }}</h3>
                </div>
            @endif
        </div>
        <div class="col-md-3"></div>
    </div>
@stop