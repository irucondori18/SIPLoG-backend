<?php

namespace App\Http\Controllers;

use App\Models\Transporte;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    public function index()
    {
        $transportes = Transporte::all(); // trae todos los registros
        return response()->json($transportes);
    }

    public function store(Request $request)
    {

        $titulo = null;
        $rtv = null;
        $poliza_seguro = null;

        if ($request->hasFile('titulo')) {
            $titulo = $request->file('titulo')->store('titulos', 'public');
        }

        if ($request->hasFile('rtv')) {
            $rtv = $request->file('rtv')->store('rtvs', 'public');
        }

        if ($request->hasFile('poliza_seguro')) {
            $poliza_seguro = $request->file('poliza_seguro')->store('polizas', 'public');
        }

        // Creación
        $transporte = Transporte::create([
            // 'descripcion' => $request->descripcion,
            'patente' => $request->patente,
            'modelo' => $request->modelo,
            'marca' => $request->marca,
            'acoplado' => $request->acoplado,
            'titulo' => $titulo,
            'rtv' => $rtv,
            'poliza_seguro' => $poliza_seguro,
        ]);

        return response()->json([
            'message' => 'Transporte creado correctamente',
            'data' => $transporte
        ], 201);
    }
}
