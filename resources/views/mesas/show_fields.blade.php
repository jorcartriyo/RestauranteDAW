     <!-- Profile Image -->
     <div class="card card-primary card-outline">
         <div class="card-body box-profile">         

             <h3 class="pt-3 profile-username text-center">{{ $mesa->nombre }}</h3>


             <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                     <b>ID:</b> <a class="float-right">{{ $mesa->id }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Nombre:</b> <a class="float-right">{{ $mesa->nombre }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Comensales</b> <a class="float-right">{{ $mesa->comensales }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Estado</b> <a class="float-right">{{ $mesa->estado }}</a>
                 </li>                            
             </ul>
         </div>
         <!-- /.card-body -->
     </div>
