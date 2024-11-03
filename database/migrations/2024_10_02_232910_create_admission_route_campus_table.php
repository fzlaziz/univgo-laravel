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
        Schema::create('admission_route_campus', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses');

            $table->unsignedBigInteger('admission_route_id');
            $table->foreign('admission_route_id')->references('id')->on('admission_routes');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_route_campus');
    }
};
