<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'cpf',
        'nome',
        'data_nascimento',
        'genero',
        'estado_civil',
    ];
}
