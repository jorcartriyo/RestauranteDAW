     <!-- Profile Image -->
     <div class="card card-primary card-outline">
         <div class="card-body box-profile">
             <div style="height:400px">
                 <img class="mx-auto text-right h-100 border border-primary img-fluid "
                     @if ($categoria->imagen != 'default') src="{{ Storage::url('categorias/' . $categoria->imagen) }}"
                 @else src="{{ asset('assets/img/product.png') }}" @endif
                     alt="Categorias profile picture" />
             </div>

             <h3 class="pt-3 profile-username text-center">{{ $categoria->categoria }}</h3>


             <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                     <b>ID:</b> <a class="float-right">{{ $categoria->id }}</a>
                 </li>
                 <li class="list-group-item">
                     <b>Nombre:</b> <a class="float-right">{{ $categoria->categoria }}</a>
                 </li>
             </ul>
         </div>
         <!-- /.card-body -->
     </div>
