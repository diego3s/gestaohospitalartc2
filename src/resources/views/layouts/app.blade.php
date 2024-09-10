<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Gestão Hospitalar')</title>

    <!-- Bootstrap CSS (opcional, mas comum em projetos Laravel) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Qualquer estilo adicional -->
    <style>
        body {
            padding-top: 4.5rem;
        }
    </style>
</head>
<body>
    <!-- Barra de navegação (menu) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestão Hospitalar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('funcionarios.index') }}">Funcionários</a>
                    </li>
                    <!-- Adicione outros links de navegação conforme necessário -->
                </ul>

                <!-- Exibir nome do usuário logado e logout -->
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link">Bem-vindo, {{ auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="nav-link btn btn-link" type="submit">Sair</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <main class="container">
        @yield('content') <!-- A área onde o conteúdo de cada view será inserido -->
    </main>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
