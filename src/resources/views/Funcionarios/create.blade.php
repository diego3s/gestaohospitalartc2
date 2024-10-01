<!-- resources/views/funcionarios/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        
        <h1>Cadastrar Novo Funcionário</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('funcionarios.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome_completo">Nome</label>
                <input type="text" class="form-control" name="funcionario[nome]" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="funcionario[telefone]" value="{{ old('telefone') }}">
            </div>

            <div class="form-group">
                <label for="salario">Salário</label>
                <input type="number" step="0.01" class="form-control" name="funcionario[salario]" value="{{ old('salario') }}" >
            </div>

            <div class="form-group">
                <label for="cargo">Cargo</label>
                <select class="form-control" id="cargo" name="usuario[cargo]" onchange="mostrarFormulario()" required>
                    <option value="" disabled selected>Selecione o cargo</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Enfermeiro">Enfermeiro</option>
                    <option value="Laboratorista">Laboratorista</option>
                    <option value="Medico">Médico</option>
                    <option value="Recepcionista">Recepcionista</option>                    
                </select>
            </div>

            <h3>Dados de Login do Funcionário</h3>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="usuario[email]" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="usuario[password]" required>
            </div>

            <h3>Dados de Cargo do Funcionario</h3>

            <!-- Formulário para Médico -->
    <div id="form-medico" class="form-cargo" style="display: none;">
        <label for="nome">CPF:</label>
        <input type="text" name="medico[cpf]" class="form-control" >

        <label for="crm">CRM:</label>
        <input type="text" name="medico[crm]" class="form-control" >

        <label for="especializacao">Especialização:</label>
        <input type="text" name="medico[especializacao]" class="form-control" >
    </div>

    <!-- Formulário para Enfermeiro -->
    <div id="form-enfermeiro" class="form-cargo" style="display: none;">
        <label for="nome">CPF:</label>
        <input type="text" name="enfermeiro[cpf]" class="form-control" >

        <label for="coren">COREN:</label>
        <input type="text" name="enfermeiro[coren]" id="coren" class="form-control" >
    </div>

    <!-- Formulário para Laboratorista -->
    <div id="form-laboratorista" class="form-cargo" style="display: none;">
        <label for="nome">CPF:</label>
        <input type="text" name="laboratorista[cpf]" class="form-control" >

        <label for="cbo">CBO:</label>
        <input type="text" name="laboratorista[cbo]" class="form-control" id="cbo" >
    </div>

    <!-- Formulário para Administrativo -->
    <div id="form-administrativo" class="form-cargo" style="display: none;">
        <label for="nome">CPF:</label>
        <input type="text" name="administrativo[cpf]" class="form-control" >

        <label for="cbo">CBO:</label>
        <input type="text" name="administrativo[cbo]" class="form-control" id="cbo" >
    </div>

    <!-- Formulário para Recepcionista -->
    <div id="form-recepcionista" class="form-cargo" style="display: none;">
        <label for="nome">CPF:</label>
        <input type="text" name="recepcionista[cpf]" class="form-control" >
    </div>

            <button type="submit" class="btn btn-success">Cadastrar Funcionário</button>
        </form>
    </div>
    <script>
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


