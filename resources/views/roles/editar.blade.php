@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="card card-info col-md-10">
            <div class="card-header">
                <h3 class="card-title">EDITAR ROL</h3>
            </div>
            <form role="form" method="POST" action="{{ url('roles/actualizar') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $find->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Rol *</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Escriba el Estado Civil" value="{{ $find->name }}" maxlength="50" required>
                        @if ($errors->has('rol'))
                            <small class="form-text text-danger">
                                {{ $errors->first('rol') }}
                            </small>
                        @endif
                    </div>
                    {{--  LISTA DUAL PARA SELECCION DE ROLES  --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <select class="duallistbox" multiple="multiple" row="10">
                                    @foreach ($permission as $p)
                                        @if (in_array($p->id, $rolePermissions))
                                            <option value="{{ $p->id }}" selected>{{ $p->name }}</option>
                                        @else
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>    
                                        @endif
                                    @endforeach
                                </select>
                                <input type="hidden" name="permission" id="rol" value="<?php echo implode(',',$rolePermissions) ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">EDITAR</button>
                    <a href="{{ url('roles/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
@stop

@section('extra')
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox({
        selectorMinimalHeight: 300,
        infoText: false,
        infoTextEmpty: "Lista Vacia",
        filterPlaceHolder: "Rol a Buscar",
        moveAllLabel: "Mover Todo",
        removeAllLabel: "Borrar todo"
    });
    //Agrega los elementos seleccionados
    $('.duallistbox').on('change',function(e){
        var newState = $(this).val();
        $("#rol").val(newState);
    });
@stop