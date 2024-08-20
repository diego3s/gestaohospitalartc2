# Gestão Hospitalar TC-2 <h1>

## Docker <h2>
* php
* laravel
* mysql
* nginx

### Instruções <h3>
Caso o ambiente docker funcione como eu espero, tudo deve ocorrer **sem mensagens de erro**.
Com o docker instalado, na pasta que contém o arquivo **Dockerfile**, entre o comando:
`docker compose up -d --build`
Isso deve buildar e subir o container do projeto.
Caso o **Docker Desktop** esteja instalado, o projeto deve aparecer lá.

A sintaxe básica é `docker-compose exec <nome-do-container> <comando>`.
É possível executar o terminal dos containeres com o comando `docker-compose exec app bash`.
Se o comando `docker-compose exec app php artisan migrate` executar e não retornar erro, está quase tudo certo.
O serviço php e o serviço mySql estão funcionando. O projeto já existe.

Para *executar* o projeto é necessário entrar no terminal do container php (que está nomeado como app).
Lá deve ficar rodando: `php artisan serve --host=0.0.0.0 --port=8000`.
Dessa forma a aplicação irá rodar em **http://localhost:8000**
Exite um comando que sobe a aplicação e não ocupa o terminal, mas abrir outro costuma ser melhor.


Se possível procurar sobre Laravel.
Aprenda a fazer um CRUD.

