<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToLivrer2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('livrer2s', function (Blueprint $table) {
        $table->foreign('num_Frs')->references('num_Frs')->on('fournisseurs');
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
        Schema::table('livrer2s', function (Blueprint $table) {
            $table->dropForeign('livrer2s_num_Frs_foreign');
            $table->dropForeign('livrer2s_num_Prdt_foreign');
        });
    }
}
