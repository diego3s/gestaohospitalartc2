<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $fillable = [
        'user_id',
        'cpf',
        'telefone',
        'salario',
        'nome_completo',
    ];

    // um funcionário pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function endereco(){
        return $this->hasOne(Endereco::class);
    }
}
