@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Nueva Visita</h2>

            <a href="{{ route('visits.index') }}" class="btn btn-outline-secondary btn-sm">
                ← Volver
            </a>
        </div>

        {{-- ALERTA DE ERRORES --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Corrige los siguientes errores:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <form action="{{ route('visits.store') }}" method="POST" class="card shadow-sm">
            @csrf

            <div class="card-body">

                <div class="row">

                    {{-- Nombre --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombre del visitante *</label>
                        <input type="text" name="nombre_visitante" class="form-control"
                            value="{{ old('nombre_visitante') }}" required>
                    </div>

                    {{-- RUT --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">RUT</label>
                        <input type="text" name="rut" class="form-control" value="{{ old('rut') }}">
                    </div>

                    {{-- Teléfono --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
                    </div>

                    {{-- Fecha ingreso --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha y hora de ingreso *</label>
                        <input type="datetime-local" name="fecha_ingreso" class="form-control"
                            value="{{ old('fecha_ingreso') }}" required>
                    </div>

                    {{-- Motivo --}}
                    <div class="col-12 mb-3">
                        <label class="form-label">Motivo de visita</label>
                        <textarea name="motivo" class="form-control" rows="3">{{ old('motivo') }}</textarea>
                    </div>

                    {{-- Fecha salida --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha y hora de salida</label>
                        <input type="datetime-local" name="fecha_salida" class="form-control"
                            value="{{ old('fecha_salida') }}">
                    </div>

                </div>

            </div>

            <div class="card-footer d-flex justify-content-end gap-2">
                <a href="{{ route('visits.index') }}" class="btn btn-light">
                    Cancelar
                </a>

                <button type="submit" class="btn btn-primary">
                    Generar Visita + QR
                </button>
            </div>

        </form>

    </div>
@endsection
