<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJKPermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_permohonan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pengguna');
            $table->string('id_iklan');
            $table->string('id_iklan_jawatan');
            $table->date('tarikh_permohonan');
            $table->string('perakuan');
            $table->string('no_siri');
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
        Schema::dropIfExists('jk_permohonan');
    }
}
