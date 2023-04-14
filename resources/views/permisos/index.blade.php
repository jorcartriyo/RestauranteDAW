@extends('layouts.appDashboard')
@section('title', 'Permisos')
@section('content')
    @include('permisos.agregarPermisoBtn')
    <div class="card">
        <div class="card-body">
            @include('flash-message')
            @include('permisos.table')
        </div>
    </div>
@endsection
