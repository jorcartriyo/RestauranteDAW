@csrf
<!--      Wizard container        -->

<div class=" carta page_section container-fluid mx-5 px-5">

    <div class="card card-wizard active" data-color="rose" id="wizardProfile">

        <div class="card-header text-center">
            <h2 class="card-title text-capitalize display-6">
                Actualiza la pedido
            </h2>
        </div>
        <div class="card-body">
            {{-- nombre --}}
            <div class="col-lg-18">
                <div class="input-group form-control-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">face</i>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="bmd-label-floating">Nombre
                            (required)</label>
                        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            {{--  email --}}
            <div class="col-lg-18">
                <div class="input-group form-control-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">email</i>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="bmd-label-floating">Email
                            (required)</label>
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
        {{--  Telefono --}}
        <div class="col-lg-18">
            <div class="input-group form-control-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">smartphone</i>
                    </span>
                </div>
                <div class="form-group">
                    <label for="telefono" class="bmd-label-floating">Telefono
                        (required)</label>
                    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        {{-- Fecha --}}
        <div class="col-lg-18">
            <div class="input-group form-control-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">calendar_month</i>

                    </span>
                </div>
                <div class="form-group">
                    <label for="fecha_pedido" class="bmd-label-floating">Fecha de pedido
                        (required)</label>
                    <input type="datetime-local" id="res_date" name="fecha_pedido" required autofocus
                        min="{{ $min_date->format('Y-m-d\TH:i:s') }}" max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                        class="block mt-1 w-full rounded-md" value="{{ $pedido->fecha_pedido }}" />
                </div>
            </div>
        </div>
        {{-- Mesa --}}
        <div class="col-lg-18">
            <div class="input-group form-control-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">table_restaurant</i>
                    </span>
                </div>
                <div class="form-group">
                    <label for="mesa" class="bmd-label-floating"> Mesa
                        (required)</label>
                    {!! Form::number('mesa', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        {{-- Comensales --}}
        <div class="col-lg-18">
            <div class="input-group form-control-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons"> escalator_warning</i>
                    </span>
                </div>
                <div class="form-group">
                    <label for="comensales" class="bmd-label-floating"> Comensales
                        (required)</label>
                    {!! Form::number('comensales', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        {{-- Submit --}}
        <div>
            <div class="card-footer justify-content-around">
                <div class="ml-auto">
                    <button type="submit" class="btn btn-primary pull-right">Actualizar pedido</button>
                </div>
            </div>
        </div>
    </div>
</div>
