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
        Schema::create('recording_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('project_name');
            $table->string('project_type');
            $table->json('instruments');
            $table->string('bpm')->nullable();
            $table->string('raga')->nullable();
            $table->text('brief')->nullable();
            $table->json('reference_links')->nullable();
            $table->date('deadline')->nullable();
            $table->boolean('nda')->default(false);
            $table->boolean('social_ok')->default(false);
            $table->string('surface')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recording_requests');
    }
};
