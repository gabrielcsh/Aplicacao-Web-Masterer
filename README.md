![GitHub repo size](https://img.shields.io/github/repo-size/enzodpaiva/Masterer)
# Masterer 

Trabalho de prog web FACOM

integrantes: Enzo Paiva, Arthur Ramires, Gabriel Cardoso e Nicole Fernanda

### Iniciar projeto
Este projeto se encontra em uma instancia docker para facilitar sua usabildiade. Para rodar o projeto localmente com docker. Execute os comandos abaixo no terminal dentro da pasta do projeto:

Inicializar os containers
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
