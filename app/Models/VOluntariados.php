<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class VOluntariados extends Model
{
    
    use HasFactory;

    protected $table = 'voluntariados';

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion' ,
        'fecha',
        'alimentacion',
        'capacidad',
        'tipo',
        'inOex',
    ];

    public $timestamps=false;
}