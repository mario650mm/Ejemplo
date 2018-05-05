@extends('layouts.app')

@section('title_page')
    Usuarios
@endsection

@section('content')
    <form action="{{url('/users')}}" method="get">
        <div class="row">
            <div class="col-sm-3">
                <a href="{{url('/users/create')}}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> @lang('generals.create')
                </a>
            </div>
            <div class="col-sm-4" style="margin-left:35%;">
                <input type="text" id="name" name="name" class="form-control"
                       placeholder="Buscar por nombre" value="{{Request::get('name')}}"/>
            </div>
            <div class="col-sm-2" style="margin-right:-10%;">
                <button type="submit" class="btn btn-default btn-sm">
                    <i class="fa fa-search-plus"></i>
                </button>
            </div>
        </div>
        <br>
    </form>
    <table class="table table-striped table-responsive">
        <tr>
            <th>@lang('users.name')</th>
            <th>Correo</th>
            <th>F. Creación</th>
        </tr>
        @foreach($users as $user)
            <tr onclick='window.location.href="{{url('/users/show/'.$user->id)}}"'>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{\Carbon\Carbon::parse($user->created_at)->format('l d/m/Y')}}</td>
            </tr>
        @endforeach
    </table>
    <center>
        {{$users->links()}}
    </center>
@endsection