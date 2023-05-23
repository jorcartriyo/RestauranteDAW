
@if ($activas)
    <div class="home">

        <!-- Hero Slider -->
        <div class="hero_slider_container">
            <div class="hero_slider owl-carousel">
                @foreach ($fotos as $foto)
                    @if ($foto->activo)
                        <!-- Hero Slide -->
                        <div class="hero_slide">
                            <div class="hero_slide_background"
                                style="background-image:url(storage/images/fotos/{{ $foto->imagen }})">
                            </div>
                            @if ($foto->texto1 || $foto->texto2 || $foto->texto3)
                                <div class="hero_slide_container">
                                    <div class="hero_slide_content text-center">
                                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                                            {{ $foto->texto1 }}
                                            @if ($foto->texto2)
                                                <span>{{ $foto->texto2 }}</span>
                                                @if ($foto->texto3)
                                                    {{ $foto->texto3 }}
                                                @endif
                                            @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
            <div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
        </div>
    </div>
@endif
