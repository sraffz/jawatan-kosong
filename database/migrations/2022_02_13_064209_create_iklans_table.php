<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIklansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_iklan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun');
            $table->string('bil');
            $table->date('tarikh_mula');
            $table->date('tarikh_tamat');
            $table->string('jenis');
            $table->string('pautan');
            $table->string('id_pencipta');
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
        Schema::dropIfExists('jk_iklan');
    }
}
