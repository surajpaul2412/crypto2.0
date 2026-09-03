<?php

namespace Database\Seeders;

use App\Models\RecordingInstrument;
use Illuminate\Database\Seeder;

/**
 * Migrates Sitar's existing hardcoded detail-page content (previously
 * hand-written directly into recording-services-inner-content.blade.php)
 * into the new per-instrument schema. Text/numbers below are copied
 * verbatim from the original static markup — see git history of that
 * Blade file (commit 2a95baf) for the source.
 *
 * The original page's "Pairs well with" included a Tanpura card, but no
 * Tanpura RecordingInstrument record exists in this database — that pair
 * is intentionally dropped here rather than linking to a slug that 404s.
 * Add a Tanpura record and a new pair row later if that instrument is
 * added to the catalogue.
 *
 * No anatomy photo is uploaded here — the original page used a hand-drawn
 * SVG illustration that this migration deliberately replaces with an
 * uploadable photo (see the recording-instrument-detail-pages plan). A
 * real sitar photograph still needs to be uploaded via the admin panel.
 */
class SitarRecordingInstrumentSeeder extends Seeder
{
    public function run(): void
    {
        $sitar = RecordingInstrument::where('detail_slug', 'sitar')->first();

        if (! $sitar) {
            $this->command?->warn('Sitar RecordingInstrument record not found — skipping.');

            return;
        }

        $sitar->update([
            'subhead_accent' => 'Indian Sitar Recording Sessions',
            'subhead_body' => "— custom live recordings for film, game & OTT composers, performed by master Hindustani sitarists.",
            'tagline' => "India's voice of longing — bent notes, sympathetic resonance, the sound that tells the West it's hearing the East.",
            'anatomy_photo_aspect' => '1/2',
            'sonic_range_start_pct' => 20,
            'sonic_range_end_pct' => 85,
            'sonic_sweet_pct' => 71,
            'sonic_sweet_label' => 'sweet · 3kHz',
            'sonic_range_caption' => 'Active range <em>~80Hz–8kHz</em> — fundamental notes sit in the lower mids, the harmonic shimmer of <em>tarab</em> reaches into the high mids. Sweet spot for presence around <em>3kHz</em>.',
            'sonic_dynamic_range_value' => 'Wide · 30 dB+',
            'sonic_dynamic_range_detail' => 'From whispered <em>alaap</em> to fast <em>jhala</em>. Plan for moderate compression to keep quiet passages present.',
            'sonic_stereo_value' => "Mono source · stereo'd",
            'sonic_stereo_detail' => 'Captured mono at the bridge, stereo image built from room mics. Pan slightly off-center for ensemble fit.',
            'sonic_mic_value' => 'Bridge close + 6ft room',
            'sonic_mic_detail' => 'Close mic captures transient detail and fret articulation. Room mic adds decay and air. Both stems delivered.',
            'brings' => [
                [
                    'eyebrow' => 'Emotional role',
                    'title' => 'The voice of longing.',
                    'body' => 'Sitar speaks in <em>meend</em> — pitch bent across frets like a vocalist sliding between syllables. Sympathetic strings ring underneath without being struck, creating the sound of a memory replying to itself. It carries yearning, devotion, and the ache of distance better than any other South Asian instrument.',
                ],
                [
                    'eyebrow' => 'Cinematic fit',
                    'title' => 'Where it earns its place.',
                    'body' => 'Opening cues that set a world apart from the West. Transitions where memory enters a scene. Sacred or contemplative moments. Pairs cleanly with cello, low strings, ambient pads, and processed textures. Not for chase cues, action stings, or anything requiring rhythmic aggression — for those, choose tabla or sarod.',
                ],
                [
                    'eyebrow' => 'Iconic uses',
                    'title' => "Where you've already heard it.",
                    'body' => "Ravi Shankar's <em>Pather Panchali</em> score (1955) wrote the playbook. The Beatles' <em>Norwegian Wood</em> (1965) put it in pop. <em>Slumdog Millionaire</em>, <em>Life of Pi</em>, <em>Inception</em>'s Mumbai sequences, <em>The Best Exotic Marigold Hotel</em> — the vocabulary is established. Composers reach for sitar when a cue needs to feel both intimate and elsewhere.",
                ],
                [
                    'eyebrow' => 'Cultural context',
                    'title' => 'Where it comes from.',
                    'body' => "Hindustani classical music — refined over seven centuries in the courts of North India. The instrument as known today was shaped in the 18th century from the older <em>veena</em> family. Played sitting cross-legged, tuned per <em>raga</em>, performed in concert lengths from minutes to hours. Crypto Cipher's sitar sessions are recorded with master Hindustani performers — not session players approximating the style.",
                ],
            ],
        ]);

        // ── Hero video rail (4) ────────────────────────────────────────
        $videos = [
            ['yt_id' => '3gs_d_QgpUY', 'role_label' => 'Performance', 'caption' => 'Performance — sitar in cinematic context', 'duration_label' => '2:14'],
            ['yt_id' => 'OQAoEcZ7-JM', 'role_label' => 'Studio Session', 'caption' => 'Studio Session — recording the take', 'duration_label' => '5:32'],
            ['yt_id' => 'OQAoEcZ7-JM', 'role_label' => 'Heritage Story', 'caption' => 'Heritage Story — the lineage of sitar', 'duration_label' => '12:01'],
            ['yt_id' => 'VYRK4jERXns', 'role_label' => 'Solo Showcase', 'caption' => 'Solo Showcase — pure musicianship', 'duration_label' => '1:48'],
        ];
        $sitar->videos()->delete();
        foreach ($videos as $i => $video) {
            $sitar->videos()->create($video + ['sort_order' => $i]);
        }

        // ── Audio tracks: demos (3) + articulations (10) ────────────────
        $demos = [
            ['tag_label' => 'Cinematic', 'title' => 'Slow Alaap', 'description' => 'Free-time exposition · meend, andolan, no rhythm — pure emotional wash. For opening cues, intros, and sacred moments.'],
            ['tag_label' => 'Groove', 'title' => 'Mid-Tempo Jod', 'description' => 'Pulsed mid-tempo with chikari drone strums — perfect for chase scenes, journey cues, and rising tension.'],
            ['tag_label' => 'Virtuosic', 'title' => 'Fast Jhala', 'description' => 'Rapid drone strumming with virtuosic taans — climactic, ecstatic, the sound of full devotional release.'],
        ];
        $articulations = [
            ['art_id' => 'meend', 'tag_label' => 'pitch glide', 'title' => 'Meend', 'description' => "The signature vocal-style pitch bend across multiple notes — sitar's emotional core."],
            ['art_id' => 'gamak', 'tag_label' => 'heavy oscillation', 'title' => 'Gamak', 'description' => 'Forceful note-to-note shake. Adds weight and intensity to phrases.'],
            ['art_id' => 'krintan', 'tag_label' => 'grace flick', 'title' => 'Krintan', 'description' => 'Light ornamental flick onto the target note — gives phrases their delicate filigree.'],
            ['art_id' => 'andolan', 'tag_label' => 'slow sway', 'title' => 'Andolan', 'description' => 'Gentle controlled wavering on a sustained note. Creates suspense and patience.'],
            ['art_id' => 'jhala', 'tag_label' => 'fast rhythmic strum', 'title' => 'Jhala', 'description' => 'High-tempo strumming on chikari strings. The climactic close of any sitar piece.'],
            ['art_id' => 'jod', 'tag_label' => 'steady pulse', 'title' => 'Jod', 'description' => 'Mid-tempo rhythmic section with tabla-like pulse. Momentum without melody.'],
            ['art_id' => 'chikari', 'tag_label' => 'drone strum', 'title' => 'Chikari', 'description' => 'Open-string punctuation between melody phrases. The rhythmic glue.'],
            ['art_id' => 'alaap', 'tag_label' => 'unmetered exposition', 'title' => 'Alaap', 'description' => 'Slow rubato exploration of the raga. No rhythm, all atmosphere.'],
            ['art_id' => 'bandish', 'tag_label' => 'composed melody', 'title' => 'Bandish', 'description' => 'Fixed compositional theme. The "song" within the raga.'],
            ['art_id' => 'taan', 'tag_label' => 'rapid runs', 'title' => 'Taan', 'description' => 'Fast melodic passages woven through the raga. Virtuosic display.'],
        ];
        $sitar->tracks()->delete();
        foreach ($demos as $i => $demo) {
            $sitar->tracks()->create($demo + ['type' => 'demo', 'sort_order' => $i]);
        }
        foreach ($articulations as $i => $art) {
            $sitar->tracks()->create($art + ['type' => 'articulation', 'sort_order' => $i]);
        }

        // ── Anatomy hotspots (5) ─────────────────────────────────────────
        $anatomyParts = [
            ['name' => 'Pegbox', 'sub_label' => null, 'legend_role' => 'Carved tuning pegs · stable across long takes.', 'tooltip_text' => 'Carved tuning pegs hold pitch through long takes — essential for studio work.', 'hotspot_x_pct' => 50, 'hotspot_y_pct' => 12, 'anchor' => 'below'],
            ['name' => 'Pardas', 'sub_label' => 'movable frets', 'legend_role' => 'Curved metal · enable <em>meend</em>, the vocal pitch bend.', 'tooltip_text' => 'Curved metal frets that move along the neck — enable <em>meend</em>, the vocal pitch bend that defines sitar.', 'hotspot_x_pct' => 60, 'hotspot_y_pct' => 37, 'anchor' => 'right'],
            ['name' => 'Baaj tar', 'sub_label' => 'main strings', 'legend_role' => 'The melody line — what audiences hear up front.', 'tooltip_text' => 'The main playing strings — what your audience hears as the melody line in the cue.', 'hotspot_x_pct' => 60, 'hotspot_y_pct' => 65, 'anchor' => 'right'],
            ['name' => 'Tarab', 'sub_label' => 'sympathetic strings', 'legend_role' => '11–13 strings ring underneath · spectral halo on every note.', 'tooltip_text' => '11–13 sympathetic strings ring underneath without being struck — the halo that makes sitar sound spectral and alive.', 'hotspot_x_pct' => 41, 'hotspot_y_pct' => 41, 'anchor' => 'left'],
            ['name' => 'Tumbu', 'sub_label' => 'gourd resonator', 'legend_role' => 'Carved from dried pumpkin · the full-bodied low-mid voice.', 'tooltip_text' => 'The gourd body — gives sitar its full-bodied mid-low resonance. Carved from a single dried pumpkin.', 'hotspot_x_pct' => 50, 'hotspot_y_pct' => 87, 'anchor' => 'above'],
        ];
        $sitar->anatomyParts()->delete();
        foreach ($anatomyParts as $i => $part) {
            $sitar->anatomyParts()->create($part + ['sort_order' => $i]);
        }

        // ── Variants (3) ──────────────────────────────────────────────
        $variants = [
            ['chip_label' => 'Maihar Gharana', 'name' => 'Gandhar-pancham', 'style_label' => 'Ravi Shankar style', 'character_body' => 'Bright, projecting, virtuosic. 7 main strings + 13 sympathetic. Built for solo concert work — the sound most non-Indian audiences associate with "sitar."', 'when_text' => 'Cinematic leads, fusion crossover, world-music scoring, anywhere the sitar needs to carry the melody.'],
            ['chip_label' => 'Imdadkhani Gharana', 'name' => 'Kharaj-pancham', 'style_label' => 'Vilayat Khan style', 'character_body' => 'Warm, vocal, intimate. 6–7 main + 11–13 sympathetic, retuned for vocal-style melody (<em>gayaki ang</em>). Designed to imitate the human voice.', 'when_text' => 'Slow contemplative cues, intimate dialogue scenes, ballads, anything needing emotional restraint over virtuosity.'],
            ['chip_label' => 'Recording-ready', 'name' => 'Studio sitar', 'style_label' => 'custom-prepared', 'character_body' => 'Tuning and dampening adjusted for studio capture. Lower sympathetic ring (cleaner stems), tighter transients, predictable behavior under processing and pitch-shifting.', 'when_text' => 'Hybrid scoring, electronic-acoustic blends, layered productions where stem clarity matters more than concert dynamics.'],
        ];
        $sitar->variants()->delete();
        foreach ($variants as $i => $variant) {
            $sitar->variants()->create($variant + ['sort_order' => $i]);
        }

        // ── Pairs well with (Tabla, Bansuri — Tanpura dropped, no record exists) ──
        $sitar->pairs()->delete();
        $pairTargets = [
            'tabla' => [
                'relationship_label' => 'rhythmic counterpart',
                'description' => 'The percussive partner of sitar in nearly every Hindustani cue — from devotional to film score.',
                'why_bullets' => [
                    'Tabla and sitar lock together in <em>jod</em> and <em>jhala</em> sections.',
                    'Adds rhythmic anchor — replaces a need for kit drums in cinematic cues.',
                ],
            ],
            'bansuri' => [
                'relationship_label' => 'melodic counterpart',
                'description' => 'Bamboo flute with breathy, pastoral character. Adds lyrical lift to phrases sitar holds underneath.',
                'why_bullets' => [
                    "Different timbre family — no masking with sitar's harmonic profile.",
                    'Carries call-and-response melodic dialogue beautifully on screen.',
                ],
            ],
        ];
        $i = 0;
        foreach ($pairTargets as $slug => $data) {
            $paired = RecordingInstrument::where('detail_slug', $slug)->first();
            if (! $paired) {
                continue;
            }
            $sitar->pairs()->create($data + [
                'paired_instrument_id' => $paired->id,
                'sort_order' => $i++,
            ]);
        }

        // ── FAQ (6) ───────────────────────────────────────────────────
        $faqs = [
            [
                'question' => 'Can I commission a custom sitar performance in a specific raga or tuning?',
                'answer' => "<p>Yes — every session starts with a brief from you. Send us a reference (audio, sheet music, or a written description), specify the raga, tempo, mood, and any tuning requirements, and we'll match the right sitarist from our roster. We work in standard Hindustani ragas as well as custom microtonal tunings for cinematic and experimental work.</p><p>For projects with very specific musical needs (e.g., adapting a Western melody to <em>raga Yaman</em>, or composing a new phrase in a non-traditional scale), we'll have a brief call before recording to confirm the approach.</p>",
            ],
            [
                'question' => "What's the turnaround time for a remote sitar recording?",
                'answer' => '<p><strong>Standard turnaround is 3–5 working days</strong> from confirmed brief to final delivery. Sessions under 90 seconds with simple briefs can be delivered in 48 hours. Complex multi-take sessions, custom scoring work, or projects requiring multiple sitarists may take 7–10 working days.</p><p>If you have a hard deadline, mention it in the booking form — we\'ll confirm feasibility before you commit. <strong>Rush options</strong> are available with a 24-hour turnaround for short cues at a premium rate.</p>',
            ],
            [
                'question' => 'Do I get multiple takes or edit options to choose from?',
                'answer' => "<p>Yes. Every session includes <strong>3 distinct takes minimum</strong> — one straight read, one with more expression and ornamentation, and one alternate interpretation. You're welcome to request more (up to 5 takes per cue is included in the standard rate).</p><p>We deliver all takes as separate stems plus a comp suggestion. Final selection and editing rights are yours — no approval required from us.</p>",
            ],
            [
                'question' => 'Can your sitarists read Western notation or do they only work from audio references?',
                'answer' => '<p>Both. Most of our roster reads Western staff notation comfortably and many can also read Indian sargam notation. For complex compositions, sheet music speeds up the session significantly.</p><p>That said, sitar lives in nuance — pitch bends, ornaments, rhythmic feel — that don\'t fully translate to notation. <strong>We strongly recommend sending an audio reference along with any score</strong>, even a rough hummed melody. The combined input gets you to the result you actually want, faster.</p>',
            ],
            [
                'question' => "What's included in the session price — and what costs extra?",
                'answer' => '<p><strong>Included:</strong> the sitarist\'s performance fee, professional studio recording, multi-mic setup, three takes, basic editing (timing alignment, noise cleanup), stem delivery in your preferred format, and a 30-day window for one round of revisions.</p><p><strong>Extra:</strong> additional takes beyond five, additional sitarists for layering, extensive comp editing, custom mix processing, sync licensing fees if the recording will be commercially released, and rush turnaround. All extras are quoted upfront in writing — no surprises.</p>',
            ],
            [
                'question' => 'What if I need revisions after delivery?',
                'answer' => "<p><strong>One round of revisions is included</strong> in the standard rate, valid for 30 days from delivery. This covers re-edits, alternate phrasings from existing takes, or minor performance adjustments.</p><p>If the revision requires a fresh recording session (e.g., a new tempo, a different raga, or a new phrase entirely), that's billed as a new session at your existing rate. We'll always tell you upfront which category your request falls into.</p>",
            ],
        ];
        $sitar->faqs()->delete();
        foreach ($faqs as $i => $faq) {
            $sitar->faqs()->create($faq + ['sort_order' => $i, 'is_active' => true]);
        }
    }
}
