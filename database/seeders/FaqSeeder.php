<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

/**
 * Seeds the 25 FAQ items that used to be hardcoded directly into 4 page
 * templates (Homepage, Shop, Collaboration, Recording Services). Question
 * and answer text below is copied verbatim from the original Blade markup —
 * including inline <strong>/<em>/<a> tags in the answers — so the frontend
 * loop can render exactly what was there before, just DB-driven.
 *
 * Shop Detail and Recording Services Detail FAQ sections are intentionally
 * NOT included here — they stay hardcoded per-product/per-instrument content
 * for now (explicitly deferred, out of scope for this pass).
 */
class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // ── Homepage (5) ─────────────────────────────────────────────
            [
                'question' => 'Do I need the full version of Kontakt to use Crypto Cipher virtual instruments?',
                'answer' => 'Each instrument page lists its format explicitly. Libraries marked <strong>For Kontakt</strong> require the full retail version of Native Instruments Kontakt 6 or higher. Libraries marked <strong>For Kontakt Player</strong> run in the free Kontakt Player. Standalone and VST3/AU plugin versions, when offered, work directly inside any modern DAW without Kontakt.',
                'pages' => ['home'],
                'sort_order' => 1,
            ],
            [
                'question' => 'Can I use Crypto Cipher sounds in commercial film, TV, game, and streaming projects?',
                'answer' => 'Yes. Every purchase includes a perpetual <strong>royalty-free commercial license</strong> for use in original music productions: film scores, game soundtracks, TV cues, advertising, streaming releases, library music, and personal albums. The license is non-transferable and prohibits reselling or redistributing the raw samples. Full terms are on the <a href="/license">License page</a>.',
                'pages' => ['home'],
                'sort_order' => 2,
            ],
            [
                'question' => 'Do I get free updates after purchase?',
                'answer' => "Yes. All updates to a purchased instrument — bug fixes, script improvements, new articulations, expanded content — are delivered free for the lifetime of that product. You'll receive download links via email whenever an update ships.",
                'pages' => ['home'],
                'sort_order' => 3,
            ],
            [
                'question' => 'Will Crypto Cipher virtual instruments run on Apple Silicon (M1, M2, M3) and Windows?',
                'answer' => 'Yes. All instruments run natively on macOS (Intel and Apple Silicon M1/M2/M3/M4) and Windows 10/11 (64-bit). Minimum requirements: <strong>8 GB RAM, 5–25 GB free disk space</strong> depending on the library, and a host that supports VST3, AU, or AAX where applicable. Kontakt-based libraries require Kontakt 6.7+.',
                'pages' => ['home'],
                'sort_order' => 4,
            ],
            [
                'question' => 'Can I commission custom recordings or work with your musicians directly?',
                'answer' => 'Yes. Our studio in India offers <strong>remote recording sessions</strong> with vetted Indian classical musicians — sitar, sarod, sarangi, bansuri, tabla, vocals, and full ensembles — delivered as edited stems within 5–10 working days. Sync licensing and bespoke Kontakt builds are also available. Start at <a href="/recording-services">Recording Services</a> or email <a href="mailto:admin@cryptocipher.in">admin@cryptocipher.in</a>.',
                'pages' => ['home'],
                'sort_order' => 5,
            ],

            // ── Shop (6) ─────────────────────────────────────────────────
            [
                'question' => 'Do your libraries work with the free Kontakt Player?',
                'answer' => "Most Crypto Cipher libraries require <strong>Kontakt 6 Full</strong> (or higher). The free Kontakt Player will load our libraries but only for 30 minutes per session — that's a Native Instruments restriction, not ours. Each library's page lists its exact Kontakt version requirement. If you're new to Kontakt, the Full version is a one-time purchase from Native Instruments and works with thousands of third-party libraries.",
                'pages' => ['shop'],
                'sort_order' => 1,
            ],
            [
                'question' => 'Can I use these libraries in commercial film, OTT, and game projects?',
                'answer' => 'Yes. Every library ships with a single license that covers commercial use across film, OTT, streaming, broadcast, advertising, and games — globally. We declare all libraries as <strong>sync-cleared</strong> and <strong>AI-training-free</strong> on each library\'s page. The full license terms appear inline on the buy block. No tiered consumer licensing, no hidden upgrade paths.',
                'pages' => ['shop'],
                'sort_order' => 2,
            ],
            [
                'question' => 'How do I install and authorize a library?',
                'answer' => 'After purchase you\'ll receive a download link and an instruction PDF. Most libraries are loaded through Kontakt\'s File Browser (drag the .nki file into Kontakt). A few use Native Instruments\' "Add Library" panel — the library page tells you which method applies. Authorization is done once via Native Access. Files are delivered as compressed NCW samples to keep size minimal without loss.',
                'pages' => ['shop'],
                'sort_order' => 3,
            ],
            [
                'question' => 'Where are these instruments recorded?',
                'answer' => 'At our studio in India. Active since 2010. Our signal chain typically runs through Royer 122 ribbons, Neumann large-diaphragm condensers, Schoeps small-diaphragm condensers, and a UAD-modeled valve preamp chain — but the chain is adjusted per instrument to capture its character authentically. Each library page lists its specific mic and recording engineer credits in the Library Credits section.',
                'pages' => ['shop'],
                'sort_order' => 4,
            ],
            [
                'question' => "What's a curated suite — is that a discount bundle?",
                'answer' => "Suites are editorial bundles — libraries chosen for how composers actually use them together in real cues. The savings are real, but the framing isn't a sale. Suites don't have countdowns, don't disappear, and don't fluctuate. If you've already bought a single library that's part of a suite, a single-library purchase credits toward the suite within 60 days of your original purchase.",
                'pages' => ['shop'],
                'sort_order' => 5,
            ],
            [
                'question' => "What if the instrument I need isn't in your catalogue?",
                'answer' => 'Commission a custom recording. We have access to most Indian classical and folk instruments, and to master musicians across India. For one-time cue use, custom recording is often more cost-effective than buying a library you\'ll only use once. <a href="/recording-services" style="color: var(--green-light); border-bottom: 1px solid rgba(187,214,122,0.3);">Recording Services →</a>',
                'pages' => ['shop'],
                'sort_order' => 6,
            ],

            // ── Collaboration (6) ────────────────────────────────────────
            [
                'question' => 'Do I need to be based in India?',
                'answer' => "No. We work with people anywhere — the only bar is the work, not where you're from.",
                'pages' => ['collaboration'],
                'sort_order' => 1,
            ],
            [
                'question' => 'What should I send when I apply?',
                'answer' => 'Real work, not a résumé — a portfolio, track, library, reel, or repo. One strong piece beats a long CV. Send an https link, no shorteners.',
                'pages' => ['collaboration'],
                'sort_order' => 2,
            ],
            [
                'question' => 'How long until I hear back?',
                'answer' => "Within 14 days. If you don't hear back, the timing or fit isn't right for what we're building now — not a verdict on your work, and you're welcome to apply again.",
                'pages' => ['collaboration'],
                'sort_order' => 3,
            ],
            [
                'question' => 'How does payment work?',
                'answer' => "Terms are set per programme by Crypto Cipher and shared in full once you're accepted — nothing to negotiate, no surprises.",
                'pages' => ['collaboration'],
                'sort_order' => 4,
            ],
            [
                'question' => 'A role I want says "Closed" — what do I do?',
                'answer' => 'Programmes open in rotation. Check back, or use the partner line under the roles to introduce yourself for when it reopens.',
                'pages' => ['collaboration'],
                'sort_order' => 5,
            ],
            [
                'question' => "My work doesn't fit a listed role.",
                'answer' => 'Pick the closest programme and explain in your note, or use the partner line. We read everything.',
                'pages' => ['collaboration'],
                'sort_order' => 6,
            ],

            // ── Recording Services (8) ───────────────────────────────────
            [
                'question' => 'How long does a custom recording take?',
                'answer' => "Three to four days from confirmed brief to delivered files. Faster turnaround is possible on simpler briefs — ask in your brief and we'll quote against deadline.",
                'pages' => ['recording-services'],
                'sort_order' => 1,
            ],
            [
                'question' => "What's included in the license?",
                'answer' => 'Sync clearance is included by default — film, TV, OTT, ad, game. Buyout and custom terms available on request. License is signed and delivered with the files. AI training is excluded in writing.',
                'pages' => ['recording-services'],
                'sort_order' => 2,
            ],
            [
                'question' => 'Can I direct the performance?',
                'answer' => 'Yes — and we lock direction <em>before</em> the session, not after. Send phrasing notes, articulation requests, ornamentation specifics, or a reference take with your brief. We pre-discuss with the artist so the first take is the take. New direction or significantly different cues are quoted as a follow-up session.',
                'pages' => ['recording-services'],
                'sort_order' => 3,
            ],
            [
                'question' => 'Do you record outside India?',
                'answer' => "All sessions are tracked in our studio in India. We do not subcontract to remote home studios. The room, the chain, and the artist roster are the brand — that's the point.",
                'pages' => ['recording-services'],
                'sort_order' => 4,
            ],
            [
                'question' => 'Can the same artist record for multiple cues?',
                'answer' => 'Yes — multi-cue sessions are common and discounted at the brief stage. Add all cues to the request form so we can scope the session as a single block.',
                'pages' => ['recording-services'],
                'sort_order' => 5,
            ],
            [
                'question' => 'Is the recording AI-free?',
                'answer' => 'Yes — and stated in writing on the license. No AI synthesis, no model-trained voice cloning, no algorithmic extension. Performances are tracked from a single artist in a single room, take by take.',
                'pages' => ['recording-services'],
                'sort_order' => 6,
            ],
            [
                'question' => 'How do you handle NDAs?',
                'answer' => "Toggle the NDA option on the request form and skip project name. We'll send our standard NDA — or sign yours — before any project details, references, or files are shared. Artists are bound under the same terms.",
                'pages' => ['recording-services'],
                'sort_order' => 7,
            ],
            [
                'question' => 'How do discounts and editorial rates work?',
                'answer' => 'Three editorial signals: <em>Introductory</em> (new instrument or artist, first-session rate), <em>Limited Series</em> (short window, named project context), <em>Residency</em> (longer engagement, multi-cue). Service-wide bands run during studio anniversaries. One signal per card, no countdown timers, no urgency theatre.',
                'pages' => ['recording-services'],
                'sort_order' => 8,
            ],
        ];

        // Matched on "question" alone (unique across all 25 seeded items) so
        // re-running this seeder updates existing rows instead of duplicating.
        foreach ($items as $item) {
            Faq::updateOrCreate(
                ['question' => $item['question']],
                [
                    'answer' => $item['answer'],
                    'pages' => $item['pages'],
                    'sort_order' => $item['sort_order'],
                    'is_active' => true,
                ]
            );
        }
    }
}
