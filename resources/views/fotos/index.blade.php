@extends('layouts.appDashboard')
@section('title', 'Fotos')
@section('content')
    @include('layouts.agregarBtn', ['texto' => 'una foto', 'ruta' => 'fotos.create'])
    @include('flash-message')
    @include('fotos.table')
@endsection
