<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPortersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('porters', function (Blueprint $table) {
            $table->foreign('num_Cmde')->references('num_Cmde')->on('commandes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('num_Prdt')->references('num_Prdt')->on('produits')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('porters', function (Blueprint $table) {
          //  $table->dropForeign('porters_num_Cmde_foreign');
            //$table->dropForeign('porters_num_Prdt_foreign');
        });
    }
}
