<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Desativar restrições de chaves estrangeiras
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Usuários
        $user1 = DB::table('users')->insertGetId([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
            'cargo' => 'medico',
        ]);

        $user2 = DB::table('users')->insertGetId([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password123'),
            'cargo' => 'enfermeiro',
        ]);

        // Funcionários
        $funcionario1 = DB::table('funcionarios')->insertGetId([
            'user_id' => $user1,
            'nome' => 'John Doe',
            'telefone' => '123456789',
            'salario' => 5000,
        ]);

        $funcionario2 = DB::table('funcionarios')->insertGetId([
            'user_id' => $user2,
            'nome' => 'Jane Smith',
            'telefone' => '987654321',
            'salario' => 4500,
        ]);

        // Médicos
        $medico1 = DB::table('medicos')->insertGetId([
            'funcionario_id' => $funcionario1,
            'cpf' => '123.456.789-00',
            'crm' => 'CRM12345',
            'especializacao' => 'Cardiologista',
            'isDiretor' => true,
        ]);

        // Enfermeiros
        $enfermeiro1 = DB::table('enfermeiros')->insertGetId([
            'funcionario_id' => $funcionario2,
            'cpf' => '987.654.321-00',
            'coren' => 'COREN54321',
        ]);

        // Pacientes
        $paciente1 = DB::table('pacientes')->insertGetId([
            'cpf' => '123.456.789-00',
            'nome' => 'Maria Silva',
            'telefone' => '111222333',
            'data_nascimento' => '1985-06-15',
            'genero' => 'Feminino',
            'contato_emergencia' => 'Jose Silva',
            'estado_civil' => 'Casado',
        ]);

        $paciente2 = DB::table('pacientes')->insertGetId([
            'cpf' => '987.654.321-00',
            'nome' => 'Paulo Souza',
            'telefone' => '444555666',
            'data_nascimento' => '1990-02-25',
            'genero' => 'Masculino',
            'contato_emergencia' => 'Ana Souza',
            'estado_civil' => 'Solteiro',
        ]);

        // Dívidas
        DB::table('dividas')->insert([
            ['valor' => 2000, 'cobrador' => 'Banco ABC'],
            ['valor' => 500, 'cobrador' => 'Loja XYZ'],
        ]);

        // Cobranças
        DB::table('cobrancas')->insert([
            ['valor' => 1500, 'devedor' => 'Maria Silva'],
            ['valor' => 300, 'devedor' => 'Paulo Souza'],
        ]);

        // Laboratoristas
        DB::table('laboratoristas')->insert([
            'funcionario_id' => $funcionario1, // Relacionado ao funcionário criado acima
            'cpf' => '123.456.789-12',
            'cbo' => 'CBO123',
        ]);

        // Administrativos
        DB::table('administrativos')->insert([
            'funcionario_id' => $funcionario2, // Relacionado ao funcionário criado acima
            'cpf' => '123.456.789-13',
            'cbo' => 'CBO456',
        ]);

        // Recepcionistas
        DB::table('recepcionistas')->insert([
            'funcionario_id' => $funcionario1, // Relacionado ao funcionário criado acima
            'cpf' => '123.456.789-14',
        ]);

        // Consultas
        DB::table('consultas')->insert([
            [
                'medico_id' => $medico1,
                'paciente_id' => $paciente1,
                'data_consulta' => '2024-10-10 09:00:00',
                'descricao' => 'Consulta de rotina',
            ],
            [
                'medico_id' => $medico1,
                'paciente_id' => $paciente2,
                'data_consulta' => '2024-10-11 10:00:00',
                'descricao' => 'Exame de rotina',
            ]
        ]);

        // Reativar restrições de chaves estrangeiras
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
