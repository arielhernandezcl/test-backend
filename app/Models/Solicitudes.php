<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    protected $fillable = [
        'nomSoli',
        'apellSoli1',
        'apellSoli2' ,
        'numSoli',
        'email',
        'tituloVC',
        'descripVC',
        'lugarVC',
        'alimentacion',
        'tipoSoli',
        'fechaSoli',
        'statusSoli',
    ];

    public $timestamps=false;
}