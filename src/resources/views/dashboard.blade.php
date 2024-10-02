@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Homepage</h2>

    <!-- Definindo o array diretamente na view -->
    @php
        $items = [
            'funcionarios.index' => 'Funcionários',
            'pacientes.index' => 'Pacientes',
            'financeiro' => 'Financeiro',
            'consultas.index' => 'Consultas'
        ];
    @endphp

    <!-- Exibindo os itens do array -->
    <div class="list-group">
        @foreach($items as $key => $item)
        <a href="{{ route($key) }}" class="list-group-item list-group-item-action d-flex align-items-center">
            @if($item == 'Funcionários')
                <i class="bi bi-people-fill me-3"></i> <!-- Ícone para 'Funcionários' -->
            @elseif($item == 'Pacientes')
                <i class="bi bi-person-fill me-3"></i> <!-- Ícone para 'Pacientes' -->
            @elseif($item == 'Financeiro')
                <i class="bi bi-person-fill me-3"></i>
            @elseif($item == 'Consultas')
                <i class="bi bi-person-fill me-3"></i>
            @endif
            {{ $item }}
        </a>
        @endforeach
    </div>
</div>
@endsection