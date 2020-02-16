<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Database extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id',5);
            $table->text('email', 250);
            $table->text('password');
            $table->string('role', 10);
        });

        Schema::create('arsip', function (Blueprint $table){
            $table->string('idArsip', 15);
            $table->string('tipeSurat', 25);
            $table->string('nomor', 25);
            $table->string('kepada', 100);
            $table->string('tembusan', 100);
            $table->string('lampiran', 100);
            $table->string('perihal', 100);
            $table->date('tanggal');
            $table->string('file', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
