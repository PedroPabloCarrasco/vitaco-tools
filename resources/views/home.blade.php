@extends('layouts.app')

@section('title', 'Vitaco Tools')

@section('content')

    <div class="text-center mb-5">
        <h1 class="fw-bold">Herramientas gratuitas para comunidades</h1>

        <p class="lead">
            Simplifica la administración de condominios y comunidades.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">

                    <h2>📢</h2>

                    <h5>Comunicado Express</h5>

                    <p>
                        Genera comunicados profesionales en segundos.
                    </p>

                    <a href="/tools/comunicado-express" class="btn btn-primary">
                        Abrir
                    </a>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">

                    <h2>🚗</h2>

                    <h5>QR Visitas</h5>

                    <p>
                        Próximamente.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">

                    <h2>📝</h2>

                    <h5>Actas IA</h5>

                    <p>
                        Próximamente.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">

                    <h2>📄</h2>

                    <h5>Carteles</h5>

                    <p>
                        Próximamente.
                    </p>

                </div>
            </div>
        </div>

    </div>

@endsection
