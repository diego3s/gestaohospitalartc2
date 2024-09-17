<?
namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->string('cpf', 14); 
            $table->string('telefone', 15); 
            $table->decimal('salario', 10, 2); // até 10 digitos com 2 casas decimais
            $table->string('nome_completo'); 
            $table->timestamps(); //

            
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  //->onDelete('set null'); // Se o usuário for deletado, mantém o funcionário com user_id nulo
                  ->onDelete('cascade'); // Deleta a porra toda
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign(['user_id']); 
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('funcionarios'); 
    }
};
