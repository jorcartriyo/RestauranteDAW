@extends('layouts.app')
@section('title', 'Quienes Somos')
@section('content')
    <div class="container m-5 p-5">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2922.5936786073403!2d-3.5593776396227135!3d36.97818946747998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses!2ses!4v1684014304820!5m2!1ses!2ses"
            width="500" height="400" style="border:2;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    @include('sections.footer')
@endsection
