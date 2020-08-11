<p align="center"><img src="https://yata-apix-46560647-f90c-4f2e-888e-7ecb5d1a1d15.lss.locawebcorp.com.br/ffcca5037b6d40ea93a555aaea56b629.png" width="400"></p>

# Back-end Catálogo de Loja de Roupas

## Sobre

Este é um projeto simples que servirá como backend para um site que exibirá um catálogo de uma loja de roupas.

### Requisições Existentes na API

Para visualizar todas as requisições disponíveis na API acesse este link:  **[Documentação do Postman](https://documenter.getpostman.com/view/8080983/T1LLFoiu)**.

## Iniciando o projeto

A seguir é descrito as informações necessárias para executar o projeto.

### Pré-requisitos

Para rodar a aplicação, você precisa ter instalado na sua máquina o [Docker](https://www.docker.com/), com versão igual ou superior a essas:

- Docker: version 18.03.1-ce
- Docker compose: version 1.21.2

Além de que as portas **8085** e **5435** não deverão está em uso no momento que os containeires forem ligados.

### Executando

Com o Docker instalado na sua máquina, clone o projeto.
Acesse a pasta do projeto via terminal:

```
cd playtech-catalog-backend/
```

#### **NO LINUX**

Conceda permissão de execução para o script que irá iniciar os containers, criar o banco e dar migrate nas tabelas:

```
sudo chmod +x ./docker-run.sh
```

Finalmente, execute o script:
```
./docker-run.sh
```

#### **NO WINDOWS**

Execute o script pelo PowerShell:
```
.\docker-run.ps1
```

Pronto! O projeto já deve está funcionando no [http://localhost:8085/](http://localhost:8085/).

Depois de instalado, você pode iniciar os containers da seguinte forma:
```
docker-compose up -d
```

E para parar os containers:
```
docker-compose stop
```

## Built with

- [Laravel 7 (Framework PHP)](https://laravel.com/)
- [PostgreSQL 10.3](https://www.postgresql.org/)
- [Docker](https://www.docker.com/)

### Docker Images Utilizadas

- [Ambientum - PHP 7.4 with NGINX](https://hub.docker.com/r/ambientum/php)
- [Postgres 10.3](https://hub.docker.com/_/postgres)
- [PGAdmin 4](https://hub.docker.com/r/dpage/pgadmin4/)

## Autores

**Playtech Solutions**
- [Twitter](https://twitter.com/playtsoficial12)
- [Instagram](https://www.instagram.com/playtechsolutions12/)
- [LinkedIn](https://www.linkedin.com/company/playtechgames7/)
- E-mail: contato@playtechsolutions.com.br

### Desenvolvedor

**Juan Igor Barbosa (Back-end Dev)**
- [Github](https://github.com/juan-igor/)
- [Gitlab](https://gitlab.com/juan_igor)
- E-mail: juan.igorbdf@gmail.com
