@extends('template/base')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="card card-info col-md-6">
            <div class="card-header">
                <h3 class="card-title">ELIMINAR CARGO</h3>
            </div>
            <form role="form" method="POST" action="{{ url('cargo/eliminar') }}">
                @csrf
                <div class="card-body">
                    <p>¿Esta seguro de eliminar el Cargo?</p>
                    <input type="hidden" name="id" value="{{ $id }}">
                    <input type="hidden" name="ie" value="{{ $ie }}">
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">SI</button>
                    <a href="{{ url('cargo/buscar/'.$ie) }}" class="btn btn-danger">NO</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop