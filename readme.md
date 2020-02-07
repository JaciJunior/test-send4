<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>



## Teste API Send 4

Desenvolver a API RESTful de uma agenda com as seguintes tecnologias
 + PHP LARAVEL. 
 + Permitir cadastrar contato (nome, sobrenome, e-mail e telefone).
 + Permitir cadastrar mensagem (contato (fk), descrição).
 + Listar todas as mensagens por contato.
 + Permitir alterar e excluir uma mensagem.
 + Permitir alterar os dados de um contato.
 + Validar os campos nos forms. + Permitir excluir um contato.

## Instalação Docker
# Ambiente de desenvolvimento PHP

Clone este projeto dentro de /var/www
```sh
   cd /var/www
   git clone https://github.com/JaciJunior/test-send4.git
```

### Criar as Imagens
```sh
cd /var/www/test-send4
cd .docker
docker-compose build
```

### Adiconar nomes ao arquivo hosts
Adione ao arquivo /etc/hosts a seguinte linha, substituindo SEU_IP pelo IP da sua máquina 
```
vi /etc/hosts

SEU_IP_LOCAL    portainer.docker.local
SEU_IP_LOCAL    mysql.docker.local
SEU_IP_LOCAL    apisend4.docker.local
```

### Subir o ambiente
```sh
docker-compose up -d
```

Acesse seu navegador e digite https://portainer.docker.local

### Baixar o ambiente
```sh
docker-compose down

```

### Rodar Migration
```sh
cd /var/www/test-send4
php artisan migrate

```

##  Acesso a Documentação 

+ Documentação Swagger <br>
http://apisend4.docker.local/documentation

* Documentação Postman <br>
http://apisend4.docker.local/documentation

## Link para Teste em Produção
+ Rotas <br>
http://teste-send4.codeinfinity.com.br/api/v1/ +  ROUTES <br>
+ Swagger <br>
http://teste-send4.codeinfinity.com.br/documentation

