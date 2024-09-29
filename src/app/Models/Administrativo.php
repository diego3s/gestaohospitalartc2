<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;

    protected $table = 'administrativos';

    protected $fillable = [
        'funcionario_id',
        'cpf',
        'cbo',
    ];

    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}
