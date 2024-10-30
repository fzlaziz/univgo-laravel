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
        Schema::create('campuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('date');
            $table->string('logo_path')->nullable();
            $table->float('address_latitude');
            $table->float('address_longitude');
            $table->string('web_address');
            $table->string('phone_number');
            $table->integer('rank_score');
            $table->integer('number_of_graduates');
            $table->integer('number_of_registrants');

            $table->integer('min_single_tuition')->nullable();
            $table->integer('max_single_tuition')->nullable();

            $table->unsignedBigInteger('accreditation_id');
            $table->unsignedBigInteger('village_id')->nullable();

            $table->foreign('accreditation_id')->references('id')->on('accreditations');
            $table->foreign('village_id')->references('id')->on('indonesia_villages');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campuses');
    }
};
