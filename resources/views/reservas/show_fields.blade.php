     <!-- Profile Image -->
     <div class="card card-primary card-outline">
         <div class="card-body box-profile">

             <h3 class="pt-3 profile-username text-center">{{ $reserva->nombre }}</h3>


             <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                     <b>ID:</b> <a class="float-right">{{ $reserva->id }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Nombre:</b> <a class="float-right">{{ $reserva->nombre }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Email:</b> <a class="float-right">{{ $reserva->email }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Telefono:</b> <a class="float-right">{{ $reserva->telefono }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Fecha:</b> <a class="float-right">{{ $reserva->fecha_reserva }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Mesa:</b> <a class="float-right">{{ $reserva->mesas->nombre }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Comensales</b> <a class="float-right">{{ $reserva->comensales }}</a>
                 </li>
             </ul>
         </div>
         <!-- /.card-body -->
     </div>
