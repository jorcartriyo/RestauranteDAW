@extends('layouts.appDashboard')
@section('title', 'User')
@section('content')
    <section class="section">
        <div class="section-header">
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('roles.show_fields')
                </div>
            </div>
        </div>
    </section>
@endsection
