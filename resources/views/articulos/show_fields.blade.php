     <!-- Profile Image -->
     <div class="card card-primary card-outline">
         <div class="card-body box-profile">
             <div style="height:400px">
                 <img class="mx-auto text-right h-100 border border-primary img-fluid img-circle rounded-circle"
                     @if ($articulo->imagen != 'default') src="{{ Storage::url('articulos/' . $articulo->imagen) }}"
                                                                @else src="{{ asset('assets/img/default-avatar.png') }}" @endif
                     alt="Articulos profile picture" />
             </div>

             <h3 class="pt-3 profile-username text-center">{{ $articulo->name }}</h3>


             <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                     <b>ID:</b> <a class="float-right">{{ $articulo->id }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Nombre:</b> <a class="float-right">{{ $articulo->name }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Email</b> <a class="float-right">{{ $articulo->email }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Roles: </b>
                     @foreach ($articulo->categoria as $categorias)
                 <li type="square" class="ml-5 pl-5">{{ $categoria->name }}</li>
                 @endforeach


                 </li>
             </ul>
         </div>
         <!-- /.card-body -->
     </div>
