@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastrar Nova Dívida</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dividas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" name="divida[valor]" value="{{ old('valor') }}" required>
            </div>

            <div class="form-group">
                <label for="devedor">Cobrador</label>
                <input type="text" class="form-control" name="divida[cobrador]" value="{{ old('devedor') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Cadastrar Dívida</button>
        </form>
    </div>
@endsection