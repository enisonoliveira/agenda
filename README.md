# Teste: Nome completo



## Projeto
O projeto consiste em criar uma agenda de contatos parecida com a do android / IOS.
Deve possuir um CRUD de pessoas com soft delete, ou seja, nenhum dado deve ser excluído do banco.
### Relatórios
	- Exibir todas as pessoas, que não possuem telefone cadastrado, ou seja, possuem apenas o nome, mas nenhum contato.
	- Exibir todas as pessoas que possuem telefone cadastrado.

### Requisitos
- Login (pode ser com um usuário gerado previamente);
- Todos os formulários (Inclusão, Edição) devem abrir num modal.
- Utilizar algum framework PHP (Laravel 5+, Yii2, Zend2, etc);
- A cada commit, colocar um descritivo da funcionalidade concluída / ajustada.

- Utilizar Testes unitários.

### Template
Incluímos um template no repositório, não é obrigado utilizá-lo.


### Não esqueça
Não esqueça de editar este readme no final, nos dizendo como fazemos para rodar seu projeto em nossa máquina, e qual usuário devemos utilizar para logar no sistema

##### *Em caso de dúvidas, sinta-se à vontade para entrar em contato com [weber@avecbrasil.com.br](rodrigo.weber@avecbrasil.com.br).


## ===================================Instalação APP Laravel ==========================================================

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
