<?php
namespace Routes;
use Routes\Router;
use Controllers\TesteController;

class Routes{
  public static function initRoutes(){
    
    Router::add('/', 'FuncionariosController@index');
    // Router::add('/asdasd',Controllers\TesteController::teste());
    // Router::add('/contact-form',function(){
    //   echo '<form method="post"><input type="text" name="test" /><input type="submit" value="send" /></form>';
    // },'get');
    // Router::add('/contact-form',function(){
    //   echo 'Hey! The form has been sent:<br/>';
    //   print_r($_POST);
    // },'post');
    // Router::add('/foo/([0-9]*)/bar',function($var1){
    //   echo $var1.' is a great number!';
    // });

    Router::run('/');
  }
}