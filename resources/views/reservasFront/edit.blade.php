@extends('layouts.app')
@section('title', 'Reservas')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($reserva, [
                'route' => ['front.update', $reserva->id],
                'method' => 'patch',
                'files' => true,
                'id' => 'myform',
            ]) !!}
            <div class="row">
                @method('put')
                @include('flash-message')
                @include('reservasFront.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
