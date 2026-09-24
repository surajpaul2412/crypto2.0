<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['enquiries', 'collaboration_requests'] as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->timestamp('read_at')->nullable()->index();
            });
        }
    }

    public function down(): void
    {
        foreach (['enquiries', 'collaboration_requests'] as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('read_at');
            });
        }
    }
};
