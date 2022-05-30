<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJKSKMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_skm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namaSijil');
            $table->string('tahunSijil');
            $table->string('jenisSijil');
            $table->string('bm_svm');
            $table->string('cgpa_a');
            $table->string('cgpa_v');
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
        Schema::dropIfExists('jk_skm');
    }
}
