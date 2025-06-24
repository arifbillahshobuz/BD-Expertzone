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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->longText('content')->nullable();
            $table->string('media')->nullable();
            $table->string('slug', 100)->unique();
            $table->boolean('is_published')->default(false);
            $table->tinyInteger('type')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_category_id')->nullable()->constrained('post_categories')->restrictOnDelete()->cascadeOnUpdate();
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->index(['type', 'is_published']);

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
