@extends('layouts.appDashboard')
@section('title', 'Fotos')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($foto, [
                'route' => ['fotos.update', $foto->id],
                'method' => 'patch',
                'files' => true,
                'id' => 'myform',
            ]) !!}
            <div class="row">
                @method('put')
                @include('flash-message')
                @include('fotos.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
