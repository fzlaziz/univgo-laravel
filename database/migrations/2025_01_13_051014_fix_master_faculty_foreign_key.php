<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $invalidReferences = DB::select("
            SELECT DISTINCT f.master_faculty_id
            FROM faculties f
            LEFT JOIN master_faculties mf ON f.master_faculty_id = mf.id
            WHERE mf.id IS NULL
        ");

        if (!empty($invalidReferences)) {
            throw new \Exception('Found invalid master_faculty_id references. Please fix data before running migration.');
        }

        Schema::table('faculties', function (Blueprint $table) {
            $table->dropForeign(['master_faculty_id']);
            $table->foreign('master_faculty_id')->references('id')->on('master_faculties');
        });
    }

    public function down(): void
    {
        Schema::table('faculties', function (Blueprint $table) {
            $table->dropForeign(['master_faculty_id']);
            $table->foreign('master_faculty_id')->references('id')->on('faculties');
        });
    }
};
