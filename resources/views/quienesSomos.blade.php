@extends('layouts.app')
@section('title', 'Quienes Somos')
@section('content')
    <div class="contact">
        <div class="container-fluid mt-5">
            <div class="row">
                @include('flash-message')
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h2>NUESTRO EQUIPO</h2>
                        <h3>Contamos con un equipo de profesionales tanto en el servicio como en la cocina.
                            Nuestro objetivo es que se sienta como en su propia casa, con un trato cercano y
                            una comida placentera.
                        </h3>


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h2>NUESTRO LOCAL</h2>
                        <h3>Disponemos de un local acogedor en el centro de Dúrcal, con aparcamiento cercano.
                            Nuestro objetivo es que tanto la iluminación como la temperatura ambiente sea de su
                            agrado para que su experiencia sea inolvidable.

                        </h3>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form">
                        <h2>CONTACTANOS</h2>
                        <form method="POST" id="myform" enctype="multipart/form-data"
                            action="{{ route('contactanos.store') }}">
                            @method('POST')
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre" placeholder="Tu nombre" />
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Tu Email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="titulo" placeholder="Título" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="mensaje" placeholder="Mensaje"></textarea>
                            </div>
                            <div><button class="btn" type="submit">Enviar Mensaje</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d389.8326882522594!2d-3.5659827880722483!3d36.98788953865687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses!2ses!4v1685992479328!5m2!1ses!2ses"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sections.footer')
@endsection
