@verbatim
<!-- Search engine verification — HUMAN: paste tokens from GSC + Bing -->
<meta name="google-site-verification" content="REPLACE_GSC_TOKEN">
<meta name="msvalidate.01" content="REPLACE_BING_TOKEN">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Outfit:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<link rel="preload" href="assets/img/logo.svg" as="image" type="image/svg+xml">
<!-- Consolidated shared layers (Phase 1+2) · load before inline <style>, before polish.css -->


<style>
/* Critical: park skip-link before first paint (FOUC). */
.skip-link { position: absolute; left: 12px; top: -56px; z-index: 10000; }

/* ═══ SHARED · tokens + reset + cosmic-bg + generic layout (verbatim from canonical) ═══ */
:root {
  /* Surface colors */
  --bg-deep: #0d1117;
  --bg-surface: #151b23;
  --bg-darker: #080c12;
  --bg-darkest: #050810;
  --bg-mid: #0a0e14;

  /* Brand greens */
  --green-primary: #75C249;
  --green-light: #BBD67A;
  --green-dark: #2F6942;
  --green-glow: rgba(117, 194, 73, 0.35);

  /* Text hierarchy */
  --text-primary: #ffffff;
  --text-secondary: rgba(255,255,255,0.65);
  --text-muted: rgba(255,255,255,0.45);
  --text-quiet: rgba(255,255,255,0.3);
  --text-whisper: rgba(255,255,255,0.15);

  /* Glass surfaces */
  --glass-bg: rgba(255,255,255,0.04);
  --glass-bg-hover: rgba(255,255,255,0.08);
  --glass-border: rgba(255,255,255,0.05);
  --glass-border-hover: rgba(255,255,255,0.08);

  /* Card surfaces · solid base for readability over cosmic bg */
  --card-bg: rgba(8, 12, 18, 0.65);
  --card-bg-tint: linear-gradient(160deg, rgba(255,255,255, 0.025) 0%, rgba(255,255,255, 0.01) 60%);
  --card-border: rgba(255,255,255, 0.07);

  /* Accents */
  --amber-glow: rgba(180,140,50,0.03);
  --warning: #d4b56e;

  /* Motion */
  --ease: cubic-bezier(0.22, 1, 0.36, 1);

  /* Layout */
  --side-index-w: 340px;

  /* Section rhythm */
  --section-gap-desktop: 4rem;   /* 64px */
  --section-gap-tablet: 3rem;    /* 48px */
  --section-gap-mobile: 2.5rem;  /* 40px */

  /* Page padding (top accounts for floating nav) */
  --page-pad-top: 10rem;
  --page-pad-x-desktop: 3rem;
  --page-pad-x-mobile: 1.25rem;
}

/* ═══════════════════════════════════════════════════════════════
   GLOBAL RESETS + TYPOGRAPHY BASELINE
   ═══════════════════════════════════════════════════════════════ */
* { box-sizing: border-box; margin: 0; padding: 0; }

html { /* scroll-behavior:smooth removed — Safari scroll-back jank; Lenis handles Chrome */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background: var(--bg-deep, #0d1117);   /* solid floor — guarantees no white gap anywhere */
}

body {
  font-family: "Outfit", sans-serif;
  /* Transparent so .cosmic-bg (fixed, z-index 0) shows through across
     ALL sections, not just hero. The ambient star + glow layer is the
     page's dwell-time motion — it must be visible the whole scroll. */
  background: transparent;
  color: var(--text-primary);
  line-height: 1.5;
  overflow-x: clip;            /* TEST: clip not hidden — no scroll container */
  overflow-anchor: none;       /* TEST: stop first-paint scroll anchoring */
  position: relative;
}

::selection { background: rgba(117,194,73,0.25); color: #fff; }

/* Subtle noise overlay · part of design DNA */
body::before {
  content: "";
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 1;
  opacity: 0.035;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.7' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  background-size: 200px;
  /* mix-blend-mode removed — DESIGN-SYSTEM §11: mix-blend-mode on a fixed
     full-page layer re-blends the entire viewport every scroll frame (the
     whole-screen green repaint + first-scroll jump). Noise still shows at
     0.035 opacity; the blend mode was the scroll-perf killer. */
}

/* ═══════════════════════════════════════════════════════════════
   COSMIC BG · floating stars + radial depth gradients
   Edge-loaded so center reading lane stays clear
   ═══════════════════════════════════════════════════════════════ */
.cosmic-bg {
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 0;
  overflow: hidden;
  /* GPU isolation (DESIGN-SYSTEM §8) — was missing; without it the fixed,
     blurred background re-rasterized every scroll frame -> full-viewport
     repaint + first-scroll jump. Promote to one cached layer. */
  transform: translate3d(0, 0, 0);
  will-change: transform;
  contain: strict;
  /* Pure cool dark · canonical from homepage_148 · no brand wash */
  background: linear-gradient(180deg,
    #0d1117 0%,
    #0b1014 30%,
    #0a0e12 60%,
    #080b10 100%
  );
}
/* Layer 1 · Subtle edge atmosphere · cool neutral only */
.cosmic-bg::before {
  content: "";
  position: absolute;
  inset: 0;
  background:
    /* Bottom · cinematic floor depth · cool neutral */
    radial-gradient(ellipse 100% 50% at 50% 110%, rgba(20, 28, 38, 0.4) 0%, transparent 60%),
    /* Side vignettes · cool darkening for cinematic letterbox feel */
    radial-gradient(ellipse 30% 100% at 0% 50%, rgba(0,0,0, 0.35) 0%, transparent 50%),
    radial-gradient(ellipse 30% 100% at 100% 50%, rgba(0,0,0, 0.35) 0%, transparent 50%);
  opacity: 1;
}
/* Layer 2 · Slow drifting atmospheric clouds · cool neutral nebula */
.cosmic-bg::after {
  content: "";
  position: absolute;
  inset: -25%;
  background:
    radial-gradient(circle 700px at 12% 18%, rgba(40, 65, 90, 0.08), transparent 60%),
    radial-gradient(circle 800px at 88% 80%, rgba(35, 55, 80, 0.06), transparent 60%);
  filter: blur(18px);
  animation: cosmicDrift 90s ease-in-out infinite alternate;
  opacity: 0.85;
}
@keyframes cosmicDrift {
  0%   { transform: translate3d(0, 0, 0) scale(1); }
  100% { transform: translate3d(2%, -1%, 0) scale(1.04); }
}

/* Layer 3 · Volumetric beam · cool neutral, supports center reading lane */
.cosmic-bg__beam {
  position: absolute;
  inset: 0;
  background:
    /* Soft top light shaft · neutral white */
    linear-gradient(180deg, rgba(255,255,255, 0.018) 0%, transparent 25%),
    /* Floor reflection · grounds the cinematic frame */
    linear-gradient(0deg, rgba(0,0,0, 0.35) 0%, transparent 22%);
  pointer-events: none;
}

/* Star particles · neutral white-cool, restrained · 3 variants */
.cosmic-bg__star {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.85);
  box-shadow: 0 0 4px rgba(255, 255, 255, 0.4);
  /* will-change removed — 88 stars x standing will-change = 88 permanent GPU
     layers updating every frame (measured: 102 layers x 63 frame-updates).
     The animation promotes per-element only while compositing is needed. */
  animation:
    starDrift var(--dur, 30s) linear infinite,
    starTwinkle var(--twink, 4s) ease-in-out infinite;
  animation-delay: var(--delay, 0s), var(--twinkDelay, 0s);
}
.cosmic-bg__star--green {
  background: rgba(220, 230, 240, 0.75);
  box-shadow:
    0 0 5px rgba(180, 200, 220, 0.40),
    0 0 12px rgba(160, 185, 210, 0.16);
}
.cosmic-bg__star--bright {
  background: rgba(255, 255, 255, 0.95);
  box-shadow:
    0 0 6px rgba(255, 255, 255, 0.55),
    0 0 14px rgba(255, 255, 255, 0.22);
}
/* Far stars · depth parallax · barely visible */
.cosmic-bg__star--far {
  background: rgba(255, 255, 255, 0.4);
  box-shadow: 0 0 1.5px rgba(255, 255, 255, 0.2);
  animation: starTwinkle var(--twink, 5s) ease-in-out infinite;
  animation-delay: var(--twinkDelay, 0s);
}

/* Drifting glow orbs · cool neutral, not brand */
.cosmic-bg__glow {
  position: absolute;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(40, 65, 90, 0.10) 0%, rgba(40, 65, 90, 0.025) 50%, transparent 70%);
  filter: blur(18px);
  animation: glowDrift var(--dur, 50s) ease-in-out infinite alternate,
             glowPulse var(--pulse, 10s) ease-in-out infinite;
  animation-delay: var(--delay, 0s), 0s;
  will-change: transform, opacity;
}
@keyframes glowDrift {
  0%   { transform: translate3d(0, 0, 0); }
  100% { transform: translate3d(var(--driftX, 60px), var(--driftY, -100px), 0); }
}
@keyframes glowPulse {
  0%, 100% { opacity: 0.35; }
  50%      { opacity: 0.6; }
}

@keyframes starDrift {
  0%   { transform: translate3d(0, 0, 0); }
  100% { transform: translate3d(var(--driftX, 100px), var(--driftY, -200px), 0); }
}
@keyframes starTwinkle {
  /* DWELL-TIME BOOST · was opacity: var(--twinkMin, 0.55) → var(--twinkMax, 1).
     Per-star variables ranged 0.47–0.97, dimming most stars below
     perception. Fixed floor 0.55 / ceiling 1.0 → legible across all
     sections, no new motion pattern added. */
  0%, 100% { opacity: 0.55; }
  50%      { opacity: 1;    }
}
/* Tighter twinkle periods · was 4–5s per variant (too slow to register
   while scrolling past). 2.2–3.4s reads as rhythmic, not frantic. */
.cosmic-bg__star          { animation-duration: var(--dur, 30s), 2.8s; }
.cosmic-bg__star--bright  { animation-duration: var(--dur, 30s), 2.2s; }
/* PERF: freeze decorative star/glow animations. 88 infinitely-animating stars
   = 88 perpetual GPU layers churning every frame (measured 102 layers x 63
   updates) -> the scroll jump. Static stars look identical at rest. (DS §13:
   ungated infinite loops are banned anyway.) */
.cosmic-bg__star, .cosmic-bg__star--green, .cosmic-bg__star--bright,
.cosmic-bg__star--far, .cosmic-bg__glow, .cosmic-bg::after {
  animation: none !important;
}
.cosmic-bg__star--far     { animation-duration: 3.4s; }
@media (prefers-reduced-motion: reduce) {
  .cosmic-bg__star { animation: none; opacity: 0.6; }
  .cosmic-bg__glow { animation: none; opacity: 0.4; }
  .cosmic-bg::after { animation: none; }
}

/* ═══════════════════════════════════════════════════════════════
   SECTION RHYTHM · main column
   Use .main-col on the parent that holds all section blocks
   ═══════════════════════════════════════════════════════════════ */
.main-col {
  display: flex;
  flex-direction: column;
  gap: var(--section-gap-desktop);
  min-width: 0;
}
@media (max-width: 1024px) { .main-col { gap: var(--section-gap-tablet); } }
@media (max-width: 560px)  { .main-col { gap: var(--section-gap-mobile); } }

/* ═══════════════════════════════════════════════════════════════
   TYPOGRAPHY SCALE · use these classes/tokens for every section
   ═══════════════════════════════════════════════════════════════ */


.section-title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.5rem, 2.6vw, 2.1rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.section-title-accent {
  display: inline-block;
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
          background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}


/* ═══════════════════════════════════════════════════════════════
   CARD BASE · use this for any content card across the site
   ═══════════════════════════════════════════════════════════════ */
.cc-card {
  position: relative;
  background: var(--card-bg-tint), var(--card-bg);
  border: 1px solid var(--card-border);
  border-radius: 14px;
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  box-shadow:
    0 6px 18px rgba(0,0,0, 0.28),
    inset 0 1px 0 rgba(255,255,255, 0.04);
  isolation: isolate;
}
@keyframes logoTextureDrift {
  0%, 100% { transform: translate(0, 0) rotate(0deg); }
  33% { transform: translate(5%, -3%) rotate(1deg); }
  66% { transform: translate(-3%, 4%) rotate(-1deg); }
}
@keyframes logoShimmer { 0%,100% { left: -100%; } 50% { left: 150%; } }
@keyframes svantraDrift {
  0%   { background-position: 0% 50%; }
  100% { background-position: 220% 50%; }
}
@keyframes svantraPulse {
  0%, 100% { opacity: 0.32; }
  50%      { opacity: 0.6; }
}
@keyframes svantraShine {
  to { left: 130%; }
}

/* ═══════════════════════════════════════════════════════════════
   INSTR LAYOUT — 2 column with sticky side index (mirrors LIBINNER)
   Critical: on mobile, .instr must NOT form a stacking context.
   z-index: auto ensures fixed sidenav (z=90) escapes to body level
   so it paints above the footer (anti-pattern #4 from handoff).

   Background continuity: body owns the dark surface + noise (already
   set above). .instr is a transparent container so the page bg flows
   uninterrupted — no boxed-in feel at any viewport width.
   ═══════════════════════════════════════════════════════════════ */


</style>

<style>
/* ═══════════════════════════════════════════════════════════════
   ABOUT-001 · page-specific CSS
   Maximal/cinematic voice — motion budget intentionally exceeded
   (scoped to this page only; see lockfile motion-exception clause).
   Tokens inherited from shared sheet. Heritage-gold added below
   because the canonical :root omits it (DESIGN-SYSTEM §2 has it).
   ═══════════════════════════════════════════════════════════════ */

:root {
  /* Heritage gold — present in DESIGN-SYSTEM §2, absent from canonical :root */
  --heritage-gold: #D4A656;
  --heritage-gold-soft: rgba(212, 166, 86, 0.22);
  --heritage-gold-faint: rgba(212, 166, 86, 0.08);
}

/* ─── Page container · §5 main page container ──────────────────── */

/* ─── §HUE · whisper section-glow (color psychology, one crossfading layer) ─── */
.abt-huelayer {
  position: fixed; inset: 0; z-index: 1; pointer-events: none;
  background: radial-gradient(120% 80% at 50% 18%, var(--glow, transparent) 0%, transparent 60%);
  opacity: 0;                       /* fades in once a hue is set */
  transition: background 1100ms ease, opacity 1100ms ease;
  transform: translateZ(0); will-change: background, opacity;
  contain: strict;
}
.abt-huelayer.is-on { opacity: 1; }
@media (max-width: 768px) {
  /* phones: glow needs a touch more presence to register on small bright panels */
  .abt-huelayer { background: radial-gradient(150% 75% at 50% 22%, var(--glow, transparent) 0%, var(--glow, transparent) 18%, transparent 70%); }
}
@media (prefers-reduced-motion: reduce) { .abt-huelayer { transition: none; } }

.abt-main {
  position: relative;
  z-index: 2;
  max-width: 1320px;
  margin: 0 auto;
  padding: var(--page-pad-top) 4rem 4rem;
  background: transparent;
  display: flex;
  flex-direction: column;
}
@media (max-width: 1024px) { .abt-main { padding: 8.5rem 1.5rem 3rem; } }
@media (max-width: 560px)  { .abt-main { padding: 7rem 1.25rem 2.5rem; } }

/* ─── Section rhythm · no two adjacent sections share padding ───
   Alternating tall/short per ABOUT-SPEC §1 rhythm rule.
   Implemented as per-section vertical padding, not container gap. */
.abt-sec { position: relative; scroll-margin-top: 5rem; }
.abt-main > .abt-sec:first-of-type { padding-top: 0; }
/* Clean 2-tier rhythm — GENEROUS (feature sections) alternating with TIGHT
   (connectors). Consistent, intentional spacing; no random tiers, no dead gaps,
   no cramping. Same class names so markup is untouched. */
.abt-sec--tall,
.abt-sec--tall-plus { padding-block: 5rem; }      /* GENEROUS */
/* feature-section cadence: hairline + faint vapor at the top edge (no tints) */
.abt-sec[aria-labelledby="abt-story-title"]::before,
.abt-sec[aria-labelledby="abt-pillars-title"]::before,
.abt-sec[aria-labelledby="abt-gallery-title"] { padding-bottom: 3rem; }   /* tighten gap to the closing heritage line */
.abt-sec[aria-labelledby="abt-gallery-title"]::before {
  content: ""; position: absolute; left: 50%; top: 0; transform: translateX(-50%);
  width: min(100%, 1100px); height: 1px;
  background: linear-gradient(90deg, transparent, var(--glass-border) 22%, var(--glass-border) 78%, transparent);
  opacity: 0.7; pointer-events: none;
}
.abt-sec--med,
.abt-sec--med-tight,
.abt-sec--short     { padding-block: 3.25rem; }   /* TIGHT */
@media (max-width: 1024px) {
  .abt-sec--tall, .abt-sec--tall-plus { padding-block: 3.75rem; }
  .abt-sec--med, .abt-sec--med-tight, .abt-sec--short { padding-block: 2.5rem; }
}
@media (max-width: 768px) {
  .abt-sec--tall, .abt-sec--tall-plus { padding-block: 3rem; }
  .abt-sec--med, .abt-sec--med-tight, .abt-sec--short { padding-block: 2rem; }
}

/* ─── Section head (reuses shared .section-eyebrow/.section-title) ── */
.abt-head {
  display: flex;
  flex-direction: column;
  align-items: center;       /* centered heads — no ragged right edge */
  text-align: center;
  gap: 1rem;
  margin-bottom: 2rem;
  max-width: 760px;
  margin-left: auto;
  margin-right: auto;
}

/* Heritage-gold italic eyebrow variant for "Since 2010" handcrafted moment */
.abt-eyebrow-italic {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-weight: 400;
  font-size: clamp(1rem, 1.4vw, 1.15rem);   /* was 0.95rem — too small under the giant title */
  letter-spacing: 0.01em;
  color: var(--text-secondary);
}
.abt-eyebrow-italic .gold { color: var(--heritage-gold); font-style: normal; }

/* ─── §1 HERO ──────────────────────────────────────────────────── */
.abt-hero {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  gap: 0;
  padding-bottom: 1rem;   /* natural height — content sizes itself, no forced void */
}
.abt-hero__eyebrow { margin-bottom: 1rem; }
.abt-hero__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(2.1rem, 4vw, 3.4rem);   /* trimmed — was 6vw/5rem (oversized) */
  font-weight: 900;
  letter-spacing: -0.02em;
  line-height: 1.12;
  color: #fff;
  margin: 0;
  max-width: 24ch;        /* breaks into ~3 balanced lines, not 5 thin ones */
  text-wrap: balance;
}
@media (max-width: 560px) {
  .abt-hero__title { font-size: 1.7rem; line-height: 1.2; max-width: 18ch; }   /* balanced for mobile — not oversized */
  .abt-hero__sub { font-size: 0.95rem; margin-top: 1.3rem; }
}
.abt-hero__title em {
  font-style: normal;
  display: inline-block;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.08em;
}
.abt-hero__sub {
  margin-top: 1.8rem;
  max-width: 56ch;
  font-family: "Outfit", sans-serif;
  font-weight: 300;
  font-size: clamp(0.95rem, 1.3vw, 1.12rem);  /* lead para, distinct from body */
  line-height: 1.7;
  color: var(--text-secondary);
  text-align: center;
}
@media (max-width: 860px) {
  .abt-hero { min-height: auto; }
}

/* Left-aligned head variant — breaks the centered default for asymmetry (§2) */
.abt-head--left {
  align-items: flex-start;
  text-align: left;
  margin-left: 0;
}
@media (max-width: 720px) {
  /* whole page reads centred on mobile — align the left-variant heads too */
  .abt-head--left { align-items: center; text-align: center; margin-left: auto; margin-right: auto; }
}

/* ─── §2 MISSION & VISION · editorial numerals · asymmetric ──────
   Large Playfair "01 / 02" lead each stanza; left-aligned; stanza 2 drops
   lower than stanza 1 for intentional rhythm (not a flat centered grid). */
.abt-mv {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2.5rem 4rem;
  max-width: none;
  align-items: start;
}
/* ─── FRAME SYSTEM · premium glass panels (tiered, hue-varied, perf-guarded) ───
   .abt-frame = base glass surface. Hue modifiers tint the inner wash to echo the
   section's color (ties to the §HUE glow system). Used sparingly — only on
   "contained thought" sections, not every section, so frames stay meaningful. */
.abt-frame {
  position: relative;
  padding: clamp(2rem, 4vw, 3.25rem);
  border-radius: 20px;
  background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(20,26,34,0.42));
  border: 1px solid var(--glass-border);
  border-top-color: rgba(255,255,255,0.14);     /* faint top-edge highlight = glass */
  box-shadow: 0 24px 60px -32px rgba(0,0,0,0.55), inset 0 1px 0 rgba(255,255,255,0.04);
  /* backdrop-blur removed — re-blurring the cosmic bg every scroll frame caused shimmer/flicker on every frame (team, pillars, MV, credits). Flat tint keeps the glass look without the repaint. */
  overflow: hidden;
}
.abt-frame::before {          /* section-hued inner wash (felt, not seen) */
  content: ""; position: absolute; inset: 0; pointer-events: none;
  background: radial-gradient(120% 80% at 0% 0%, var(--frame-wash, rgba(255,255,255,0.04)), transparent 55%);
}
.abt-frame > * { position: relative; z-index: 1; }
.abt-frame--indigo { --frame-wash: rgba(120,134,255,0.06); }   /* MV · belief */
.abt-frame--green  { --frame-wash: rgba(117,194,73,0.06); }    /* Pillars · craft */
.abt-frame--gold   { --frame-wash: rgba(214,168,96,0.06); }    /* Credits · recognition */
/* §6 family frame (B2) — small inset tag, centred title, family held in one frame */
.abt-team-frame {
  padding-top: 1.25rem;
  /* kill live backdrop-blur on THIS frame only — re-blurring the cosmic bg every scroll frame caused the background shimmer/flicker. Flat tint keeps the glass look without the repaint. */
  -webkit-backdrop-filter: none; backdrop-filter: none;
  background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(20,26,34,0.42));
}
.abt-team-frame__tag {
  display: table;   /* own line, shrink-wrapped to text — title always below */                 /* in normal flow, top-left — title clears it naturally */
  font-family: "Outfit", sans-serif; font-weight: 500;
  font-size: 0.62rem; letter-spacing: 0.26em; text-transform: uppercase;
  color: var(--green-light);
  padding: 0.32rem 0.75rem; border-radius: 999px;
  background: rgba(117,194,73,0.08); border: 1px solid rgba(117,194,73,0.22);
}
.abt-team-frame__title { text-align: center; margin: 1.1rem 0 0.25rem; }   /* clear gap below the tag */
.abt-team-frame .abt-team__field { margin-top: 0.5rem; }
@media (max-width: 560px) {
  /* tag centred + small on mobile; title centred below */
  .abt-team-frame__tag {
    margin-left: auto; margin-right: auto;   /* display:table + auto margins = centred */
    font-size: 0.54rem; letter-spacing: 0.18em; padding: 0.26rem 0.66rem;
  }
  .abt-team-frame__title { font-size: clamp(1.6rem, 7vw, 2.1rem); margin-top: 0.8rem; }
}
.abt-credit-frame .abt-credit-head { margin-bottom: 1.25rem; }
/* credits frame holds a moving slider — kill backdrop blur here (it re-rasterizes
   the moving cards every frame = flicker). Gradient surface keeps the glass look. */
.abt-credit-frame { -webkit-backdrop-filter: none !important; backdrop-filter: none !important; }
.abt-credit-frame { background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(20,26,34,0.6)); }
/* perf escape hatch: if blur is heavy on a device, drop it sitewide via this flag */
.no-frame-blur .abt-frame { -webkit-backdrop-filter: none; backdrop-filter: none; }
@media (max-width: 560px) {
  .abt-frame { padding: 1.5rem 1.25rem; border-radius: 16px; }
}
.abt-mv__stanza { position: relative; text-align: left; }
.abt-mv__stanza:nth-child(2) { margin-top: 3rem; }   /* drop the second lower — asymmetry */
.abt-mv__stanza-lead {
  font-family: "Playfair Display", serif;
  font-weight: 700;
  font-size: 1.15rem;
  color: #fff;
  margin-bottom: 0.6rem;
}
.abt-mv__stanza p {
  font-family: "Outfit", sans-serif;
  font-weight: 300;
  font-size: 1rem;
  line-height: 1.7;
  color: var(--text-secondary);
  max-width: 52ch;
}
@media (max-width: 720px) {
  .abt-mv { grid-template-columns: 1fr; gap: 2.2rem; }
  .abt-mv__stanza:nth-child(2) { margin-top: 0; }   /* no offset when stacked */
  .abt-mv__stanza { text-align: center; }           /* centred to match the theme */
  .abt-mv__stanza p { max-width: none; margin-left: auto; margin-right: auto; }
}

/* ─── §3 THE STORY · two-column balanced (prose + anchored pull-quote) ─── */
.abt-story {
  max-width: 720px;
  margin: 0 auto;          /* single centered measure — no orphaned right rail */
}
.abt-story__prose { min-width: 0; }
.abt-story p {
  font-family: "Outfit", sans-serif;
  font-weight: 300;
  font-size: 1.02rem;
  line-height: 1.78;
  color: var(--text-secondary);
  margin-bottom: 1.4rem;
}
.abt-story p:first-of-type {
  font-size: 1.08rem;
  color: var(--text-primary);
}
.abt-story p:first-of-type .leadword {
  font-family: "Outfit", sans-serif;
  font-weight: 600;
  letter-spacing: 0.04em;
  color: var(--heritage-gold);
}
/* Stat now sits inline UNDER the prose as a quiet centered strip,
   not a floating right sidebar (the asymmetric rail read awkwardly). */
.abt-story__aside {
  margin-top: 2.5rem; padding-top: 2rem;
  border-top: 1px solid var(--heritage-gold-soft);
  display: flex; flex-direction: column; align-items: center; text-align: center;
}
.abt-story__fact {
  display: flex; flex-direction: column; align-items: center;
  margin-bottom: 1rem;
}
.abt-story__fact-num {
  font-family: "Playfair Display", serif;
  font-weight: 900;
  font-size: clamp(1.9rem, 2.4vw, 2.2rem);
  line-height: 1;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
}
.abt-story__fact-label {
  font-family: "Outfit", sans-serif; font-size: 0.7rem; font-weight: 600;
  letter-spacing: 0.16em; text-transform: uppercase; color: var(--text-muted);
  margin-top: 0.5rem;
}
.abt-story__aside-note {
  font-family: "Outfit", sans-serif; font-weight: 300;
  font-size: 0.9rem; line-height: 1.7; color: var(--text-secondary);
  max-width: 52ch;
}

/* ═══════════════════════════════════════════════════════════════
   §4 FOUR PILLARS · ORBITAL (centerpiece)
   Built per ABOUT-SPEC mandatory edits:
   - NO logo breath keyframe
   - hover/focus pauses rotation (via wrapper, transitioned)
   - node discs de-blurred (NO backdrop-filter on discs)
   - cards KEEP backdrop-filter (dialog-like)
   - greens reconciled to shared :root tokens
   - "Pillar I–IV" labels
   - Svantra 5th node disabled, "In Preparation", single line
   ═══════════════════════════════════════════════════════════════ */
.abt-orbital-wrap { display: flex; justify-content: center; }

/* §4 left/right split — orbit on the left, heading + intro on the right */
.abt-pillars-split {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  align-items: center;
  gap: 3rem;
}
.abt-pillars-copy { max-width: 30rem; }
.abt-pillars-copy .eyebrow { margin-bottom: 1rem; display: inline-flex; }
.abt-pillars-copy .section-title { margin-bottom: 1.2rem; }
.abt-pillars-copy__lead {
  font-family: "Outfit", sans-serif; font-weight: 300;
  font-size: 1rem; line-height: 1.7; color: var(--text-secondary);
  max-width: 42ch;
}
@media (max-width: 968px) {
  /* Orbit hidden on mobile (fallback list shows); copy stacks above it */
  .abt-pillars-split { display: block; }
  .abt-pillars-copy { max-width: none; margin-bottom: 2rem; text-align: center; }
  .abt-pillars-copy .eyebrow,
  .abt-pillars-copy__lead { margin-left: auto; margin-right: auto; }
  .abt-pillars-copy__hint { display: none; }   /* no hover on touch — fallback list shows below */
}
.abt-orbital {
  --orbit-r: 250px;
  position: relative;
  width: min(540px, 100%);
  aspect-ratio: 1;
  margin: 0 auto;
}

/* Centre studio mark — static, NO breath animation (§13 ban) */
.abt-orbital__core {
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  width: 128px; height: 128px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  background:
    radial-gradient(circle at 50% 40%, rgba(117,194,73,0.10), transparent 70%),
    rgba(8, 12, 18, 0.7);
  border: 1px solid var(--glass-border);
  border-top-color: rgba(255,255,255,0.10);
  z-index: 3;
}
.abt-orbital__core img { width: 64px; height: auto; opacity: 0.92; }
.abt-orbital__core-label {
  position: absolute; bottom: -1.6rem; left: 50%; transform: translateX(-50%);
  font-family: "Outfit", sans-serif; font-size: 0.5rem; font-weight: 700;
  letter-spacing: 0.3em; text-transform: uppercase; color: var(--text-muted);
  white-space: nowrap;
}

/* Rotating ring — wrapper carries the animation so hover can pause it
   with a transition rather than a hard stop (tactile/reversible §3). */
.abt-orbital__orbit {
  position: absolute; inset: 0;
  /* static radial diagram — no infinite rotation (DESIGN-SYSTEM §11/§13 ban).
     The ring + nodes sit still; hover reveals each pillar card. */
  transition: none;
}
/* The orbit path ring (single ambient stroke, reconciled green) */
.abt-orbital__ring {
  position: absolute; inset: 6%;
  border-radius: 50%;
  border: 1px solid rgba(117,194,73,0.14);
  pointer-events: none;
}
.abt-orbital__ring::after {  /* faint inner second ring for depth, neutral */
  content: ""; position: absolute; inset: 12%;
  border-radius: 50%;
  border: 1px solid rgba(255,255,255,0.04);
}

/* Nodes positioned around the ring via polar coords (--angle, --radius).
   Positioning lives HERE (static). Counter-rotation lives on a separate
   child so the two transforms never collide. */
.abt-orbital__node {
  position: absolute; top: 50%; left: 50%;
  width: 0; height: 0;
  z-index: 5;  /* above core (z:3) — a node at the top never clips behind the logo */
  /* place the node on the ring: rotate to angle, push out by radius, then
     un-rotate so the child sits axis-aligned at that point */
  transform: rotate(var(--angle)) translateY(calc(var(--orbit-r, 250px) * -1)) rotate(calc(var(--angle) * -1));
}
.abt-orbital__node-inner {
  position: absolute;
  top: 0; left: 0;
  transform: translate(-50%, -50%);  /* centre the disc on the node point */
}
/* Node wrapper — discs sit upright in a static diagram (no counter-spin needed). */
.abt-orbital__node-spin {
  display: inline-flex;
}
/* Node disc — NO backdrop-filter (§8 cull: nodes not on keep-list) */
.abt-orbital__node-disc {
  width: 76px; height: 76px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  background: rgba(8, 12, 18, 0.82);
  border: 1px solid var(--glass-border);
  border-top-color: rgba(255,255,255,0.10);
  color: var(--green-light);
  cursor: pointer;
  transition: border-color var(--motion-fast, .35s) var(--ease, cubic-bezier(.22,1,.36,1)),
              transform   var(--motion-fast, .35s) var(--ease, cubic-bezier(.22,1,.36,1));
}
.abt-orbital__node-disc svg { width: 28px; height: 28px; }
.abt-orbital__node-num {
  position: absolute; top: -0.4rem; right: -0.4rem;
  font-family: "Playfair Display", serif; font-size: 0.7rem; font-weight: 700;
  color: var(--text-muted);
}
@media (hover: hover) and (pointer: fine) {
  .abt-orbital__node-disc:hover { border-top-color: rgba(255,255,255,0.18); transform: scale(1.06); }
}

/* Svantra 5th node · dimmed until launch. Same behaviour as other pillars
   (hover reveals its card) — just muted. Remove --disabled to fully activate. */
.abt-orbital__node--disabled .abt-orbital__node-disc {
  opacity: 0.42; color: var(--text-muted);
}
@media (hover: hover) and (pointer: fine) {
  .abt-orbital__node--disabled .abt-orbital__node-disc:hover {
    opacity: 0.6; border-top-color: rgba(255,255,255,0.14); transform: scale(1.04);
  }
}
/* Its card carries a muted "coming" treatment so it never overstates Svantra */
.abt-orbital__card--coming .abt-orbital__card-eyebrow { color: var(--text-muted); }
.abt-orbital__card--coming .abt-orbital__card-title { color: var(--text-secondary); }

/* Pillar card — KEEPS backdrop-filter (dialog/modal-like §8 keep-list).
   Revealed on node hover/focus; one card visible at a time. */
.abt-orbital__card {
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%) translateY(8px);
  width: min(300px, 70vw);
  padding: 1.5rem 1.6rem 1.7rem;
  border-radius: 16px;
  background:
    linear-gradient(135deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02), rgba(255,255,255,0.06)),
    linear-gradient(180deg, rgba(15,22,30,0.72), rgba(10,14,19,0.82));
  backdrop-filter: blur(18px) saturate(1.8) contrast(1.05);
  -webkit-backdrop-filter: blur(18px) saturate(1.8) contrast(1.05);
  border: 1px solid rgba(255,255,255,0.10);
  border-top-color: rgba(255,255,255,0.18);
  box-shadow: 0 18px 40px rgba(0,0,0,0.45), 0 32px 80px rgba(0,0,0,0.35);
  opacity: 0; pointer-events: none; z-index: 4;
  transition: opacity var(--motion-medium, .6s) var(--ease, cubic-bezier(.22,1,.36,1)),
              transform var(--motion-medium, .6s) var(--ease, cubic-bezier(.22,1,.36,1));
}
.abt-orbital__card.is-active {
  opacity: 1; pointer-events: auto;
  transform: translate(-50%, -50%) translateY(0);
}
.abt-orbital__card-eyebrow {
  font-family: "Outfit", sans-serif; font-size: 0.5rem; font-weight: 700;
  letter-spacing: 0.3em; text-transform: uppercase; color: var(--green-light);
  margin-bottom: 0.6rem; display: block;
}
.abt-orbital__card-title {
  font-family: "Playfair Display", serif; font-size: 1.15rem; font-weight: 700;
  color: #fff; margin-bottom: 0.6rem; line-height: 1.25;
}
.abt-orbital__card-body {
  font-family: "Outfit", sans-serif; font-size: 0.82rem; font-weight: 300;
  line-height: 1.6; color: var(--text-secondary);
}

/* Single ambient pulse on core glow — gated, kept as the ONE allowed ambient.
   (Spec flagged this as acceptable single ambient OR cut. Kept, gated.) */
.abt-orbital__core::before {
  content: ""; position: absolute; inset: -18%;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(117,194,73,0.10), transparent 70%);
  z-index: -1;
}

/* Mobile fallback — orbital hidden, vertical pillar list shown instead */
.abt-pillars-fallback { display: none; }
@media (max-width: 968px) {
  /* Orbital is desktop-only (owner decision). On mobile the readable fallback
     list below carries the pillars; the orbit would be cramped at 360. */
  .abt-orbital-wrap { display: none; }

  /* Premium single-column cards — text fits, comfortable rhythm, icon beside title */
  .abt-pillars-fallback {
    display: flex; flex-direction: column; gap: 0.85rem; margin-top: 1.75rem;
  }
  .abt-pillar-row {
    padding: 1.5rem 1.25rem;
    background: rgba(255,255,255,0.03);
    border-top-color: rgba(255,255,255,0.12);
  }
  .abt-pillar-row__icon { width: 36px; height: 36px; }
  .abt-pillar-row__icon svg { width: 17px; height: 17px; }
  .abt-pillar-row__title { font-size: 1.05rem; }
  .abt-pillar-row__body { font-size: 0.8rem; line-height: 1.6; color: var(--text-secondary); }
  .abt-pillar-row--muted { opacity: 0.6; }
}
.abt-pillar-row {
  display: flex; flex-direction: column; align-items: center; text-align: center;
  gap: 0.5rem;
  padding: 1.6rem 1.4rem;
  border-radius: 14px;
  background: rgba(255,255,255,0.025);
  border: 1px solid var(--glass-border);
  border-top-color: rgba(255,255,255,0.10);
}
.abt-pillar-row > div:not(.abt-pillar-row__icon) {   /* unwrap text block so children stack centred */
  display: contents;
}
.abt-pillar-row__icon {
  width: 38px; height: 38px; border-radius: 50%;   /* small, centred on top */
  display: flex; align-items: center; justify-content: center;
  background: rgba(8,12,18,0.7); border: 1px solid var(--glass-border);
  color: var(--green-light);
  margin-bottom: 0.3rem;
}
.abt-pillar-row__icon svg { width: 18px; height: 18px; }
.abt-pillar-row__num {
  font-family: "Outfit", sans-serif; font-size: 0.6rem; letter-spacing: 0.18em;
  text-transform: uppercase; color: var(--green-light); line-height: 1;
}
.abt-pillar-row__title {
  font-family: "Playfair Display", serif; font-size: 1.1rem; font-weight: 700;
  color: #fff; line-height: 1.2; margin-top: 0.1rem;
}
.abt-pillar-row__body {
  font-family: "Outfit", sans-serif; font-size: 0.82rem; font-weight: 300;
  line-height: 1.6; color: var(--text-muted); margin-top: 0.45rem; max-width: 34ch;
}
.abt-pillar-row--muted { opacity: 0.55; }
.abt-pillar-row--muted .abt-pillar-row__icon { color: var(--text-muted); }



/* ─── §5 FOUNDER · full-bleed shot · text overlay on left negative space ─────
   Full-viewport-width image (breaks out of .abt-main padding via 100vw trick).
   Text sits in the LEFT third over composed negative space, with a scrim only
   under the text for guaranteed legibility. Mobile: scrim flips to bottom and
   text drops below the image's lower half (no cramped side-overlay at 360). */
.abt-founder-bleed {
  position: relative;
  /* break out of the centered .abt-main (max 1320 + 4rem padding) to true full-bleed */
  width: 100vw;
  left: 50%;
  margin-left: -50vw;
  padding: 0;            /* override .abt-sec padding-block — image owns the band */
  display: flex;
  align-items: stretch;
}
.abt-founder-bleed__media {
  position: relative;
  width: 100%;
  height: clamp(440px, 60vh, 660px);
  overflow: hidden;
  border-radius: 4px;                                   /* whisper radius — framed photo, not a hard rectangle */
  box-shadow: 0 40px 90px -50px rgba(0,0,0,0.8);        /* depth — media lifts off the cosmic ground */
  isolation: isolate;                                   /* contain the layer stack (no mix-blend leakage) */
}
/* studio KEY-GLOW — faint warm light bloom on the subject (left) side */
.abt-founder-bleed__keyglow {
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background: radial-gradient(60% 80% at 22% 42%, rgba(255,224,178,0.16), transparent 60%);
}
/* GRADE — very faint warm->cool wash unifies any image with the page palette */
.abt-founder-bleed__grade {
  position: absolute; inset: 0; z-index: 2; pointer-events: none;
  background: linear-gradient(120deg, rgba(214,168,96,0.05), transparent 45%, rgba(80,110,160,0.06));
}
/* cinematic VIGNETTE — wraps all four edges, pulls the eye to the subject */
.abt-founder-bleed__vignette {
  position: absolute; inset: 0; z-index: 3; pointer-events: none;
  box-shadow: inset 0 0 140px 30px rgba(0,0,0,0.55);
  background: radial-gradient(120% 120% at 50% 45%, transparent 55%, rgba(0,0,0,0.32) 100%);
}
/* inner MAT line — thin light inset like a gallery mat (framed, not boxed) */
.abt-founder-bleed__mat {
  position: absolute; inset: 14px; z-index: 5; pointer-events: none;
  border: 1px solid rgba(255,255,255,0.14);
  border-radius: 2px;
}
.abt-founder-bleed__img {
  position: absolute; inset: 0;
  width: 100%; height: 100%;
  object-fit: cover;
  object-position: 50% 22%;   /* focal anchor on the face; cover crops differ per aspect ratio */
}
/* scrim — darkens the RIGHT for text legibility, fades out toward the left */
.abt-founder-bleed__scrim {
  position: absolute; inset: 0; z-index: 4;
  background: linear-gradient(270deg,
    rgba(5,8,14,0.92) 0%,
    rgba(5,8,14,0.78) 28%,
    rgba(5,8,14,0.35) 52%,
    transparent 72%);
}
.abt-founder-bleed__overlay {
  position: absolute;
  right: 0; top: 0; bottom: 0;
  z-index: 10;
  display: flex; flex-direction: column; justify-content: center; align-items: flex-start;
  max-width: 38%;
  padding: 2.5rem clamp(1.5rem, 5vw, 5rem);
}
.abt-founder-bleed__overlay .eyebrow { margin-bottom: 1rem; display: inline-block; }
.abt-founder-bleed__quote {
  font-family: "Playfair Display", serif;
  font-style: italic; font-weight: 400;
  font-size: clamp(1.2rem, 1.7vw, 1.55rem);
  line-height: 1.45; color: #fff;
  margin: 0 0 1.2rem; max-width: 32ch;
}
.abt-founder-bleed__name {
  font-family: "Outfit", sans-serif; font-size: 0.85rem; font-weight: 600;
  color: var(--text-secondary); letter-spacing: 0.02em;
}
.abt-founder-bleed__role {
  font-family: "Outfit", sans-serif; font-size: 0.72rem; font-weight: 300;
  color: var(--text-muted); margin-top: 0.2rem;
}
/* Mobile — overlay can't sit safely beside a short image; scrim flips to the
   bottom and text anchors to the lower portion (text-on-lower-image, legible). */
@media (max-width: 720px) {
  .abt-founder-bleed__media { height: clamp(440px, 78vh, 600px); }
  .abt-founder-bleed__scrim {
    background: linear-gradient(180deg, transparent 32%, rgba(5,8,14,0.55) 56%, rgba(5,8,14,0.94) 100%);
  }
  .abt-founder-bleed__overlay {
    max-width: 100%; right: 0;
    justify-content: flex-end;
    padding: 1.8rem 1.3rem 2rem;
  }
  .abt-founder-bleed__quote { font-size: 1.05rem; line-height: 1.5; max-width: none; }
}
@media (max-width: 768px) {
  .abt-founder-bleed__mat { inset: 10px; }
  .abt-founder-bleed__keyglow { background: radial-gradient(70% 50% at 50% 30%, rgba(255,224,178,0.14), transparent 62%); }
  .abt-founder-bleed__vignette { box-shadow: inset 0 0 90px 20px rgba(0,0,0,0.5); }
}

/* ─── §6 TEAM · node field (desktop) + circular roster (mobile) ─────────
   One family, no hierarchy. Desktop: draggable node field (drag to arrange,
   tap to reveal) — static until the user acts, so no infinite motion.
   Mobile (≤968): the field is hidden and the circular roster shows instead
   (a node field needs width it doesn't have at 360). Same data drives both. */

.abt-team__hint {
  font-family: "Outfit", sans-serif; font-weight: 300;
  font-size: 0.8rem; color: var(--text-muted); margin-top: 0.4rem;
}

/* Node field — desktop only */
.abt-team__field {
  position: relative;
  width: 100%;
  height: 540px;
  margin-top: 0.25rem;
  touch-action: none;
  user-select: none; -webkit-user-select: none;   /* stop double-click selecting the field (green ::selection flash) */
  contain: paint;                 /* isolate field paint -> SVG link layer stops re-rasterizing on scroll */
  transform: translateZ(0);       /* stable composite layer (built once, cached) */
}
.abt-team__links { position: absolute; inset: 0; pointer-events: none; transform: translateZ(0); }
.abt-team__links line { stroke: rgba(187,214,122,0.13); stroke-width: 1; }
.abt-team__node {
  position: absolute; width: 78px; height: 78px; margin: -39px 0 0 -39px;
  border-radius: 50%; cursor: grab; user-select: none; touch-action: none;
  border: 1px solid var(--glass-border); border-top-color: rgba(255,255,255,0.12);
  background: rgba(255,255,255,0.04); overflow: hidden;
  transition: transform .25s var(--ease, cubic-bezier(.22,1,.36,1)),
              box-shadow .25s var(--ease, cubic-bezier(.22,1,.36,1)),
              border-color .25s var(--ease, cubic-bezier(.22,1,.36,1));
}
.abt-team__node img { width: 100%; height: 100%; object-fit: cover; object-position: 50% var(--focus-y, 50%); display: block; pointer-events: none; }
.abt-team__node-ph {
  width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;
  color: var(--text-whisper);
}
.abt-team__node-ph svg { width: 40%; height: 40%; }
.abt-team__node.is-dragging {
  cursor: grabbing; transform: scale(1.08);
  box-shadow: 0 14px 34px rgba(0,0,0,0.5); border-color: rgba(187,214,122,0.5); z-index: 50;
}
.abt-team__node.is-active { border-color: rgba(187,214,122,0.6); }
@media (hover:hover) and (pointer:fine) {
  .abt-team__node:hover { border-color: rgba(187,214,122,0.4); transform: scale(1.05); }
}
.abt-team__node:focus-visible { outline: 2px solid var(--green-light); outline-offset: 3px; }

/* Reveal popover — premium framed card, centred, with bio space */
.abt-team__reveal {
  position: fixed; z-index: 1100; width: 236px; padding: 2rem 1.4rem 1.6rem;
  text-align: center;
  background: linear-gradient(180deg, rgba(20,26,34,0.99), rgba(9,12,17,0.99));   /* solid, lifted card (not flat glass) */
  border: 1px solid rgba(255,255,255,0.10); border-top-color: rgba(117,194,73,0.5);
  border-radius: 18px;
  /* layered depth shadow — reads as a card floating well above the page */
  box-shadow:
    0 1px 0 rgba(255,255,255,0.06) inset,
    0 2px 8px rgba(0,0,0,0.5),
    0 18px 40px rgba(0,0,0,0.55),
    0 50px 100px rgba(0,0,0,0.5),
    0 0 0 1px rgba(117,194,73,0.06);
  opacity: 0; transform: translateY(10px) scale(0.96); pointer-events: none;
  transition: opacity .32s var(--ease, cubic-bezier(.22,1,.36,1)), transform .32s var(--ease, cubic-bezier(.22,1,.36,1));
}
.abt-team__reveal::before {            /* green accent bar at the top — family hue, distinct from frames */
  content: ""; position: absolute; top: 0; left: 50%; transform: translateX(-50%);
  width: 46px; height: 3px; border-radius: 0 0 3px 3px;
  background: linear-gradient(90deg, transparent, var(--green-light), transparent);
}
.abt-team__reveal.is-open { opacity: 1; transform: translateY(0) scale(1); pointer-events: auto; }
/* mobile bottom-centre sheet */
.abt-team__reveal--sheet {
  left: 50% !important; right: auto;
  bottom: calc(1.25rem + env(safe-area-inset-bottom, 0px)); top: auto !important;
  width: calc(100vw - 4rem); max-width: 300px;
  transform: translateX(-50%) translateY(12px) scale(0.98);
}
.abt-team__reveal--sheet.is-open { transform: translateX(-50%) translateY(0) scale(1); }
/* desktop screen-centred modal · consistent at any roster size, never below the field */
.abt-team__reveal.abt-team__reveal--modal {
  /* centre via inset+margin so TRANSFORM is free for scale/fade only — no centering in transform => no conflict with base .is-open */
  left: 0 !important; right: 0 !important; top: 0 !important; bottom: 0 !important;
  margin: auto !important;
  width: 236px; height: -moz-fit-content; height: fit-content; max-height: calc(100vh - 4rem);
  transform: translateY(10px) scale(0.96) !important;
}
.abt-team__reveal.abt-team__reveal--modal.is-open {
  transform: translateY(0) scale(1) !important;
}
/* backdrop scrim behind the centred reveal */
.abt-team__scrim {
  position: fixed; inset: 0; z-index: 1099;
  background: rgba(6, 9, 13, 0.72);
  opacity: 0; pointer-events: none;
  transition: opacity .32s var(--ease, cubic-bezier(.22,1,.36,1));
}
.abt-team__scrim.is-open { opacity: 1; pointer-events: auto; }
/* circular framed portrait, centred */
.abt-team__reveal-pic {
  position: relative;
  width: 132px; height: 150px; margin: 0 auto 1.1rem;   /* taller portrait — premium, less avatar-like */
  border-radius: 14px; overflow: hidden;
  background: rgba(255,255,255,0.04);
  box-shadow:
    0 0 0 1px rgba(255,255,255,0.10),
    0 0 0 5px rgba(117,194,73,0.10),       /* soft green mat ring */
    0 14px 34px rgba(0,0,0,0.5);
}
.abt-team__reveal-pic::after {            /* inner vignette + top highlight on the portrait */
  content: ""; position: absolute; inset: 0; pointer-events: none;
  border-radius: 14px;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.18), inset 0 -30px 40px -20px rgba(0,0,0,0.55);
}
.abt-team__reveal-pic img { width: 100%; height: 100%; object-fit: cover; display: block; }
.abt-team__reveal-name { font-family: "Playfair Display", serif; font-weight: 700; font-size: 1.18rem; line-height: 1.2; color: #fff; }
.abt-team__reveal-role {
  font-family: "Outfit", sans-serif; font-size: 0.58rem; font-weight: 600; letter-spacing: 0.16em;
  text-transform: uppercase; color: var(--green-light); margin-top: 0.4rem;
}
/* hairline divider before the bio */
.abt-team__reveal-bio {
  margin-top: 0.85rem; padding-top: 0.85rem;
  border-top: 1px solid var(--glass-border);
  font-family: "Outfit", sans-serif; font-size: 0.72rem; font-weight: 300; line-height: 1.6;
  color: var(--text-secondary);
}
.abt-team__reveal-bio:empty { display: none; }
.abt-team__reveal-close {
  position: absolute; top: 0.6rem; right: 0.7rem; width: 26px; height: 26px;
  display: flex; align-items: center; justify-content: center;
  background: rgba(255,255,255,0.05); border: 1px solid var(--glass-border); border-radius: 50%;
  color: var(--text-muted); font-size: 1.1rem; line-height: 1; cursor: pointer;
  transition: all .2s var(--ease, cubic-bezier(.22,1,.36,1));
}
@media (hover:hover){ .abt-team__reveal-close:hover { background: rgba(255,255,255,0.1); color: #fff; } }

/* ─── circular roster · mobile fallback + data source ───────────── */
.abt-team__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2.6rem 1.6rem;
}
@media (max-width: 980px) { .abt-team__grid { grid-template-columns: repeat(3, 1fr); gap: 2.2rem 1.2rem; } }
@media (max-width: 680px) { .abt-team__grid { grid-template-columns: repeat(2, 1fr); gap: 1.9rem 1rem; } }
.abt-team__person {
  display: flex; flex-direction: column; align-items: center; text-align: center;
}
.abt-team__avatar {
  width: 96px; height: 96px; border-radius: 50%;   /* circular — reads as people, not tiles */
  background: rgba(255,255,255,0.04); border: 1px solid var(--glass-border);
  border-top-color: rgba(255,255,255,0.10);
  display: flex; align-items: center; justify-content: center;
  font-family: "Playfair Display", serif; font-size: 1.8rem; color: var(--text-whisper);
  overflow: hidden;
  margin-bottom: 0.95rem;
  transition: transform var(--motion-fast,.35s) var(--ease,cubic-bezier(.22,1,.36,1)),
              box-shadow var(--motion-fast,.35s) var(--ease,cubic-bezier(.22,1,.36,1));
}
.abt-team__avatar img { width: 100%; height: 100%; object-fit: cover; display: block; }
@media (hover:hover) and (pointer:fine){
  .abt-team__person:hover .abt-team__avatar { transform: translateY(-3px); box-shadow: 0 10px 24px rgba(0,0,0,.35); }
}
.abt-team__name {
  font-family: "Playfair Display", serif; font-size: 0.98rem; font-weight: 700; color: #fff;
  display: block; line-height: 1.2;
}
.abt-team__desig {
  font-family: "Outfit", sans-serif; font-size: 0.62rem; font-weight: 600; letter-spacing: 0.1em;
  text-transform: uppercase; color: var(--green-light);
  margin-top: 0.3rem;
}

/* Desktop = node field + hidden roster.  Mobile = SAME connected graph, smaller + static.
   Very small phones (<=479) = simple circular roster (graph too cramped). */
@media (min-width: 360px) {
  .abt-team__grid { display: none; }              /* roster = data source only, kept in DOM */
}
@media (max-width: 968px) and (min-width: 360px) {
  .abt-team__field { display: block; touch-action: pan-y; }
  .abt-team__node  { cursor: default; touch-action: pan-y; }
  .abt-team__hint  { display: block; }
}
/* tablet/large-phone graph */
@media (max-width: 968px) and (min-width: 521px) {
  .abt-team__field { height: auto; }
  .abt-team__node  { width: 52px; height: 52px; margin: -26px 0 0 -26px; }
}
/* narrow phone (<=520, incl. 360): taller field + smaller nodes so 8 breathe */
@media (max-width: 520px) and (min-width: 360px) {
  .abt-team__field { height: auto; min-height: 460px; }
  .abt-team__node  { width: 46px; height: 46px; margin: -23px 0 0 -23px; }
}
/* tiny (<360): roster fallback */
@media (max-width: 359px) {
  .abt-team__field, .abt-team__hint { display: none; }
  .abt-team__grid { display: grid; }
}

/* ─── §7 PAST COLLABORATORS · manual drag slider · name + role only · 50+ ────
   No years. No infinite motion (DS §11/§13). Native horizontal overflow =
   touch-swipe free; desktop pointer-drag + arrow paging in page-local JS.
   Edge fades + progress hairline give position sense across many cards. ──── */
.abt-credit-head {
  flex-direction: row; align-items: center; justify-content: space-between;
  max-width: none; text-align: left; gap: 1rem;
}
.abt-credit-arrows { display: flex; gap: 0.5rem; }
.abt-credit-arrow {
  width: 38px; height: 38px; border-radius: 50%;
  display: inline-flex; align-items: center; justify-content: center;
  background: rgba(255,255,255,0.03);
  border: 1px solid var(--cta-secondary-border);
  color: var(--cta-secondary-fg);
  font-family: "Outfit", sans-serif; font-size: 1.2rem; line-height: 1;
  cursor: pointer;
  transition: background .35s cubic-bezier(.22,1,.36,1),
              border-color .35s cubic-bezier(.22,1,.36,1),
              opacity .35s cubic-bezier(.22,1,.36,1);
}
@media (hover:hover) and (pointer:fine){
  .abt-credit-arrow:hover { background: rgba(117,194,73,0.10); border-color: rgba(117,194,73,0.5); }
}
.abt-credit-arrow[disabled] { opacity: 0.3; cursor: default; }
@media (max-width: 720px){ .abt-credit-arrows { display: none; } }  /* touch swipes — no arrows */

.abt-credit-slider { position: relative; }
/* edge fade via gradient overlays (NOT mask-image — mask re-rasterizes every
   scroll frame and stutters on first composite in Chrome/Safari). Matches the
   ::before/::after pattern used by the canonical carousel on page 03. */
.abt-credit-slider::before,
.abt-credit-slider::after {
  content: ""; position: absolute; top: 0; bottom: 0; width: 4%;
  z-index: 2; pointer-events: none;
}
.abt-credit-slider::before { left: 0;  background: linear-gradient(90deg, var(--bg-deep), transparent); }
.abt-credit-slider::after  { right: 0; background: linear-gradient(270deg, var(--bg-deep), transparent); }
/* edge-fade inside the framed credits panel blends to the glass surface, not page bg */
.abt-credit-frame .abt-credit-slider::before { background: linear-gradient(90deg, rgba(22,28,38,0.92), transparent); }
.abt-credit-frame .abt-credit-slider::after  { background: linear-gradient(270deg, rgba(22,28,38,0.92), transparent); }
.abt-credit-track {
  display: flex;
  gap: 0.9rem;
  overflow-x: auto;
  overflow-y: hidden;
  scroll-snap-type: x proximity;
  scroll-behavior: smooth;            /* arrow paging eases; drag overrides via JS */
  padding: 0.25rem 0.25rem 0.6rem;
  -webkit-overflow-scrolling: touch;
  cursor: grab;
  scrollbar-width: none;
  transform: translateZ(0);           /* own composite layer — repaint doesn't flicker the frame */
}
.abt-credit-track::-webkit-scrollbar { display: none; }
.abt-credit-track.is-dragging { cursor: grabbing; scroll-snap-type: none; scroll-behavior: auto; }
.abt-credit-track:focus-visible { outline: 1px solid var(--cta-secondary-border); outline-offset: 4px; border-radius: 12px; }

/* Scroll-container reveal exception: the credit slider wraps a horizontal
   scroll track. The canonical translateY reveal recomputes the track's
   scroll/snap geometry on its first pass -> one-time scroll stutter. Reveal
   it with opacity only (same fade, same duration/easing) — no transform. */
.abt-team__field[data-reveal],
.abt-team__field[data-reveal].is-revealed { transform: none; }


.abt-credit-card {
  flex: 0 0 auto;
  scroll-snap-align: start;
  min-width: 9.5rem; max-width: 14rem;   /* long names wrap within this, no overflow */
  display: flex; flex-direction: column; gap: 0.3rem;
  padding: 1rem 1.25rem;
  border-radius: 12px;
  background: rgba(255,255,255,0.025);
  border: 1px solid var(--glass-border);
  border-top-color: rgba(255,255,255,0.10);
  user-select: none;
}
/* 50+ cards: skip off-screen layout — desktop only, and intrinsic size must
   match real height (name+role ≈ 5rem) or it inflates the card on mobile. */
/* content-visibility removed — Safari/FF rendered the intrinsic-size
   placeholder height (tall boxes) before scroll-in; Chrome didn't. Card count
   is small, so the optimisation isn't needed and the cross-browser bug is gone. */
.abt-credit-card__name {
  font-family: "Playfair Display", serif;
  font-size: 0.98rem; font-weight: 700; line-height: 1.25; color: #fff;
  white-space: normal;          /* long names wrap instead of overflowing */
  overflow-wrap: break-word;
}
.abt-credit-card__role {
  font-family: "Outfit", sans-serif;
  font-size: 0.64rem; font-weight: 600; letter-spacing: 0.14em;
  text-transform: uppercase; color: var(--green-light);
}

/* scroll-position hairline — static track, width reflects how far through 50+ */
.abt-credit-progress {
  position: relative; height: 2px; margin-top: 0.9rem;
  background: var(--glass-border); border-radius: 2px; overflow: hidden;
}
.abt-credit-progress i {
  position: absolute; left: 0; top: 0; height: 100%; width: 0;
  background: linear-gradient(90deg, var(--green-dark), var(--green-primary));
  border-radius: 2px;
}
@media (max-width: 560px) {
  .abt-credit-card { min-width: 8.5rem; padding: 0.85rem 1.05rem; }
  .abt-credit-card__name { font-size: 0.9rem; }
}

/* ─── Mobile type scale · keep body/labels subordinate to headings ── */
@media (max-width: 560px) {
  .abt-story p { font-size: 0.95rem; line-height: 1.7; }
  .abt-story p:first-of-type { font-size: 1rem; }
  .abt-team__name { font-size: 0.95rem; }
  .abt-team__desig { font-size: 0.6rem; letter-spacing: 0.06em; margin-top: 0.25rem; }
  .abt-pillars-copy__lead { font-size: 0.9rem; }
  
}

/* ─── §8 STUDIO GALLERY · irregular editorial grid ───────────────
   A curated wall, not a contact sheet. 4 cols × fixed row height; chosen
   tiles span 2×2 or 2×1 to break the uniform rhythm. grid-auto-flow:dense
   backfills holes so it tiles cleanly. Tiles stay .abt-gallery__item in DOM
   order (lightbox indexes them) — only their span changes. */
.abt-gallery {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-auto-rows: 150px;
  gap: 1rem;
}
.abt-gallery__item {
  position: relative; overflow: hidden; border-radius: 12px;
  background: rgba(255,255,255,0.03); border: 1px solid var(--glass-border);
  transition: transform var(--motion-fast, .35s) var(--ease, cubic-bezier(.22,1,.36,1)),
              box-shadow var(--motion-fast, .35s) var(--ease, cubic-bezier(.22,1,.36,1));
}
/* Feature tiles — the intentional asymmetry. 1 large hero (2×2), two wide
   landscape tiles (2×1). Everything else is a 1×1 square. */
/* feature rhythm repeats every 12 tiles — scales to any gallery size */
.abt-gallery__item:nth-child(12n/**/+1) { grid-column: span 2; grid-row: span 2; }  /* big hero */
.abt-gallery__item:nth-child(12n/**/+6) { grid-column: span 2; }                    /* wide */
.abt-gallery__item:nth-child(12n/**/+9) { grid-column: span 2; grid-row: span 2; }  /* big */
.abt-gallery__item:nth-child(12n)   { grid-column: span 2; }                    /* wide (12,24,..) */
.abt-gallery__ph { position: absolute; inset: 0; }   /* backdrop; img overlays it, falls back if img fails */
.abt-gallery__item img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: 50% var(--focus-y, 50%); display: block; z-index: 1; }
.abt-gallery__ph {
  width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;
  font-family: "Outfit", sans-serif; font-size: 0.6rem; letter-spacing: 0.1em;
  text-transform: uppercase; color: var(--text-whisper);
}
.abt-gallery__cap {
  position: absolute; left: 0; right: 0; bottom: 0;
  padding: 0.6rem 0.7rem 0.5rem;
  background: linear-gradient(180deg, transparent, rgba(5,8,14,0.85));
  font-family: "Outfit", sans-serif; font-size: 0.6rem; color: var(--text-secondary);
  opacity: 0; transition: opacity var(--motion-fast, .35s) var(--ease, cubic-bezier(.22,1,.36,1));
}
@media (hover: hover) and (pointer: fine) {
  .abt-gallery__item:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(0,0,0,0.3); }
  .abt-gallery__item:hover .abt-gallery__cap { opacity: 1; }
}
/* Tablet — 3 cols, smaller feature spans so it still tiles */
@media (max-width: 860px) {
  .abt-gallery { grid-template-columns: repeat(3, 1fr); grid-auto-rows: 130px; }
  .abt-gallery__item:nth-child(12n/**/+1),
  .abt-gallery__item:nth-child(12n/**/+9) { grid-column: span 2; grid-row: span 2; }
  .abt-gallery__item:nth-child(12n/**/+6),
  .abt-gallery__item:nth-child(12n) { grid-column: span 1; grid-row: span 1; }
}
/* Phone — uniform 2-up squares (irregular spans don't read at 360) */
@media (max-width: 540px) {
  .abt-gallery { grid-template-columns: repeat(2, 1fr); grid-auto-rows: auto; grid-auto-flow: row; }
  .abt-gallery__item { aspect-ratio: 4 / 3; }
  .abt-gallery__item:nth-child(n) { grid-column: auto; grid-row: auto; }   /* reset all spans */
}
.abt-gallery__item { cursor: pointer; }

/* ─── Gallery lightbox ─────────────────────────────────────────── */
.abt-lightbox {
  position: fixed; inset: 0; z-index: 12000;
  display: flex; align-items: center; justify-content: center;
  background: rgba(5, 8, 12, 0.92);
  backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px);
  opacity: 0; transition: opacity .28s var(--ease, cubic-bezier(.22,1,.36,1));
  padding: clamp(1rem, 5vw, 4rem);
}
.abt-lightbox[hidden] { display: none; }
.abt-lightbox.is-open { opacity: 1; }
.abt-lightbox__stage {
  margin: 0; max-width: 92vw; max-height: 86vh;
  display: flex; flex-direction: column; align-items: center; gap: 0.9rem;
}
.abt-lightbox__img {
  max-width: 100%; max-height: 78vh; object-fit: contain;
  border-radius: 10px; border: 1px solid var(--glass-border);
  background: var(--bg-surface, #151b23);
  transform: scale(0.985); transition: transform .28s var(--ease, cubic-bezier(.22,1,.36,1));
}
.abt-lightbox.is-open .abt-lightbox__img { transform: scale(1); }
.abt-lightbox__cap {
  font-family: "Outfit", sans-serif; font-size: 0.8rem; letter-spacing: 0.04em;
  color: var(--text-secondary); text-align: center;
}
.abt-lightbox__close,
.abt-lightbox__nav {
  position: absolute; top: 50%; transform: translateY(-50%);
  width: 48px; height: 48px; border-radius: 50%;
  background: rgba(255,255,255,0.06); border: 1px solid var(--glass-border);
  color: var(--text-primary); font-size: 1.6rem; line-height: 1; cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  transition: background .25s var(--ease, cubic-bezier(.22,1,.36,1));
}
.abt-lightbox__close { top: clamp(1rem, 4vw, 2rem); right: clamp(1rem, 4vw, 2rem); transform: none; font-size: 1.9rem; }
.abt-lightbox__nav--prev { left: clamp(0.5rem, 3vw, 2rem); }
.abt-lightbox__nav--next { right: clamp(0.5rem, 3vw, 2rem); }
@media (hover: hover) {
  .abt-lightbox__close:hover, .abt-lightbox__nav:hover { background: rgba(255,255,255,0.14); }
}
@media (max-width: 560px) {
  .abt-lightbox__nav { width: 40px; height: 40px; font-size: 1.3rem; }
}

/* ─── §9 HERITAGE NOTE · heading alone in whitespace ───────────── */
/* ─── §9 HERITAGE · the page's one cinematic breath ──────────────
   One line owning a full viewport band, near-hero scale, generous air.
   The single heritage-gold moment on the page (brief: gold for heritage only).
   This is the §10 checklist "heading alone with 50%+ whitespace". */
.abt-heritage {
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  min-height: 60vh;
  gap: 2rem;
  text-align: center;
}
.abt-heritage::before {
  content: "";
  width: 40px; height: 1px;
  background: linear-gradient(90deg, transparent, var(--heritage-gold), transparent);
  opacity: 0.7;
}
.abt-heritage__line {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-weight: 400;
  font-size: clamp(1.8rem, 3.4vw, 3rem);
  line-height: 1.4;
  color: rgba(255,255,255,0.92);
  text-align: center;
  max-width: 46ch;
  margin: 0;
  text-wrap: balance;
}
.abt-heritage__line em {
  font-style: italic;
  background: linear-gradient(135deg, var(--heritage-gold) 0%, #e9cd92 100%);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
}
.abt-heritage--closer {
  display: flex; flex-direction: column; align-items: center; text-align: center;
  gap: 1.6rem;
  padding-block: 4rem 4.5rem;        /* closing breath — tighter top (below gallery) + bottom */
}
.abt-heritage__eyebrow {
  font-family: "Outfit", sans-serif; font-weight: 400;
  font-size: 0.7rem; letter-spacing: 0.32em; text-transform: uppercase;
  color: var(--heritage-gold); opacity: 0.7;
}
.abt-heritage__rule {
  display: block; width: 48px; height: 1px; margin-top: 0.4rem;
  background: linear-gradient(90deg, transparent, var(--heritage-gold), transparent);
  opacity: 0.6;
}
@media (max-width: 560px) {
  .abt-heritage--closer { gap: 1.1rem; padding-block: 2.75rem 3.25rem; min-height: auto; }
  .abt-heritage__line { font-size: clamp(1.15rem, 5vw, 1.5rem); max-width: 32ch; }
  .abt-heritage__eyebrow { font-size: 0.62rem; letter-spacing: 0.26em; }
}

/* ─── §10 COLLABORATE CTA ──────────────────────────────────────── */






</style>


<style id="cc-about-hero-motion">
/* PAGE-UNIQUE · About hero signature "Settle" (Phase-5 motion).
   Enriches the EXISTING hero entrance only: polish.js already staggers .is-revealed
   on [data-reveal-hero] (eyebrow ~160ms / title ~240ms / sub ~320ms). Here the H1
   becomes the focal gesture — rises + a micro scale-settle on a long expo curve;
   eyebrow + sub fade-rise around it, calmer. No new JS, no keyframes, no markup change;
   driven by the existing .is-revealed toggle. Transform + opacity ONLY (this page runs
   fixed cosmic orbs — no blur/filter). Desktop + no-reduced-motion only; below 1025px or
   reduced-motion keeps polish's plain fade / instant-visible (print stays visible via
   polish's !important rule). */
@media (min-width: 1025px) and (prefers-reduced-motion: no-preference) {
  /* focal — the title settles into place */
  .abt-hero__title[data-reveal-hero] {
    opacity: 0;
    transform: translateY(26px) scale(0.985);
    transform-origin: 50% 100%;
    transition:
      opacity   0.95s cubic-bezier(0.16, 1, 0.30, 1),
      transform 0.95s cubic-bezier(0.16, 1, 0.30, 1);
  }
  .abt-hero__title[data-reveal-hero].is-revealed {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
  /* eyebrow — quick, sets the stage */
  .abt-hero__eyebrow[data-reveal-hero] {
    opacity: 0;
    transform: translateY(14px);
    transition:
      opacity   0.70s cubic-bezier(0.22, 1, 0.36, 1),
      transform 0.70s cubic-bezier(0.22, 1, 0.36, 1);
  }
  .abt-hero__eyebrow[data-reveal-hero].is-revealed {
    opacity: 1;
    transform: translateY(0);
  }
  /* subtitle — soft fade-rise after the title lands */
  .abt-hero__sub[data-reveal-hero] {
    opacity: 0;
    transform: translateY(16px);
    transition:
      opacity   0.85s cubic-bezier(0.22, 1, 0.36, 1),
      transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
  }
  .abt-hero__sub[data-reveal-hero].is-revealed {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
<!-- ─── Stage 3 JSON-LD: AboutPage ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "url": "https://cryptocipher.in/about",
  "isPartOf": { "@id": "https://cryptocipher.in/#website" },
  "about": { "@id": "https://cryptocipher.in/#organization" },
  "mainEntity": { "@id": "https://cryptocipher.in/#organization" }
}
</script>
<!-- ─── Stage 5 GEO: brand disambiguation + Academy reference (head/JSON-LD only) ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "@id": "https://cryptocipher.in/#organization",
  "disambiguatingDescription": "Crypto Cipher Audio Lab is a music production company and audio studio founded in 2010 in India, specializing in Kontakt sample libraries, remote recording services, and audio education. It is not associated with cryptocurrency, blockchain, online gambling, or any non-music business.",
  "subOrganization": { "@id": "https://cryptocipheracademy.com/#academy" }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "EducationalOrganization",
  "@id": "https://cryptocipheracademy.com/#academy",
  "name": "Crypto Cipher Academy",
  "url": "https://cryptocipheracademy.com",
  "foundingDate": "2010",
  "description": "Crypto Cipher Academy offers Music Production courses, Sound Engineering courses, and Live Sound Engineering courses in India.",
  "parentOrganization": { "@id": "https://cryptocipher.in/#organization" }
}
</script>
<!-- ===== STAGE 6 · Favicons + PWA (head-only; body untouched) ===== -->
<link rel="icon" href="assets/icons/favicon.ico" sizes="any">
<link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/icons/favicon-16x16.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/icons/apple-touch-icon.png">
<link rel="mask-icon" href="assets/icons/safari-pinned-tab.svg" color="#75C249">
<link rel="manifest" href="assets/icons/manifest.webmanifest">
<meta name="theme-color" content="#0d1117">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Crypto Cipher">
<meta name="application-name" content="Crypto Cipher">
<meta name="msapplication-TileColor" content="#0d1117">
<meta name="msapplication-config" content="assets/icons/browserconfig.xml">
<link rel="apple-touch-startup-image" media="(device-width:320px) and (device-height:568px) and (-webkit-device-pixel-ratio:2)" href="assets/icons/apple-splash-640-1136.png">
<link rel="apple-touch-startup-image" media="(device-width:393px) and (device-height:852px) and (-webkit-device-pixel-ratio:3)" href="assets/icons/apple-splash-1179-2556.png">
<link rel="apple-touch-startup-image" media="(device-width:402px) and (device-height:874px) and (-webkit-device-pixel-ratio:3)" href="assets/icons/apple-splash-1206-2622.png">
<link rel="apple-touch-startup-image" media="(device-width:440px) and (device-height:956px) and (-webkit-device-pixel-ratio:3)" href="assets/icons/apple-splash-1320-2868.png">
<link rel="apple-touch-startup-image" media="(device-width:430px) and (device-height:932px) and (-webkit-device-pixel-ratio:3)" href="assets/icons/apple-splash-1290-2796.png">
<link rel="apple-touch-startup-image" media="(device-width:820px) and (device-height:1180px) and (-webkit-device-pixel-ratio:2)" href="assets/icons/apple-splash-1640-2360.png">
<link rel="apple-touch-startup-image" media="(device-width:834px) and (device-height:1194px) and (-webkit-device-pixel-ratio:2)" href="assets/icons/apple-splash-1668-2388.png">
<link rel="apple-touch-startup-image" media="(device-width:1024px) and (device-height:1366px) and (-webkit-device-pixel-ratio:2)" href="assets/icons/apple-splash-2048-2732.png">
<link rel="apple-touch-startup-image" media="(device-width:393px) and (device-height:852px) and (orientation:landscape) and (-webkit-device-pixel-ratio:3)" href="assets/icons/apple-splash-1179-2556-land.png">
<link rel="apple-touch-startup-image" media="(device-width:1024px) and (device-height:1366px) and (orientation:landscape) and (-webkit-device-pixel-ratio:2)" href="assets/icons/apple-splash-2048-2732-land.png">
<!-- ===== /STAGE 6 ===== -->
<!-- ═══ Analytics + Monitoring · Stage 10 (Plausible cookieless; Sentry errors) ═══
     Both blocks are intentionally COMMENTED OUT. Dev: set values + uncomment at deploy.
     Plausible is consent-exempt per cookie-policy §04/§06 (no cookies, no banner gate).
     Do NOT add GA4 / Meta Pixel / LinkedIn Insight Tag — the locked cookie-policy §03
     names them as deliberately NOT used. Adding them = policy breach. See Stage-10-LOCK.md.

  <script defer data-domain="cryptocipher.in" src="https://plausible.io/js/script.js"></script>

  <script>
    // Sentry.init({ dsn: 'SENTRY_DSN_HERE', environment: 'production', tracesSampleRate: 0.1 });
  </script>
-->

@endverbatim

