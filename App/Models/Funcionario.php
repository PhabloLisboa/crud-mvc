<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Funcionario extends Eloquent

{

  protected $fillable = ['name', 'email', 'cargo','cpf', 'image_id'];

  // public function todo()

  //  {
  //      return $this->hasMany('Todo');

  //  }

 }