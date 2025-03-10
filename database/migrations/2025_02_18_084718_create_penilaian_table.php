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
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                grup_id integer NOT NULL,
                poin integer,
                posted_at datetime,
                status varchar(1),
                updated_at datetime
            );
        ");

        DB::statement("
            CREATE TABLE penilaianadministrasi (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                administrasi_id INT,
                poin INT,
                penilaian_id INT
            );
        ");

        DB::statement("
            CREATE TABLE penilaianitem (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                penilaian_id INTEGER,
                kategori_id INTEGER,
                sub_kategori_id INTEGER,
                juri integer,
                plus integer,
                min integer,
                created_at datetime
            );
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
