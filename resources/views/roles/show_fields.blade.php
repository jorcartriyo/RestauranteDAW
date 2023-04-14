     <!-- Profile Image -->
     <div class="card card-primary card-outline">
         <div class="card-body box-profile">
             <div style="height:400px">
                 <img class="mx-auto text-right h-100 border border-primary img-fluid img-circle rounded-circle"
                     src="{{ asset('assets/img/default-avatar.png') }}" alt="User profile picture" />
             </div>

             <h3 class="pt-3 profile-username text-center">{{ $rol->name }}</h3>


             <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                     <b>ID:</b> <a class="float-right">{{ $rol->id }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Nombre del Rol:</b> <a class="float-right">{{ $rol->name }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Creado</b> <a class="float-right">{{ $rol->created_at }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Actualizado</b> <a class="float-right">{{ $rol->updated_at }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Permisos: </b>
                     @foreach ($rol->permisos as $permiso)
                 <li type="square" class="ml-5 pl-5">{{ $permiso->name }}</li>
                 @endforeach
                 </li>
             </ul>
         </div>
         <!-- /.card-body -->
     </div>
