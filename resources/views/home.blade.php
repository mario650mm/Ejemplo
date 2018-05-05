@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading" align="center">
                    <i class="fa fa-users" style="font-size:25px;"></i>
                            Sistema de administración</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 style="color:#F67F76;" align="center">
                        <i class="fa fa-user fa-3x"></i>    Bienvenido
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
