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
        'telefone',
        'data_nascimento',
        'genero',
        'contato_emergencia',
        'estado_civil',
    ];

    public function consultas(){
        return $this->hasMany(Consulta::class);
    }

}
