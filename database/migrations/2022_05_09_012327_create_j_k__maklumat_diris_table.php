<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJKMaklumatDirisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jk_maklumatdiri', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('negeri_lahir');
            $table->string('negeri_lahir_bapa');
            $table->string('negeri_lahir_ibu');
            $table->string('jantina');
            $table->string('hari_lahir');
            $table->string('bulan_lahir');
            $table->string('tahun_lahir');
            $table->string('alamat');
            $table->string('alamat2');
            $table->string('poskod');
            $table->string('daerah');
            $table->string('negeri');
            $table->string('notel');
            $table->string('notel2');
            $table->string('agama');
            $table->string('lain_agama');
            $table->string('keturunan');
            $table->string('lain_keturunan');
            $table->string('taraf_kahwin');
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
        Schema::dropIfExists('jk_maklumatdiri');
    }
}
