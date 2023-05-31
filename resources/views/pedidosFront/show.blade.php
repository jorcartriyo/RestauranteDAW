@extends('layouts.app')
@section('title', 'pedidos')
@section('content')
    <section class="section">
        <div class="section-header">
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('pedidosFront.show_fields')
                </div>
            </div>
        </div>
    </section>
@endsection
