<div class="content pt-6 mx-5">
    <div class="container-fluid pt-5 mt-5 mx-5">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">

                <h3 class="pt-3 display-6 text-uppercase text-center">{{ $pedido->nombre }}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Nombre:</b> <a class="float-right">{{ $pedido->nombre }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email:</b> <a class="float-right">{{ $pedido->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Telefono:</b> <a class="float-right">{{ $pedido->telefono }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Fecha:</b> <a
                            class="float-right">{{ \Carbon\Carbon::create($pedido->fecha_pedido)->format('d-m-Y H:i') }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Mesa:</b> <a class="float-right">{{ $pedido->mesas->nombre }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Comensales</b> <a class="float-right">{{ $pedido->comensales }}</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
