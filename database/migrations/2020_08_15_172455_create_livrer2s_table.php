<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrer2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livrer2s', function (Blueprint $table) {
            $table->increments('num_Entree');
            $table->integer('num_Frs')->unsigned();
            $table->integer('num_Prdt')->unsigned();
            $table->date('date_Entree');
            $table->integer('Qte_achete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livrer2s');
    }
}
