<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

/**
 * Seeds the About-page gallery from static-site/12_about.html (Gallery00001–7).
 */
class GalleryImageSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 7) as $i => $n) {
            GalleryImage::updateOrCreate(
                ['image_path' => sprintf('frontend/assets/img/gallery/Gallery%05d.jpg', $n)],
                [
                    'caption' => sprintf('Image %02d', $n),
                    'sort_order' => $i,
                    'is_active' => true,
                ]
            );
        }
    }
}
