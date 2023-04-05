@extends('layouts.appDashboard')
@section('title', 'User')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($user, [
                'route' => ['home.update', $user->id],
                'method' => 'patch',
                'files' => true,
                'id' => 'myform',
            ]) !!}
            <div class="row">
                @method('put')
                @include('flash-message')
                @include('users.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
