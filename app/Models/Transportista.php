<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportista extends Model
{
    protected $table = 'transportistas';
    protected $fillable = ['nombre_completo', 'documento_identificacion', 'licencia_conducir', 'carnet_cargas_peligrosas', 'poliza_seguro_accidentes_personales_art'];

}