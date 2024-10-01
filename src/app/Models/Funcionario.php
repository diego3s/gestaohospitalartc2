<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $fillable = [
        'user_id',
        'nome',
        'telefone',
        'salario',
    ];

    // um funcionário pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function endereco(){
        return $this->hasOne(Endereco::class);
    }

    public function medico(){
        return $this->hasOne(Medico::class);
    }

    public function laboratorista(){
        return $this->hasOne(Laboratorista::class);
    }

    public function enfermeiro(){
        return $this->hasOne(Enfermeiro::class);
    }

    public function administrativo(){
        return $this->hasOne(Administrativo::class);
    }

    public function recepcionista(){
        return $this->hasOne(Recepcionista::class);
    }
    
}
