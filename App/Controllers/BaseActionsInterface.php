<?php
namespace App\Controllers;

interface BaseActionsInterface{

  public function index();
  public function update($id);
  public function destroy($id);
}