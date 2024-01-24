<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Adopter;
use App\Models\Animal;
use App\Models\Regency;
use App\Models\SubDistrict;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_adopters', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Adopter::class)->onDelete('cascade');
            $table->foreignIdFor(Regency::class)->onDelete('cascade');
            $table->foreignIdFor(SubDistrict::class)->onDelete('cascade');
            $table->string('nik', 16);
            $table->string('ktp_picture');
            $table->string('full_name', 150);
            $table->date('birthday');
            $table->string('phone', 15);
            $table->string('picture_home');
            $table->string('zip_code', 5);
            $table->string('street');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('maps');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_adopters');
    }
};
