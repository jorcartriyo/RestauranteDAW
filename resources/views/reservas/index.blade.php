@extends('layouts.appDashboard')
@section('title', 'Reservas')
@section('content')
    @include('layouts.agregarBtn', ['texto' => 'un reserva', 'ruta' => 'reservas.create'])
    @include('flash-message')
    @include('reservas.table')
@endsection
