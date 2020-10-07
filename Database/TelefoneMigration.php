<?php
namespace Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class TelefoneMigration{

  public function run(){
    Capsule::schema()->create('telefones', function ($table) {

      $table->increments('id');
      $table->string('num_telefone');
      $table->integer('funcionario_id')->unsigned();
      $table->timestamps();
      
      $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');

    });
  }


}
