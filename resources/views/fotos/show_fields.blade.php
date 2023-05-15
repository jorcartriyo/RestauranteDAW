     <!-- Profile Image -->
     <div class="card card-primary card-outline">
         <div class="card-body box-profile">
             <div style="height:400px">
                 <img class="mx-auto text-right h-100 border border-primary img-fluid "
                     @if ($foto->imagen != 'default') src="{{ asset('storage/images/fotos/' . $foto->imagen) }}"
                                                        @else src="{{ asset('assets/img/product.png') }}" @endif
                     alt="{{ $foto->imagen }}" alt="fotos profile picture">

             </div>

             <h3 class="pt-3 profile-username text-center">{{ $foto->titulo }}</h3>


             <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                     <b>ID:</b> <a class="float-right">{{ $foto->id }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Seccion:</b> <a class="float-right">{{ $foto->seccion }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Texto 1</b> <a class="float-right">{{ $foto->texto1 }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Texto 2</b> <a class="float-right">{{ $foto->texto2 }}</a>
                 </li> +
                 <li class="list-group-item">
                     <b>Texto 3</b> <a class="float-right">{{ $foto->texto3 }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Activo</b> <a class="float-right">{{ $foto->activo == 1 ? 'Si' : 'No' }}</a>
                 </li>
             </ul>
         </div>
         <!-- /.card-body -->
     </div>
