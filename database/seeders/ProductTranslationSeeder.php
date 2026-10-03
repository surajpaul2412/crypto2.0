<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductFamily;
use App\Models\ProductMood;
use App\Models\ProductRegion;
use App\Models\ProductTag;
use App\Models\ProductUsecase;
use Illuminate\Database\Seeder;

/**
 * German, Spanish and Hindi translations for the shop's translatable fields
 * (Product name/tagline, and the family/region/mood/usecase/tag labels used
 * in its filters). English is the source of truth, set by ProductSeeder;
 * this seeder only adds the `de`/`es`/`hi` locale values on top of it, so it
 * can run after ProductSeeder without needing English repeated here.
 *
 * A machine-quality pass — good enough for real localized browsing, but
 * worth a native-speaker review before this goes in front of paying
 * customers in those markets.
 */
class ProductTranslationSeeder extends Seeder
{
    public function run(): void
    {
        $this->translateLookup(ProductFamily::class, [
            'percussion' => ['de' => 'Perkussion', 'es' => 'Percusión', 'hi' => 'पर्कशन'],
            'strings' => ['de' => 'Saiteninstrumente', 'es' => 'Cuerdas', 'hi' => 'तार वाद्य'],
            'wind' => ['de' => 'Blas-/Rohrblattinstrumente', 'es' => 'Viento/Lengüeta', 'hi' => 'वायु वाद्य'],
            'voice' => ['de' => 'Stimme', 'es' => 'Voz', 'hi' => 'स्वर'],
            'hybrid' => ['de' => 'Hybrid / Sounddesign', 'es' => 'Híbrido / Diseño de sonido', 'hi' => 'हाइब्रिड / साउंड डिज़ाइन'],
        ]);

        $this->translateLookup(ProductRegion::class, [
            'hindustani' => ['de' => 'Hindustani', 'es' => 'Indostánica', 'hi' => 'हिन्दुस्तानी'],
            'folk' => ['de' => 'Volksmusik', 'es' => 'Folclórica', 'hi' => 'लोक'],
            'pan-indian' => ['de' => 'Gesamtindisch', 'es' => 'Pan-india', 'hi' => 'अखिल भारतीय'],
        ]);

        $this->translateLookup(ProductMood::class, [
            'cinematic' => ['de' => 'Filmisch', 'es' => 'Cinematográfico', 'hi' => 'सिनेमाई'],
            'sacred' => ['de' => 'Sakral', 'es' => 'Sagrado', 'hi' => 'पवित्र'],
            'devotional' => ['de' => 'Andächtig', 'es' => 'Devocional', 'hi' => 'भक्तिमय'],
            'ethereal' => ['de' => 'Ätherisch', 'es' => 'Etéreo', 'hi' => 'आलौकिक'],
            'folk' => ['de' => 'Volkstümlich', 'es' => 'Folclórico', 'hi' => 'लोक'],
            'aggressive' => ['de' => 'Aggressiv', 'es' => 'Agresivo', 'hi' => 'आक्रामक'],
        ]);

        $this->translateLookup(ProductUsecase::class, [
            'film' => ['de' => 'Film', 'es' => 'Cine', 'hi' => 'फ़िल्म'],
            'ott' => ['de' => 'OTT', 'es' => 'OTT', 'hi' => 'OTT'],
            'trailer' => ['de' => 'Trailer', 'es' => 'Tráiler', 'hi' => 'ट्रेलर'],
            'meditation' => ['de' => 'Meditation', 'es' => 'Meditación', 'hi' => 'ध्यान'],
            'game' => ['de' => 'Spiel', 'es' => 'Videojuego', 'hi' => 'गेम'],
            'ambient' => ['de' => 'Ambient', 'es' => 'Ambiental', 'hi' => 'एम्बिएंट'],
        ]);

        $this->translateLookup(ProductTag::class, [
            'new' => ['de' => 'Neu', 'es' => 'Nuevo', 'hi' => 'नया'],
            'flagship' => ['de' => 'Flaggschiff', 'es' => 'Insignia', 'hi' => 'फ़्लैगशिप'],
            'bundle' => ['de' => 'Teil einer Suite', 'es' => 'En un paquete', 'hi' => 'सुइट में शामिल'],
            'free' => ['de' => 'Kostenlos', 'es' => 'Gratis', 'hi' => 'मुफ़्त'],
        ]);

        $products = [
            'voices-of-ancient-india' => [
                'name' => ['de' => 'Stimmen des alten Indien', 'es' => 'Voces de la India antigua', 'hi' => 'प्राचीन भारत की आवाज़ें'],
                'tagline' => [
                    'de' => 'Sanskrit-Shlokas, Sufi-Qawwali, andächtige Alaaps — drei Meister-Vokalisten.',
                    'es' => 'Shlokas sánscritos, qawwali sufí, alaaps devocionales — tres vocalistas maestros.',
                    'hi' => 'संस्कृत श्लोक, सूफ़ी क़व्वाली, भक्तिमय आलाप — तीन उस्ताद गायक।',
                ],
            ],
            'solo-tabla' => [
                'name' => ['de' => 'Solo-Tabla', 'es' => 'Tabla solo', 'hi' => 'सोलो तबला'],
                'tagline' => [
                    'de' => 'Flaggschiff-Tabla zum Spielen — 2,1 GB, 2 Mikrofonpositionen, 8 Video-Tutorials.',
                    'es' => 'Tabla interpretable insignia — 2,1 GB, 2 posiciones de micrófono, 8 tutoriales en vídeo.',
                    'hi' => 'फ़्लैगशिप बजाने-योग्य तबला — 2.1 GB, 2 माइक पोज़िशन, 8 वीडियो ट्यूटोरियल।',
                ],
            ],
            'bollywood-harmonium' => [
                'name' => ['de' => 'Bollywood-Harmonium', 'es' => 'Armonio de Bollywood', 'hi' => 'बॉलीवुड हारमोनियम'],
                'tagline' => [
                    'de' => 'Drei Harmonium-Varianten, aufgenommen mit Royer 122 — die Seele der indischen Melodie.',
                    'es' => 'Tres variedades de armonio grabadas con Royer 122 — el alma de la melodía india.',
                    'hi' => 'Royer 122 से रिकॉर्ड किए गए तीन हारमोनियम प्रकार — भारतीय धुन की आत्मा।',
                ],
            ],
            'solo-dholak' => [
                'name' => ['de' => 'Solo-Dholak', 'es' => 'Dholak solo', 'hi' => 'सोलो ढोलक'],
                'tagline' => [
                    'de' => 'Handgespielte Dholak mit 14 Artikulationen und 10 Round-Robin-Layern.',
                    'es' => 'Dholak tocado a mano con 14 articulaciones y 10 capas round-robin.',
                    'hi' => 'हाथ से बजाई गई ढोलक — 14 आर्टिक्युलेशन और 10 राउंड-रॉबिन लेयर के साथ।',
                ],
            ],
            'voices-of-ragas-vol-1' => [
                'name' => ['de' => 'Voices of Ragas Vol. 1', 'es' => 'Voices of Ragas Vol. 1', 'hi' => 'वॉयसेज़ ऑफ़ रागास् भाग 1'],
                'tagline' => [
                    'de' => 'Derselbe Sänger in zwei Lebensphasen — 26 Ragas der Banaras-Gharana-Tradition.',
                    'es' => 'El mismo vocalista en dos etapas de su vida — 26 ragas de la tradición Banaras Gharana.',
                    'hi' => 'एक ही गायक के जीवन के दो चरण — बनारस घराने की परंपरा के 26 राग।',
                ],
            ],
            'voices-of-ragas-vol-2' => [
                'name' => ['de' => 'Voices of Ragas Vol. 2', 'es' => 'Voices of Ragas Vol. 2', 'hi' => 'वॉयसेज़ ऑफ़ रागास् भाग 2'],
                'tagline' => [
                    'de' => 'Zwei erfahrene männliche Sänger — langsame und schnelle Sargams mit Geschwindigkeitsregelung.',
                    'es' => 'Dos vocalistas masculinos experimentados — sargams lentos y rápidos con control de velocidad.',
                    'hi' => 'दो अनुभवी पुरुष गायक — गति नियंत्रण के साथ धीमे और तेज़ सरगम।',
                ],
            ],
            'tabla-tarang' => [
                'name' => ['de' => 'Tabla Tarang', 'es' => 'Tabla Tarang', 'hi' => 'तबला तरंग'],
                'tagline' => [
                    'de' => 'Eine fast ausgestorbene Kunstform — 13 handgefertigte Trommeln, 15.000 Samples, 3 Mikrofontypen.',
                    'es' => 'Una forma de arte casi extinta — 13 tambores hechos a mano, 15.000 samples, 3 tipos de micrófono.',
                    'hi' => 'लगभग लुप्त हो चुकी कला — 13 हस्तनिर्मित ढोल, 15,000 सैंपल, 3 माइक प्रकार।',
                ],
            ],
            'tabla-loops' => [
                'name' => ['de' => 'Tabla Loops', 'es' => 'Tabla Loops', 'hi' => 'तबला लूप्स'],
                'tagline' => [
                    'de' => 'Über 1.130 Artikulationsphrasen von einem Meister der Banaras-Gharana · 70 bis 140 BPM.',
                    'es' => 'Más de 1.130 frases de articulación de un maestro de Banaras Gharana · 70 a 140 BPM.',
                    'hi' => 'बनारस घराने के उस्ताद द्वारा 1,130+ आर्टिक्युलेशन फ़्रेज़ · 70 से 140 BPM।',
                ],
            ],
            'dholak-loops' => [
                'name' => ['de' => 'Dholak Loops', 'es' => 'Dholak Loops', 'hi' => 'ढोलक लूप्स'],
                'tagline' => [
                    'de' => 'Live aufgenommene Folk-Dholak-Grooves — tempofest, einsatzbereit für die Filmmusik.',
                    'es' => 'Grooves de dholak folclórico grabados en vivo — sincronizados al tempo, listos para bandas sonoras.',
                    'hi' => 'लाइव रिकॉर्ड किए गए लोक ढोलक ग्रूव — टेम्पो में बंधे, स्कोरिंग के लिए तैयार।',
                ],
            ],
            'tarangs' => [
                'name' => ['de' => 'Tarangs', 'es' => 'Tarangs', 'hi' => 'तरंग'],
                'tagline' => [
                    'de' => 'Jal Tarang, Tabla Tarang & Spoon Tarang — Instrumente, die die meisten noch nie gehört haben.',
                    'es' => 'Jal Tarang, Tabla Tarang y Spoon Tarang — instrumentos que la mayoría nunca ha escuchado.',
                    'hi' => 'जल तरंग, तबला तरंग और स्पून तरंग — ऐसे वाद्य जो अधिकतर लोगों ने कभी नहीं सुने।',
                ],
            ],
            'swarmandal' => [
                'name' => ['de' => 'Swarmandal', 'es' => 'Swarmandal', 'hi' => 'स्वरमंडल'],
                'tagline' => [
                    'de' => 'Indische Harfe · 21 Saiten · sanfter, sakraler Glanz für Ambient- und andächtige Cues.',
                    'es' => 'Arpa india · 21 cuerdas · un brillo suave y sagrado para escenas ambientales y devocionales.',
                    'hi' => 'भारतीय वीणा · 21 तार · एम्बिएंट और भक्तिमय दृश्यों के लिए कोमल, पवित्र झंकार।',
                ],
            ],
            'tongue-drum' => [
                'name' => ['de' => 'Tongue Drum', 'es' => 'Tongue Drum', 'hi' => 'टंग ड्रम'],
                'tagline' => [
                    'de' => 'Uralte Resonanz mit Links-Rechts-Hand-Skript — plus 28 Fujara-Texturen.',
                    'es' => 'Resonancia ancestral con patrones para mano izquierda y derecha — más 28 texturas de Fujara.',
                    'hi' => 'दाएँ-बाएँ हाथ के स्क्रिप्ट के साथ प्राचीन गूंज — साथ में 28 फुजारा टेक्सचर।',
                ],
            ],
            'bol-tabla-mouth-percussion' => [
                'name' => ['de' => 'BOL — Tabla-Mundperkussion', 'es' => 'BOL — Percusión vocal de tabla', 'hi' => 'बोल — तबला माउथ पर्कशन'],
                'tagline' => [
                    'de' => 'Tabla-Mundperkussion · 100 % des Erlöses gehen an eine Wohltätigkeitsorganisation für Straßenhunde in Delhi.',
                    'es' => 'Percusión vocal de tabla · el 100 % de los ingresos se dona a una organización benéfica para perros callejeros en Delhi.',
                    'hi' => 'तबला माउथ पर्कशन · दिल्ली के आवारा कुत्तों के लिए 100% आय दान की जाती है।',
                ],
            ],
            'terry-and-bells' => [
                'name' => ['de' => 'Terry & Bells', 'es' => 'Terry & Bells', 'hi' => 'टेरी एंड बेल्स'],
                'tagline' => [
                    'de' => 'Elefantenglocken, Gitarre & 30 Sounddesign-Patches — ein kostenloses Geschenk für Komponisten.',
                    'es' => 'Cascabeles de elefante, guitarra y 30 patches de diseño de sonido — un regalo gratuito para compositores.',
                    'hi' => 'हाथी की घंटियाँ, गिटार और 30 साउंड डिज़ाइन पैच — संगीतकारों के लिए एक मुफ़्त उपहार।',
                ],
            ],
        ];

        foreach ($products as $slug => $fields) {
            $product = Product::where('slug', $slug)->first();

            if (! $product) {
                $this->command?->warn("Product [{$slug}] not found — skipping translations.");

                continue;
            }

            foreach ($fields as $attribute => $locales) {
                foreach ($locales as $locale => $value) {
                    $product->setTranslation($attribute, $locale, $value);
                }
            }

            $product->save();
        }
    }

    /**
     * @param  class-string<\Illuminate\Database\Eloquent\Model>  $model
     * @param  array<string, array<string, string>>  $translationsBySlug
     */
    private function translateLookup(string $model, array $translationsBySlug): void
    {
        foreach ($translationsBySlug as $slug => $locales) {
            $record = $model::where('slug', $slug)->first();

            if (! $record) {
                $this->command?->warn("[{$model}] slug [{$slug}] not found — skipping translations.");

                continue;
            }

            foreach ($locales as $locale => $value) {
                $record->setTranslation('label', $locale, $value);
            }

            $record->save();
        }
    }
}
