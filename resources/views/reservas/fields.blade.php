 @csrf
 <!--      Wizard container        -->
 <div class="card card-wizard active" data-color="rose" id="wizardProfile">

     <div class="card-header">
         <h2 class="text-center">
             Actualiza la Reserva
         </h2>
     </div>
     <div class="card-body">
         {{-- nombre --}}
         <div class="col-lg-18">
             <div class="input-group form-control-lg">
                 <div class="input-group-prepend">
                     <span class="input-group-text">
                         <i class="material-icons">table_restaurant</i>
                     </span>
                 </div>
                 <div class="form-group">
                     <label for="nombre" class="bmd-label-floating">Nombre
                         (required)</label>
                     {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                 </div>
             </div>
         </div>

         {{--  email --}}
         <div class="col-lg-18">
             <div class="input-group form-control-lg">
                 <div class="input-group-prepend">
                     <span class="input-group-text">
                         <i class="material-icons">email</i>
                     </span>
                 </div>
                 <div class="form-group">
                     <label for="email" class="bmd-label-floating">Email
                         (required)</label>
                     {!! Form::email('email', null, ['class' => 'form-control']) !!}
                 </div>
             </div>
         </div>
     </div>
     {{--  Telefono --}}
     <div class="col-lg-18">
         <div class="input-group form-control-lg">
             <div class="input-group-prepend">
                 <span class="input-group-text">
                     <i class="material-icons">smartphone</i>
                 </span>
             </div>
             <div class="form-group">
                 <label for="telefono" class="bmd-label-floating">Telefono
                     (required)</label>
                 {!! Form::tel('telefono', null, ['class' => 'form-control']) !!}
             </div>
         </div>
     </div>

     {{-- Fecha --}}
     <div class="col-lg-18">
         <div class="input-group form-control-lg">
             <div class="input-group-prepend">
                 <span class="input-group-text">
                     <i class="material-icons">calendar_month</i>

                 </span>
             </div>
             <div class="form-group">
                 <label for="fecha_reserva" class="bmd-label-floating">Fecha de Reserva
                     (required)</label>
                 {!! Form::date('fecha_reserva => date("Y-m-d")';, null, ['class' => 'form-control']) !!}
             </div>
         </div>
     </div>
     {{-- Mesa --}}
     <div class="col-lg-18">
         <div class="input-group form-control-lg">
             <div class="input-group-prepend">
                 <span class="input-group-text">
                     <i class="material-icons">table_restaurant</i>
                 </span>
             </div>
             <div class="form-group">
                 <label for="mesa" class="bmd-label-floating"> Mesa
                     (required)</label>
                 {!! Form::number('mesa', null, ['class' => 'form-control']) !!}
             </div>
         </div>
     </div>

     {{-- Comensales --}}
     <div class="col-lg-18">
         <div class="input-group form-control-lg">
             <div class="input-group-prepend">
                 <span class="input-group-text">
                     <i class="material-icons"> escalator_warning</i>
                 </span>
             </div>
             <div class="form-group">
                 <label for="comensales" class="bmd-label-floating"> Comensales
                     (required)</label>
                 {!! Form::number('comensales', null, ['class' => 'form-control']) !!}
             </div>
         </div>
     </div>
     {{-- Submit --}}
     <div>


         <div class="card-footer justify-content-around">
             <div class="ml-auto">
                 <button type="submit" class="btn btn-primary pull-right">Actualizar Reserva</button>
             </div>
         </div>
     </div>
 </div>
