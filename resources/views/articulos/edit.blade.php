@extends('layouts.appDashboard')
@section('title', 'Articulos')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($articulo, [
                'route' => ['articulos.update', $articulo->id],
                'method' => 'patch',
                'files' => true,
                'id' => 'myform',
            ]) !!}
            <div class="row">
                @method('put')
                @include('flash-message')
                @include('articulos.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
