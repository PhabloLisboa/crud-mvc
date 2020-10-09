<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Funcionario extends Eloquent

{

  protected $fillable = ['name', 'email', 'cargo','cpf', 'image_id'];
  protected $with = ['telefone', 'imagem'];

  public function telefone() {
      return $this->hasMany(Telefone::class, 'funcionario_id');
  }

  public function imagem() {
    return $this->hasOne(Arquivo::class, 'id','image_id', );
  }

 }