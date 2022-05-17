<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJKGambarPassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_gambar_passport', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('nama_gambar');
            $table->string('extension_gambar');
            $table->string('path_gambar');
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
        Schema::dropIfExists('jk_gambar_passport');
    }
}
