     <!-- Profile Image -->
     <div class="card card-primary card-outline">
         <div class="card-body box-profile">
             <div style="height:400px">
                 <img class="mx-auto text-right h-100 border border-primary img-fluid "
                     @if ($articulo->imagen != 'default') src="{{ Storage::url('articulos/' . $articulo->imagen) }}"
                                                                @else src="{{ asset('assets/img/product.png') }}" @endif
                     alt="Articulos profile picture" />
             </div>

             <h3 class="pt-3 profile-username text-center">{{ $articulo->nombre }}</h3>


             <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                     <b>ID:</b> <a class="float-right">{{ $articulo->id }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Nombre:</b> <a class="float-right">{{ $articulo->nombre }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Descripcion</b> <a class="float-right">{{ $articulo->descripcion }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Categoria</b> <a class="float-right">{{ $articulo->categorias->categoria }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Precio</b> <a class="float-right">{{ $articulo->precio }}€</a>
                 </li>
                 <li class="list-group-item">
                     <b>Tipo</b> <a
                         class="float-right">{{ $articulo->tipo == 'cartamenu' ? 'Carta, Menu' : ucfirst($articulo->tipo) }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Activo</b> <a class="float-right">{{ $articulo->activo == 1 ? 'Si' : 'No' }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Recomendasdo</b> <a class="float-right">{{ $articulo->recomendado == 1 ? 'Si' : 'No' }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Agotado</b> <a class="float-right">{{ $articulo->agotado == 1 ? 'Si' : 'No' }}</a>
                 </li>
             </ul>
         </div>
         <!-- /.card-body -->
     </div>
