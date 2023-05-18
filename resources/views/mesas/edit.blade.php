@extends('layouts.appDashboard')
@section('title', 'Mesas')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($mesa, [
                'route' => ['mesas.update', $mesa->id],
                'method' => 'patch',
                'files' => true,
                'id' => 'myform',
            ]) !!}
            <div class="row">
                @method('put')
                @include('flash-message')
                @include('mesas.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
