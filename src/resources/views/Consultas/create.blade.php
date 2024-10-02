@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registrar Nova Consulta</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('consultas.store') }}" method="POST">
            @csrf
            
            <label for="medico_id">Selecione o médico:</label>
        
            <select id="medico_id" name="consulta[medico_id]" class="form-control" required>
                <option value="">Selecione um médico</option>
                    @foreach($medicos as $medico)
                        <option value="{{ $medico->id }}">
                            CRM: {{ $medico->crm }}
                        </option>
                    @endforeach
            </select>

            <label for="paciente_id">Selecione o paciente:</label>
    <select id="paciente_id" name="consulta[paciente_id]" class="form-control" required>
        <option value="">Selecione um paciente</option>
        @foreach($pacientes as $paciente)
            <option value="{{ $paciente->id }}">
                {{ $paciente->nome }}
            </option>
        @endforeach
    </select>

            <div class="form-group">
                <label for="devedor">Descricao</label>
                <input type="text" class="form-control" name="consulta[descricao]" value="{{ old('devedor') }}" required>
            </div>

            <div class="form-group">
                <label for="devedor">Data</label>
                <input type="text" class="form-control" name="consulta[data_consulta]" value="{{ old('devedor') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Cadastrar Consulta</button>
        </form>
    </div>
@endsection