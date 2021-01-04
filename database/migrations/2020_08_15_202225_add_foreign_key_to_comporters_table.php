<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToComportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comporters', function (Blueprint $table) {
            $table->foreign('num_Fact')->references('num_Fact')->on('factures');
            $table->foreign('num_Prdt')->references('num_Prdt')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comporters', function (Blueprint $table) {
            $table->dropForeign('comporters_num_Fact_foreign');
            $table->dropForeign('comporters_num_Prdt_foreign');
        });
    }
}
