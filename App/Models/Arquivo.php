<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Arquivo extends Eloquent

{
  
  protected $fillable = ['path'];

  public static function create($fileToSave){
    try {
      $ext = end(explode('.',$fileToSave['name'])); 
      $newname = bin2hex(random_bytes(16)).".".$ext; 

      $target = 'public/images/'.$newname;
      move_uploaded_file( $fileToSave['tmp_name'], $target);

      $arquivo = new Arquivo(["path"=> $target]);
      $arquivo->save();
      return $arquivo;

    } catch (\Throwable $th) {
      var_dump("Deu merda"); die;
    }
  }

  public static function edit($id, $fileToSave){
    try {
      $old = Arquivo::find($id);
      unlink($old->path);

      $ext = end(explode('.',$fileToSave['name'])); 
      $newname = bin2hex(random_bytes(16)).".".$ext; 
      
      $target = 'public/images/'.$newname;
      move_uploaded_file( $fileToSave['tmp_name'], $target);

      $old->path =  $target;
      $old->save();
      
      return $old;
      
    } catch (\Throwable $th) {
      var_dump("Deu merda"); die;
    }
  }

  public static function remove($id){
    $arquivo = Arquivo::find($id);
    unlink($arquivo->path);

    Arquivo::destroy($id);

  }

 }