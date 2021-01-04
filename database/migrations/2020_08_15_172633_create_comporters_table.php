<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comporters', function (Blueprint $table) {
            $table->integer('num_Fact')->unsigned();
            $table->integer('num_Prdt')->unsigned();
            $table->integer('Qte_Fact');
            $table->integer('Qte_Bouteille');
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
        Schema::dropIfExists('comporters');
    }
}
