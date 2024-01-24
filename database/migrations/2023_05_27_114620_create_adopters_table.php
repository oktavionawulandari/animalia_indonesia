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
        Schema::create('adopters', function (Blueprint $table) {
            $table->id();
            $table->string('username', 30)->unique();
            $table->string('email')->unique();
            $table->string('profile');
            $table->string('verify_key');
            $table->string('password');
            $table->enum('status',['1', '2']);
            $table->enum('level',['Adopter']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adopters');
    }
};
