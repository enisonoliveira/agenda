=====================Instalação APP Laravel ==========================================================

### Instalação php| va para a raiz do projeto e exeuta no terminal
sudo apt-get install php7.4


### Dependência php | va para a raiz do projeto e exeuta no terminal
sudo apt install php7.4-cli php7.4-fpm php7.4-json php7.4-pdo php7.4-mysql php7.4-zip php7.4-gd  php7.4-mbstring php7.4-curl php7.4-xml php7.4-bcmath php7.4-json


## Instalar dependencias do projeto| va para a raiz do projeto e exeuta no terminal
composer update

## carregar os pacotes| va para a raiz do projeto e exeuta no terminal
composer dump-autoload

## Banco de dados| va para a raiz do projeto e exeuta no terminal
 php artisan migrate --force


## Instalar nova key app| va para a raiz do projeto e exeuta no terminal
php artisan key:generate
 
## iniciar app na porta 8000 linux,mac| va para a raiz do projeto /public e exeuta no terminal
php -S localhost:8000 

## iniciar no windows | va para a raiz do projeto /public e exeuta no terminal
php -S localhost:8000

## Teste | va para a raiz do projeto e exeuta no terminal

sudo apt install phpunit 

## Rodando a switch de teste |  va para a raiz do projeto e exeuta no terminal
 ./test

## Acessando o front | digite na url 

localhost:8000/app/login.html
ou
localhost:8000/app/!#/
