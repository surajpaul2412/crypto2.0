<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recording_instrument_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recording_instrument_id')->constrained()->cascadeOnDelete();
            $table->string('yt_id');
            $table->string('role_label');
            $table->string('caption');
            $table->string('duration_label')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recording_instrument_videos');
    }
};
