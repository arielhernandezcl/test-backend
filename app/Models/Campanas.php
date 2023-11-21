<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Campanas extends Model
{
    
    use HasApiTokens, HasFactory;

    protected $table = 'campañas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion' ,
        'fecha',
        'alimentacion',
        'capacidad',
        'tipo',
        'galeria',
        'inOex',
    ];

    public $timestamps = false;
}