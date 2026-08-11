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
        Schema::create('collaboration_requests', function (Blueprint $table) {
            $table->id();
            $table->string('programme');              // artists|composers|sound|content|producers|ksp|web|designers|affiliates
            $table->string('route_key')->nullable();   // CC_ENQUIRY_HUB routeKey, e.g. collab-composers
            $table->string('name');
            $table->string('based')->nullable();        // "City, country"
            $table->json('links')->nullable();          // work links (multi url field)
            $table->text('why')->nullable();
            $table->boolean('consent')->default(false);  // per-field consent checkbox
            $table->boolean('agree')->default(false);    // agree-gate (collaboration terms points)
            $table->json('fields');                       // full raw field payload (future-proof)
            $table->string('surface')->nullable();         // page path submitted from
            $table->string('user_agent')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();

            $table->index('programme');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaboration_requests');
    }
};
