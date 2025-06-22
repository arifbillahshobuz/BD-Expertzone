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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('blood_group', 10)->nullable();
            $table->string('language', 10)->nullable();
            $table->enum('relationship', ['married', 'unmarried'])->nullable();
            $table->text('bio')->nullable();
            $table->string('education', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('hobby', 50)->nullable();
            $table->string('present_address', 50)->nullable();
            $table->string('permanent_address', 50)->nullable();
            $table->foreignId('user_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('designation_id')->constrained()->cascadeOnUpdate();
            $table->string('CV', 1000)->nullable();
            $table->string('cover_photo', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
