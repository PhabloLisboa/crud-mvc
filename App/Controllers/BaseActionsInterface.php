<?php
namespace App\Controllers;

interface BaseActionsInterface{

  public function index();
  public function create();
  public function store();
  public function show();
  public function edit();
  public function update();
  public function destroy();
}