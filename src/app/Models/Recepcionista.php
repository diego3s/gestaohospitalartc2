<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepcionista extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    protected $fillable = [
        'funcionario_id',
        'cpf',
    ];

    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}
