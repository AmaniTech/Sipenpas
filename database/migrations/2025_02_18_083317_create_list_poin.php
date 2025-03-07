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
        Schema::create('list_poin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_kategori_id');
            $table->foreign('sub_kategori_id')->references('id')->on('sub_kategori');
            $table->integer('min_poin');
            $table->integer('max_poin');
            $table->string( 'level');
            $table->boolean('is_minus');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_poin');
    }
};
