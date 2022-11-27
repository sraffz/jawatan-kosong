<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJKPasangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_pasangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pengguna');
            $table->string('nama_pasangan');
            $table->string('tempat_lahir_pasangan');
            $table->string('pekerjaan_pasangan');
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
        Schema::dropIfExists('jk_pasangan');
    }
}
