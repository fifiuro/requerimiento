@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">AGREGAR DEPARTAMENTO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('departamento/nuevo') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="departamento">Departamento *</label>
                        <input type="text" name="departamento" class="form-control" id="departamento" placeholder="Escriba el Departamento" value="{{ old('departamento') }}" maxlength="15" required>
                        @if ($errors->has('departamento'))
                            <small class="form-text text-danger">
                                {{ $errors->first('departamento') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="sigla">Sigla *</label>
                        <input type="text" name="sigla" class="form-control" id="sigla" placeholder="Esrciba la Sigla" value="{{ old('sigla') }}" maxlength="4" required>
                        @if ($errors->has('sigla'))
                            <small class="form-text text-danger">
                                {{ $errors->first('sigla') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                    <label for="estado">Estado *</label>
                        <select name="estado" id="estado" class="form-control">
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
                    <a href="{{ url('departamento/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop