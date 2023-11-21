<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiposVolCamp extends Model
{
    use HasFactory;

    protected $table = 'tiposVolCamp';

    protected $fillable = [
        'nombreTipo',
    ];

    public $timestamps = false;
}
