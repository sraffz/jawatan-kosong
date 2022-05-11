<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJKPengajianTinggisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_pengajian_tinggi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('kelulusan');
            $table->string('institusi');
            $table->string('nama_institusi');
            $table->string('tahun_graduasi');
            $table->string('bidang_pengkhususan');
            $table->string('nama_skrol');
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
        Schema::dropIfExists('jk_pengajian_tinggi');
    }
}
