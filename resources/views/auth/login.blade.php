<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CupDogs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="auth-page">
    <main class="auth-card">
        <img src="{{ asset('assets/brand/logo.png') }}" alt="Logo CupDogs" class="auth-logo">

        <h1>Entrar</h1>

        <form action="{{ route('login.store') }}" method="POST" class="auth-form">
            @csrf

            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <p class="auth-error">{{ $message }}</p>
            @enderror

            <label for="password">Senha</label>
            <input id="password" name="password" type="password" required>
            @error('password')
                <p class="auth-error">{{ $message }}</p>
            @enderror

            <label class="auth-check">
                <input name="remember" type="checkbox" value="1">
                <span>Lembrar de mim</span>
            </label>

            <button type="submit">Entrar</button>
        </form>

        <p class="auth-link">
            Ainda nao tem conta?
            <a href="{{ route('register') }}">Criar conta</a>
        </p>
    </main>
</body>

</html>
