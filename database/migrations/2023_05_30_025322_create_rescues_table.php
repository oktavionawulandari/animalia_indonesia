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
        Schema::create('rescues', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name_pets', 50);
            $table->string('age', 20);
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('category', ['Dogs', 'Cats']);
            $table->string('location');
            $table->string('information');
            $table->date('date');
            $table->enum('status',['found', 'lost']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescues');
    }
};
