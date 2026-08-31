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
        Schema::create('map_regions', function (Blueprint $table) {
            $table->id();
            // Matches the SVG <g class="state-group" id="state-xxx"> id on the
            // homepage India map exactly — this is the join key the frontend
            // uses to look up popup content for whichever state was clicked.
            // Fixed set (36 rows = India's states/UTs) — not admin-creatable.
            $table->string('state_key')->unique();
            // Name/type/region are shown in the admin list for readability;
            // the live popup still reads name/type/region from the SVG's own
            // data-* attributes (geography never changes), so these are here
            // for admin display only.
            $table->string('name');
            $table->string('type');
            $table->string('region');
            $table->text('tradition');
            $table->string('instruments');
            $table->string('library_url')->nullable();
            $table->string('collab_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('map_regions');
    }
};
