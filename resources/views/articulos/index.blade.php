@extends('layouts.appDashboard')
@section('title', 'Articulos')
@section('content')
    @include('articulos.agregarArticulobtn')
    @include('flash-message')
    @include('articulos.table')
@endsection
