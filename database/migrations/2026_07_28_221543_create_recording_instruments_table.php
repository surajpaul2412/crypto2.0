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
        Schema::create('recording_instruments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('instrument_categories')->restrictOnDelete();
            $table->string('name');
            $table->text('subtitle');
            $table->string('image_path');
            $table->string('detail_slug')->nullable();
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
        Schema::dropIfExists('recording_instruments');
    }
};
