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
        Schema::create('campus_campus_ranking', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses');

            $table->unsignedBigInteger('campus_ranking_id');
            $table->foreign('campus_ranking_id')->references('id')->on('campus_rankings');
            $table->integer('rank');

            $table->unique(['campus_id', 'campus_ranking_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campuses_campus_rankings');
    }
};
