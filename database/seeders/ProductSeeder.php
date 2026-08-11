<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductFamily;
use App\Models\ProductMood;
use App\Models\ProductRegion;
use App\Models\ProductTag;
use App\Models\ProductUsecase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $families = [
            ['slug' => 'percussion', 'label' => 'Percussion'],
            ['slug' => 'strings', 'label' => 'Strings'],
            ['slug' => 'wind', 'label' => 'Wind / Reed'],
            ['slug' => 'voice', 'label' => 'Voice'],
            ['slug' => 'hybrid', 'label' => 'Hybrid / Sound Design'],
        ];
        $regions = [
            ['slug' => 'hindustani', 'label' => 'Hindustani'],
            ['slug' => 'folk', 'label' => 'Folk'],
            ['slug' => 'pan-indian', 'label' => 'Pan-Indian'],
        ];
        $moods = [
            ['slug' => 'cinematic', 'label' => 'Cinematic'],
            ['slug' => 'sacred', 'label' => 'Sacred'],
            ['slug' => 'devotional', 'label' => 'Devotional'],
            ['slug' => 'ethereal', 'label' => 'Ethereal'],
            ['slug' => 'folk', 'label' => 'Folk'],
            ['slug' => 'aggressive', 'label' => 'Aggressive'],
        ];
        $usecases = [
            ['slug' => 'film', 'label' => 'Film'],
            ['slug' => 'ott', 'label' => 'OTT'],
            ['slug' => 'trailer', 'label' => 'Trailer'],
            ['slug' => 'meditation', 'label' => 'Meditation'],
            ['slug' => 'game', 'label' => 'Game'],
            ['slug' => 'ambient', 'label' => 'Ambient'],
        ];
        $tags = [
            ['slug' => 'new', 'label' => 'New'],
            ['slug' => 'flagship', 'label' => 'Flagship'],
            ['slug' => 'bundle', 'label' => 'In a suite'],
            ['slug' => 'free', 'label' => 'Free'],
        ];

        $familyIds = $this->seedLookup(ProductFamily::class, $families);
        $regionIds = $this->seedLookup(ProductRegion::class, $regions);
        $moodIds = $this->seedLookup(ProductMood::class, $moods);
        $usecaseIds = $this->seedLookup(ProductUsecase::class, $usecases);
        $tagIds = $this->seedLookup(ProductTag::class, $tags);

        $products = [
            [
                'slug' => 'voices-of-ancient-india',
                'name' => 'Voices of Ancient India',
                'tagline' => 'Sanskrit shlokas, Sufi qawwali, devotional alaaps — three master vocalists.',
                'family' => 'voice',
                'region' => 'pan-indian',
                'family_label_override' => null,
                'moods' => ['sacred', 'devotional', 'cinematic', 'ethereal'],
                'usecases' => ['film', 'ott', 'trailer', 'meditation'],
                'tags' => ['new', 'flagship'],
                'format' => 'kontakt',
                'flagship' => true,
                'price' => 129,
                'artist' => 'Three master vocalists',
            ],
            [
                'slug' => 'solo-tabla',
                'name' => 'Solo Tabla',
                'tagline' => 'Flagship playable Tabla — 2.1 GB, 2 mic positions, 8 video tutorials.',
                'family' => 'percussion',
                'region' => 'hindustani',
                'family_label_override' => null,
                'moods' => ['cinematic', 'folk', 'aggressive'],
                'usecases' => ['film', 'ott', 'game', 'trailer'],
                'tags' => ['flagship', 'bundle'],
                'format' => 'kontakt',
                'flagship' => true,
                'price' => 79,
                'artist' => 'Banaras Gharana master',
            ],
            [
                'slug' => 'bollywood-harmonium',
                'name' => 'Bollywood Harmonium',
                'tagline' => 'Three harmonium varieties recorded with Royer 122 — the soul of Indian melody.',
                'family' => 'wind',
                'region' => 'pan-indian',
                'family_label_override' => null,
                'moods' => ['cinematic', 'folk', 'devotional'],
                'usecases' => ['film', 'ott', 'ambient'],
                'tags' => ['flagship'],
                'format' => 'kontakt',
                'flagship' => true,
                'price' => 79,
                'artist' => 'Studio session',
            ],
            [
                'slug' => 'solo-dholak',
                'name' => 'Solo Dholak',
                'tagline' => 'Hand-played Dholak with 14 articulations and 10 round-robin layers.',
                'family' => 'percussion',
                'region' => 'folk',
                'family_label_override' => null,
                'moods' => ['folk', 'cinematic', 'aggressive'],
                'usecases' => ['film', 'ott', 'game', 'trailer'],
                'tags' => ['new'],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 79,
                'artist' => 'Folk percussionist',
            ],
            [
                'slug' => 'voices-of-ragas-vol-1',
                'name' => 'Voices of Ragas Vol 1',
                'tagline' => 'Same vocalist at two life stages — 26 ragas of Banaras Gharana tradition.',
                'family' => 'voice',
                'region' => 'hindustani',
                'family_label_override' => null,
                'moods' => ['cinematic', 'sacred', 'devotional'],
                'usecases' => ['film', 'ott', 'meditation'],
                'tags' => ['bundle'],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 79,
                'artist' => 'Banaras Gharana vocalist',
            ],
            [
                'slug' => 'voices-of-ragas-vol-2',
                'name' => 'Voices of Ragas Vol 2',
                'tagline' => 'Two mature male vocalists — Slow & Fast Sargams with speed control.',
                'family' => 'voice',
                'region' => 'hindustani',
                'family_label_override' => null,
                'moods' => ['cinematic', 'sacred'],
                'usecases' => ['film', 'ott', 'ambient'],
                'tags' => ['bundle'],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 69,
                'artist' => 'Two mature vocalists',
            ],
            [
                'slug' => 'tabla-tarang',
                'name' => 'Tabla Tarang',
                'tagline' => 'Near-extinct art form — 13 handmade drums, 15,000 samples, 3 mic types.',
                'family' => 'percussion',
                'region' => 'hindustani',
                'family_label_override' => null,
                'moods' => ['cinematic', 'ethereal', 'sacred'],
                'usecases' => ['film', 'ott', 'ambient', 'trailer'],
                'tags' => ['bundle'],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 79,
                'artist' => 'Master Tabla Tarang artist',
            ],
            [
                'slug' => 'tabla-loops',
                'name' => 'Tabla Loops',
                'tagline' => '1,130+ articulation phrases by Banaras Gharana master · 70 to 140 BPM.',
                'family' => 'percussion',
                'region' => 'hindustani',
                'family_label_override' => 'Percussion · Loops',
                'moods' => ['cinematic', 'folk', 'aggressive'],
                'usecases' => ['film', 'ott', 'game', 'trailer'],
                'tags' => ['bundle'],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 49,
                'artist' => 'Banaras Gharana master',
            ],
            [
                'slug' => 'dholak-loops',
                'name' => 'Dholak Loops',
                'tagline' => 'Folk Dholak grooves recorded live — tempo-locked, ready for cue scoring.',
                'family' => 'percussion',
                'region' => 'folk',
                'family_label_override' => 'Percussion · Loops',
                'moods' => ['folk', 'cinematic'],
                'usecases' => ['film', 'ott', 'game'],
                'tags' => [],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 49,
                'artist' => 'Folk percussionist',
            ],
            [
                'slug' => 'tarangs',
                'name' => 'Tarangs',
                'tagline' => 'Jal Tarang, Tabla Tarang & Spoon Tarang — instruments most have never heard.',
                'family' => 'hybrid',
                'region' => 'pan-indian',
                'family_label_override' => null,
                'moods' => ['ethereal', 'cinematic', 'sacred'],
                'usecases' => ['film', 'ott', 'ambient', 'meditation'],
                'tags' => [],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 49,
                'artist' => 'Studio ensemble',
            ],
            [
                'slug' => 'swarmandal',
                'name' => 'Swarmandal',
                'tagline' => 'Indian harp · 21 strings · soft, sacred shimmer for ambient and devotional cues.',
                'family' => 'strings',
                'region' => 'hindustani',
                'family_label_override' => null,
                'moods' => ['ethereal', 'sacred', 'devotional'],
                'usecases' => ['film', 'ott', 'ambient', 'meditation'],
                'tags' => [],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 69,
                'artist' => 'Classical strings player',
            ],
            [
                'slug' => 'tongue-drum',
                'name' => 'Tongue Drum',
                'tagline' => 'Ancient resonance with left & right hand script — plus 28 Fujara textures.',
                'family' => 'hybrid',
                'region' => 'pan-indian',
                'family_label_override' => null,
                'moods' => ['ethereal', 'cinematic'],
                'usecases' => ['ambient', 'meditation', 'game'],
                'tags' => [],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 49,
                'artist' => 'Studio session',
            ],
            [
                'slug' => 'bol-tabla-mouth-percussion',
                'name' => 'BOL — Tabla Mouth Percussion',
                'tagline' => 'Tabla mouth percussion · 100% revenue to charity for street dogs in Delhi.',
                'family' => 'voice',
                'region' => 'hindustani',
                'family_label_override' => 'Voice · Percussion',
                'moods' => ['folk', 'aggressive'],
                'usecases' => ['game', 'trailer', 'ott'],
                'tags' => ['bundle'],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 29,
                'artist' => 'Tabla mouth artist',
            ],
            [
                'slug' => 'terry-and-bells',
                'name' => 'Terry & Bells',
                'tagline' => 'Elephant bells, guitar & 30 sound design patches — a free gift to composers.',
                'family' => 'hybrid',
                'region' => 'pan-indian',
                'family_label_override' => null,
                'moods' => ['ethereal', 'cinematic'],
                'usecases' => ['film', 'ott', 'ambient', 'game'],
                'tags' => ['free'],
                'format' => 'kontakt',
                'flagship' => false,
                'price' => 0,
                'artist' => 'Studio session · Alessandro Ponti',
            ],
        ];

        foreach ($products as $i => $p) {
            $product = Product::updateOrCreate(
                ['slug' => $p['slug']],
                [
                    'family_id' => $familyIds[$p['family']],
                    'region_id' => $regionIds[$p['region']],
                    'name' => $p['name'],
                    'tagline' => $p['tagline'],
                    'family_label_override' => $p['family_label_override'],
                    'image_path' => 'frontend/assets/img/products/' . $p['slug'] . '.svg',
                    'price' => $p['price'],
                    'format' => $p['format'],
                    'artist' => $p['artist'],
                    'flagship' => $p['flagship'],
                    'sort_order' => $i,
                    'is_published' => true,
                ]
            );

            $product->moods()->sync(array_map(fn ($slug) => $moodIds[$slug], $p['moods']));
            $product->usecases()->sync(array_map(fn ($slug) => $usecaseIds[$slug], $p['usecases']));
            $product->tags()->sync(array_map(fn ($slug) => $tagIds[$slug], $p['tags']));
        }
    }

    /**
     * @return array<string, int> slug => id
     */
    private function seedLookup(string $modelClass, array $rows): array
    {
        $ids = [];
        foreach ($rows as $i => $row) {
            $ids[$row['slug']] = $modelClass::updateOrCreate(
                ['slug' => $row['slug']],
                ['label' => $row['label'], 'sort_order' => $i, 'is_active' => true]
            )->id;
        }

        return $ids;
    }
}
