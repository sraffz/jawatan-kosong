<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJKSenaraiMatapelajaranSTPMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_senarai_matapelajaran_stpm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subjek');
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
        Schema::dropIfExists('jk_senarai_matapelajaran_stpm');
    }
}
