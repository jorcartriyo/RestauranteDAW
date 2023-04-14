@extends('layouts.appDashboard')
@section('title', 'Roles')
@section('content')
    @include('roles.agregarRolbtn')
    <div class="card">
        <div class="card-body">
            @include('flash-message')
            @include('roles.table')
        </div>
    </div>
@endsection
