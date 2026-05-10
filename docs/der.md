# DER - CupDogs

Este DER representa a estrutura planejada para o CupDogs, uma loja de cupcakes tematicos inspirada na referencia visual do Cupcats. A tela de referencia indica os principais modulos: catalogo, categorias, busca, carrinho, perfil e pedidos.

## Diagrama

```mermaid
erDiagram
    USERS ||--o{ ADDRESSES : possui
    USERS ||--o{ CARTS : possui
    USERS ||--o{ ORDERS : realiza
    USERS ||--o{ FAVORITES : marca
    USERS ||--o{ REVIEWS : avalia

    CATEGORIES ||--o{ PRODUCTS : classifica
    PRODUCTS ||--o{ PRODUCT_IMAGES : possui
    PRODUCTS ||--o{ CART_ITEMS : aparece_em
    PRODUCTS ||--o{ ORDER_ITEMS : vendido_como
    PRODUCTS ||--o{ FAVORITES : favoritado_em
    PRODUCTS ||--o{ REVIEWS : recebe

    CARTS ||--o{ CART_ITEMS : contem
    ORDERS ||--o{ ORDER_ITEMS : contem
    ORDERS ||--o| PAYMENTS : possui
    ADDRESSES ||--o{ ORDERS : usado_em
    COUPONS ||--o{ ORDERS : aplicado_em

    USERS {
        bigint id PK
        string name
        string email UK
        string password
        timestamp email_verified_at
        string phone
        string role
        timestamps timestamps
    }

    ADDRESSES {
        bigint id PK
        bigint user_id FK
        string label
        string recipient_name
        string zipcode
        string street
        string number
        string complement
        string neighborhood
        string city
        string state
        boolean is_default
        timestamps timestamps
    }

    CATEGORIES {
        bigint id PK
        string name
        string slug UK
        string description
        string icon_path
        boolean is_active
        integer sort_order
        timestamps timestamps
    }

    PRODUCTS {
        bigint id PK
        bigint category_id FK
        string name
        string slug UK
        text description
        decimal price
        decimal promotional_price
        integer stock_quantity
        string flavor
        boolean is_popular
        boolean is_active
        timestamps timestamps
    }

    PRODUCT_IMAGES {
        bigint id PK
        bigint product_id FK
        string path
        string alt_text
        boolean is_cover
        integer sort_order
        timestamps timestamps
    }

    CARTS {
        bigint id PK
        bigint user_id FK
        string status
        timestamps timestamps
    }

    CART_ITEMS {
        bigint id PK
        bigint cart_id FK
        bigint product_id FK
        integer quantity
        decimal unit_price
        timestamps timestamps
    }

    ORDERS {
        bigint id PK
        bigint user_id FK
        bigint address_id FK
        bigint coupon_id FK
        string code UK
        string status
        decimal subtotal
        decimal discount_total
        decimal delivery_fee
        decimal total
        text notes
        timestamp placed_at
        timestamps timestamps
    }

    ORDER_ITEMS {
        bigint id PK
        bigint order_id FK
        bigint product_id FK
        string product_name
        decimal unit_price
        integer quantity
        decimal total
        timestamps timestamps
    }

    PAYMENTS {
        bigint id PK
        bigint order_id FK
        string method
        string status
        decimal amount
        string transaction_code
        timestamp paid_at
        timestamps timestamps
    }

    COUPONS {
        bigint id PK
        string code UK
        string type
        decimal value
        timestamp starts_at
        timestamp ends_at
        integer usage_limit
        boolean is_active
        timestamps timestamps
    }

    FAVORITES {
        bigint id PK
        bigint user_id FK
        bigint product_id FK
        timestamps timestamps
    }

    REVIEWS {
        bigint id PK
        bigint user_id FK
        bigint product_id FK
        tinyint rating
        text comment
        boolean is_visible
        timestamps timestamps
    }
```

## Entidades

| Entidade | Finalidade |
| --- | --- |
| `users` | Armazena clientes e administradores. Aproveita a base padrao de autenticacao do Laravel. |
| `addresses` | Enderecos de entrega vinculados a usuarios. |
| `categories` | Agrupa produtos por sabor ou linha visual, como morango, chocolate, menta e oreo. |
| `products` | Catalogo de cupcakes exibidos na vitrine, busca, categorias e cards populares. |
| `product_images` | Imagens dos cupcakes, incluindo capa e alternativas. |
| `carts` | Carrinho ativo ou convertido de cada usuario. |
| `cart_items` | Itens adicionados ao carrinho com preco congelado no momento da inclusao. |
| `orders` | Pedido fechado, com endereco, status, valores e observacoes. |
| `order_items` | Snapshot dos produtos comprados, preservando nome e preco historicos. |
| `payments` | Informacoes do pagamento do pedido. |
| `coupons` | Cupons promocionais opcionais para desconto. |
| `favorites` | Produtos salvos pelo usuario. |
| `reviews` | Avaliacoes dos produtos. |

## Regras de Relacionamento

- Um usuario pode ter varios enderecos, carrinhos, pedidos, favoritos e avaliacoes.
- Uma categoria pode classificar varios produtos.
- Um produto pertence a uma categoria principal.
- Um produto pode ter varias imagens.
- Um carrinho contem varios itens, e cada item aponta para um produto.
- Um pedido contem varios itens e pode ter um pagamento.
- Um pedido usa um endereco de entrega.
- Um cupom pode ser usado em varios pedidos, respeitando limite e validade.
- Favoritos devem ser unicos por par `user_id` e `product_id`.
- Avaliacoes devem ser unicas por par `user_id` e `product_id` quando a regra de negocio permitir apenas uma avaliacao por cliente.

## Status Sugeridos

### Carrinho

- `active`: carrinho em uso.
- `converted`: carrinho transformado em pedido.
- `abandoned`: carrinho abandonado.

### Pedido

- `pending`: pedido criado e aguardando pagamento.
- `paid`: pagamento confirmado.
- `preparing`: pedido em preparo.
- `out_for_delivery`: pedido saiu para entrega.
- `delivered`: pedido entregue.
- `canceled`: pedido cancelado.

### Pagamento

- `pending`: pagamento iniciado.
- `approved`: pagamento aprovado.
- `declined`: pagamento recusado.
- `refunded`: pagamento estornado.

## Indices e Restricoes

- `users.email` deve ser unico.
- `categories.slug` deve ser unico.
- `products.slug` deve ser unico.
- `orders.code` deve ser unico para rastreio amigavel.
- `coupons.code` deve ser unico.
- `favorites` deve ter indice unico composto por `user_id` e `product_id`.
- `reviews` pode ter indice unico composto por `user_id` e `product_id`.
- `cart_items` pode ter indice unico composto por `cart_id` e `product_id` para evitar itens duplicados.
