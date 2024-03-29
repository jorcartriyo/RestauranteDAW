@if ($recomendados)

    <div class="page_section">
        <div class="container">
            <div class="section_title text-center">
                <h1>Platos Recomendados</h1>
            </div>
            <div class="row course_boxes d-flex flex-row align-items-center justify-content-between">
                @foreach ($articulos as $articulo)
                    @if ($articulo->recomendado && $articulo->activo)
                        <!-- Popular Course Item -->
                        <div class="col-lg-4  mb-5">
                            <div class="card">
                                <img  @if ($articulo->imagen != 'default') src="{{ asset('storage/images/articulos/' . $articulo->imagen) }}"
                                @else src="{{ asset('assets/img/product.png') }}" @endif
                                    alt="https://unsplash.com/@kellybrito">
                                   
                                <div class="card-body text-center">
                                    <div class="card-title"><a>{{ $articulo->nombre }}</a></div>
                                    <br>
                                    <div class="card-text">{{ $articulo->descripcion }}</div>
                                </div>
                                <div class="price_box d-flex flex-row align-items-center">
                                    <div class="course_author_name">Precio</div>
                                    <div
                                        class="course_price d-flex p-2 flex-column align-items-center justify-content-center">
                                        <span>{{ $articulo->agotado == 1 ? 'Agotado' : ($articulo->precio != 0 ? $articulo->precio . '€' : 'Menu') }}</span>
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
