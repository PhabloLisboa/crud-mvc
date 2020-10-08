<?php

namespace App\Controllers;

use App\Models\Funcionario;

class FuncionariosController extends Controller implements BaseActionsInterface{

  public function index(){
    $funcionarios =  Funcionario::all();
    
    return $this->view('ListFuncionarios', ["funcionarios" => $funcionarios]);
  }
  
  public function store(){
    extract($_POST);
    extract($_FILES);


    $funcionario = new Funcionario([
      "name" => $name,
      "cpf" => $cpf,
      "email" => $email,
      "cargo" => $cargo,
    ]);

    $funcionario->save();

    header("Location: http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']);

  }
  public function show(){}
  public function edit(){}
  public function update(){}
  public function destroy(){}

}