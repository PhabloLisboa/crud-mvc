<?php
namespace Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class ArquivoMigration{

  public function run(){
    Capsule::schema()->create('arquivos', function ($table) {
      $table->increments('id');
      $table->string('path');
      $table->timestamps();
    });
  }


}
