@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">AGREGAR CARGO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('cargo/nuevo') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_are">Area *</label>
                        <input type="hidden" name="id_are" id="id_are" value="{{ $id }}">
                        <input type="text" name="id_are" class="form-control" id="id_are" value="{{ $area }}" disabled>
                        @if ($errors->has('id_are'))
                            <small class="form-text text-danger">
                                {{ $errors->first('id_are') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo *</label>
                        <input type="text" name="cargo" class="form-control" id="cargo" placeholder="Escriba el Cargo" value="{{ old('cargo') }}" maxlength="255" required>
                        @if ($errors->has('cargo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('cargo') }}
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
                    <a href="{{ url('cargo/buscar/'.$id) }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop