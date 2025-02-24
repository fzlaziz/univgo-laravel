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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');

            $table->unsignedBigInteger('campus_id')->nullable();
            $table->unsignedBigInteger('master_faculty_id');
            $table->foreign('campus_id')->references('id')->on('campuses');
            $table->foreign('master_faculty_id')->references('id')->on('faculties');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
