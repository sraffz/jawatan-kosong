<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJKMaklumatTambahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_maklumat_tambahan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pengguna');
            $table->string('lesen');
            $table->string('inggeris');
            $table->string('arab');
            $table->string('cina');
            $table->string('asing');
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
        Schema::dropIfExists('jk_maklumat_tambahan');
    }
}
