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
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('artistId');
            $table->string('image');
            $table->string('description');
            $table->decimal('rating', 2, 1);
            $table->string('dimension', 50);
            $table->string('medium');
            $table->decimal('price', 10, 2);
            $table->string('category');
            $table->year('year');
            $table->timestamps();


            // Set artistId as a foreign key referencing the id column in the users table
            $table->foreign('artistId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};
