@extends('layouts.appDashboard')
@section('title', 'Eventos')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($evento, [
                'route' => ['eventos.update', $evento->id],
                'method' => 'patch',
                'files' => true,
                'id' => 'myform',
            ]) !!}
            <div class="row">
                @method('put')
                @include('flash-message')
                @include('eventos.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
