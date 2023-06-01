@extends('layouts.appDashboard')
@section('title', 'Pedidos')
@section('content')
    <section class="section">
        <div class="section-header">
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('flash-message')
                    @include('pedidosBack.show_fields')
                </div>
            </div>
        </div>
    </section>
@endsection
