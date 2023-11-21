<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservaciones extends Model
{
    use HasFactory;

    protected $table = 'Reservaciones';

    protected $fillable = [
        'nombreVis',
        'apell1Vis',
        'apell2Vis' ,
        'cedulaVis',
        'fechaReserva',
        'Cupo',
        'TelefonoVis',
        'email',
        'status',
    ];
    public $timestamps = false;
}
