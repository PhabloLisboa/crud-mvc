<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Telefone extends Eloquent

{

  protected $fillable = ['num_telefone', 'funcionario_id'];


 }