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
        Schema::connection('mysql')->create('data_klaim_lob', function (Blueprint $table) {
            $table->id();
            $table->string('sub_cob');
            $table->string('penyebab_klaim');
            $table->date('periode');
            $table->unsignedBigInteger('wilayah_kerja_id');
            $table->date('tgl_keputusan_klaim');
            $table->integer('jumlah_terjamin');
            $table->bigInteger('nilai_beban_klaim');
            $table->integer('debet_kredit');

            // Foreign key constraint
            $table->foreign('wilayah_kerja_id')
                ->references('id')
                ->on('wilayah_kerja')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('data_klaim_lob');
    }
};
