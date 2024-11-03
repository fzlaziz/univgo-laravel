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
        Schema::create('campus_degree_level', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses');

            $table->unsignedBigInteger('degree_level_id');
            $table->foreign('degree_level_id')->references('id')->on('degree_levels');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus_degree_level');
    }
};
