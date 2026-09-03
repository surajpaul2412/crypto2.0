<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recording_instrument_pairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recording_instrument_id')->constrained()->cascadeOnDelete();
            $table->foreignId('paired_instrument_id')->constrained('recording_instruments')->cascadeOnDelete();
            $table->string('relationship_label');
            $table->text('description');
            $table->json('why_bullets');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recording_instrument_pairs');
    }
};
