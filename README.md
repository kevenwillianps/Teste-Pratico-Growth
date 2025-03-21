# Projeto Laravel

## Descrição
Este é um projeto desenvolvido com o framework Laravel, Filament e Livewire, que oferece um ambiente robusto para desenvolvimento de aplicações web. O sistema inclui funcionalidades como autenticação de usuários, gestão de dados via migrations e testes automatizados com PHPUnit.

## Requisitos
Antes de iniciar a instalação, certifique-se de que seu ambiente atende aos seguintes requisitos:

- **PHP 8.1+**
- **Composer** (https://getcomposer.org/)
- **MySQL 8.0+ ou PostgreSQL**
- **Node.js e NPM/Yarn** (se o projeto utilizar frontend compilado com Vite)
- **Extensões PHP necessárias**: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath

## Instalação

Siga os passos abaixo para configurar e rodar o projeto:

### 1. Clonar o repositório
```sh
git clone https://github.com/kevenwillianps/Teste-Pratico-Growth
cd Teste-Pratico-Growth
```

### 2. Instalar dependências do PHP
```sh
composer install
```

### 3. Configurar variáveis de ambiente
Copie o arquivo `.env.example` para `.env` e configure as credenciais do banco de dados e outras configurações necessárias.
```sh
cp .env.example .env
```

### 4. Gerar chave da aplicação
```sh
php artisan key:generate
```

### 5. Criar o banco de dados e rodar migrations
Certifique-se de que seu banco de dados está rodando e configurado corretamente no arquivo `.env`, então execute:
```sh
php artisan migrate
```

### 6. Popular o banco com seeders
Este projeto inclui um seeder para criar um usuário padrão. Para executar:
```sh
php artisan db:seed
```

### 7. Popular o banco com seeders
Usuário e senha padrão
```sh
email: admin@growth.com.br
senha: 123
```

### 8. Rodar servidor de desenvolvimento
```sh
php artisan serve
```
A aplicação estará disponível em `http://127.0.0.1:8000`.

## Testes Automatizados
O projeto inclui testes unitários e de integração com PHPUnit. Para executar os testes e garantir que o sistema está funcionando corretamente:
```sh
php artisan test
```

## Licença
Este projeto está licenciado sob a [MIT License](LICENSE).

---

Siga essas instruções e seu projeto estará pronto para ser executado em qualquer ambiente!

