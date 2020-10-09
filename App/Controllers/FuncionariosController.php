<?php

namespace App\Controllers;

use App\Models\Arquivo;
use App\Models\Funcionario;
use App\Models\Telefone;

class FuncionariosController extends Controller implements BaseActionsInterface{

  public function index(){
    $funcionarios =  Funcionario::all();
    // var_dump($funcionarios[0]->imagem->path); die;
    
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
    $funcionario->image_id = Arquivo::create($image)->id;
    $funcionario->save();

    foreach ($telefones as $num) {
      Telefone::create(['funcionario_id' => $funcionario->id, 'num_telefone' => $num]);
    }



    header("Location: http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']);

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

      if(isset($image)){
        Arquivo::edit($funcionario->image_id, $image);
      }

    header("Location: http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']);

  }

  public function destroy($id){
    Arquivo::remove(Funcionario::find($id)->imagem->id);
    Funcionario::destroy($id);

    header("Location: http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']);

  }

}