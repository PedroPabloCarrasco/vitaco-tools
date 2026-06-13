@extends('layouts.app')

@section('title', 'Comunicado Express')

@section('content')

    <div class="row">

        <!-- FORMULARIO -->
        <div class="col-lg-5">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h4 class="mb-0">
                        📢 Comunicado Express
                    </h4>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('tools.comunicado.preview') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Tipo de comunicado
                            </label>

                            <select class="form-select" name="tipo">

                                <option value="Corte de agua"
                                    {{ ($data['tipo'] ?? '') == 'Corte de agua' ? 'selected' : '' }}>
                                    Corte de agua
                                </option>

                                <option value="Corte de luz"
                                    {{ ($data['tipo'] ?? '') == 'Corte de luz' ? 'selected' : '' }}>
                                    Corte de luz
                                </option>

                                <option value="Mantención" {{ ($data['tipo'] ?? '') == 'Mantención' ? 'selected' : '' }}>
                                    Mantención
                                </option>

                                <option value="Asamblea" {{ ($data['tipo'] ?? '') == 'Asamblea' ? 'selected' : '' }}>
                                    Asamblea
                                </option>

                                <option value="Seguridad" {{ ($data['tipo'] ?? '') == 'Seguridad' ? 'selected' : '' }}>
                                    Seguridad
                                </option>

                                <option value="Personalizado"
                                    {{ ($data['tipo'] ?? '') == 'Personalizado' ? 'selected' : '' }}>
                                    Personalizado
                                </option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Fecha
                            </label>

                            <input type="date" class="form-control" name="fecha" value="{{ $data['fecha'] ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Hora
                            </label>

                            <input type="time" class="form-control" name="hora" value="{{ $data['hora'] ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Título
                            </label>

                            <input type="text" class="form-control" name="titulo" value="{{ $data['titulo'] ?? '' }}"
                                placeholder="Ej: Corte programado de agua">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Mensaje
                            </label>

                            <textarea class="form-control" rows="6" name="mensaje" placeholder="Ingrese el detalle del comunicado">{{ $data['mensaje'] ?? '' }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Generar Comunicado
                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- VISTA PREVIA -->
        <div class="col-lg-7">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h4 class="mb-0">
                        Vista previa
                    </h4>
                </div>

                <div class="card-body">

                    <div class="border rounded p-4 bg-white">

                        <div class="text-center mb-4">

                            <h2 class="fw-bold">
                                COMUNICADO
                            </h2>

                            <p class="text-muted">
                                Generado con Vitaco Tools
                            </p>

                        </div>

                        <div class="mb-3">
                            <span class="badge bg-primary">
                                {{ $data['tipo'] ?? 'Tipo de comunicado' }}
                            </span>
                        </div>

                        <h4 class="fw-bold">
                            {{ $data['titulo'] ?? 'Título del comunicado' }}
                        </h4>

                        <hr>

                        <p>
                            Estimados residentes:
                        </p>

                        <p>
                            {{ $data['mensaje'] ?? 'Aquí aparecerá el mensaje del comunicado.' }}
                        </p>

                        <p>
                            <strong>Fecha:</strong>
                            {{ $data['fecha'] ?? '--/--/----' }}
                        </p>

                        <p>
                            <strong>Hora:</strong>
                            {{ $data['hora'] ?? '--:--' }}
                        </p>

                        <br>

                        <p>
                            Atentamente,
                        </p>

                        <p>
                            <strong>Administración</strong>
                        </p>

                    </div>

                    <div class="mt-4 d-flex gap-2">

                        <form method="POST" action="{{ route('tools.comunicado.pdf') }}">

                            @csrf

                            <input type="hidden" name="tipo" value="{{ $data['tipo'] ?? '' }}">

                            <input type="hidden" name="fecha" value="{{ $data['fecha'] ?? '' }}">

                            <input type="hidden" name="hora" value="{{ $data['hora'] ?? '' }}">

                            <input type="hidden" name="titulo" value="{{ $data['titulo'] ?? '' }}">

                            <input type="hidden" name="mensaje" value="{{ $data['mensaje'] ?? '' }}">

                            <button type="submit" class="btn btn-success">
                                Descargar PDF
                            </button>

                        </form>

                        <button type="button" class="btn btn-secondary">
                            Descargar Imagen
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
