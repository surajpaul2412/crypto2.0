<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Regional pricing: an optional India-only override price on products, and
 * a currency snapshot on orders/order_items so a purchase always shows the
 * currency the customer actually paid in — even if the product's price (or
 * INR override) changes afterwards, or the visitor is browsing in a
 * different region on a later visit.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price_inr', 10, 2)->nullable()->after('price');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->string('currency', 3)->default('USD')->after('subtotal');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->string('currency', 3)->default('USD')->after('price');
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('currency');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('currency');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price_inr');
        });
    }
};
