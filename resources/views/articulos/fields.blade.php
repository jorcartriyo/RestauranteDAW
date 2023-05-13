 @csrf
 <!--      Wizard container        -->
 <div class="card card-wizard active" data-color="rose" id="wizardProfile">
     <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
     <div class="card-header">
         <h2 class="text-center">
             Actualiza el Artículo
         </h2>
     </div>

     <div class="card-body">
         <div class="tab-content">
             <div class="tab-pane active" id="about">
                 <div class="row justify-content-center">
                     <div class="col-sm-4">
                         <div class="picture-container">
                             <div>
                                 <img @if ($articulo->imagen != 'default') src="{{ asset('storage/images/articulos/' . $articulo->imagen) }}"
                                 @else src="{{ asset('assets/img/product.png') }}" @endif
                                 name="imgUsu" id="imgUsu" class="picture-src" title="avatar" alt='img' />
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
                                 <img src="{{ asset('images/product.png') }}" alt="Articulo">
                             </span>
                         </div>
                         <div class="form-group">
                             <label for="articulo" class="bmd-label-floating">Artículo
                                 (required)</label>
                             {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                         </div>
                     </div>
                 </div>
             </div>
             {{-- Descripción --}}
             <div class="col-lg-18">
                 <div class="input-group form-control-lg">
                     <div class="input-group-prepend">
                         <span class="input-group-text">
                             <i class="material-icons">description</i>
                         </span>
                     </div>
                     <div class="form-group">
                         <label for="descripcion">Descripción del artículo</label>
                         {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'style'=>'resize: both;', 'rows'=>"10"]) !!}
                     </div>
                 </div>
             </div>
         </div>

         {{-- Categoria --}}
         <div class="col-lg-18">
             <div class="input-group form-control-lg">
                 <div class="input-group-prepend">
                     <span class="input-group-text">
                         <img class="material-icons" src="{{ asset('images/categoria.png') }}" alt="Categoria">
                     </span>
                 </div>
                 <label for="categoria" class="bmd-label-floating"> Categoria
                     (requerido)</label>

                 <div class="form-group ml-5">

                     <select id="categoria" name="categoria">

                         @foreach($categorias as $cat)
                         <option value={{$cat->id}} {{$cat->categoria==$categoria->categoria ? 'selected':'false'}}>{{$cat->categoria}}</option>
                         @endforeach

                     </select>
                 </div>
             </div>
         </div>
         {{-- Precio --}}
         <div class="col-lg-18">
             <div class="input-group form-control-lg">
                 <div class="input-group-prepend">
                     <span class="input-group-text">
                         <i class="material-icons">euro</i>
                     </span>
                 </div>
                 <div class="form-group">
                     <label for="precio" class="bmd-label-floating"> Precio
                         (required)</label>
                     {!! Form::number('precio', null, ['class' => 'form-control', 'step'=>'0,01']) !!}
                 </div>
             </div>
         </div>
         {{-- Tipo--}}
         <div class="col-lg-18">
             <div class="input-group form-control-lg">
                 <div class="input-group-prepend">
                     <span class="input-group-text">
                         <i class="material-icons">restaurant_menu</i>
                     </span>
                 </div>
                 <label for="tipo" class="bmd-label-floating"> Tipo
                     (required)</label>


<!-- 
                 <div class="form-group ml-5">
                     {!! Form::checkbox('tipo', 'carta', $articulo->tipo[0]=='carta' ? true: ( $articulo->tipo=='cartamenu' ? true : false) )!!}
                     <label for="carta" class="px-2"> Carta</label><br>
                     {!! Form::checkbox('tipo', 'menu', $articulo->tipo[1]=='menu' ? true: ( $articulo->tipo=='cartamenu' ? true : false) )!!}
                     <label for="menu" class="px-2"> Menú</label><br>



                 </div> -->

            <div class="form-group ml-5">
                            <input type="checkbox" id="carta" name="tipo[]" value="carta" {{$articulo->tipo=='carta' ? 'checked': ( $articulo->tipo=='cartamenu' ? 'checked' : false)}}>
                            <label for="carta" class="px-2"> Carta</label><br>
                            <input type="checkbox" id="menu" name="tipo[]" value="menu" {{$articulo->tipo=='menu' ? 'checked': ( $articulo->tipo=='cartamenu' ? 'checked' : false)}}>
                            <label for="menu" class="px-2 mt-2"> Menú</label><br>
                        

                        </div>
             </div>
         </div>

         {{-- Activo--}}
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
                     <button type="submit" class="btn btn-primary pull-right">Actualizar Artículo</button>
                 </div>
             </div>
         </div>
     </div>