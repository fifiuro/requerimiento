@extends('template/base')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-2"></div>
        <div class="card card-info col-md-8">
            <div class="card-header">
                <h3 class="card-title">AGREGAR USUARIO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('users/nuevo') }}">
                @csrf
                <div class="card-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="email">Correo Electronico:</label>
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="nombre_usuario">Nombre de usuario:</label>
                                {!! Form::text('nombre_usuario', null, array('placeholder' => 'Nombre de Usuario','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="cofirm-password">Confirmar Contraseña:</label>
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirme Contraseña','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="cofirm-password">Centro de Salud:</label>
                            <select name="id_cen" id="id_cen" class="form-control" required>
                                <option value=""></option>
                                @foreach ($centro as $c)
                                    <option value="{{ $c->id_cen }}">{{ $c->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="roles">Rol:</label>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                    <a href="{{ url('users/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection