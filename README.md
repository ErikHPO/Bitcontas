# BITCONTAS

**Bitcontas é uma plataforma em PHP criada para pagamento de boletos bancários de qualquer natureza utilizando bitcoin, você pode implementar a sua propria plataforma apartir desse projeto :)** 


### PRÉ-REQUISITOS:

- [Vagrant (opcional)]( https://www.vagrantup.com/)  
- [Composer](https://getcomposer.org/) 
- [Laravel Framework](https://github.com/laravel/laravel)
- [Laravel Voyager](https://github.com/the-control-group/voyager) 
- [Laravel Package BTC](https://github.com/ErikHPO/laravel-btc) 
- [Laravel Pt-BR Validator](https://github.com/LaravelLegends/pt-br-validator)
- [Bitcoin JSON-RPC Server](https://bitcoin.org/en/download) 

### INSTALAÇÃO E CONFIGURAÇÃO

`É recomendado a utilização do [Homestead](https://app.vagrantup.com/laravel/boxes/homestead) para uma instalação ágil do ambiente de desenvolvimento.` 

Para encontrar docs sobre a instalação do Full-Node do Bitcoin Server clique [AQUI](https://bitcoin.org/en/full-node#what-is-a-full-node)

Todos os comandos da API e configuração do arquivo Bitcoin.conf podem ser encontrados [AQUI](https://en.bitcoin.it/wiki/API_reference_(JSON-RPC)) 

Depois da instalação dos pré-requisitos publique os pacotes utilizando o artisan:

```PHP
php artisan vendor:publish
```
E migre as tabelas do banco de dados

```PHP
php artisan migrate
```
Crie um usuário administrador usando

```PHP
 php artisan voyager:admin seu@email.com --create
 ```
  Será requisitada as informações de usuário e senha.

Tudo deve estar funcionando a partir daqui, o painel administrador pode ser acessado em `/admin`.

Configure os BREADS da tabela *Bills* e *Payments* usando o controller do *Voyager*, no menu de configurações do administrador, se achar necessário.  

### OUTRAS CONFIGURAÇÕES
#### EXEMPLO DE ARQUIVO .ENV
```.env
APP_NAME=Bitcontas
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=60

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

BITCOIND_HOST=127.0.0.1
BITCOIND_PORT=18332
BITCOIND_USER=bitcontas
BITCOIND_PASSWORD=b1tc0nt45
BITCOIND_MIN_CONFIRMATIONS=3
```

Desenvolvido por
    Erik Opata
        erikhpo@brexbit.com
