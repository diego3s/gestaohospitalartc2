<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pacientes', function (Blueprint $table) {
        $table->id();  
        $table->string('cpf', 11);//->unique();  
        $table->string('nome');
        $table->date('data_nascimento')->nullable(); 
        $table->string('genero'); // enum('genero', ['masculino', 'feminino', 'outro']);
        $table->string('estado_civil')->nullable();  
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('pacientes');
}
};
