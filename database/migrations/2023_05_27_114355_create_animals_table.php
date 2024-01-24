<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Adopter;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name_pets', 50);
            $table->date('age', 20);
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('category', ['Dogs', 'Cats']);
            $table->string('ras', 100);
            $table->string('vaccine', 150);
            $table->string('information');
            $table->string('description');
            $table->enum('status', ['Pending', 'Error', 'Success', 'Free']);
            $table->string('video');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
