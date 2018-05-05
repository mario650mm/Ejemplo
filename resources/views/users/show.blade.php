@extends('layouts.app')

@section('title_page')
    Perfil de usuario
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <a href="{{url('/users/edit/'.$user->id)}}" class="btn btn-primary btn-sm">
                <i class="fa fa-edit"></i> Editar
            </a>
        </div>
        <div class="col-sm-3 pull-right">
            @include('users.partials.delete')
        </div>
    </div>
    <br>
    <table>
        <tr>
            <td width="80%">
                <i class="fa fa-user"></i> Nombre
            </td>
            <td width="20%" valign="top">
                {{$user->name}}
            </td>
        </tr>
        <tr>
            <td width="80%">
                <i class="fas fa-envelope"></i> Correo
            </td>
            <td width="20%" valign="top">
                {{$user->email}}
            </td>
        </tr>
        <tr>
            <td width="80%">
                <i class="fas fa-calendar-alt"></i> Fecha
            </td>
            <td width="20%" valign="top">
                {{\Carbon\Carbon::parse($user->created_at)->format('l d/m/Y')}}
            </td>
        </tr>
    </table>
@endsection

@section('scripts')
@endsection