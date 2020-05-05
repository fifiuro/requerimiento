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
                <h3 class="card-title">EDITAR USUARIO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('users/actualizar') }}">
                @csrf
                <div class="card-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $find->name }}" required>
                            <input type="hidden" name="id" id="id" value="{{ $find->id }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label class="email">Correo Electronico:</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $find->email }}" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="nombre_usuario">Nombre de usuario:</label>
                                <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" placeholder="Nombre de Usuario" value="{{ $find->nombre_usuario }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="confirm-password">Confirmar Contraseña:</label>
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->hasRole('Admin'))
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="cofirm-password">Centro de Salud: {{ Auth::user()->hasRole('Admin') }}</label>
                                <select name="id_cen" id="id_cen" class="form-control" required>
                                    <option value=""></option>
                                    @foreach ($centro as $c)
                                        @if ($c->id_cen == $find->id_cen)
                                            <option value="{{ $c->id_cen }}" selected>{{ $c->nombre }}</option>
                                        @else
                                            <option value="{{ $c->id_cen }}">{{ $c->nombre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if (Auth::user()->hasRole('Admin'))
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="roles">Rol:</label>
                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                            </div>
                        </div>    
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">EDITAR</button>
                    <a href="{{ url('users/buscar') }}" class="btn btn-danger">CANCELAR</a>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection