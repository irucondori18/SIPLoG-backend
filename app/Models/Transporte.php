<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $table = 'transportes';
    protected $fillable = ['patente', 'modelo', 'marca', 'acoplado', 'titulo', 'rtv', 'poliza_seguro'];

}