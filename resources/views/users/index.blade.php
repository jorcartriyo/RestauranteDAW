@extends('layouts.appDashboard')
@section('title', 'User')
@section('content')
    @include('layouts.agregarBtn', ['texto' => 'un Usuario', 'ruta' => 'home.create'])

    @include('flash-message')
    @include('users.table')
@endsection
