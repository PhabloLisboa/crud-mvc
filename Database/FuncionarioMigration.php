<?php
namespace Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class FuncionarioMigration{

  public function run(){
    Capsule::schema()->create('funcionarios', function ($table) {

      $table->increments('id');
      $table->string('name');
      $table->string('email')->unique();
      $table->string('cargo');
      $table->string('cpf')->unique();
      $table->integer('image_id')->nullable()->unsigned();
      $table->timestamps();
      
      $table->foreign('image_id')->references('id')->on('arquivos');
      
    });
  }


}
