@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="card card-info col-md-10">
            <div class="card-header">
                <h3 class="card-title">AGREGAR CONFIGURACION DE IMPRESION DE CONTRATO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('config_contratos/nuevo') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="inicial">Inicial *</label>
                            <input type="text" name="inicial" class="form-control" id="inicial" placeholder="Escriba número Inicial" value="{{ old('inicial') }}" maxlength="4" required>
                            @if ($errors->has('inicial'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('inicial') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="correlativo">Correlativo *</label>
                            <input type="number" name="correlativo" class="form-control" id="correlativo" placeholder="Escriba número Correlativo" value="{{ old('correlativo') }}" required>
                            @if ($errors->has('correlativo'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('correlativo') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gestion">Gestión *</label>
                            <input type="number" name="gestion" class="form-control" id="gestion" placeholder="Escriba Gestión" value="{{ old('gestion') }}" required>
                            @if ($errors->has('gestion'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('gestion') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group pad">
                        <div class="mb-3">
                            <label for="plantilla_contrato">Plantilla de Contrato</label>
                            <textarea name="plantilla_contrato" id="plantilla_contrato" class="textarea">{{ old('plantilla_contrato') }}</textarea>
                            @if ($errors->has('gestion'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('gestion') }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                    <a href="{{ url('config_contratos/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
@stop

@section("extra")
$('.textarea').summernote({
    height: 300,
    placeholder: 'Escriba el contenido del contrato',
    toolbar: [
        ['style', ['bold']],
        ['fontsize', ['fontsize','fontname']],
        ['height', ['height']]
    ]
})
@stop