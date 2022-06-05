![GitHub repo size](https://img.shields.io/github/repo-size/enzodpaiva/Masterer)
# Masterer 

Trabalho de prog web FACOM

integrantes: Enzo Paiva, Arthur Ramires, Gabriel Cardoso e Nicole Fernanda

## Projeto feito com as tecnologias:
- PHP 7.4 (FrameWork Laravel 8.83)
- Mysql 8
- HTML
- CSS (Bootstrap)
- JavaScript
- Docker

### Iniciar projeto
Este projeto se encontra em uma instancia docker para facilitar sua usabildiade. Para rodar o projeto localmente com docker. Execute os comandos abaixo no terminal dentro da pasta do projeto:

Inicializar os containers (Também realiza o download na primeira vez que executado)
```sh
docker-compose up -d
```

listar os containers
```sh
docker ps -a
```

entrar nos containers da aplicação
```sh
docker exec -it {nome container} sh
```

inicializar a aplicação -- dentro do container Masterer-app rodar:
```sh
php artisan serve
```

### Configuração local do banco de dados
```
ServerHost: localhost
Port: 33007
Username: root
Password: root
```

##### Caso de problema de conexao verificar se os seguintes drivers estão habilitados:
```
rewriteBatchedStatements: true
useSSL: false
```

#### Link dos containers utilizados nesse projeoto
##### Nginx
```
https://hub.docker.com/_/nginx
```
###### Mysql
```
https://hub.docker.com/_/mysql
```
###### Php
```
https://hub.docker.com/_/php
```

##### Redis
```
https://hub.docker.com/_/redis
```
