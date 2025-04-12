<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('description');
            $table->string('profile');
            $table->string('background');
            $table->string('location');
            $table->string('specialty');
            $table->string('education');
            $table->year('experience');
            $table->timestamps();


            // Set artistId as a foreign key referencing the id column in the users table
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
