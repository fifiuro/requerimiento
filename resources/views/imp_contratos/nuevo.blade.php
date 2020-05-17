@extends('template/base')

@section('content')
    <div class="row">
        <div class="card card-info col-md-12">
            <div class="card-header">
                <h3 class="card-title">IMPRESION DE CONTRATO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('imp_contrato/nuevo') }}">
                @csrf
                <input type="hidden" name="id_req" value="{{ $id }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="firma1">Firma 1 *</label>
                                    <input type="text" name="firma1" class="form-control" id="firma1" placeholder="Nombre Completo" value="{{ old('firma1') }}" required>
                                    @if ($errors->has('firma1'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('firma1') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="cargo1">Cargo 1 *</label>
                                    <input type="text" name="cargo1" class="form-control" id="cargo1" placeholder="Cargo" value="{{ old('cargo1') }}" required>
                                    @if ($errors->has('cargo1'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('cargo1') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="firma2">Firma 2 *</label>
                                    <input type="text" name="firma2" class="form-control" id="firma2" placeholder="Nombre Completo" value="{{ old('firma2') }}" required>
                                    @if ($errors->has('firma2'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('firma2') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="cargo2">Cargo 2 *</label>
                                    <input type="text" name="cargo2" class="form-control" id="cargo2" placeholder="Cargo" value="{{ old('cargo2') }}" required>
                                    @if ($errors->has('cargo2'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('cargo2') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="firma3">Firma 3 *</label>
                                    <input type="text" name="firma3" class="form-control" id="firma3" placeholder="Nombre Completo" value="{{ old('firma3') }}" required>
                                    @if ($errors->has('firma3'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('firma3') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="cargo3">Cargo 3 *</label>
                                    <input type="text" name="cargo3" class="form-control" id="cargo3" placeholder="Cargo" value="{{ old('cargo3') }}" required>
                                    @if ($errors->has('cargo3'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('cargo3') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <div class="">
                                <label for="plantilla_contrato">Contrato</label>
                                <textarea name="plantilla_contrato" id="plantilla_contrato" class="textarea">{{ $contrato }}</textarea>
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
                        <a href="{{ url('requerimiento/buscar') }}" class="btn btn-danger">CANCELAR</a>
                        <a href="{{ url('requerimiento/buscar') }}" class="btn btn-warning">VISTA PREVIA</a>
                        <a href="{{ url('requerimiento/buscar') }}" class="btn btn-warning">IMPRIMIR</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section("extra")
$('.textarea').summernote({
    height: 400,
    placeholder: 'Escriba el contenido del contrato',
    toolbar: [
        ['style', ['bold']],
        ['fontsize', ['fontsize','fontname']],
        ['height', ['height']]
    ]
})
@stop