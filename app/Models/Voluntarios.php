<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntarios extends Model
{
    use HasFactory;

    protected $table = 'voluntarios';

    protected $primaryKey = 'idVoluntario';

    protected $fillable = [
        'Nombre',
        'Apellido1',
        'Apellido2',
        'AñoIngreso',
        'Carrera',
    ];
}
