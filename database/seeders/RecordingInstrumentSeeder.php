<?php

namespace Database\Seeders;

use App\Models\InstrumentCategory;
use App\Models\RecordingInstrument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordingInstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['slug' => 'strings', 'label' => 'Strings', 'sort_order' => 0],
            ['slug' => 'winds', 'label' => 'Winds', 'sort_order' => 1],
            ['slug' => 'percussion', 'label' => 'Percussion', 'sort_order' => 2],
            ['slug' => 'vocal', 'label' => 'Vocal', 'sort_order' => 3],
        ];

        $categoryIds = [];
        foreach ($categories as $category) {
            $categoryIds[$category['slug']] = InstrumentCategory::updateOrCreate(
                ['slug' => $category['slug']],
                ['label' => $category['label'], 'sort_order' => $category['sort_order'], 'is_active' => true]
            )->id;
        }

        $instruments = [
            ['slug' => 'sarangi', 'family' => 'strings', 'name' => 'Sarangi', 'desc' => 'The bowed voice closest to human song — keening sustains, microtonal slides, vocal register.'],
            ['slug' => 'sitar', 'family' => 'strings', 'name' => 'Sitar', 'desc' => 'Drone, bend, and resonance — the sound of meditative gravity and sympathetic shimmer.'],
            ['slug' => 'sarod', 'family' => 'strings', 'name' => 'Sarod', 'desc' => 'Steel-string clarity over a hide-skin body — percussive attack with a singing decay.'],
            ['slug' => 'veena', 'family' => 'strings', 'name' => 'Veena', 'desc' => 'Ancient temple voice — deep gourd resonance, articulated ornaments, ceremonial weight.'],
            ['slug' => 'santoor', 'family' => 'strings', 'name' => 'Santoor', 'desc' => 'Hammered dulcimer in steel and walnut — crystalline tremolo over evening raagas.'],
            ['slug' => 'esraj', 'family' => 'strings', 'name' => 'Esraj', 'desc' => 'Bowed sitar — sustained pathos, slow arc bends, soft register for cinematic restraint.'],
            ['slug' => 'bansuri', 'family' => 'winds', 'name' => 'Bansuri', 'desc' => 'Six-hole bamboo flute — breathy attack, lyrical phrasing, the pastoral and the sacred.'],
            ['slug' => 'shehnai', 'family' => 'winds', 'name' => 'Shehnai', 'desc' => 'Double-reed processional voice — bright, vocal, ceremonial, cuts through any arrangement.'],
            ['slug' => 'algoza', 'family' => 'winds', 'name' => 'Algoza', 'desc' => 'Twin paired flutes — folk drone-and-melody woven from the same breath.'],
            ['slug' => 'tabla', 'family' => 'percussion', 'name' => 'Tabla', 'desc' => 'The conversational drum — articulated language, rhythmic cycles, modern groove anchor.'],
            ['slug' => 'dholak', 'family' => 'percussion', 'name' => 'Dholak', 'desc' => 'Folk barrel drum — punchy mid-low groove, hand-played, festive and cinematic alike.'],
            ['slug' => 'pakhawaj', 'family' => 'percussion', 'name' => 'Pakhawaj', 'desc' => 'The temple ancestor of tabla — deep, ceremonial, dhrupad-grade weight and authority.'],
            ['slug' => 'folk-percussion', 'family' => 'percussion', 'name' => 'Folk Percussion', 'desc' => 'Regional hand drums and frame drums — kanjira, ghatam, daf-style colours and textures.'],
            ['slug' => 'hindustani-vocals', 'family' => 'vocal', 'name' => 'Hindustani Vocals', 'desc' => 'Trained classical voice — alaap to taraana, microtonal phrasing, raaga-authentic delivery.'],
            ['slug' => 'folk-vocals', 'family' => 'vocal', 'name' => 'Folk Vocals', 'desc' => 'Regional voices across Punjab, Rajasthan, Bengal — earthy, communal, modal, character-rich.'],
        ];

        foreach ($instruments as $i => $instrument) {
            RecordingInstrument::updateOrCreate(
                ['detail_slug' => $instrument['slug']],
                [
                    'category_id' => $categoryIds[$instrument['family']],
                    'name' => $instrument['name'],
                    'subtitle' => $instrument['desc'],
                    'image_path' => 'frontend/assets/img/instruments/' . $instrument['slug'] . '.svg',
                    'detail_slug' => $instrument['slug'],
                    'sort_order' => $i,
                    'is_published' => true,
                ]
            );
        }
    }
}
