# Padroes e Tecnologias - CupDogs

Este documento define as tecnologias e padroes recomendados para evoluir o CupDogs a partir da referencia visual fornecida. A proposta e manter uma experiencia doce, simples e mobile-first, sem perder organizacao tecnica.

## Tecnologias Base

| Camada | Tecnologia | Uso |
| --- | --- | --- |
| Backend | Laravel 12 | Rotas, controllers, models, migrations, validacoes e regras de negocio. |
| Linguagem backend | PHP 8.2+ | Codigo da aplicacao. |
| Frontend server-side | Blade | Templates iniciais e telas renderizadas pelo Laravel. |
| Assets | Vite 7 | Build e hot reload de CSS/JS. |
| Estilos | Tailwind CSS 4 | Design responsivo e componentes utilitarios. |
| Banco local | SQLite | Desenvolvimento rapido e simples. |
| Testes | PHPUnit 11 | Testes unitarios e de feature. |
| Padronizacao PHP | Laravel Pint | Formatacao automatica do codigo PHP. |
| HTTP client frontend | Axios | Requisicoes assincronas quando necessario. |

## Padroes de Arquitetura

- Seguir o MVC do Laravel: Models para dados, Controllers para entrada HTTP e Views Blade para apresentacao.
- Centralizar regras de validacao em Form Requests quando os formularios crescerem.
- Usar Services apenas quando uma regra de negocio ficar grande demais para o controller.
- Usar Eloquent Relationships para expressar o DER no codigo.
- Usar migrations para toda alteracao de banco; nao alterar o banco manualmente sem migration correspondente.
- Usar seeders e factories para dados de exemplo, como categorias e cupcakes populares.

## Padroes de Banco de Dados

- Nomes de tabelas no plural e em `snake_case`: `products`, `order_items`, `product_images`.
- Chaves primarias com `id` usando `bigint`.
- Chaves estrangeiras no formato singular + `_id`: `user_id`, `product_id`, `category_id`.
- Colunas booleanas com prefixo claro: `is_active`, `is_popular`, `is_default`.
- Valores monetarios com `decimal(10, 2)`.
- Datas de eventos com nomes explicitos: `paid_at`, `placed_at`, `starts_at`, `ends_at`.
- Manter `created_at` e `updated_at` nas entidades principais.
- Usar indices unicos para slugs, codigos de pedido, emails e cupons.

## Padroes de Codigo PHP

- Classes em `PascalCase`: `ProductController`, `OrderService`.
- Metodos e variaveis em `camelCase`: `calculateTotal`, `$cartItem`.
- Arquivos Blade em `kebab-case`: `product-card.blade.php`.
- Rotas nomeadas em formato semantico: `products.index`, `cart.store`, `orders.show`.
- Controllers devem retornar responses ou views; evitar regra de negocio extensa dentro deles.
- Models devem declarar relacionamentos, casts, fillable/guarded e scopes simples.
- Usar enums ou constantes para status de pedido, pagamento e carrinho quando esses fluxos forem implementados.

## Padroes de Frontend

A referencia visual indica uma interface mobile-first, arredondada e acolhedora. Para manter consistencia:

- Priorizar telas responsivas com experiencia excelente em celular.
- Usar cards de produto com imagem, nome curto, preco e botao de adicionar ao carrinho.
- Manter busca em destaque na home.
- Separar secoes como "Populares hoje" e "Categorias".
- Usar navegacao inferior para areas principais: inicio, carrinho e perfil.
- Limitar textos longos nos cards; detalhes completos devem ficar na pagina do produto.
- Usar estados visuais para loading, vazio, erro e sucesso.

## Direcao Visual

| Elemento | Padrao sugerido |
| --- | --- |
| Paleta principal | Rosa suave, creme claro e vinho/rosa escuro para destaque. |
| Fundo | Claro, quente e limpo, inspirado em confeitaria. |
| Botoes principais | Cor de destaque forte, com alto contraste e icone quando fizer sentido. |
| Cards | Cantos arredondados, sombra sutil e imagem em destaque. |
| Tipografia | Sans-serif legivel, peso maior em titulos e labels importantes. |
| Imagens | Cupcakes reais ou ilustrados em PNG/JPG/WebP, com fundo limpo. |

## Acessibilidade

- Garantir contraste suficiente entre texto e fundo.
- Todos os botoes com texto acessivel ou `aria-label` quando forem apenas icones.
- Campos de formulario com `label` associado.
- Mensagens de erro claras e proximas ao campo.
- Navegacao por teclado preservada em menus, busca e carrinho.
- Evitar usar apenas cor para indicar status.

## Seguranca

- Usar autenticacao e hash de senha padrao do Laravel.
- Proteger rotas de carrinho, checkout, perfil e pedidos com middleware `auth`.
- Validar todos os dados de entrada no backend.
- Usar policies/gates para areas administrativas.
- Nunca confiar em preco vindo do frontend; recalcular totais no servidor.
- Preservar historico do pedido em `order_items`, salvando nome e preco no momento da compra.
- Manter `.env` fora do versionamento.

## Testes

Priorizar testes para:

- Criacao de usuario e login.
- Listagem e busca de produtos.
- Inclusao, atualizacao e remocao de itens do carrinho.
- Calculo de subtotal, desconto, frete e total.
- Fechamento de pedido.
- Regras de estoque.
- Acesso indevido a pedidos de outro usuario.

## Convencoes de Commits

Sugestao de prefixos:

- `feat:` nova funcionalidade.
- `fix:` correcao de bug.
- `docs:` documentacao.
- `test:` testes.
- `refactor:` melhoria interna sem mudanca de comportamento.
- `style:` formatacao ou ajustes visuais.
- `chore:` tarefas de manutencao.

## Checklist

- Rodar `vendor/bin/pint` antes de entregar alteracoes PHP.
- Rodar `php artisan test` antes de integrar mudancas relevantes.
- Rodar `npm run build` quando alterar frontend/assets.
- Verificar telas em largura mobile e desktop.
- Conferir mensagens, labels e valores monetarios em portugues do Brasil.
