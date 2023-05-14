     <!-- Profile Image -->
     <div class="card card-primary card-outline">
         <div class="card-body box-profile">
             <div style="height:400px">
                 <img class="mx-auto text-right h-100 border border-primary img-fluid "
                     @if ($evento->imagen != 'default') src="{{ Storage::url('eventos/' . $evento->imagen) }}"
                                                                @else src="{{ asset('assets/img/product.png') }}" @endif
                     alt="Eventos profile picture" />
             </div>

             <h3 class="pt-3 profile-username text-center">{{ $evento->titulo }}</h3>


             <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                     <b>ID:</b> <a class="float-right">{{ $evento->id }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Titulo:</b> <a class="float-right">{{ $evento->titulo }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Descripcion Corta</b> <a class="float-right">{{ $evento->descripcionCorta }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Descripcion Larga</b> <a class="float-right">{{ $evento->descripcion}}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Dia</b> <a class="float-right">{{ $evento->dia }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Mes</b> <a class="float-right">{{ $evento->mes }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Activo</b> <a class="float-right">{{ $evento->activo == 1 ? 'Si':'No'  }}</a>
                 </li>
             </ul>
         </div>
         <!-- /.card-body -->
     </div>
