@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">ELIMINAR AFP</h3>
            </div>
            <form role="form" method="POST" action="{{ url('afp/eliminar') }}">
                @csrf
                <div class="card-body">
                    <p>¿Esta seguro de eliminar el AFP?</p>
                    <input type="hidden" name="id" value="{{ $id }}">
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">SI</button>
                    <a href="{{ url('afp/buscar') }}" class="btn btn-danger">NO</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop