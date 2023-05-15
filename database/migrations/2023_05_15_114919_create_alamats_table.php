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
        Schema::create('alamats', function (Blueprint $table) {
            $table->id();
            $table->string('npm');
            $table->text('alamat')->nullable();
            $table->string('province')->nullable();
            $table->string('province_id')->nullable();
            $table->string('regency')->nullable();
            $table->string('regency_id')->nullable();
            $table->string('district')->nullable();
            $table->string('district_id')->nullable();
            $table->string('village')->nullable();
            $table->string('village_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamats');
    }
};
