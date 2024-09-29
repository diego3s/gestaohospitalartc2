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
        Schema::create('enfermeiros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->string('cpf', 11);
            $table->string('coren');
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
        Schema::dropIfExists('enfermeiros');
        Schema::table('enfermeiros', function (Blueprint $table){
            $table->dropForeign(['funcionario_id']);
            $table->dropColumn('funcionario_id');
        });
    }
};
