@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="card card-info col-md-10">
            <div class="card-header">
                <h3 class="card-title">AGREGAR ROL</h3>
            </div>
            <form role="form" method="POST" action="{{ url('roles/nuevo') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Rol *</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Escriba el Estado Civil" value="{{ old('rol') }}" maxlength="50" required>
                        @if ($errors->has('rol'))
                            <small class="form-text text-danger">
                                {{ $errors->first('rol') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <strong>Permiso:</strong>
                        <br/>
                        <?php $col = 1; ?>
                        <table class="table table-striped table-bordered">
                            @foreach($permission as $value)
                                @switch($col)
                                    @case(1)
                                        <tr>
                                            <td>
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} {{ $value->name }}</label>
                                            </td>
                                            <?php $col = $col + 1; ?>
                                    @break
                                    @case(2)
                                            <td>
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} {{ $value->name }}</label>
                                            </td>
                                            <?php $col = $col + 1; ?>
                                    @break
                                    @case(3)
                                            <td>
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} {{ $value->name }}</label>
                                            </td>
                                            <?php $col = $col + 1; ?>
                                    @break
                                    @case(4)
                                            <td>
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} {{ $value->name }}</label>
                                            </td>
                                            <?php $col = $col + 1; ?>
                                    @break
                                    @case(5)
                                            <td>
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} {{ $value->name }}</label>
                                            </td>
                                        </tr>
                                        <?php $col = 1; ?>
                                    @break
                                @endswitch
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                    <a href="{{ url('roles/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
@stop