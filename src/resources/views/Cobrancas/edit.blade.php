@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Cobrança</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cobrancas.update', $cobranca->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" name="cobranca[valor]" value="{{ old('valor', $cobranca->valor) }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">Devedor</label>
                <input type="text" class="form-control" name="cobranca[devedor]" value="{{ old('devedor', $cobranca->devedor) }}" required>
            </div>

            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </form>
    </div>
@endsection
