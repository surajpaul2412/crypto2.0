<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('recording_instruments', function (Blueprint $table) {
            $table->string('subhead_accent')->nullable()->after('subtitle');
            $table->text('subhead_body')->nullable()->after('subhead_accent');
            $table->text('tagline')->nullable()->after('subhead_body');
            $table->text('meta_description')->nullable()->after('tagline');

            $table->json('brings')->nullable()->after('meta_description');

            $table->string('anatomy_image_path')->nullable()->after('brings');
            $table->string('anatomy_photo_aspect')->default('3/4')->after('anatomy_image_path');

            $table->unsignedTinyInteger('sonic_range_start_pct')->nullable()->after('anatomy_photo_aspect');
            $table->unsignedTinyInteger('sonic_range_end_pct')->nullable()->after('sonic_range_start_pct');
            $table->unsignedTinyInteger('sonic_sweet_pct')->nullable()->after('sonic_range_end_pct');
            $table->string('sonic_sweet_label')->nullable()->after('sonic_sweet_pct');
            $table->text('sonic_range_caption')->nullable()->after('sonic_sweet_label');

            $table->string('sonic_dynamic_range_value')->nullable()->after('sonic_range_caption');
            $table->text('sonic_dynamic_range_detail')->nullable()->after('sonic_dynamic_range_value');
            $table->string('sonic_stereo_value')->nullable()->after('sonic_dynamic_range_detail');
            $table->text('sonic_stereo_detail')->nullable()->after('sonic_stereo_value');
            $table->string('sonic_mic_value')->nullable()->after('sonic_stereo_detail');
            $table->text('sonic_mic_detail')->nullable()->after('sonic_mic_value');

            $table->text('icon_svg')->nullable()->after('sonic_mic_detail');
        });
    }

    public function down(): void
    {
        Schema::table('recording_instruments', function (Blueprint $table) {
            $table->dropColumn([
                'subhead_accent',
                'subhead_body',
                'tagline',
                'meta_description',
                'brings',
                'anatomy_image_path',
                'anatomy_photo_aspect',
                'sonic_range_start_pct',
                'sonic_range_end_pct',
                'sonic_sweet_pct',
                'sonic_sweet_label',
                'sonic_range_caption',
                'sonic_dynamic_range_value',
                'sonic_dynamic_range_detail',
                'sonic_stereo_value',
                'sonic_stereo_detail',
                'sonic_mic_value',
                'sonic_mic_detail',
                'icon_svg',
            ]);
        });
    }
};
