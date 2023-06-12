 @csrf
 <!--      Wizard container        -->
 <div class="card card-wizard active" data-color="rose" id="wizardProfile">

     <div class="card-header">
         <h2 class="text-center">
             Actualiza la Mesa
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
         {{-- estado --}}
         <div class="col-lg-18">
             <div class="input-group form-control-lg">
                 <div class="input-group-prepend">
                     <span class="input-group-text">
                         <i class="fa fa-section" aria-hidden="true"></i>
                 </div>
                 <label for="estado" class="bmd-label-floating">Estado (requerido)</label>
                 <div class="form-group  ml-5">
                     <select id="estado" name="estado" require>
                         <option value="disponible" {{ $mesa->estado == 'disponible' ? 'selected' : 'false' }}>Disponible
                         </option>
                         <option value="pendiente" {{ $mesa->estado == 'pendiente' ? 'selected' : 'false' }}>Pendiente
                         </option>
                         <option value="reservada" {{ $mesa->estado == 'reservada' ? 'selected' : 'false' }}>Reservada
                         </option>
                     </select>
                 </div>
             </div>
         </div>
     </div>
     {{-- Submit --}}
     <div>
         <div class="card-footer justify-content-around">
             <div class="ml-auto">
                 <button type="submit" class="btn btn-primary pull-right">Actualizar Mesa</button>
             </div>
         </div>
     </div>
 </div>
 </div>
