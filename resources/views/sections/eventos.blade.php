@if($activos)
<div class="events page_section">
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Calendario de Eventos</h1>
                </div>
            </div>
        </div>

        <div class="event_items">
            @foreach($eventos as $evento)
            @if($evento->activo)

            <!-- Event Item -->
            <div class="row event_item">
                <div class="col">
                    <div class="row d-flex flex-row align-items-end">

                        <div class="col-lg-2 order-lg-1 order-2">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day">{{$evento->dia}}</div>
                                <div class="event_month">{{$evento->mes}}</div>
                            </div>
                        </div>

                        <div class="col-lg-6 order-lg-2 order-3">
                            <div class="event_content">
                                <div class="event_name"><a class="trans_200" href="#">{{$evento->titulo}}</a></div>
                                <div class="event_location">{{$evento->descripcionCorta}}</div>
                                <p>{{$evento->descripcion}}</p>
                            </div>
                        </div>

                        <div class="col-lg-4 order-lg-3 order-1">
                            <div class="event_image">
                                <img src="{{ asset('images/event_1.jpg') }}"
                                    alt="https://unsplash.com/@theunsteady5">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endif