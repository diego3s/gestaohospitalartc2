<!-- resources/views/funcionarios/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastrar Novo Pagamento</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pagar.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="">Valor</label>
                <input type="text" class="form-control" name="pagamento[valor]" value="{{ old('valor') }}" required>
            </div>

            <div class="form-group">
                <label for="">Devedor</label>
                <input type="text" class="form-control" name="pagamento[devedor]" value="{{ old('devedor') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Cadastrar Pagamento</button>
        </form>
    </div>
@endsection
