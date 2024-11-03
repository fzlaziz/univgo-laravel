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
        Schema::create('campus_rankings', function (Blueprint $table) {
            $table->id();
            $table->string('source');
            $table->integer('rank');

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
        Schema::dropIfExists('campus_rankings');
    }
};
