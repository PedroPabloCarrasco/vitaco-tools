@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Gestión de Visitas QR</h2>

            {{-- FIX: visits.create (no visitas.create) --}}
            <a href="{{ route('visits.create') }}" class="btn btn-primary">
                + Nueva Visita
            </a>
        </div>

        {{-- Mensajes --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabla --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Visitante</th>
                        <th>RUT</th>
                        <th>Ingreso</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($visits as $visit)
                        <tr>
                            <td>{{ $visit->id }}</td>

                            <td>{{ $visit->nombre_visitante }}</td>

                            <td>{{ $visit->rut ?? '-' }}</td>

                            <td>{{ $visit->fecha_ingreso }}</td>

                            {{-- Estado lógico --}}
                            <td>
                                @if ($visit->check_in_at && !$visit->check_out_at)
                                    <span class="badge bg-success">Dentro</span>
                                @elseif($visit->check_out_at)
                                    <span class="badge bg-secondary">Finalizada</span>
                                @else
                                    <span class="badge bg-warning">Pendiente</span>
                                @endif
                            </td>

                            {{-- Acciones --}}
                            <td class="d-flex gap-1">

                                {{-- Ver detalle --}}
                                <a href="{{ route('visits.show', $visit->id) }}" class="btn btn-sm btn-info">
                                    Ver
                                </a>

                                {{-- EDIT: solo si existe la ruta --}}
                                @if (Route::has('visits.edit'))
                                    <a href="{{ route('visits.edit', $visit->id) }}" class="btn btn-sm btn-warning">
                                        Editar
                                    </a>
                                @endif

                                {{-- QR (solo si existe la ruta) --}}
                                @if (Route::has('visits.qr'))
                                    <a href="{{ route('visits.qr', $visit->id) }}" class="btn btn-sm btn-success">
                                        QR
                                    </a>
                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No hay visitas registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
@endsection
