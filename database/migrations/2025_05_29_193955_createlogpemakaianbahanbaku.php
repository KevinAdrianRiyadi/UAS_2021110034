<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
                Schema::create('logpemakaianbahanbaku', function (Blueprint $table) {
            $table->id();
            $table->string('id_menu');
            $table->string('id_stokbahanbaku');
            $table->float('jumlah_dipakai'); // total bahan baku yang dipakai
            $table->integer('jumlah_porsi');   // berapa porsi makanan dibuat
            $table->timestamp('tanggal_pemakaian')->useCurrent();
            // $table->string();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
