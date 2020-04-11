@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">AGREGAR NIVEL</h3>
            </div>
            <form role="form" method="POST" action="{{ url('nivel/nuevo') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_are">Area *</label>
                        <select name="id_are" id="id_are" class="form-control" required>
                            @foreach ($area as $a)
                                <option value="{{ $a->id_are }}">{{ $a->tipo }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('id_are'))
                            <small class="form-text text-danger">
                                {{ $errors->first('id_are') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nivel">Nivel *</label>
                        <input type="text" name="nivel" class="form-control" id="nivel" placeholder="Escriba el Nivel" value="{{ old('nivel') }}" maxlength="20" required>
                        @if ($errors->has('nivel'))
                            <small class="form-text text-danger">
                                {{ $errors->first('nivel') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="horas">Horas *</label>
                        <input type="text" name="horas" class="form-control" id="horas" placeholder="Escriba el Horas" value="{{ old('horas') }}" required>
                        @if ($errors->has('horas'))
                            <small class="form-text text-danger">
                                {{ $errors->first('horas') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tiempo">Tiempo *</label>
                        <input type="text" name="tiempo" class="form-control" id="tiempo" placeholder="Escriba el Tiempo" value="{{ old('tiempo') }}" maxlength="20" required>
                        @if ($errors->has('tiempo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('tiempo') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="salario">Salario *</label>
                        <input type="number" name="salario" class="form-control" id="salario" placeholder="Escriba el Salario" value="{{ old('salario') }}" required>
                        @if ($errors->has('salario'))
                            <small class="form-text text-danger">
                                {{ $errors->first('salario') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="literal">Literal *</label>
                        <input type="text" name="literal" class="form-control" id="literal" placeholder="Escriba el Literal" value="{{ old('literal') }}" maxlength="100" required>
                        @if ($errors->has('literal'))
                            <small class="form-text text-danger">
                                {{ $errors->first('literal') }}
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
                    <a href="{{ url('nivel/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop