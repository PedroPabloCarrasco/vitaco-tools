<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::latest()->get();
        return view('visits.index', compact('visits'));
    }

    public function create()
    {
        return view('visits.create');
    }

    public function store(Request $request)
    {
        // VALIDACIÓN (ALINEADA CON TU FORMULARIO)
        $request->validate([
            'nombre_visitante' => 'required|string|max:255',
            'rut'              => 'nullable|string|max:20',
            'telefono'         => 'nullable|string|max:20',
            'motivo'           => 'nullable|string|max:500',
            'fecha_ingreso'    => 'required|date',
            'fecha_salida'     => 'nullable|date',
        ], [
            'nombre_visitante.required' => 'El nombre del visitante es obligatorio',
            'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria',
        ]);

        // CREACIÓN VISITA
        $visit = Visit::create([
            'nombre_visitante' => $request->nombre_visitante,
            'rut'              => $request->rut,
            'telefono'         => $request->telefono,
            'motivo'           => $request->motivo,
            'fecha_ingreso'    => $request->fecha_ingreso,
            'fecha_salida'     => $request->fecha_salida,

            // SISTEMA QR
            'token'        => Str::uuid(),
            'status'       => 'active',
            'valid_from'   => now(),
            'valid_until'  => now()->addHours(12),
        ]);

        return redirect()
            ->route('visits.show', $visit->id)
            ->with('success', 'Visita creada correctamente');
    }

    public function show($id)
    {
        $visit = Visit::findOrFail($id);

        $qr = QrCode::size(300)->generate(
            url('/visits/validate/' . $visit->token)
        );

        return view('visits.show', compact('visit', 'qr'));
    }

    public function validateVisit($token)
    {
        $visit = Visit::where('token', $token)->first();

        if (!$visit) {
            return view('visits.validation-result', [
                'status' => 'error',
                'message' => 'Visita no encontrada'
            ]);
        }

        if ($visit->status !== 'active') {
            return view('visits.validation-result', [
                'status' => 'warning',
                'message' => 'Esta visita ya fue usada o invalidada',
                'visit' => $visit
            ]);
        }

        if (now()->greaterThan($visit->valid_until)) {
            $visit->update(['status' => 'expired']);

            return view('visits.validation-result', [
                'status' => 'error',
                'message' => 'La visita ha expirado',
                'visit' => $visit
            ]);
        }

        // CHECK-IN AUTOMÁTICO
        $visit->update([
            'status' => 'used',
            'check_in_at' => now()
        ]);

        return view('visits.validation-result', [
            'status' => 'success',
            'message' => 'Acceso autorizado',
            'visit' => $visit
        ]);
    }
}
