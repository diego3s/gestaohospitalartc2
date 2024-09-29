<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    protected $fillable = [
        'funcionario_id',
        'cpf',
        'crm',
        'especializacao',
        'isDiretor'
    ];

    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}
