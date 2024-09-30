<!-- resources/views/funcionarios/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastrar Nova Cobranca</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cobrancas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" name="cobranca[valor]" value="{{ old('valor') }}" required>
            </div>

            <div class="form-group">
                <label for="devedor">Devedor</label>
                <input type="text" class="form-control" name="cobranca[devedor]" value="{{ old('devedor') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Cadastrar Cobrança</button>
        </form>
    </div>
@endsection
