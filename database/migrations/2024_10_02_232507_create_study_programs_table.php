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
        Schema::create('study_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');

            $table->unsignedBigInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses');


            $table->unsignedBigInteger('accreditation_id');
            $table->foreign('accreditation_id')->references('id')->on('accreditations');

            $table->unsignedBigInteger('degree_level_id');
            $table->foreign('degree_level_id')->references('id')->on('degree_levels');

            $table->unsignedBigInteger('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('faculties');

            $table->unsignedBigInteger('master_study_program_id');
            $table->foreign('master_study_program_id')->references('id')->on('master_study_programs');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_programs');
    }
};
