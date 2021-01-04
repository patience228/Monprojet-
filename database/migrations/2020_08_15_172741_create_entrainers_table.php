<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrainers', function (Blueprint $table) {
            $table->integer('num_Fact')->unsigned();
            $table->integer('num_Reglem')->unsigned();;
            $table->float('MT_Reglem');
            $table->float('REM');
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
        Schema::dropIfExists('entrainers');
    }
}
