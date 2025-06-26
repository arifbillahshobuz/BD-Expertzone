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
        Schema::create('post_reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->morphs('reactable'); // Creates reactable_id and reactable_type fields
            $table->foreignId('reaction_id')->constrained('reactions')->restrictOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            $table->unique(['user_id', 'reactable_id', 'reactable_type']);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_reactions');
    }
};
