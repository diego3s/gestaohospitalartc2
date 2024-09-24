<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AReceber extends Model
{
    use HasFactory;

    protected $table = 'a_receber';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'valor',
        'cobrador',
    ];
}
