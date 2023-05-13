@extends('layouts.appDashboard')
@section('title', 'Roles')
@section('content')
@include('layouts.agregarBtn', ['texto'=>'un Rol', 'ruta'=>'roles.create'])
    <div class="card">
        <div class="card-body">
            @include('flash-message')
            @include('roles.table')
        </div>
    </div>
@endsection
