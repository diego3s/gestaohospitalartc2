<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('crm')->nullable();
            $table->string('especializacao')->nullable();
            $table->integer('isDiretor')->nullable();
            $table->timestamps();

            $table->foreign('funcionario_id')->references('id')
            ->on('funcionarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
        
    }
};
