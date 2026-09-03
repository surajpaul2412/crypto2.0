<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recording_instrument_anatomy_parts', function (Blueprint $table) {
            $table->id();
            // Explicit short FK name: the auto-generated one (table + column +
            // "_foreign") exceeds MySQL's 64-char identifier limit here.
            $table->foreignId('recording_instrument_id')
                ->constrained(indexName: 'anatomy_parts_instrument_fk')
                ->cascadeOnDelete();
            $table->string('name');
            $table->string('sub_label')->nullable();
            $table->string('legend_role');
            $table->text('tooltip_text');
            $table->decimal('hotspot_x_pct', 5, 2);
            $table->decimal('hotspot_y_pct', 5, 2);
            $table->enum('anchor', ['above', 'below', 'left', 'right'])->default('above');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recording_instrument_anatomy_parts');
    }
};
