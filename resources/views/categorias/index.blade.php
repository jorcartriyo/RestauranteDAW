@extends('layouts.appDashboard')
@section('title', 'Categorias')
@section('content')
    @include('layouts.agregarBtn', ['texto' => 'una Categoria', 'ruta' => 'categorias.create'])
    @include('flash-message')
    @include('categorias.table')
@endsection
