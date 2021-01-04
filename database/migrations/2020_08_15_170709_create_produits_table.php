<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('num_Prdt');
            $table->string('design_Prdt',20);
            $table->string('model_Prdt',5);
            $table->integer('PV_Prdt');
           $table->float('Qte_achete');
            $table->integer('num_Frs')->unsigned();
            $table->date('date_Entree');
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
        Schema::dropIfExists('produits');
    }
}
