@extends('layouts.appDashboard')
@section('title', config('app.name') ? ' - ' . config('app.name') : '')

@section('content')
    @include('telescope::layout')
@endsection
