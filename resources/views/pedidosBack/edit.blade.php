@extends('layouts.app')
@section('title', 'pedidos')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($pedido, [
                'route' => ['front.update', $pedido->id],
                'method' => 'patch',
                'files' => true,
                'id' => 'myform',
            ]) !!}
            <div class="row">
                @method('put')
                @include('flash-message')
                @include('pedidosBack.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
