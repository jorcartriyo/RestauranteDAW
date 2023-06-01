@extends('layouts.appDashboard')
@section('title', 'pedidos')
@section('content')
    @include('flash-message')
    @include('pedidosBack.table')
@endsection
