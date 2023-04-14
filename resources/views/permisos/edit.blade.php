@extends('layouts.appDashboard')
@section('title', 'User')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($permiso, [
                'route' => ['permisos.update', $permiso->id],
                'method' => 'patch',
                'files' => true,
                'id' => 'myform',
            ]) !!}
            <div class="row">
                @method('put')
                @include('flash-message')
                @include('permisos.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
