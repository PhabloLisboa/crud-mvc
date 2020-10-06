<?php
function autoload ($className) {
      require_once './vendor/autoload.php';
      $ds = DIRECTORY_SEPARATOR;
      
      $directories = [
            "models" => "Models",
            "controllers" => "Controllers",
            "database" => "Database",
            "config"=> "Config",
            "routes" => "Routes"
      ];
      foreach ($directories as $folder) {
            $fld = __DIR__.$ds.$folder;
            
            foreach (scandir($fld) as $class) {
                  if(preg_match('/.php$/',$class))
                        require_once $fld.$ds.$class;

            }
    
      }
    }