<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIklanJawatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_iklan_jawatan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_jawatan');
            $table->string('gred');
            $table->string('kump_perkhidmatan');
            $table->string('taraf_jawatan');
            $table->string('nama_fail');
            $table->string('format');
            $table->string('lokasi_fail');
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
        Schema::dropIfExists('jk_iklan_jawatan');
    }
}
