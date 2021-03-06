@extends('layouts.app')

@section('title_page')
    Crear usuario
@endsection

@section('content')
    <form action="{{url('/users/store')}}" method="post">
        <div class="row">
            <div class="col-sm-4">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-save"></i> Guardar
                </button>
            </div>
            <div class="col-sm-4 pull-right">
                <a href="{{url('/users')}}" class="btn btn-danger btn-sm">
                    <i class="fa fa-circle-notch"></i> Cancelar
                </a>
            </div>
        </div>
        <br>
        @include('users.partials.inputs')
    </form>
@endsection