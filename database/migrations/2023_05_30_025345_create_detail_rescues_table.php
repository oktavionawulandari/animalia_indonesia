<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Rescue;
use App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_rescues', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Rescue::class)->onDelete('cascade');
            $table->foreignIdFor(Admin::class)->nullable()->onDelete('cascade');
            $table->string('name_contact', 50);
            $table->string('phone', 15);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_rescues');
    }
};
