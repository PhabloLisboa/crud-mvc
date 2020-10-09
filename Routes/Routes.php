<?php
namespace Routes;
use Routes\Router;
use Controllers\TesteController;

class Routes{
  public static function initRoutes(){
    
    Router::add('/', 'FuncionariosController@index');
    Router::add('/funcionarios', 'FuncionariosController@store', 'post');
    Router::add('/funcionarios/([0-9]*)','FuncionariosController@destroy', 'delete');
    Router::add('/funcionarios/([0-9]*)','FuncionariosController@update', 'put');

    Router::run('/');
  }
}