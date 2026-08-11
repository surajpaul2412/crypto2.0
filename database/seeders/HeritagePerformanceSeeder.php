<?php

namespace Database\Seeders;

use App\Models\HeritageCategory;
use App\Models\HeritagePerformance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeritagePerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['slug' => 'sitar', 'label' => 'Sitar', 'sort_order' => 0],
            ['slug' => 'tabla', 'label' => 'Tabla', 'sort_order' => 1],
            ['slug' => 'vocal', 'label' => 'Vocal', 'sort_order' => 2],
            ['slug' => 'dilruba', 'label' => 'Dilruba', 'sort_order' => 3],
            ['slug' => 'shehnai', 'label' => 'Shehnai', 'sort_order' => 4],
            ['slug' => 'ensemble', 'label' => 'Ensemble', 'sort_order' => 5],
        ];

        $categoryIds = [];
        foreach ($categories as $category) {
            $categoryIds[$category['slug']] = HeritageCategory::updateOrCreate(
                ['slug' => $category['slug']],
                ['label' => $category['label'], 'sort_order' => $category['sort_order'], 'is_active' => true]
            )->id;
        }

        $performances = [
            ['category' => 'sitar', 'youtube_id' => 'pTXWnHvZF8Y', 'title' => 'Raag Ahir Bhairav — sitar at sunrise', 'subtitle' => 'Pt. Sunil Kant Saxena · Qutab Minar, Delhi', 'lightbox_title' => 'Raag Ahir Bhairav at Qutab Minar'],
            ['category' => 'dilruba', 'youtube_id' => 'hv0rjjIy0Xw', 'title' => 'Dilruba — the robber of the heart', 'subtitle' => 'A devotional bow-string piece for evening', 'lightbox_title' => 'Dilruba — robber of the heart'],
            ['category' => 'vocal', 'youtube_id' => 'DAdCP0cQJGY', 'title' => 'Raga Vocals — an aalap on Raga Marwa', 'subtitle' => 'The breath as instrument · dusk practice', 'lightbox_title' => 'Raga Vocals — the dusk hour'],
            ['category' => 'tabla', 'youtube_id' => 'fCNqOViwY9k', 'title' => 'Tabla — Lagi Ladi · rhythm cycle', 'subtitle' => 'A pattern that trains the mind to follow', 'lightbox_title' => 'Tabla — Lagi Ladi'],
            ['category' => 'shehnai', 'youtube_id' => 'fb5leBZASIQ', 'title' => 'Shehnai — the auspicious double-reed', 'subtitle' => 'Mangal vadya · the horn of sanctity', 'lightbox_title' => 'Shehnai performance — the auspicious horn'],
            ['category' => 'sitar', 'youtube_id' => '1GmicrAkzs4', 'title' => 'Velocious — sitar gat in fast tempo', 'subtitle' => 'A study in flow state · the active meditation', 'lightbox_title' => 'Velocious sitar performance'],
            ['category' => 'tabla', 'youtube_id' => 'wb_wm1eAh3I', 'title' => 'Tabla solo — the language of the drum', 'subtitle' => 'Spoken bols · the only drum that speaks like a human', 'lightbox_title' => 'Tabla solo — the language of the drum'],
            ['category' => 'ensemble', 'youtube_id' => 'VYRK4jERXns', 'title' => 'Ensemble — instruments in conversation', 'subtitle' => 'Jugalbandi · the dialogue between voices', 'lightbox_title' => 'Indian ensemble — instruments in conversation'],
            ['category' => 'tabla', 'youtube_id' => 'pIfzZ35J1DM', 'title' => 'Solo Tabla — the magical drum of India', 'subtitle' => 'Resonant and non-resonant strokes · centuries of refinement', 'lightbox_title' => 'Solo Tabla — the magical drum of India'],
            ['category' => 'sitar', 'youtube_id' => 'yMheFloY-V0', 'title' => "Sitar journey — the artist's life", 'subtitle' => 'A portrait of practice across decades', 'lightbox_title' => 'Solo Tabla session — recording for Kontakt'],
            ['category' => 'vocal', 'youtube_id' => 'zdj6GP4XEm0', 'title' => 'Voices of Ragas — the female raga voice', 'subtitle' => 'Eighteen ragas · eighteen emotional states', 'lightbox_title' => 'Voices of Ragas — the female raga voice'],
            ['category' => 'ensemble', 'youtube_id' => 'e4KZ4NuMr0s', 'title' => 'The journey — Crypto Cipher Audio Lab', 'subtitle' => 'Behind the recordings · how we capture the masters', 'lightbox_title' => 'Crypto Cipher Audio Lab — the journey'],
        ];

        foreach ($performances as $i => $performance) {
            HeritagePerformance::updateOrCreate(
                ['youtube_id' => $performance['youtube_id']],
                [
                    'category_id' => $categoryIds[$performance['category']],
                    'youtube_url' => 'https://www.youtube.com/watch?v=' . $performance['youtube_id'],
                    'title' => $performance['title'],
                    'subtitle' => $performance['subtitle'],
                    'lightbox_title' => $performance['lightbox_title'],
                    'sort_order' => $i,
                    'is_published' => true,
                ]
            );
        }
    }
}
