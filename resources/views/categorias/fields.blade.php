 @csrf
 <!--      Wizard container        -->
 <div class="card card-wizard active" data-color="rose" id="wizardProfile">
     <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
     <div class="card-header">
         <h2 class="text-center">
             Actualiza la Categoria
         </h2>
     </div>
     <div class="card-body">
         <div class="tab-content">
             <div class="tab-pane active" id="about">
                 <div class="row justify-content-center">
                     <div class="col-sm-4">
                         <div class="picture-container">
                             <div>
                                 <img @if ($categoria->imagen != 'default') src="{{ asset('storage/images/categorias/' . $categoria->imagen) }}"
                                 @else src="{{ asset('assets/img/product.png') }}" @endif
                                 name="imgCategorias" id="imgUsu" class="picture-src" title="imgCategorias" alt='imgCategorias' />
                                 </br>
                                 <input type="file" id="file" name="file" onchange="mostrarImagen(event)">
                             </div>
                             <h6 class="description">Elige una imagen</h6>
                         </div>
                     </div>
                 </div>
                 {{-- nombre --}}
                 <div class="col-lg-18">
                     <div class="input-group form-control-lg">
                         <div class="input-group-prepend">
                             <span class="input-group-text">
                                 <img src="{{ asset('images/product.png') }}" alt="Categoria">
                             </span>
                         </div>
                         <div class="form-group">
                             <label for="articulo" class="bmd-label-floating">Categoria
                                 (required)</label>
                             {!! Form::text('categoria', null, ['class' => 'form-control']) !!}
                         </div>
                     </div>
                 </div>
             </div>
             {{-- Submit --}}
             <div>
                 <div class="card-footer justify-content-around">
                     <div class="ml-auto">
                         <button type="submit" class="btn btn-primary pull-right">Actualizar Categoria</button>
                     </div>
                 </div>
             </div>
         </div>