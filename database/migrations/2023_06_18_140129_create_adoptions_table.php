<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;
use App\Models\Animal;
use App\Models\Adopter;
use App\Models\Form;
use App\Models\DetailAdopter;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Admin::class)->nullable()->onDelete('cascade');
            $table->foreignIdFor(Animal::class)->nullable()->onDelete('cascade');
            // $table->foreignIdFor(Form::class)->nullable()->onDelete('cascade');
            $table->foreignIdFor(Adopter::class)->nullable()->onDelete('cascade');
            // $table->foreignIdFor(DetailAdopter::class)->nullable()->onDelete('cascade');
            $table->enum('adoption', ['Pending', 'Failed', 'Success', 'Free', 'Error']);
            $table->string('message')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoptions');
        event(new \App\Events\AdoptionCreated());
    }
};
