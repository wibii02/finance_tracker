<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tambah kolom dulu (nullable untuk hindari error)
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
            }

            if (Schema::hasColumn('categories', 'nama')) {
                $table->renameColumn('nama', 'nama_kategori');
            }

            if (!Schema::hasColumn('categories', 'tipe')) {
                // STRING bukan ENUM
                $table->string('tipe')->nullable()->after('nama_kategori');
            }
        });

        // 2. Isi data lama
        DB::table('categories')->update([
            'user_id' => 1,
            'tipe'    => 'pemasukan',
        ]);

        // 3. Ubah menjadi NOT NULL
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            $table->string('tipe')->nullable(false)->change();
        });

        // 4. Tambahkan CHECK constraint untuk PostgreSQL
        DB::statement("ALTER TABLE categories ADD CONSTRAINT tipe_check CHECK (tipe IN ('pemasukan','pengeluaran'));");

        // 5. Foreign key user_id
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

            if (Schema::hasColumn('categories', 'tipe')) {
                $table->dropColumn('tipe');
            }

            if (Schema::hasColumn('categories', 'nama_kategori')) {
                $table->renameColumn('nama_kategori', 'nama');
            }
        });

        // hapus constraint check
        DB::statement("ALTER TABLE categories DROP CONSTRAINT IF EXISTS tipe_check;");
    }
};
