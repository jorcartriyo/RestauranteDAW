@extends('layouts.appDashboard')
@section('title', 'Articulos')
@section('content')
    @include('layouts.agregarBtn', ['texto' => 'un Articulo', 'ruta' => 'articulos.create'])
    @include('flash-message')
    @include('articulos.table')
@endsection
