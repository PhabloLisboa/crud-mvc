# crud-mvc

## :bulb: Descrição 
Crud em PHP estruturado em MVC.
## :signal_strength: Status

## :memo: Requisitos Mínimos

* git
* PHP ^7.2
* MySQL
* Composer

## 🚀 Clonando

```
$ git clone https://github.com/PhabloLisboa/crud-mvc
$ cd crud-mvc
```

## :wrench: Configure 

```
$ composer install

Defina as configurações do banco em config/env.php
  define('DB_NAME', "nomeDoBanco");
  define('DB_HOST', "host");
  define('DB_USER', "usuario");
  define('DB_PASS', "senha');
  
Execute o script "bootDatabase.php", para estruturar o banco, com o seguinte comando:
  php bootDatabase.php  
```

## :wrench: Rodando o App 

```
$ php -S localhost:8080

> Cheque em http://localhost:8080

PS: substitua "8080" por outra porta se for preciso
```

