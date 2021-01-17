## Teste 123Milhas Back-end
 Projeto com o objetico consumir e disponibilar dados através de API padrão REST.
 Projeto feito com uso da framework Laravel.

## Servidor Web
- Host: <teste123milhas.herokuapp.com>
- GET: /api/flight/search -> Lista todos os voos disponíveis
- GET: /api/flight/search/group -> Lista os voos agrupados por tarifa e nos valores dos voos de ida/volta

## Pré-requisitos 

- PHP v7.4.13 ou superior [documentation](https://www.php.net/downloads.php)
- Laravel v8.22.1 [documentation](https://laravel.com/docs)

## Clone este repositório

$ git clone <https://github.com/Edilsonss123/teste123milhas.git> teste123milhas

# Acesse a pasta do projeto no terminal/cmd

$ cd teste123milhas

# Instalando dependência 

$ composer install

# Gerando chave projeto

$ php artisan key:generate 

# Iniciando servidor projeto

$ php artisan serve --port=2021

O servidor inciará na porta:2121 - acesse <http://localhost:2021/>