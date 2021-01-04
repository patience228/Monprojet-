<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToEntrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entrainers', function (Blueprint $table) {
            $table->foreign('num_Fact')->references('num_Fact')->on('factures')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('num_Reglem')->references('num_Reglem')->on('reglements')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entrainers', function (Blueprint $table) {
           // $table->dropForeign('entrainers_num_Fact_foreign');
           // $table->dropForeign('entrainers_num_Reglem_foreign');
        });
    }
}
