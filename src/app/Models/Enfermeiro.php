<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermeiro extends Model
{
    use HasFactory;

    protected $table = 'enfermeiros';

    protected $fillable = [
        'funcionario_id',
        'cpf',
        'coren',
    ];

    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}
