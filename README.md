# Teste: Nome completo

### Prazo: 30/11/2020
##### *Antes de iniciar faça o fork do projeto e informe o prazo para a conclusão no primeiro commit. Ao finalizar abrir uma PR para Rodrigo Priolo(rodrigo_priolo)

## Projeto
O projeto consiste em criar uma agenda de contatos parecida com a do android / IOS.
Deve possuir um CRUD de pessoas com soft delete, ou seja, nenhum dado deve ser excluído do banco.

## Desafio
Ao clicar para incluir ou editar o contato abrir o modal do contato e possibilitar:
	- Alterar nome da pessoa.
	- Incluir 1 ou mais telefones.
	- Excluir 1 ou mais telefones.
	- É possível que o contato tenha apenas o nome sem nenhum telefone.

Alterar foto do perfil do usuário logado:
	- IMPORTANTE: A imagem deve ser carregada, sem a necessidade de recarregar a página (usar ajax).

Na tela de contatos, possibilitar pesquisar por nome.

### Relatórios
	- Exibir todas as pessoas, que não possuem telefone cadastrado, ou seja, possuem apenas o nome, mas nenhum contato.
	- Exibir todas as pessoas que possuem telefone cadastrado.

### Requisitos
- Login (pode ser com um usuário gerado previamente);
- Todos os formulários (Inclusão, Edição) devem abrir num modal.
- Utilizar algum framework PHP (Laravel 5+, Yii2, Zend2, etc);
- A cada commit, colocar um descritivo da funcionalidade concluída / ajustada.

### Diferencial
- Utilizar máscaras nos campos.
- Questionar se realmente deseja excluir o registro.
- Exibir mensagens (flashes) na tela após cada ação. Ex: Contato adicionado com sucesso.
- Utilizar migrations.
- Utilizar dependêcias com o composer.
- Utilizar algum framework JS (Rect, Angular +2, Vue).
- Utilizar Docker.
- Utilizar Testes unitários.

### Template
Incluímos um template no repositório, não é obrigado utilizá-lo.


### Não esqueça
Não esqueça de editar este readme no final, nos dizendo como fazemos para rodar seu projeto em nossa máquina, e qual usuário devemos utilizar para logar no sistema

##### *Em caso de dúvidas, sinta-se à vontade para entrar em contato com [weber@avecbrasil.com.br](rodrigo.weber@avecbrasil.com.br).


## ===================================Instalação APP Laravel ==========================================================

### Instalação php
sudo apt-get install php7.4


### Dependência php 
sudo apt install php7.4-cli php7.4-fpm php7.4-json php7.4-pdo php7.4-mysql php7.4-zip php7.4-gd  php7.4-mbstring php7.4-curl php7.4-xml php7.4-bcmath php7.4-json


## Instalar dependencias do projeto
composer update

## carregar os pacotes
composer dump-autoload

## Banco de dados
 php artisan migrate --force


## Instalar nova key app
php artisan key:generate
 
## iniciar app na porta 8000 linux,mac
php -S localhost:8000 server.php

## iniciar no windows
php -S localhost:8000 server.php

## Teste 

sudo apt install phpunit

## Rodando a switch de teste
 va para a raiz do projeto e exeuta no terminal ./test# agenda
