@extends('layouts.appDashboard')
@section('title', 'User')
@section('content')
    @include('users.agregarUsuariobtn')
    @include('flash-message')
    @include('users.table')
@endsection
