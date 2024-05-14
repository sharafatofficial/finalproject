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
        Schema::create('add_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('tag');
            $table->string('thumbnail');
            $table->string('description');
            $table->string('comments')->nullable();
            $table->integer('star_rating')->nullable();
            $table->integer('tranding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_posts');
    }
};
