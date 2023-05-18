@extends('layouts.appDashboard')
@section('title', 'Mesas')
@section('content')
    @include('layouts.agregarBtn', ['texto' => 'un mesa', 'ruta' => 'mesas.create'])
    @include('flash-message')
    @include('mesas.table')
@endsection
