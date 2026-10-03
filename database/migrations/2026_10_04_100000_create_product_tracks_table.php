<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            // R2 object key of the uploaded master (WAV or MP3) — never
            // served directly. The public preview route reads only the
            // first `preview_seconds` of audio from it, on every request.
            $table->string('audio_path');
            $table->string('mime_type', 60)->nullable();
            $table->unsignedSmallInteger('preview_seconds')->default(45);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_tracks');
    }
};
