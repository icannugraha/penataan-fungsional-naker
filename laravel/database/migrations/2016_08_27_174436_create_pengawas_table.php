<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengawasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengawas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->string('name');
            $table->string('ttl');
            $table->string('nip');
            $table->string('karpeg');
            $table->string('gender');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('golongan');
            $table->string('tmt');
            $table->string('jabatan');
            $table->string('sertifikasi');
            $table->string('unit');
            $table->string('gaji');
            $table->string('keterangan');
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
        Schema::drop('pengawas');
    }
}
