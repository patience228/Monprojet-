<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToSortirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sortirs', function (Blueprint $table) {
            $table->foreign('num_Fact')->references('num_Fact')->on('factures');
            $table->foreign('cod_Emb')->references('cod_Emb')->on('emballages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sortirs', function (Blueprint $table) {
            $table->dropForeign('sortirs_num_Fact_foreign');
            $table->dropForeign('sortirs_cod_Emb_foreign');
        });
    }
}
