<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Widens the product-facing label/name columns to TEXT and wraps their
 * existing plain-English values as {"en": "..."} JSON, so spatie/laravel-translatable
 * (via the `HasTranslations` trait added to these models) can store a value
 * per locale. Existing content becomes the English translation; other
 * locales fall back to English until filled in.
 */
return new class extends Migration
{
    private const LABEL_TABLES = [
        'product_families',
        'product_regions',
        'product_moods',
        'product_usecases',
        'product_tags',
    ];

    public function up(): void
    {
        foreach (self::LABEL_TABLES as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->text('label')->change();
            });

            $this->wrapAsEnglish($table, ['label']);
        }

        Schema::table('products', function (Blueprint $t) {
            $t->text('name')->change();
            $t->text('tagline')->change();
            $t->text('family_label_override')->nullable()->change();
            $t->text('region_label_override')->nullable()->change();
        });

        $this->wrapAsEnglish('products', ['name', 'tagline', 'family_label_override', 'region_label_override']);
    }

    public function down(): void
    {
        $this->unwrapFromEnglish('products', ['name', 'tagline', 'family_label_override', 'region_label_override']);

        Schema::table('products', function (Blueprint $t) {
            $t->string('name')->change();
            $t->string('tagline')->change();
            $t->string('family_label_override')->nullable()->change();
            $t->string('region_label_override')->nullable()->change();
        });

        foreach (self::LABEL_TABLES as $table) {
            $this->unwrapFromEnglish($table, ['label']);

            Schema::table($table, function (Blueprint $t) {
                $t->string('label')->change();
            });
        }
    }

    private function wrapAsEnglish(string $table, array $columns): void
    {
        foreach (DB::table($table)->select(array_merge(['id'], $columns))->get() as $row) {
            $update = [];
            foreach ($columns as $column) {
                $value = $row->{$column};
                $update[$column] = $value === null ? null : json_encode(['en' => $value], JSON_UNESCAPED_UNICODE);
            }
            DB::table($table)->where('id', $row->id)->update($update);
        }
    }

    private function unwrapFromEnglish(string $table, array $columns): void
    {
        foreach (DB::table($table)->select(array_merge(['id'], $columns))->get() as $row) {
            $update = [];
            foreach ($columns as $column) {
                $value = $row->{$column};
                if ($value === null) {
                    $update[$column] = null;
                    continue;
                }
                $decoded = json_decode($value, true);
                $update[$column] = is_array($decoded) ? ($decoded['en'] ?? reset($decoded)) : $value;
            }
            DB::table($table)->where('id', $row->id)->update($update);
        }
    }
};
