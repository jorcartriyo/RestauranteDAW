@extends('layouts.appDashboard')
@section('title', 'Articulos')
@section('content')
    <section class="section">
        <div class="section-header">
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('articulos.show_fields')
                </div>
            </div>
        </div>
    </section>
@endsection
