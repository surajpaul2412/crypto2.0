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
        Schema::create('heritage_performances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('heritage_categories')->restrictOnDelete();
            $table->string('youtube_url');
            $table->string('youtube_id', 20);
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('lightbox_title')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heritage_performances');
    }
};
