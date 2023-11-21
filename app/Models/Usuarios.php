<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Usuarios extends Model
{
    
    use HasApiTokens, HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apell1',
        'apell2' ,
        'cedula',
        'numero',
        'ocupacion',
        'email',
        'password',
        'status',
    ];

    public $timestamps = false;
}
