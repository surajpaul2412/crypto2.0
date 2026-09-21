<?php

namespace Database\Seeders;

use App\Models\RecordingInstrument;
use Illuminate\Database\Seeder;

/**
 * Detail-page content for Sarangi, structured exactly like
 * SitarRecordingInstrumentSeeder. Video IDs are real Sarangi performances
 * (Ustad Sultan Khan); durations are left blank because they were not
 * verified. Audio demo/articulation tracks have no audio_path yet — upload
 * clips via the admin panel (Recording Instruments → Sarangi → Tracks).
 */
class SarangiRecordingInstrumentSeeder extends Seeder
{
    public function run(): void
    {
        $sarangi = RecordingInstrument::where('detail_slug', 'sarangi')->first();

        if (! $sarangi) {
            $this->command?->warn('Sarangi RecordingInstrument record not found — skipping.');

            return;
        }

        $sarangi->update([
            'subhead_accent' => 'Indian Sarangi Recording Sessions',
            'subhead_body' => '— custom live recordings for film, game & OTT composers, performed by master Hindustani sarangi players.',
            'tagline' => 'The bowed voice closest to human song — keening sustains, microtonal slides, and the sound of a cry that never quite resolves.',
            'anatomy_image_path' => 'frontend/assets/img/instruments/anatomy/sarangi-anatomy.svg',
            'anatomy_photo_aspect' => '1/2',
            'sonic_range_start_pct' => 18,
            'sonic_range_end_pct' => 80,
            'sonic_sweet_pct' => 55,
            'sonic_sweet_label' => 'sweet · 1.5kHz',
            'sonic_range_caption' => 'Active range <em>~100Hz–6kHz</em> — the bowed fundamentals sit squarely in the vocal mids, while the sympathetic <em>tarab</em> strings add a shimmering halo above. Sweet spot for presence around <em>1.5kHz</em>.',
            'sonic_dynamic_range_value' => 'Wide · 25 dB+',
            'sonic_dynamic_range_detail' => 'From a barely-there bowed whisper to a full, cutting <em>tan</em>. Gentle compression keeps the quiet sustains present without flattening the phrasing.',
            'sonic_stereo_value' => "Mono source · stereo'd",
            'sonic_stereo_detail' => 'Captured close on the body for the bow detail, with the wide stereo image built from room mics. Keep it near center for a lead-vocal feel, or spread the room for ambience.',
            'sonic_mic_value' => 'Close body + 6ft room',
            'sonic_mic_detail' => 'Close mic captures bow grain, finger-nail contact and slide detail. Room mic adds bloom and tarab resonance. Both stems delivered.',
            'brings' => [
                [
                    'eyebrow' => 'Emotional role',
                    'title' => 'The voice that weeps.',
                    'body' => 'Sarangi is played with the <em>bow</em> in one hand and the cuticles of the fingers gliding against the strings in the other — so notes slide, sob and cry the way a singer\'s do. It has been called the instrument closest to the human voice, and no other South Asian sound carries grief, longing and intimacy so directly.',
                ],
                [
                    'eyebrow' => 'Cinematic fit',
                    'title' => 'Where it earns its place.',
                    'body' => 'Loss, memory, farewell and quiet reckoning. Solo lines over sparse textures, emotional turning points, dusk and night scenes, period and historical drama. Layers beautifully with low strings, soft pads and voice. Not for light or comic cues, or anything needing bright rhythmic drive — for those, choose sitar, tabla or bansuri.',
                ],
                [
                    'eyebrow' => 'Iconic uses',
                    'title' => "Where you've already heard it.",
                    'body' => 'For generations the sarangi was the accompanist of choice for <em>thumri</em>, <em>khayal</em> and <em>kathak</em>, shadowing the singer note for note. Pandit Ram Narayan then carried it onto the concert stage as a solo instrument from the 1950s, and Ustad Sultan Khan took it to audiences around the world. In film music it appears wherever a score wants classical depth and heartbreak.',
                ],
                [
                    'eyebrow' => 'Cultural context',
                    'title' => 'Where it comes from.',
                    'body' => 'A bowed instrument of North Indian folk and court traditions, refined by hereditary musician families over several centuries. The body is carved from a single block of wood, and it is tuned to the raga, played seated on the ground with the instrument upright. Crypto Cipher\'s sarangi sessions are recorded with master Hindustani performers — not session players approximating the style.',
                ],
            ],
        ]);

        // ── Hero video rail (4) ────────────────────────────────────────
        $videos = [
            ['yt_id' => 'WQIlqqoLyGI', 'role_label' => 'Performance', 'caption' => 'Performance — Raga Malkauns on sarangi', 'duration_label' => null],
            ['yt_id' => 'eoFPTPDEELA', 'role_label' => 'Solo Showcase', 'caption' => 'Solo Showcase — Raga Ahir Bhairav', 'duration_label' => null],
            ['yt_id' => 'j7AvsdX38Mk', 'role_label' => 'Heritage Story', 'caption' => 'Heritage Story — the melodic sarangi and thumri', 'duration_label' => null],
            ['yt_id' => 'c81keYOnfzo', 'role_label' => 'Studio Session', 'caption' => 'Studio Session — sarangi in an intimate setting', 'duration_label' => null],
        ];
        $sarangi->videos()->delete();
        foreach ($videos as $i => $video) {
            $sarangi->videos()->create($video + ['sort_order' => $i]);
        }

        // ── Audio tracks: demos (3) + articulations (10) ────────────────
        $demos = [
            ['tag_label' => 'Cinematic', 'title' => 'Slow Alaap', 'description' => 'Free-time exposition · long bowed sustains and slow slides — pure emotional wash. For opening cues, farewells and quiet turning points.'],
            ['tag_label' => 'Lament', 'title' => 'Thumri Phrase', 'description' => 'Vocal-style, song-like phrasing with soft ornaments — the sarangi answering an imagined singer. Perfect for intimate dialogue and memory scenes.'],
            ['tag_label' => 'Virtuosic', 'title' => 'Fast Taan', 'description' => 'Rapid bowed runs across the strings — brilliant, breathless and climactic. For rising tension and cathartic release.'],
        ];
        $articulations = [
            ['art_id' => 'meend', 'tag_label' => 'pitch glide', 'title' => 'Meend', 'description' => "Long, continuous glide between notes along the string — sarangi's signature vocal sob."],
            ['art_id' => 'gamak', 'tag_label' => 'heavy oscillation', 'title' => 'Gamak', 'description' => 'Forceful, weighty shake on a note. Adds depth and intensity to a phrase.'],
            ['art_id' => 'kan', 'tag_label' => 'grace note', 'title' => 'Kan', 'description' => 'A light touch of a neighbouring note before the target — the delicate filigree of a phrase.'],
            ['art_id' => 'murki', 'tag_label' => 'quick turn', 'title' => 'Murki', 'description' => 'A tiny, quick ornamental turn around a note. Rapid, soft, very vocal.'],
            ['art_id' => 'andolan', 'tag_label' => 'slow sway', 'title' => 'Andolan', 'description' => 'Gentle controlled wavering on a sustained note. Creates suspense and patience.'],
            ['art_id' => 'khatka', 'tag_label' => 'sharp cluster', 'title' => 'Khatka', 'description' => 'A crisp cluster of quick notes leading into a main note. Gives phrases a sudden snap.'],
            ['art_id' => 'sapat-taan', 'tag_label' => 'straight run', 'title' => 'Sapat Taan', 'description' => 'A straight, fast run up or down the scale in one bow stroke. Clean and virtuosic.'],
            ['art_id' => 'alaap', 'tag_label' => 'unmetered exposition', 'title' => 'Alaap', 'description' => 'Slow rubato exploration of the raga. No rhythm, all atmosphere.'],
            ['art_id' => 'bandish', 'tag_label' => 'composed melody', 'title' => 'Bandish', 'description' => 'Fixed compositional theme. The "song" within the raga.'],
            ['art_id' => 'tarab-swell', 'tag_label' => 'sympathetic bloom', 'title' => 'Tarab Swell', 'description' => 'Letting the sympathetic strings ring after a phrase ends. The shimmer that hangs in the air.'],
        ];
        $sarangi->tracks()->delete();
        foreach ($demos as $i => $demo) {
            $sarangi->tracks()->create($demo + ['type' => 'demo', 'sort_order' => $i]);
        }
        foreach ($articulations as $i => $art) {
            $sarangi->tracks()->create($art + ['type' => 'articulation', 'sort_order' => $i]);
        }

        // ── Anatomy hotspots (5) ─────────────────────────────────────────
        $anatomyParts = [
            ['name' => 'Khunti', 'sub_label' => 'pegbox', 'legend_role' => 'Carved pegs · hold the gut strings in tune through long takes.', 'tooltip_text' => 'Carved tuning pegs hold the gut strings steady — vital, because gut reacts to every change in temperature and humidity.', 'hotspot_x_pct' => 50, 'hotspot_y_pct' => 12, 'anchor' => 'below'],
            ['name' => 'Tant', 'sub_label' => 'gut playing strings', 'legend_role' => 'Three main strings · bowed and stopped with the cuticles.', 'tooltip_text' => 'The main playing strings — bowed while the fingernails/cuticles press the string from the side, allowing continuous slides.', 'hotspot_x_pct' => 45, 'hotspot_y_pct' => 30, 'anchor' => 'left'],
            ['name' => 'Tarab', 'sub_label' => 'sympathetic strings', 'legend_role' => 'Dozens of steel strings ring underneath · the spectral halo.', 'tooltip_text' => 'Dozens of steel sympathetic strings ring without being touched — the shimmering halo that makes sarangi sound alive and spectral.', 'hotspot_x_pct' => 60, 'hotspot_y_pct' => 40, 'anchor' => 'right'],
            ['name' => 'Tun', 'sub_label' => 'carved wooden body', 'legend_role' => 'One block of wood · gives the warm, hollow, vocal voice.', 'tooltip_text' => 'The body is carved from a single block of wood — it gives sarangi its warm, hollow, vocal resonance.', 'hotspot_x_pct' => 50, 'hotspot_y_pct' => 55, 'anchor' => 'left'],
            ['name' => 'Chamdi', 'sub_label' => 'parchment belly', 'legend_role' => 'Stretched skin · carries the strings\' vibration outward.', 'tooltip_text' => 'A stretched skin belly under the bridge — it carries the string vibration into the body and gives sarangi its earthy, grainy, human tone.', 'hotspot_x_pct' => 50, 'hotspot_y_pct' => 85, 'anchor' => 'above'],
        ];
        $sarangi->anatomyParts()->delete();
        foreach ($anatomyParts as $i => $part) {
            $sarangi->anatomyParts()->create($part + ['sort_order' => $i]);
        }

        // ── Variants (3) ──────────────────────────────────────────────
        $variants = [
            ['chip_label' => 'Classical', 'name' => 'Concert sarangi', 'style_label' => 'solo & accompaniment', 'character_body' => 'Three main gut strings with dozens of sympathetic strings. Rich, vocal, and full of tarab shimmer. Built for both solo raga performance and accompanying a singer.', 'when_text' => 'Cinematic leads, raga-based scoring, vocal-style melody, anywhere the sarangi should carry the emotional line.'],
            ['chip_label' => 'Folk', 'name' => 'Folk sarangi', 'style_label' => 'regional tradition', 'character_body' => 'Smaller, more rustic instruments used in regional folk traditions such as those of Rajasthan. Earthier, grainier tone with fewer sympathetic strings.', 'when_text' => 'Desert and folk-set scenes, rustic period pieces, story-telling and ballad textures.'],
            ['chip_label' => 'Recording-ready', 'name' => 'Studio sarangi', 'style_label' => 'custom-prepared', 'character_body' => 'Tuning and sympathetic-string damping adjusted for studio capture. Cleaner stems, controlled tarab bloom, and predictable behaviour under processing and pitch-shifting.', 'when_text' => 'Hybrid scoring, electronic-acoustic blends, layered productions where stem clarity matters more than concert dynamics.'],
        ];
        $sarangi->variants()->delete();
        foreach ($variants as $i => $variant) {
            $sarangi->variants()->create($variant + ['sort_order' => $i]);
        }

        // ── Pairs well with (Tabla, Bansuri) ──────────────────────────
        $sarangi->pairs()->delete();
        $pairTargets = [
            'tabla' => [
                'relationship_label' => 'rhythmic counterpart',
                'description' => 'The classic rhythmic partner of sarangi — from thumri accompaniment to film score.',
                'why_bullets' => [
                    'Tabla gives the free-flowing sarangi line a steady rhythmic anchor.',
                    'Replaces a need for kit drums in classical-flavoured cinematic cues.',
                ],
            ],
            'bansuri' => [
                'relationship_label' => 'melodic counterpart',
                'description' => 'Breathy bamboo flute that answers the sarangi\'s bowed phrases with a lighter, airier voice.',
                'why_bullets' => [
                    'Different sound source (breath vs bow) — layers with little masking.',
                    'Creates natural call-and-response dialogue on screen.',
                ],
            ],
        ];
        $i = 0;
        foreach ($pairTargets as $slug => $data) {
            $paired = RecordingInstrument::where('detail_slug', $slug)->first();
            if (! $paired) {
                continue;
            }
            $sarangi->pairs()->create($data + [
                'paired_instrument_id' => $paired->id,
                'sort_order' => $i++,
            ]);
        }

        // ── FAQ (6) ───────────────────────────────────────────────────
        $faqs = [
            [
                'question' => 'Can I commission a custom sarangi performance in a specific raga or mood?',
                'answer' => "<p>Yes — every session starts with a brief from you. Send us a reference (audio, sheet music, or a written description), specify the raga, tempo, mood and any tuning requirements, and we'll match the right sarangi player from our roster.</p><p>For projects with very specific musical needs (e.g., adapting a Western melody to <em>raga Yaman</em>, or a sustained lament over a drone), we'll have a brief call before recording to confirm the approach.</p>",
            ],
            [
                'question' => "What's the turnaround time for a remote sarangi recording?",
                'answer' => '<p><strong>Standard turnaround is 3–5 working days</strong> from confirmed brief to final delivery. Short sessions with simple briefs can be delivered in 48 hours. Complex multi-take sessions or projects requiring more than one player may take 7–10 working days.</p><p>If you have a hard deadline, mention it in the booking form — we\'ll confirm feasibility before you commit. <strong>Rush options</strong> are available with a 24-hour turnaround for short cues at a premium rate.</p>',
            ],
            [
                'question' => 'Do I get multiple takes or edit options to choose from?',
                'answer' => "<p>Yes. Every session includes <strong>3 distinct takes minimum</strong> — one straight read, one with more expression and ornamentation, and one alternate interpretation. You're welcome to request more (up to 5 takes per cue is included in the standard rate).</p><p>We deliver all takes as separate stems plus a comp suggestion. Final selection and editing rights are yours — no approval required from us.</p>",
            ],
            [
                'question' => 'Can your sarangi players read Western notation or only work from audio references?',
                'answer' => '<p>Both. Most of our roster reads Western staff notation comfortably and many can also read Indian sargam notation. For complex compositions, sheet music speeds up the session significantly.</p><p>That said, sarangi lives in nuance — slides, ornaments and bow pressure that don\'t fully translate to notation. <strong>We strongly recommend sending an audio reference along with any score</strong>, even a rough hummed melody.</p>',
            ],
            [
                'question' => "What's included in the session price — and what costs extra?",
                'answer' => '<p><strong>Included:</strong> the performer\'s fee, professional studio recording, multi-mic setup, three takes, basic editing (timing alignment, noise cleanup), stem delivery in your preferred format, and a 30-day window for one round of revisions.</p><p><strong>Extra:</strong> additional takes beyond five, additional players for layering, extensive comp editing, custom mix processing, sync licensing fees if the recording will be commercially released, and rush turnaround. All extras are quoted upfront in writing — no surprises.</p>',
            ],
            [
                'question' => 'What if I need revisions after delivery?',
                'answer' => "<p><strong>One round of revisions is included</strong> in the standard rate, valid for 30 days from delivery. This covers re-edits, alternate phrasings from existing takes, or minor performance adjustments.</p><p>If the revision requires a fresh recording session (e.g., a new tempo, a different raga, or a new phrase entirely), that's billed as a new session at your existing rate. We'll always tell you upfront which category your request falls into.</p>",
            ],
        ];
        $sarangi->faqs()->delete();
        foreach ($faqs as $i => $faq) {
            $sarangi->faqs()->create($faq + ['sort_order' => $i, 'is_active' => true]);
        }
    }
}
