<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJKPengalamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_pengalaman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('nama_jawatan');
            $table->string('majikan');
            $table->string('alamat_majikan');
            $table->string('taraf_jawatan');
            $table->date('mula_kerja');
            $table->date('akhir_kerja');
            $table->date('tugas');
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
        Schema::dropIfExists('jk_pengalaman');
    }
}
