 @csrf
 <!--      Wizard container        -->
 <div class="card card-wizard active" data-color="rose" id="wizardProfile">
     <div class="card-header">
         <h2 class="text-center">
             Actualiza la Foto
         </h2>
     </div>

     <div class="card-body">
         <div class="tab-content">
             <div class="tab-pane active" id="about">
                 <div class="row justify-content-center">
                     <div class="col-sm-4">
                         <div class="picture-container">
                             <div>
                                 <img @if ($foto->imagen != 'default') src="{{ asset('storage/images/fotos/' . $foto->imagen) }}"
                                 @else src="{{ asset('assets/img/product.png') }}" @endif
                                     name="imgUsu" id="imgUsu" class="picture-src" title="avatar" alt='img' />
                                 <br>
                                 <input type="file" id="file" name="file" onchange="mostrarImagen(event)">
                             </div>
                             <br>
                             <h6 class="description">Elige una imagen</h6>
                         </div>
                     </div>
                 </div>
                 {{-- Seccion --}}
                 <div class="col-lg-18">
                     <div class="input-group form-control-lg">
                         <div class="input-group-prepend">
                             <span class="input-group-text">
                                 <i class="fa fa-section" aria-hidden="true"></i>
                         </div>
                         <label for="seccion" class="bmd-label-floating">Seccion (requerido)</label>
                         <div class="form-group  ml-5">
                             <select id="seccion" name="seccion" require>
                                 <option value="inicio" {{ $foto->seccion == 'inicio' ? 'selected' : 'false' }}>Inicio
                                 </option>
                                 <option value="carta" {{ $foto->seccion == 'carta' ? 'selected' : 'false' }}>Carta
                                 </option>
                                 <option value="menu" {{ $foto->seccion == 'menu' ? 'selected' : 'false' }}>Menu
                                 </option>
                             </select>
                         </div>
                     </div>
                 </div>
             </div>
             {{-- Texto 1 --}}
             <div class="col-lg-18">
                 <div class="input-group form-control-lg">
                     <div class="input-group-prepend">
                         <span class="input-group-text">
                             <i class="material-icons">description</i>
                         </span>
                     </div>
                     <div class="form-group">
                         <label for="texto1">Texto 1</label>
                         {!! Form::text('texto1', null, ['class' => 'form-control']) !!}
                     </div>
                 </div>
             </div>
         </div>

         {{-- Texto 2 --}}
         <div class="col-lg-18">
             <div class="input-group form-control-lg">
                 <div class="input-group-prepend">
                     <span class="input-group-text">
                         <i class="material-icons">description</i>
                     </span>
                 </div>
                 <div class="form-group">
                     <label for="texto2">Texto 2</label>
                     {!! Form::text('texto2', null, ['class' => 'form-control']) !!}
                 </div>
             </div>
         </div>
     </div>
     {{-- Texto 3 --}}
     <div class="col-lg-18">
         <div class="input-group form-control-lg">
             <div class="input-group-prepend">
                 <span class="input-group-text">
                     <i class="material-icons">description</i>
                 </span>
             </div>
             <div class="form-group">
                 <label for="texto1">Texto 3</label>
                 {!! Form::text('texto3', null, ['class' => 'form-control']) !!}
             </div>
         </div>
     </div>


     {{-- Activo --}}
     <div class="col-lg-18">
         <div class="input-group form-control-lg">
             <div class="input-group-prepend">
                 <span class="input-group-text">
                     <i class="material-icons">fact_check</i>
                 </span>
             </div>
             <label for="activo" class="bmd-label-floating"> Activo
                 (requerido)</label>
             <div class="form-group ml-5">
                 {!! Form::radio('activo', 1) !!}
                 <label class="px-2" for="si">Si</label><br>
                 {!! Form::radio('activo', 0) !!}
                 <label class="px-2 mt-2" for="no">No</label><br>
             </div>
         </div>
     </div>
     {{-- Submit --}}
     <div>
         <div class="card-footer justify-content-around">
             <div class="ml-auto">
                 <button type="submit" class="btn btn-primary pull-right">Actualizar foto</button>
             </div>
         </div>
     </div>
 </div>
