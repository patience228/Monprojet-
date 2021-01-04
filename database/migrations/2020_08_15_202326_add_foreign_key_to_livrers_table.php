<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToLivrersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('livrers', function (Blueprint $table) {
            $table->foreign('num_Prdt')->references('num_Prdt')->on('produits');
           // $table->foreign('num_Mat')->references('num_Mat')->on('vehicules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('livrers', function (Blueprint $table) {
            $table->dropForeign('livrers_num_Prdt_foreign');
          //  $table->dropForeign('livrers_num_Mat_foreign');
        });
    }
}
