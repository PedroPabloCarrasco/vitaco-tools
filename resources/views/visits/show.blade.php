@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Detalle de Visita #{{ $visit->id }}</h2>

            <a href="{{ route('visits.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>

        <div class="row">

            {{-- DATOS PRINCIPALES --}}
            <div class="col-md-6">

                <div class="card mb-3">
                    <div class="card-header">
                        Información del visitante
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $visit->nombre_visitante }}</p>
                        <p><strong>RUT:</strong> {{ $visit->rut ?? '-' }}</p>
                        <p><strong>Teléfono:</strong> {{ $visit->telefono ?? '-' }}</p>
                        <p><strong>Motivo:</strong> {{ $visit->motivo ?? '-' }}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Control de acceso
                    </div>

                    <div class="card-body">

                        <p><strong>Ingreso programado:</strong>
                            {{ $visit->fecha_ingreso }}
                        </p>

                        <p><strong>Salida programada:</strong>
                            {{ $visit->fecha_salida ?? 'No definida' }}
                        </p>

                        <p><strong>Check-in:</strong>
                            {{ $visit->check_in_at ?? 'No registrado' }}
                        </p>

                        <p><strong>Check-out:</strong>
                            {{ $visit->check_out_at ?? 'No registrado' }}
                        </p>

                        {{-- Estado --}}
                        <p class="mt-2">
                            <strong>Estado:</strong>

                            @if ($visit->check_in_at && !$visit->check_out_at)
                                <span class="badge bg-success">Dentro</span>
                            @elseif($visit->check_out_at)
                                <span class="badge bg-secondary">Finalizada</span>
                            @else
                                <span class="badge bg-warning">Pendiente</span>
                            @endif
                        </p>

                    </div>
                </div>

            </div>

            {{-- QR + ACCIONES --}}
            <div class="col-md-6">

                <div class="card mb-3">
                    <div class="card-header">
                        Código QR
                    </div>

                    <div class="card-body text-center">

                        {{-- QR generado desde token --}}
                        {!! QrCode::size(200)->generate(url('/visits/validate/' . $visit->token)) !!}

                        <p class="mt-3">
                            <small>Escaneo para validar acceso del visitante</small>
                        </p>

                    </div>
                </div>

                {{-- ACCIONES --}}
                <div class="card">
                    <div class="card-header">
                        Acciones
                    </div>

                    <div class="card-body d-grid gap-2">

                        <a href="{{ route('visits.index') }}" class="btn btn-secondary">
                            Volver al listado
                        </a>

                        {{-- FUTURO: editar --}}
                        {{-- <a href="{{ route('visits.edit', $visit->id) }}" class="btn btn-warning">
                        Editar visita
                    </a> --}}

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
