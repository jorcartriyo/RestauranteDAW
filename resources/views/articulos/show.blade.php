@extends('layouts.appDashboard')
@section('title', 'Art iculos')
@section('content')
    <section class="section">
        <div class="section-header">
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('ar ticulos.show_fields')
                </div>
            </div>
        </div>
    </section>
@endsection
