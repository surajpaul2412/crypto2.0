<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recording_instrument_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recording_instrument_id')->constrained()->cascadeOnDelete();
            $table->string('chip_label');
            $table->string('name');
            $table->string('style_label')->nullable();
            $table->text('character_body');
            $table->text('when_text');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recording_instrument_variants');
    }
};
