<?php
function autoload ($className) {
      require_once './vendor/autoload.php';
      require_once './bootstrap.php';

      $ds = DIRECTORY_SEPARATOR;
      
      $directories = [
            "models" => "App${ds}Models",
            "controllers" => "App${ds}Controllers",
            "database" => "Database",
            "config"=> "Config",
            "routes" => "Routes"
      ];
      foreach ($directories as $folder) {
            $fld = __DIR__.$ds.$folder;
            
            foreach (scandir($fld) as $class) {
                  if(preg_match('/.php$/',$class) && $class !== 'bootDatabase' && $class !== "env.php")
                        require_once $fld.$ds.$class;
           }
    
      }
    }