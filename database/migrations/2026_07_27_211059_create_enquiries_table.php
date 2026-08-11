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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('type');                 // general | recording | collaborator
            $table->string('programme')->nullable(); // child id, e.g. collab-composers' parent programme
            $table->string('route_key')->nullable();  // CC_ENQUIRY_HUB routeKey (future routing/notification)
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->json('fields');                  // full dynamic field payload (source of truth)
            $table->boolean('agree')->default(false);
            $table->string('surface')->nullable();    // page path the form was submitted from
            $table->string('user_agent')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();

            $table->index(['type', 'programme']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
