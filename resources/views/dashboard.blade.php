<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cupdogs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <input type="checkbox" id="check">
    <label for="check" class="menu-button" aria-label="Abrir menu">
        <div class="menu">
            <span class="hamburguer"></span>
        </div>
    </label>

    <div class="barra">
        <div class="itens">
            <a class="item" href="{{ route('dashboard') }}">Inicio</a>
            <a class="item" href="/produtos">Produtos</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="item item-button" type="submit">Sair</button>
            </form>
        </div>
    </div>
</body>

</html>
