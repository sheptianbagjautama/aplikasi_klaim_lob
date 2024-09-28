<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('data_integrasi', function (Blueprint $table) {
            $table->id();
            $table->string('lob');
            $table->string('penyebab_klaim');
            $table->date('periode');
            $table->bigInteger('nilai_beban_klaim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('data_integrasi');
    }
};
