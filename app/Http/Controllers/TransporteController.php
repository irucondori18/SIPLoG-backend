<?php

use App\Models\Transporte;

class TransporteController extends Controller
{
    public function index()
    {
        $transportes = Transporte::all(); // trae todos los registros
        return response()->json($transportes);
    }
}
