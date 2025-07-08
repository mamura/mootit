# Mootit

Aplicação Laravel 12 com Livewire 3 para busca de produtos, desenvolvida como um projeto técnico para demonstrar habilidades com Laravel moderno, Vite, TailwindCSS e componentes reativos.

## Funcionalidades

- Busca dinâmica de produtos com filtro por nome, categoria e marca.
- Interface moderna, limpa e responsiva com TailwindCSS.
- Componente Livewire reativo utilizando `wire:model.live`.
- Backend estruturado com Laravel 12.
- Pronto para rodar com Docker e Docker Compose.

## Tecnologias

- PHP 8.3
- Laravel 12
- Livewire 3
- TailwindCSS
- Vite
- Alpine.js
- Docker & Docker Compose
- MySQL

## Como rodar localmente

### Pré-requisitos

- Docker e Docker Compose instalados
- Make (opcional, mas recomendado)
- Node.js (recomenda-se usar via NVM)

### Passos

1. Clone o projeto:

```bash
git clone https://github.com/mamura/mootit.git
cd mootit
```

2. Copie o arquivo de exemplo .env:
```bash
cp .env.example .env
```

3. Inicie os containers:
```bash
docker compose up -d
```

4. Acesse o container da aplicação:
```bash
docker exec -it mootit bash
```

5. Instale as dependências do PHP:
```bash
composer install
```

6. Instale as dependências do Node.js:
```bash
npm install
```

7. Compile os assets do Vite:
```
npm run dev
```

8. Gere a chave da aplicação:
```bash
php artisan key:generate
```

9. Execute as migrations e seeders:
```bash
php artisan migrate --seed
```

10. Acesse a aplicação:

Abra http://localhost no seu navegador.