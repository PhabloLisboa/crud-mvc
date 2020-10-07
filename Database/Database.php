<?php

namespace Database;

spl_autoload_register(function(){  
  require_once './vendor/autoload.php';
  require_once './bootstrap.php';


    foreach (scandir(__DIR__) as $class) {
          if(preg_match('/.php$/',$class))
                require_once $class;
    }
});


class Database{
  private static $migrations = [
      'Database\ArquivoMigration',
      'Database\FuncionarioMigration',
      'Database\TelefoneMigration',
  ];

  public static function run(){
    foreach (Self::$migrations as $m) {

      call_user_func([new $m, 'run']);
    }
  }

}