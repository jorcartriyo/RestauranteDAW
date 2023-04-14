 @csrf
 <!--      Wizard container        -->
 <div class="card card-wizard active" data-color="rose" id="wizardProfile">
     <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
     <div class="card-header">
         <h2 class="text-center">
             Actualiza el Permiso
         </h2>
     </div>
     <div class="card-body">
         <div class="tab-content">
             <div class="tab-pane active" id="about">

                 {{--        permiso --}}
                 <div class="col-lg-18">
                     <div class="input-group form-control-lg">
                         <div class="input-group-prepend">
                             <span class="input-group-text">
                                 <i class="material-icons">lock</i>
                             </span>
                         </div>
                         <div class="form-group">
                             <label for="name" class="bmd-label-floating">Permiso
                                 (required)</label>
                             {!! Form::text('name', null, ['class' => 'form-control']) !!}
                         </div>
                     </div>
                 </div>
             </div>
             {{--  Roles --}}
             <div class="col-lg-18">
                 <div class="text-center">
                     <h3>Asigna a los Roles</h3>
                 </div>
                 <div>
                     <span>Roles existentes
                     </span> <span class="float-right">Roles a asignar</span>
                 </div>
                 <select class="duallistbox" multiple="multiple" name="roles[]" id="roles">
                     @foreach ($permiso->roles as $rol)
                         <option selected="">{{ $rol->name }}</option>
                     @endforeach

                     @foreach ($roles as $rol)
                         @if (!in_array($rol->name, $permisosRol['name']))
                             <option>{{ $rol->name }}</option>
                         @endif
                     @endforeach
                 </select>
             </div>
         </div>
         {{-- Submit --}}
         <div>
             <div class="card-footer justify-content-around">
                 <div class="ml-auto">
                     <button type="submit" class="btn btn-primary pull-right">Actualizar Permiso</button>
                 </div>
             </div>
         </div>
     </div>
