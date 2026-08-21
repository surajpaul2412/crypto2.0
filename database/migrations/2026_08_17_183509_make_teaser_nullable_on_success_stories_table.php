<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Plain ALTER via raw SQL — avoids requiring doctrine/dbal just for a
     * single nullability flip on a `text` column.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE success_stories MODIFY teaser TEXT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE success_stories MODIFY teaser TEXT NOT NULL');
    }
};
