<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - CupDogs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="auth-page">
    <main class="auth-card">
        <img src="{{ asset('assets/brand/logo.png') }}" alt="Logo CupDogs" class="auth-logo">

        <h1>Criar conta</h1>

        <form action="{{ route('register.store') }}" method="POST" class="auth-form">
            @csrf

            <label for="name">Nome</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus>
            @error('name')
                <p class="auth-error">{{ $message }}</p>
            @enderror

            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="auth-error">{{ $message }}</p>
            @enderror

            <label for="password">Senha</label>
            <input id="password" name="password" type="password" required>
            @error('password')
                <p class="auth-error">{{ $message }}</p>
            @enderror

            <label for="password_confirmation">Confirmar senha</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required>

            <button type="submit">Cadastrar</button>
        </form>

        <p class="auth-link">
            Ja tem conta?
            <a href="{{ route('login') }}">Entrar</a>
        </p>
    </main>
</body>

</html>
