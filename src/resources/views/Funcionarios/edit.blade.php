<!-- resources/views/funcionarios/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Funcionário</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome_completo">Nome</label>
                <input type="text" class="form-control" name="funcionario[nome]" value="{{ old('nome', $funcionario->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="funcionario[telefone]" value="{{ old('telefone', $funcionario->telefone) }}">
            </div>

            <div class="form-group">
                <label for="salario">Salário</label>
                <input type="number" step="0.01" class="form-control" name="funcionario[salario]" value="{{ old('salario', $funcionario->salario) }}" >
            </div>

            <div class="form-group">
                <label for="cargo">Cargo</label>
                <select class="form-control" id="cargo" name="usuario[cargo]" onchange="mostrarFormulario()" value="{{ old('cargo', $funcionario->user->cargo) }}" required>
                    <option value="Administrativo" {{ $funcionario->user->cargo == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                    <option value="Enfermeiro" {{ $funcionario->user->cargo == 'Enfermeiro' ? 'selected' : '' }}>Enfermeiro</option>
                    <option value="Laboratorista" {{ $funcionario->user->cargo == 'Laboratorista' ? 'selected' : '' }}>Laboratorista</option>
                    <option value="Medico" {{ $funcionario->user->cargo == 'Medico' ? 'selected' : '' }}>Médico</option>
                    <option value="Recepcionista" {{ $funcionario->user->cargo == 'Recepcionista' ? 'selected' : '' }}>Recepcionista</option>  
                </select>
            </div>

            <!-- Informações de Usuário -->
            <h3>Dados de Login do Funcionário</h3>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="usuario[email]" value="{{ old('email', $funcionario->user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="usuario[password]" required>
            </div>

            <h3>Dados de Cargo do Funcionario</h3>

    <div id="form-medico" class="form-cargo" style="display: none;">
        <label for="nome">CPF:</label>
        <input type="text" name="medico[cpf]" value="{{ $funcionario->medico->cpf ?? '' }}" class="form-control" >

        <label for="crm">CRM:</label>
        <input type="text" name="medico[crm]" value="{{ $funcionario->medico->crm ?? ''}}"  class="form-control" >

        <label for="especializacao">Especialização:</label>
        <input type="text" name="medico[especializacao]" value="{{ $funcionario->medico->especializacao ?? ''}}" class="form-control" >
    </div>

    <div id="form-enfermeiro" class="form-cargo" style="display: none;">
        <label for="nome">CPF:</label>
        <input type="text" name="enfermeiro[cpf]" value="{{ $funcionario->enfermeiro->cpf ?? ''}}" class="form-control" >

        <label for="coren">COREN:</label>
        <input type="text" name="enfermeiro[coren]" id="coren" value="{{ $funcionario->enfermeiro->coren ?? ''}}" class="form-control" >
    </div>

    <div id="form-laboratorista" class="form-cargo" style="display: none;">
        <label for="nome">CPF:</label>
        <input type="text" name="laboratorista[cpf]" value="{{ $funcionario->laboratorista->cpf ?? ''}}" class="form-control" >

        <label for="cbo">CBO:</label>
        <input type="text" name="laboratorista[cbo]" value="{{ $funcionario->laboratorista->cbo ?? ''}}" class="form-control" id="cbo" >
    </div>

    
    <div id="form-administrativo" class="form-cargo" style="display: none;">
        <label for="nome">CPF:</label>
        <input type="text" name="administrativo[cpf]" value="{{ $funcionario->administrativo->cpf ?? ''}}" class="form-control" >

        <label for="cbo">CBO:</label>
        <input type="text" name="administrativo[cbo]" class="form-control" value="{{ $funcionario->administrativo->cbo ?? ''}}" id="cbo" >
    </div>

    
    <div id="form-recepcionista" class="form-cargo" style="display: none;">
        <label for="nome">CPF:</label>
        <input type="text" name="recepcionista[cpf]" value="{{ $funcionario->recepcionista->cpf ?? ''}}" class="form-control" >
    </div>

            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </form>
    </div>

    <script>

document.addEventListener('DOMContentLoaded', function() {
        mostrarFormulario();
    });

        function mostrarFormulario() {
            // Esconde todos os formulários primeiro
            document.querySelectorAll('.form-cargo').forEach(function (form) {
                form.style.display = 'none';
            });
    
            // Pega o valor do select
            var cargoSelecionado = document.getElementById('cargo').value;
            
            // Exibe o formulário correspondente ao cargo
            if (cargoSelecionado === 'Medico') {
                document.getElementById('form-medico').style.display = 'block';
            } else if (cargoSelecionado === 'Enfermeiro') {
                document.getElementById('form-enfermeiro').style.display = 'block';
            } else if (cargoSelecionado === 'Laboratorista') {
                document.getElementById('form-laboratorista').style.display = 'block';
            } else if (cargoSelecionado === 'Administrativo') {
                document.getElementById('form-administrativo').style.display = 'block';
            } else if (cargoSelecionado === 'Recepcionista') {
                document.getElementById('form-recepcionista').style.display = 'block';
            }
        }
    </script>
@endsection
