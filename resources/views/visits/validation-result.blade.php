@extends('layouts.app')

@section('content')
    <div class="container text-center">

        {{-- ICONO DE ESTADO --}}
        <div class="mb-4">

            @if ($status === 'success')
                <h1 class="text-success">✔ ACCESO AUTORIZADO</h1>
            @elseif($status === 'warning')
                <h1 class="text-warning">⚠ ATENCIÓN</h1>
            @else
                <h1 class="text-danger">✖ ACCESO DENEGADO</h1>
            @endif

        </div>

        {{-- MENSAJE --}}
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">

                <p class="mb-2">
                    <strong>Mensaje:</strong>
                    {{ $message }}
                </p>

                @isset($visita)
                    <hr>

                    <p><strong>Visitante:</strong> {{ $visita->nombre_visitante }}</p>
                    <p><strong>RUT:</strong> {{ $visita->rut ?? '-' }}</p>
                    <p><strong>Ingreso programado:</strong> {{ $visita->fecha_ingreso }}</p>

                    <p><strong>Estado actual:</strong>

                        @if ($visita->check_in_at && !$visita->check_out_at)
                            <span class="badge bg-success">Dentro</span>
                        @elseif($visita->check_out_at)
                            <span class="badge bg-secondary">Finalizada</span>
                        @else
                            <span class="badge bg-warning">Pendiente</span>
                        @endif

                    </p>
                @endisset

            </div>
        </div>

        {{-- BOTÓN VOLVER --}}
        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-primary">
                Volver
            </a>
        </div>

    </div>
@endsection
