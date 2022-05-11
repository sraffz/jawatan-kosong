<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJKMatrikulasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_matrikulasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('nama_kolej');
            $table->string('tahun');
            $table->string('bidang');
            $table->string('cgpa');
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
        Schema::dropIfExists('jk_matrikulasi');
    }
}
