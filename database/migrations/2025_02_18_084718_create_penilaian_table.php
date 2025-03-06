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
        // Schema::create('penilaian', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('grup_id');
        //     $table->foreign('grup_id')->references('id')->on('grup');
        //     $table->integer('poin');
        //     $table->datetime('posted_at');
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
        
        // CREATE TABLE "penilaian" (
        //     "id" INTEGER NOT NULL,
        //     "grup_id" integer NOT NULL,
        //     "poin" integer,
        //     "posted_at" datetime,
        //     PRIMARY KEY ("id")
        // );

        // CREATE TABLE "penilaianitem" (
        //     "id" INTEGER NOT NULL,
        //     "penilaian_id" INTEGER,
        //     "kategori_id" INTEGER,
        //     "sub_kategori_id" INTEGER,
        //     "juri_id" integer,
        //     "plus" integer,
        //     "min" integer,
        //     "created_at" datetime,
        //     PRIMARY KEY ("id")
        // );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
