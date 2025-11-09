<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Cek dulu apakah table sudah ada
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('nama_kategori');
                $table->unsignedBigInteger('user_id');
                $table->string('tipe');
                $table->timestamps();

                // Foreign key
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });

            // Tambahkan CHECK constraint untuk PostgreSQL
            DB::statement("ALTER TABLE categories ADD CONSTRAINT tipe_check CHECK (tipe IN ('pemasukan','pengeluaran'));");
        } else {
            // Jika table sudah ada, kita update kolom jika perlu
            Schema::table('categories', function (Blueprint $table) {
                if (!Schema::hasColumn('categories', 'user_id')) {
                    $table->unsignedBigInteger('user_id')->nullable()->after('id');
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                }

                if (!Schema::hasColumn('categories', 'tipe')) {
                    $table->string('tipe')->nullable()->after('nama_kategori');
                    DB::statement("ALTER TABLE categories ADD CONSTRAINT IF NOT EXISTS tipe_check CHECK (tipe IN ('pemasukan','pengeluaran'));");
                }

                if (Schema::hasColumn('categories', 'nama')) {
                    $table->renameColumn('nama', 'nama_kategori');
                }
            });

            // Bisa update data default jika perlu
            DB::table('categories')->update([
                'user_id' => 1,
                'tipe' => 'pemasukan',
            ]);

            // Ubah kolom menjadi NOT NULL
            Schema::table('categories', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable(false)->change();
                $table->string('tipe')->nullable(false)->change();
            });
        }
    }

    public function down(): void
    {
        // Hapus table jika ada
        if (Schema::hasTable('categories')) {
            Schema::table('categories', function (Blueprint $table) {
                if (Schema::hasColumn('categories', 'user_id')) {
                    $table->dropForeign(['user_id']);
                }
            });

            Schema::dropIfExists('categories');

            // Hapus constraint check
            DB::statement("ALTER TABLE categories DROP CONSTRAINT IF EXISTS tipe_check;");
        }
    }
};
