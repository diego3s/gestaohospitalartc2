<!-- resources/views/funcionarios/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Pagamento</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pagar.update', $pagar->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome_completo">Valor</label>
                <input type="text" class="form-control" name="pagamento[valor]" value="{{ old('valor', $pagar->valor) }}" required>
            </div>

            <div class="form-group">
                <label for="nome_completo">Devedor</label>
                <input type="text" class="form-control" name="pagamento[devedor]" value="{{ old('devedor', $pagar->devedor) }}" required>
            </div>

            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </form>
    </div>
@endsection
