@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">EDITAR ESTADO DEL REQUERIMIENTO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('pasos/actualizar') }}">
                @csrf
                <input type="hidden" name="id_pas" value="{{ $find->id_pas }}">
                <input type="hidden" name="id_req" value="{{ $find->id_req }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="estado">Estado *</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value=""></option>
                            @if ($find->estado == 1)
                                <option value="1" selected>EN ESPERA</option>
                            @else
                                <option value="1">EN ESPERA</option>
                            @endif
                            @if ($find->estado == 2)
                                <option value="2" selected>RECHAZADO</option>
                            @else
                                <option value="2">RECHAZADO</option>
                            @endif
                            @if ($find->estado == 3)
                                <option value="3" selected>ACEPTADO</option>
                            @else
                                <option value="3">ACEPTADO</option>
                            @endif
                            @if ($find->estado == 4)
                                <option value="4" selected>CONFIRMADO</option>
                            @else
                                <option value="4">CONFIRMADO</option>
                            @endif
                            @if ($find->estado == 5)
                                <option value="5" selected>HABILITADO</option>
                            @else
                                <option value="5">HABILITADO</option>
                            @endif
                            @if ($find->estado == 6)
                                <option value="6" selected>CONTRATO ANULADO</option>
                            @else
                                <option value="6">CONTRATO ANULADO</option>
                            @endif
                            @if ($find->estado == 7)
                                <option value="7" selected>NUEVO REQUERIMIENTO</option>
                            @else
                                <option value="7">NUEVO REQUERIMIENTO</option>
                            @endif
                            @if ($find->estado == 8)
                                <option value="0" selected>TODOS LOS ESTADOS</option>
                            @else
                                <option value="0">TODOS LOS ESTADOS</option>
                            @endif
                        </select>
                        @if ($errors->has('estado'))
                            <small class="form-text text-danger">
                                {{ $errors->first('estado') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control" placeholder="Observaciones" required>{{ $find->observaciones }}</textarea>
                        @if ($errors->has('observaciones'))
                            <small class="form-text text-danger">
                                {{ $errors->first('estado') }}
                            </small>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">EDITAR</button>
                    <a href="{{ url('pasos/nuevo/'.$find->id_req) }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop