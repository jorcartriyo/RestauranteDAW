 @csrf
 <!--      Wizard container        -->
 <div class="card card-wizard active" data-color="rose" id="wizardProfile">
     <div class="card-header">
         <h2 class="text-center">
             Actualiza el Evento
         </h2>
     </div>

     <div class="card-body">
         <div class="tab-content">
             <div class="tab-pane active" id="about">
                 <div class="row justify-content-center">
                     <div class="col-sm-4">
                         <div class="picture-container">
                             <div>
                                 <img @if ($evento->imagen != 'default') src="{{ asset('storage/images/eventos/' . $evento->imagen) }}"
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
                 {{-- Titulo --}}
                 <div class="col-lg-18">
                     <div class="input-group form-control-lg">
                         <div class="input-group-prepend">
                             <span class="input-group-text">
                                 <i class="fa fa-calendar" aria-hidden="true"></i> </span>
                         </div>
                         <div class="form-group">
                             <label for="titulo" class="bmd-label-floating">Titulo
                                 (required)</label>
                             {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
                         </div>
                     </div>
                 </div>
             </div>
             {{-- Descripción Corta --}}
             <div class="col-lg-18">
                 <div class="input-group form-control-lg">
                     <div class="input-group-prepend">
                         <span class="input-group-text">
                             <i class="material-icons">description</i>
                         </span>
                     </div>
                     <div class="form-group">
                         <label for="descripcion">Descripción corta del evento</label>
                         {!! Form::textarea('descripcionCorta', null, [
                             'class' => 'form-control',
                             'style' => 'resize: both;',
                             'rows' => '3',
                         ]) !!}
                     </div>
                 </div>
             </div>
         </div>

         {{-- Descripcion larga --}}
         <div class="col-lg-18">
             <div class="input-group form-control-lg">
                 <div class="input-group-prepend">
                     <span class="input-group-text">
                         <i class="material-icons">description</i>
                     </span>
                 </div>
                 <div class="form-group">
                     <label for="descripcion">Descripción larga del evento</label>
                     {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'style' => 'resize: both;', 'rows' => '10']) !!}
                 </div>
             </div>
         </div>
     </div>

     {{-- Dia --}}
     <div class="col-lg-18">
         <div class="input-group form-control-lg">
             <div class="input-group-prepend">
                 <span class="input-group-text">
                     <i class="fa fa-calendar" aria-hidden="true"></i>
                 </span>
             </div>
             <div class="form-group">
                 <label for="precio" class="bmd-label-floating"> Dia
                 </label>
                 {!! Form::number('dia', null, ['class' => 'form-control', 'min' => 0, 'max' => 31]) !!}
             </div>
         </div>
     </div>
     {{-- Mes --}}
     <div class="col-lg-18">
         <div class="input-group form-control-lg">
             <div class="input-group-prepend">
                 <span class="input-group-text">
                     <i class="fa fa-calendar" aria-hidden="true"></i>
                 </span>
             </div>
             <div class="form-group">
                 <label for="eventos" class="bmd-label-floating">Mes
                     (required)</label>
                 {!! Form::text('mes', null, ['class' => 'form-control']) !!}
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
                 (required)</label>
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
                 <button type="submit" class="btn btn-primary pull-right">Actualizar Evento</button>
             </div>
         </div>
     </div>
 </div>
