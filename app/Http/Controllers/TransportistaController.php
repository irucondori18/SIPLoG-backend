<?php

namespace App\Http\Controllers;

use App\Models\Transportista;
use Illuminate\Http\Request;

class TransportistaController extends Controller
{
    public function index()
    {
        $transportistas = Transportista::all(); // trae todos los registros
        return response()->json($transportistas);
    }

    public function store(Request $request)
    {
        $pathLicencia = null;
        $pathCarnet = null;
        $pathPoliza = null;

        // 1️⃣ Guardar licencia
        if ($request->hasFile('licencia_conducir')) {
            $pathLicencia = $request->file('licencia_conducir')
                                ->store('licencias', 'public');
        }

        // 2️⃣ Guardar carnet cargas peligrosas
        if ($request->hasFile('carnet_cargas_peligrosas')) {
            $pathCarnet = $request->file('carnet_cargas_peligrosas')
                                ->store('carnets', 'public');
        }

        // 3️⃣ Guardar póliza ART
        if ($request->hasFile('poliza_seguro_accidentes_personales_art')) {
            $pathPoliza = $request->file('poliza_seguro_accidentes_personales_art')
                                ->store('polizas', 'public');
        }

        // Crear registro
        $transportista = Transportista::create([
            'nombre_completo' => $request->nombre_completo,
            'documento_identificacion' => $request->documento_identificacion,
            'licencia_conducir' => $pathLicencia,
            'carnet_cargas_peligrosas' => $pathCarnet,
            'poliza_seguro_accidentes_personales_art' => $pathPoliza
        ]);

        return response()->json([
            'message' => 'Transportista creado correctamente',
            'data' => $transportista
        ], 201);
    }

}
