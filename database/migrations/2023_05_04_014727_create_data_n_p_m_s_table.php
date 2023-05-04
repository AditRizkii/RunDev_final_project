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
        Schema::create('data_n_p_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('npm');
            $table->string('nama');
            $table->string('kelamin');
            $table->string('fakultas');
            $table->string('prodi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_n_p_m_s');
    }
};
