<?php

namespace Controllers;

class FuncionariosController extends Controller implements BaseActionsInterface{

  public function index(){
    return $this->view('ListFuncionarios', ["alho" => "não tem alho"]);
  }
  public function create(){}
  public function store(){}
  public function show(){}
  public function edit(){}
  public function update(){}
  public function destroy(){}

}