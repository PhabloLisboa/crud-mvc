<?php
namespace App\Models;

use Exception;
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

  public static function create($request){
    $request = (object) $request;
 
    if(count(Funcionario::where('cpf', $request->cpf)->get()) > 0 )
      throw new Exception("Este CPF já esta sendo utilizado");

    if(count(Funcionario::where('email', $request->email)->get()) > 0)
      throw new Exception("Este Email já esta sendo utilizado");

    $funcionario = new Funcionario([
      "name" => $request->name,
      "cpf" => $request->cpf,
      "email" => $request->email,
      "cargo" => $request->cargo,
      "image_id" => Arquivo::create($request->image)->id
    ]);

    $funcionario->save();

    foreach ($request->telefones as $num) {
      Telefone::create(['funcionario_id' => $funcionario->id, 'num_telefone' => $num]);
    }

    return $funcionario;
  }

  public static function edit($id, $request, $image = ["name" => ""]){
    
    if(count(Funcionario::where('cpf', $request->cpf)->get()) > 0 )
    throw new Exception("Este CPF já esta sendo utilizado");
    
    if(count(Funcionario::where('email', $request->email)->get()) > 0)
    throw new Exception("Este Email já esta sendo utilizado");
    
    
    $funcionario = Funcionario::find($id);
    
    if($funcionario){
      $funcionario->update($request);
    }else{
      throw new Exception("Funcionário não Encontrado!");
    }
    
    $request = (object) $request;
    foreach ($request->telefones as $i => $num) {
      Telefone::find($i)->update(['num_telefone' => $num]);
    }
    if($image['name']){
      Arquivo::edit($funcionario->image_id, $image);
    }


  }

 }