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
        Schema::connection('mysql2')->create('data_log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengiriman');
            $table->string('jumlah_data');
            $table->string('status_pengiriman');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('data_log_aktivitas');
    }
};
