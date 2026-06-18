# Deploy no Railway

Passos rápidos para preparar o projeto CupDogs para deploy no Railway.

1) Variáveis/Secrets
- Configure os secrets equivalentes às chaves usadas em `railway.json` (por exemplo `APP_KEY`, `APP_URL`, `DATABASE_URL`, `MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD`).

2) Comandos de build/start
- O `railway.json` usa `NIXPACKS` e o comando de start:

  php artisan serve --host=0.0.0.0 --port=${PORT}

3) Migrações e assets
- O `releaseCommand` executa migrações e cria o link de storage automaticamente:

  php artisan migrate --force && php artisan storage:link || true

4) Como setar secrets via Railway CLI

  railway variables set APP_KEY "base64:..."
  railway variables set DATABASE_URL "postgres://user:pass@host:5432/dbname"

5) Recomendações
- Use `DATABASE_URL` para Postgres. Para MySQL ajuste `DB_CONNECTION` e `DATABASE_URL` correspondente.
- Garanta que `APP_KEY` esteja definido em produção (`php artisan key:generate --show`).
- Não use `php artisan serve` em produção de alta carga; preferível usar um servidor compatível (Swoole, RoadRunner) ou containerizar a aplicação.
