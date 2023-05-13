@extends('layouts.appDashboard')
@section('title', 'Permisos')
@section('content')
@include('layouts.agregarBtn', ['texto'=>'un Permiso', 'ruta'=>'permisos.create'])
<div class="card">
    <div class="card-body">
        @include('flash-message')
        @include('permisos.table')
    </div>
</div>
@endsection