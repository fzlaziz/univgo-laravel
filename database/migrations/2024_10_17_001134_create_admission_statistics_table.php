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
        Schema::create('admission_statistics', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->integer('number_of_accepted_students');
            $table->unsignedBigInteger('campus_id');

            $table->foreign('campus_id')->references('id')->on('campuses');

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_statistics');
    }
};
