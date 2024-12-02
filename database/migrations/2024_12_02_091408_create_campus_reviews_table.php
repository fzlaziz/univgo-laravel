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
        Schema::create('campus_reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('campus_id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('rating')->unsigned()->comment('Rating dari 1 sampai 5');
            $table->text('review')->nullable()->comment('Isi ulasan');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('campus_id')->references('id')->on('campuses');
            $table->softDeletes();

            $table->unique(['campus_id', 'user_id'], 'unique_campus_review');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus_reviews');
    }
};
