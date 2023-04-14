 @csrf
 <!--      Wizard container        -->
 <div class="card card-wizard active" data-color="rose" id="wizardProfile">
     <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
     <div class="card-header">
         <h2 class="text-center">
             Actualiza el Perfil
         </h2>
     </div>
     {{--    Imagen Avatar --}}
     <div class="card-body">
         <div class="tab-content">
             <div class="tab-pane active" id="about">
                 <div class="row justify-content-center">
                     <div class="col-sm-4">
                         <div class="picture-container">
                             <div class="picture">
                                 <img @if ($articulo->imagen != 'default') src="{{ Storage::url('avatar/' . $articulo->imagen) }}"
                                    @else       src="{{ asset('assets/img/default-avatar.png') }}" @endif
                                     name="imgUsu" id="imgUsu" class="picture-src" title="avatar" alt='img' />
                                 <input type="file" id="file" name="file" onchange="mostrarImagen(event)">
                             </div>
                             <h6 class="description">Elige un avatar</h6>
                         </div>
                     </div>
                 </div>
                 {{--        Usuario --}}
                 <div class="col-lg-18">
                     <div class="input-group form-control-lg">
                         <div class="input-group-prepend">
                             <span class="input-group-text">
                                 <i class="material-icons">face</i>
                             </span>
                         </div>
                         <div class="form-group">
                             <label for="name" class="bmd-label-floating">Usuario
                                 (required)</label>
                             {!! Form::text('name', null, ['class' => 'form-control']) !!}
                         </div>
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
         {{--  Roles --}}
         <div class="col-lg-18">
             <div class="text-center">
                 <h3>Asigna los Roles</h3>
             </div>
             <select class="duallistbox" multiple="multiple" name="rol[]">
                 @foreach ($articulo->categoria as $categorias)
                     <option selected="">{{ $categorias->name }}</option>
                 @endforeach

         
             </select>
             <span id="mensaje"></span>
         </div>
     </div>

     {{-- Submit --}}
     <div>
         <div class="card-footer justify-content-around">
             <div class="ml-auto">
                 <button type="submit" class="btn btn-primary pull-right">Actualizar Usuario</button>
             </div>
         </div>
     </div>
 </div>
