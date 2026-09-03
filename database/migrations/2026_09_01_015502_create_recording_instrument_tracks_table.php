<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recording_instrument_tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recording_instrument_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['demo', 'articulation']);
            $table->string('art_id')->nullable();
            $table->string('tag_label');
            $table->string('title');
            $table->text('description');
            $table->string('audio_path')->nullable();
            $table->string('peaks_path')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recording_instrument_tracks');
    }
};
