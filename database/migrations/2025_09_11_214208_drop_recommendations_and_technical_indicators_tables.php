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
        Schema::dropIfExists('recommendations');
        Schema::dropIfExists('technical_indicators');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate recommendations table
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category');
            $table->string('main_category')->nullable();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->text('detailed_images')->nullable();
            $table->text('detailed_videos')->nullable();
            $table->boolean('is_main_category')->default(false);
            $table->string('author');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // Recreate technical_indicators table
        Schema::create('technical_indicators', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->string('video_url')->nullable();
            $table->string('duration')->nullable();
            $table->string('level');
            $table->string('main_category')->nullable();
            $table->text('detailed_images')->nullable();
            $table->text('detailed_videos')->nullable();
            $table->boolean('is_main_category')->default(false);
            $table->string('author');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }
};
