 @csrf
 <!--      Wizard container        -->
 <div class="card card-wizard active" data-color="rose" id="wizardProfile">
     <div class="card-header">
         <h2 class="text-center">
             Actualiza el Rol
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
                             <label for="name" class="bmd-label-floating">Rol
                                 (required)</label>
                             {!! Form::text('name', null, ['class' => 'form-control']) !!}
                         </div>
                     </div>
                 </div>
             </div>
             {{--  Roles --}}
             <div class="col-lg-18">
                 <div class="text-center">
                     <h3>Asigna los Permisos</h3>
                 </div>
                 <div>
                     <span>Permisos existentes
                     </span> <span class="float-right">Permisos a asignar</span>
                 </div>
                 <select class="duallistbox" multiple="multiple" name="permisos[]" id="permisos">
                     @foreach ($rol->permisos as $permiso)
                         <option selected="">{{ $permiso->name }}</option>
                     @endforeach
                     @foreach ($permisos as $permiso)
                         @if (!in_array($permiso->name, $rolPermisos['name']))
                             <option>{{ $permiso->name }}</option>
                         @endif
                     @endforeach
                 </select>
             </div>
         </div>
         {{-- Submit --}}
         <div>
             <div class="card-footer justify-content-around">
                 <div class="ml-auto">
                     <button type="submit" class="btn btn-primary pull-right">Actualizar Roles</button>
                 </div>
             </div>
         </div>
     </div>
