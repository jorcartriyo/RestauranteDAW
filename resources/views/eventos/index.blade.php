@extends('layouts.appDashboard')
@section('title', 'Eventos')
@section('content')
@include('layouts.agregarBtn', ['texto'=>'un Evento', 'ruta'=>'eventos.create'])
@include('flash-message')
@include('eventos.table')
@endsection