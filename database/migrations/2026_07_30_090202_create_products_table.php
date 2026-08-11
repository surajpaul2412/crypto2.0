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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained('product_families')->restrictOnDelete();
            $table->foreignId('region_id')->constrained('product_regions')->restrictOnDelete();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('tagline');
            $table->string('family_label_override')->nullable();
            $table->string('region_label_override')->nullable();
            $table->string('image_path');
            $table->unsignedInteger('price')->default(0);
            $table->string('format')->default('kontakt');
            $table->string('artist')->nullable();
            $table->boolean('flagship')->default(false);
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
        Schema::dropIfExists('products');
    }
};
