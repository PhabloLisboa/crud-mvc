<?php
namespace App\Controllers;

class Controller {
  public function view($viewName, $viewData = []){
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../Views');
    $twig = new \Twig\Environment($loader);
    $twig->addGlobal('session', $_SESSION);
    
    echo $twig->render($viewName.".html",$viewData);
  }

}