 @extends('layouts.appDashboard')
 @section('title', 'Roles')
 @section('content')
     <div class="card">
         <div class="card-body">
             {!! Form::model($rol, [
                 'route' => ['roles.update', $rol->id],
                 'method' => 'patch',
                 'files' => true,
                 'id' => 'myform',
             ]) !!}
             <div class="row">
                 @method('put')
                 @include('flash-message')
                 @include('roles.fields')
             </div>
             {!! Form::close() !!}
         </div>
     </div>
 @endsection
