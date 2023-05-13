@extends('layouts.appDashboard')
@section('title', 'Editar Categoria')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($categoria, [
                'route' => ['categorias.update', $categoria->id],
                'method' => 'patch',
                'files' => true,
                'id' => 'myform',
            ]) !!}
            <div class="row">
                @method('put')
                @include('flash-message')
                @include('categorias.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
