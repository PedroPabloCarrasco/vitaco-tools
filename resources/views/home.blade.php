@extends('layouts.app')

@section('title', 'Vitaco Tools')

@section('content')

    <div class="text-center mb-5">
        <h1 class="fw-bold">Herramientas gratuitas para comunidades</h1>

        <p class="lead">
            Simplifica la administración de condominios y comunidades con herramientas rápidas y eficientes.
        </p>
    </div>

    <div class="row g-4">

        {{-- COMUNICADO EXPRESS --}}
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">

                    <h2>📢</h2>

                    <h5>Comunicado Express</h5>

                    <p>Genera comunicados profesionales en segundos.</p>

                    <a href="{{ route('tools.comunicado') }}" class="btn btn-primary">
                        Abrir
                    </a>

                </div>
            </div>
        </div>

        {{-- QR VISITAS (YA ACTIVO) --}}
        <div class="col-md-3">
            <div class="card shadow-sm h-100 border-success">
                <div class="card-body text-center">

                    <h2>🚪</h2>

                    <h5>Control de Visitas</h5>

                    <p>Sistema QR para ingreso de visitantes en tiempo real.</p>

                    <a href="{{ route('visits.index') }}" class="btn btn-success">
                        Abrir
                    </a>

                </div>
            </div>
        </div>

        {{-- ACTAS IA --}}
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">

                    <h2>📝</h2>

                    <h5>Actas IA</h5>

                    <p>Generación automática de actas (en desarrollo).</p>

                    <button class="btn btn-secondary" disabled>
                        Próximamente
                    </button>

                </div>
            </div>
        </div>

        {{-- CARTELES --}}
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">

                    <h2>📄</h2>

                    <h5>Carteles</h5>

                    <p>Creación rápida de señalética para comunidades.</p>

                    <button class="btn btn-secondary" disabled>
                        Próximamente
                    </button>

                </div>
            </div>
        </div>

    </div>

    {{-- SECCIÓN EXTRA: ESTADO DEL SISTEMA --}}
    <div class="mt-5 p-4 bg-light rounded">

        <h5 class="fw-bold">Estado del sistema</h5>

        <ul class="mb-0">
            <li>✔ Comunicado Express activo</li>
            <li>✔ Control de Visitas (QR) activo</li>
            <li>⏳ Actas IA en desarrollo</li>
            <li>⏳ Carteles en desarrollo</li>
        </ul>

    </div>

@endsection
