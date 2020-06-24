Sistema de distribuição entre cidades.

## Uso

1. Definir variaveis de ambiente

```sh
cp .env-example .env
# adicionar informações em .env
source .env
```

2. Criar banco no `mysql` e rodar o arquivo `backend/create-table.sql`

3. Rodar servidor php

```sh
php -S 0.0.0.0:8080
```

4. Acessar [http://localhost:8080/](http://localhost:8080/)
