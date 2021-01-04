<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
           $table->foreign('num_Clt')->references('num_Clt')->on('clients')->onDelete('cascade')->onUpdate('cascade');
          // $table->foreign('num_Prdt')->references('num_Prdt')->on('produits');
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
           // $table->dropForeign('commandes_num_Clt_foreign');
          // $table->dropForeign('commandes_num_Prdt_foreign');
        });
    }
}
