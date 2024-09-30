@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Gerenciamento</h2>

    <!-- Definindo o array diretamente na view -->
    @php
        $items = [
            'dividas.index' => 'Dívidas',
            'cobrancas.index' => 'Cobranças'
        ];
    @endphp

    <!-- Exibindo os itens do array -->
    <div class="list-group">
        @foreach($items as $key => $item)
        <a href="{{ route($key) }}" class="list-group-item list-group-item-action d-flex align-items-center">
            @if($item == 'Dívidas')
                <i class="bi bi-people-fill me-3"></i> <!-- Ícone para 'Funcionários' -->
            @elseif($item == 'Cobranças')
                <i class="bi bi-person-fill me-3"></i> <!-- Ícone para 'Pacientes' -->
            @endif
            {{ $item }}
        </a>
        @endforeach
    </div>
</div>
@endsection