@extends('layouts.appDashboard')
@section('title', 'Reservas')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($reserva, [
                'route' => ['reservas.update', $reserva->id],
                'method' => 'patch',
                'files' => true,
                'id' => 'myform',
            ]) !!}
            <div class="row">
                @method('put')
                @include('flash-message')
                @include('reservas.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
