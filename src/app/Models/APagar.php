<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APagar extends Model
{
    use HasFactory;

    protected $table = 'a_pagar';

    protected $fillable = [
        'valor',
        'devedor',
    ];
}
