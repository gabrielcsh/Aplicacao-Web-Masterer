![GitHub repo size](https://img.shields.io/github/repo-size/enzodpaiva/Masterer)
# Masterer 

Trabalho FACOM - Este projeto foi entregue como trabalho de duas disciplinas, sendo elas e seu integrantes:

- Integrantes trabalho programação para web: Enzo Paiva, Arthur Ramires, Gabriel Cardoso e Nicole Fernanda.

- Integrantes trabalho computação distribuida: Enzo Paiva, Arthur Ramires, Milena Alegre e Vitoria Rocha.

## Projeto feito com as tecnologias:
- PHP 7.4 (FrameWork Laravel 8.83)
- Mysql 8
- HTML
- CSS (Bootstrap)
- JavaScript
- Docker

### Iniciar projeto
Este projeto se encontra em uma instancia docker para facilitar sua usabildiade. Para rodar o projeto localmente com docker. 

### Instalando Docker
A instalação do docker pode ser feita através desses links, de acordo com o seu sistema operacional:
##### windows
```
https://docs.docker.com/desktop/windows/install/
```

##### linux
```
https://docs.docker.com/engine/install/ubuntu/
```

Execute os comandos abaixo no terminal dentro da pasta do projeto:

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

### O que são sistemas distribuídos:
```
Um sistema distribuído é uma coleção de programas de computador que utilizam recursos computacionais em vários pontos centrais de computação diferentes para atingir um objetivo comum e compartilhado. Também conhecido como computação distribuída ou bancos de dados distribuídos, ele depende de pontos centrais diferentes para se comunicar e sincronizar em uma rede comum. Esses pontos centrais costumam representar dispositivos de hardware físicos diferentes, mas também podem representar processos de software diferentes ou outros sistemas encapsulados recursivos. Os sistemas distribuídos visam remover gargalos ou pontos centrais de falha de um sistema.
```

### Os sistemas de computação distribuída têm as seguintes características:


- > Compartilhamento de recursos — um sistema distribuído pode compartilhar hardware, software ou dados

- > Processamento simultâneo — várias máquinas podem processar a mesma função ao mesmo tempo

- > Escalonamento — a capacidade de computação e processamento pode evoluir conforme necessário quando estendida para máquinas adicionais

- > Detecção de erros — as falhas podem ser detectadas com mais facilidade

- > Transparência — um ponto central pode acessar os e se comunicar com outros pontos centrais no sistema



### Diferença entre um sistema centralizado e um distribuído:

> Um sistema de computação centralizado é onde toda a computação é executada por um único computador em um único local. A principal diferença entre sistemas centralizados e distribuídos é o padrão de comunicação entre os pontos centrais do sistema. O estado de um sistema centralizado está contido em um ponto central que os clientes acessam de maneira personalizada. Todos os pontos centrais de um sistema centralizado acessam o ponto central, o que pode levar ao congestionamento e lentidão da rede. Um sistema centralizado tem um único ponto de falha, enquanto um sistema distribuído não tem um único ponto de falha.

### Docker
> O docker é um software que fornece containers virtuais que empacota sua aplicação e suas dependências para dentro de um container. A partir desse momento o container se torna portátil e você pode utilizá-lo em outras máquinas que possuem o docker instalado, independente do sistema operacional. (tolerância a falhas)
Com isso a sua aplicação sempre funciona da mesma forma em qualquer lugar. O docker isola a aplicação através de um container virtual como se fosse um host, cada container funciona de forma separada e todas as dependências são alocadas de forma separada no container correspondente, assim se tornam processos totalmente isolados. 
Como um exemplo, em nosso projeto possuímos containers para aplicação e banco de dados separadamente.

### Explicando cada tecnologia utilizada
- #### NGINX 
> É um servidor web, é um programa que roda e que serve para responder requisições web. A estrutura do software é assíncrona e orientada a eventos; possibilitando o processamento de muitas solicitações ao mesmo tempo. O NGINX também é altamente escalável, significando que seu serviço cresce com o aumento de tráfego do usuário.

- #### mysql 
> O MySQL é um sistema de gerenciamento de banco de dados, que utiliza a linguagem SQL como interface.
-  #### PHP
 > Linguagem de programação, mas utilizados ele pois ele é para o desenvolvimento de aplicações presentes e atuantes no lado do servidor, ou seja, o backend

- #### Redis
> Redis é uma estrutura de armazenamento em memória, muito utilizado como banco de dados, cache e intermediário de mensagens.  o Redis permite o armazenamento em memória de dados organizados em chaves e valores.

### Explicando conceitos utilizados no projeto
- #### Client
 > Permite aos usuários interagir com o Docker e acessar os containers via linha de comando ou API Remota.
- #### Host
> Fornece um ambiente completo para executar aplicativos, sendo composto pelo Daemon, imagens, containers, rede e volumes. O Daemon é responsável por todas as ações relacionadas aos containers e recebe comandos por meio do Client.

- #### Registry 
> São serviços que fornecem locais de onde irá armazenar e baixar as imagens. Em outras palavras, o Registry, contém os repositórios Docker que hospedam as imagens, como Docker Hub.


- #### Virtualização
> O docker possui virtualização com base em contêiners. Esse modelo de virtualização está no nível de sistema operacional, A diferença para uma VM é que um container Docker compartilha o Kernel com o sistema operacional do host. Isso faz com que o desempenho aumente e o consumo de memória do contêiner diminua.

- #### nomeação
> Nomes desempenham papel importante em todos os sistemas de computação  São usados, por exemplo, para compartilhar recursos e identificar entidades  Para resolver nomes é necessário implementar um Sistema de Nomes  Em um sistema distribuído, a implementação do sistema de nomes costuma ser distribuída por várias máquinas
quando vc ta fazendo containers vc pega as entidades (aplicação, banco de dados,..) e coloca elas dentro do container. Para que a comunicação do sistema funcione e entenda, utilizamos o sistema de nomeação, essa nomeação ocorre no arquivo docker-compose.
### Estrtura usada e configuração do docker

> A ferramenta de versionamento de código escolhida foi  o Github por termos mais familiaridade com  o  sistema;
O projeto foi desenvolvido para a matéria de Programação Web e foi reutilizada para esta disciplina, adicionando o funcionamento com SDs;
O sistema é composto pelos containers de Php, Mysql, Redis e Nginx;
Todos se comunicam pela mesma rede e possuem seus Dockerfiles, orquestrados por um docker-compose.yaml
A estrutura de pastas do projeto foi projetada para atender aos requisitos do MVC, prática também escolhida por apresentar maior praticidade e facilidade.
