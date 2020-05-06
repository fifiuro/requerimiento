@extends('template.base')

@section('login')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">
                    <img src="{{ asset('images/img/cns.jfif') }}" class="img-logo">
                    <br>
                    <b>SISTEMA DE REQUERIMIENTOS</b>
                    <br>
                    Inicia sesión para ingresar al Sistema
                </p>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="nombre_usuario" type="text" class="form-control" name="nombre_usuario" value="{{ old('nombre_usuario') }}" required autocomplete="nombre_usuario" autofocus placeholder="Correo Electrónico">
                        @error('nombre_usuario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Recuerdame
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
