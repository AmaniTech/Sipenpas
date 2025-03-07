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

        DB::statement("
            CREATE TABLE penilaian (
                id INTEGER NOT NULL,
                grup_id integer NOT NULL,
                poin integer,
                posted_at datetime,
                status varchar(1),
                updated_at datetime,
                PRIMARY KEY (id)
            )
        ");

        DB::statement("
            CREATE TABLE penilaianadministrasi (
                id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                administrasi_id INTEGER,
                poin integer,
                penilaian_id INTEGER
            );
        ");

        DB::statement("
            CREATE TABLE penilaianitem (
                id INTEGER NOT NULL,
                penilaian_id INTEGER,
                kategori_id INTEGER,
                sub_kategori_id INTEGER,
                juri_id integer,
                plus integer,
                min integer,
                created_at datetime,
                PRIMARY KEY (id)
            )
        ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
        Schema::dropIfExists('penilaianitem');
        Schema::dropIfExists('penilaianadministrasi');
    }
};
