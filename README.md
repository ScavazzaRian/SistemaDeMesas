# README do Projeto Sistema de Mesas

Este documento fornece as instruções necessárias para configurar e executar o projeto Laravel.

## Requisitos do Sistema

Para garantir o funcionamento correto do projeto, os seguintes componentes devem estar instalados em seu ambiente:

| Componente          | Versão Mínima |
| :------------------ | :------------ |
| PHP                 | `>= 8.4.13`   |
| Composer            | `>= 2.8.12`   |\n| Laravel Installer   | `>= 5.18.0`   |
| Banco de Dados      | `SQLite` ou compatível |

## Configuração do Projeto

Siga os passos abaixo para configurar o projeto:

1.  **Variáveis de Ambiente:**
    Primeiro, copie o arquivo de exemplo `.env.example` para criar seu próprio arquivo de configuração `.env`:
    ```bash
    cp .env.example .env
    ```

2.  **Chave da Aplicação:**
    Gere a chave da aplicação, que é essencial para a segurança:
    ```bash
    php artisan key:generate
    ```

3.  **Configuração do Banco de Dados:**
    Agora, configure o arquivo `.env` para apontar para o seu banco de dados. Um exemplo de configuração para SQLite seria:
    ```dotenv
    DB_CONNECTION=sqlite
    DB_DATABASE=/path/to/your/database.sqlite
    # Ou para MySQL/PostgreSQL:
    # DB_CONNECTION=mysql
    # DB_HOST=127.0.0.1
    # DB_PORT=3306
    # DB_DATABASE=laravel
    # DB_USERNAME=root
    # DB_PASSWORD=
    ```

4.  **Migrações do Banco de Dados:**
    Execute o comando abaixo para criar as tabelas necessárias no banco de dados:

    ```bash
    php artisan migrate
    ```

## Execução do Projeto

Após a configuração, você pode iniciar a aplicação:

1.  **Iniciar o Servidor:**
    Execute o comando para subir a aplicação:

    ```bash
    php artisan serve
    ```

2.  **Acessar a Aplicação:**
    Abra seu navegador e acesse o endereço:

    [http://localhost:8000](http://localhost:8000)
