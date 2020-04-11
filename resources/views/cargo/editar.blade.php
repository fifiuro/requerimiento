@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">EDITAR CARGO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('cargo/actualizar') }}">
                @csrf
                <input type="hidden" name="id_car" id="id_car" value="{{ $find->id_car }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_are">Area *</label>
                        <input type="hidden" name="id_are" id="id_are" value="{{ $find->id_are }}">
                        <input type="text" name="id_are" class="form-control" id="id_are" value="{{ $area }}" disabled>
                        @if ($errors->has('id_are'))
                            <small class="form-text text-danger">
                                {{ $errors->first('id_are') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo *</label>
                        <input type="text" name="cargo" class="form-control" id="cargo" placeholder="Escriba el Cargo" value="{{ $find->cargo }}" maxlength="255" required>
                        @if ($errors->has('cargo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('cargo') }}
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
                    <a href="{{ url('cargo/buscar/'.$find->id_are) }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop