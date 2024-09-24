@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Login</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Campo de email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Endereço de Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus placeholder="Seu email">
                    </div>

                    <!-- Campo de senha -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Sua senha">
                    </div>

                    <!-- Checkbox 'Lembrar de mim' -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Lembrar de mim</label>
                    </div>

                    <!-- Botão de login -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>   
@endsection