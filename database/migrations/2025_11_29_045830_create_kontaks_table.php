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
        Schema::create('kontak', function (Blueprint $table) {
            $table->string('no_telp')->primary()->unique();
            $table->string('nama');
            $table->bigInteger('grup_id')->unsigned()->index();
            $table->foreign('grup_id')->references('id')->on('grup')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak');
    }
};
