<?php

namespace App\Controllers;
include 'utils/utils.php';

use App\Models\Arquivo;
use App\Models\Funcionario;
use App\Models\Telefone;

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


    $funcionario = new Funcionario([
      "name" => $name,
      "cpf" => $cpf,
      "email" => $email,
      "cargo" => $cargo,
    ]);
    $funcionario->image_id = Arquivo::create($image)->id;
    $funcionario->save();

    foreach ($telefones as $num) {
      Telefone::create(['funcionario_id' => $funcionario->id, 'num_telefone' => $num]);
    }

    redirect("", ['type' => "success", "message" => "Inserido com sucesso!"]);
  }

  public function update($id){
      extract($_POST);
      extract($_FILES);

      $funcionario = Funcionario::find($id);

      if($funcionario)
        $funcionario->update($_POST);

  
      foreach ($telefones as $i => $num) {
        Telefone::find($i)->update(['num_telefone' => $num]);
      }

      if($image['name']){
        Arquivo::edit($funcionario->image_id, $image);
      }

    redirect("", ['type' => "success", "message" => "Atualizado com sucesso!"]);
  }

  public function destroy($id){
    try {
      Arquivo::remove(Funcionario::find($id)->imagem->id);
      Funcionario::destroy($id);

      redirect("", ['type' => "success", "message" => "Removido com sucesso!"]);

    } catch (\Throwable $th) {
      redirect("", ['type' => "error", "message" => "Erro ao remover!"]);
    }
  }

}