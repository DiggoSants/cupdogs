# CupDogs

CupDogs e um projeto Laravel inspirado na referencia visual do Cupcats: uma loja digital de cupcakes tematicos, com vitrine mobile-first, busca, categorias, carrinho, perfil do usuario e fluxo de pedidos.

O objetivo do sistema e permitir que clientes encontrem cupcakes por sabor/categoria, adicionem itens ao carrinho e acompanhem seus pedidos. A documentacao atual organiza a base tecnica para evoluir o prototipo para uma aplicacao completa.

## Funcionalidades Previstas

- Vitrine com produtos populares, categorias e busca por nome/descricao.
- Cadastro e autenticacao de usuarios.
- Carrinho persistente por usuario.
- Checkout com endereco, pagamento e resumo do pedido.
- Historico de pedidos e status de entrega.
- Produtos com categorias, imagens, preco, estoque e destaque.
- Avaliacoes e favoritos para melhorar a experiencia do cliente.

## Tecnologias

- PHP 8.2+
- Laravel 12
- SQLite para desenvolvimento local
- Blade para views server-side
- Vite 7
- Tailwind CSS 4
- PHPUnit 11 para testes
- Laravel Pint para padronizacao de codigo PHP

## Requisitos

- PHP 8.2 ou superior
- Composer
- Node.js e npm
- SQLite habilitado no PHP

## Instalacao

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

No Windows, caso `cp` nao esteja disponivel, copie `.env.example` para `.env` manualmente ou use:

```powershell
Copy-Item .env.example .env
```

## Execucao

Para rodar o backend Laravel:

```bash
php artisan serve
```

Para rodar os assets em modo desenvolvimento:

```bash
npm run dev
```

Tambem existe o script integrado do Composer:

```bash
composer run dev
```

## Banco de Dados

O projeto esta configurado para SQLite em desenvolvimento:

```env
DB_CONNECTION=sqlite
```

O arquivo local esperado e:

```text
database/database.sqlite
```

O modelo de dados planejado esta documentado em [docs/der.md](docs/der.md).

## Documentacao

- [DER - Diagrama Entidade-Relacionamento](docs/der.md)
- [Padroes e Tecnologias](docs/padroes-tecnologias.md)

## Comandos Uteis

```bash
php artisan test
vendor/bin/pint
npm run build
php artisan migrate:fresh --seed
```

## Estrutura Principal

```text
app/                Codigo PHP da aplicacao
database/           Migrations, seeders, factories e SQLite local
resources/views/    Views Blade
resources/css/      Estilos da aplicacao
resources/js/       JavaScript da aplicacao
routes/             Rotas web e console
tests/              Testes automatizados
docs/               Documentacao do projeto
```

## Observacao de Escopo

Este repositorio ainda esta no ponto inicial do Laravel. O README, o DER e os padroes registram o desenho esperado para transformar a referencia visual em uma aplicacao de loja funcional.
