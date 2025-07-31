<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_id');
            $table->foreignId('to_id');
            $table->text('body')->nullable();
            $table->json('attachment')->nullable();
            $table->boolean('seen')->default(0);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
