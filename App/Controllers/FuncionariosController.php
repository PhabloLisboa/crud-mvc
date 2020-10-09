<?php

namespace App\Controllers;
include 'utils/utils.php';

use App\Models\Arquivo;
use App\Models\Funcionario;

class FuncionariosController extends Controller implements BaseActionsInterface{

  public function index(){
    $funcionarios =  Funcionario::all();

    $feedback = $_SESSION['feedback'];
    $_SESSION['feedback'] = null;

    return $this->view('ListFuncionarios', ["funcionarios" => $funcionarios, "feedback" => $feedback]);
  }
  
  public function store(){
    extract($_POST);
    extract($_FILES);

    try {
      $funcionario = Funcionario::create([
        "name" => $name,
        "cpf" => $cpf,
        "email" => $email,
        "cargo" => $cargo,
        "telefones" => $telefones,
        "image" => $image
      ]);
    
      $funcionario &&  redirect("", ['type' => "success", "message" => "Inserido com sucesso!"]);
      
    } catch (\Throwable $e) {
      redirect("", ['type' => "error", "message" => $e->getMessage()]);
    }  
  }

  public function update($id){
    extract($_FILES);

    try {
      Funcionario::edit($id, $_POST, $image);
      redirect("", ['type' => "success", "message" => "Atualizado com sucesso!"]);
    } catch (\Throwable $e) {
      redirect("", ['type' => "error", "message" => $e->getMessage()]);
    }
  }

  public function destroy($id){
    try {
      Funcionario::destroy($id);
      Arquivo::remove(Funcionario::find($id)->imagem->id);

      redirect("", ['type' => "success", "message" => "Removido com sucesso!"]);

    } catch (\Throwable $e) {
      redirect("", ['type' => "error", "message" => "Erro ao remover!"]);
    }
  }

}