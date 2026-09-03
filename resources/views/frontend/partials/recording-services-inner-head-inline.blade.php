@verbatim
<meta name="google-site-verification" content="REPLACE_GSC_TOKEN">
<meta name="msvalidate.01" content="REPLACE_BING_TOKEN">
<!-- Stage 8 · perf: connection hints (head-only) -->
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://i.ytimg.com" crossorigin>
<link rel="dns-prefetch" href="https://www.youtube.com">
<!-- Consolidated shared layers (Phase 1+2) · load before inline <style>, before polish.css -->
<style>
/* Critical: park skip-link before first paint (FOUC). */
.skip-link { position: absolute; left: 12px; top: -56px; z-index: 10000; }

/* ═══════════════════════════════════════════════════════════════
   INSTR-001 · v1 SCAFFOLD
   Sitar — Instrument Inner Page
   Reuses NAV-001, SIDENAV-001, FOOTER-001 from LIBINNER-001.
   Sections (.instr-*) added incrementally with lock confirmation.
   ═══════════════════════════════════════════════════════════════ */
:root {
  --bg-deep: #0d1117;
  --bg-surface: #151b23;
  --bg-darker: #080c12;
  --bg-darkest: #050810;
  --bg-mid: #0a0e14;

  --green-primary: #75C249;
  --green-light: #BBD67A;
  --green-dark: #2F6942;
  --green-glow: rgba(117, 194, 73, 0.35);

  --text-primary: #ffffff;
  --text-secondary: rgba(255,255,255,0.65);
  --text-muted: rgba(255,255,255,0.45);
  --text-quiet: rgba(255,255,255,0.3);
  --text-whisper: rgba(255,255,255,0.15);

  --glass-bg: rgba(255,255,255,0.04);
  --glass-bg-hover: rgba(255,255,255,0.08);
  --glass-border: rgba(255,255,255,0.05);
  --glass-border-hover: rgba(255,255,255,0.08);

  --amber-glow: rgba(180,140,50,0.03);
  --warning: #d4b56e;

  --ease: cubic-bezier(0.22, 1, 0.36, 1);

  --side-index-w: 340px;
}

* { box-sizing: border-box; margin: 0; padding: 0; }

/* scroll-behavior: smooth removed · §11 ban · page-05 E4b
   (hijacks the mouse wheel, fights any future Lenis init) */
html { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

body {
  font-family: "Outfit", sans-serif;
  background: var(--bg-deep);
  color: var(--text-primary);
  line-height: 1.5;
  overflow-x: hidden;
  min-height: 100vh;
}

img { max-width: 100%; display: block; }
button { font-family: inherit; cursor: pointer; border: none; background: none; color: inherit; }
a { color: inherit; text-decoration: none; }

/* Global noise texture */
body::before {
  content: "";
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 1;
  /* §11 ban: mix-blend-mode removed (was 'overlay'). Opacity bumped
     0.035 → 0.06 to compensate for the lost visual punch. · page-05 E4a */
  opacity: 0.06;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.7' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  background-size: 200px;
}

/* ═══════════════════════════════════════════════════════════════
   COSMIC BG · Page surface depth + floating star particles
   - Radial gradient overlay catches "light" from top-center
   - 32 stars drift slowly across viewport · CSS-only · GPU-friendly
   - Below content (z-index: 0) · above body color
   - Disabled on prefers-reduced-motion
   ═══════════════════════════════════════════════════════════════ */
.cosmic-bg {
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 0;
  overflow: hidden;
}
/* Page surface · pure cool dark gradient · zero brand color
   Canonical from homepage_148. Brand greens stay confined to CTAs and
   surgical accents so they read as signal, not wallpaper. */
.cosmic-bg::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg,
    #0d1117 0%,
    #0b1014 30%,
    #0a0e12 60%,
    #080b10 100%
  );
  opacity: 1;
}
/* Second depth layer · slow drifting nebula · cool neutral, no brand color */
.cosmic-bg::after {
  content: "";
  position: absolute;
  inset: -10%;
  background:
    radial-gradient(circle 500px at 20% 15%, rgba(40, 65, 90, 0.10), transparent 70%),
    radial-gradient(circle 400px at 80% 85%, rgba(35, 55, 80, 0.08), transparent 70%);
  filter: blur(18px);
  animation: cosmicDrift 60s ease-in-out infinite alternate;
}
@keyframes cosmicDrift {
  0%   { transform: translate(0, 0) scale(1); }
  100% { transform: translate(-3%, 2%) scale(1.05); }
}
.cosmic-bg__star {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.85);
  box-shadow:
    0 0 3px rgba(255, 255, 255, 0.5),
    0 0 6px rgba(255, 255, 255, 0.2);
  will-change: transform, opacity;
  animation:
    starDrift var(--dur, 30s) linear infinite,
    starTwinkle var(--twink, 4s) ease-in-out infinite;
  animation-delay: var(--delay, 0s), var(--twinkDelay, 0s);
}
.cosmic-bg__star--green {
  background: rgba(187, 214, 122, 0.92);
  box-shadow:
    0 0 4px rgba(117, 194, 73, 0.7),
    0 0 10px rgba(117, 194, 73, 0.3),
    0 0 18px rgba(187, 214, 122, 0.15);
}
.cosmic-bg__star--bright {
  background: rgba(255, 255, 255, 0.95);
  box-shadow:
    0 0 6px rgba(255, 255, 255, 0.7),
    0 0 12px rgba(187, 214, 122, 0.4),
    0 0 22px rgba(117, 194, 73, 0.2);
}

@keyframes starDrift {
  0%   { transform: translate3d(0, 0, 0); }
  100% { transform: translate3d(var(--driftX, 100px), var(--driftY, -200px), 0); }
}
@keyframes starTwinkle {
  0%, 100% { opacity: var(--twinkMin, 0.55); }
  50%      { opacity: var(--twinkMax, 1); }
}

@media (prefers-reduced-motion: reduce) {
  .cosmic-bg__star { animation: none; opacity: 0.7; }
  .cosmic-bg::after { animation: none; }
}

/* Selection / scrollbar */
::selection { background: rgba(117,194,73,0.25); color: #fff; }
::-webkit-scrollbar { width: 10px; }
::-webkit-scrollbar-track { background: var(--bg-darker); }
::-webkit-scrollbar-thumb { background: rgba(117,194,73,0.18); border-radius: 10px; }
::-webkit-scrollbar-thumb:hover { background: rgba(117,194,73,0.32); }
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
.instr {
  position: relative;
  padding: 10rem 3rem 4rem;
  background: transparent;
  display: grid;
  grid-template-columns: var(--side-index-w) 1fr;
  gap: 5rem;
  max-width: 1440px;
  margin: 0 auto;
  align-items: start;
}
@media (max-width: 1024px) {
  .instr {
    grid-template-columns: 1fr;
    gap: 0;
    padding: 7.5rem 1.5rem 3rem;
    z-index: auto; /* defensive: prevent stacking-context trap */
  }
}
@media (max-width: 560px) {
  .instr { padding: 6.5rem 1.35rem 2.5rem; }
}
@keyframes pullPulse {
  0%,100% { opacity: 0.6; transform: translateX(-50%) scaleX(1); }
  50%     { opacity: 0.95; transform: translateX(-50%) scaleX(1.12); }
}

/* ───────────────────────────────────────────────
   MAIN COLUMN — section frame
   ─────────────────────────────────────────────── */
.main-col {
  display: flex; flex-direction: column;
  gap: 4rem;
  min-width: 0;
}
@media (max-width: 1024px) { .main-col { gap: 3rem; } }
@media (max-width: 560px)  { .main-col { gap: 3.25rem; } }

.section { position: relative; }
.section__head {
  display: flex; flex-direction: column;
  gap: 1rem;
  margin-bottom: 2rem;
}
.section__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.4rem, 2.6vw, 2.1rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
}
.section__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.78rem, 1vw, 0.9rem);
  font-weight: 300;
  color: var(--text-muted);
  line-height: 1.65;
  max-width: 580px;
}
.section__eyebrow {
  font-size: 0.5rem; font-weight: 600;
  letter-spacing: 0.3em; text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex; align-items: center; gap: 0.5rem;
}
.section__eyebrow::before {
  content: ""; width: 18px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}

/* ═══════════════════════════════════════════════════════════════
   SIDENAV-001 mobile clearance · relocated from old FOOTER block
   The fixed 64px sidenav pull-tab on mobile needs body padding-bottom
   so it does not overlap page content. This rule belongs to the
   sidenav layout, not the footer — relocated during FOOTER-001 sync
   from homepage_148.html.
   ═══════════════════════════════════════════════════════════════ */
@media (max-width: 768px) {
  body { padding-bottom: 64px; }
}


/* ═══════════════════════════════════════════════════════════════
   §1 INSTR HERO — Sitar
   Two-column desktop · stacked mobile
   Title + SEO subhead + tagline + pricing chips + soft CTA · action card · video facade
   ═══════════════════════════════════════════════════════════════ */
.instr-hero {
  position: relative;
  isolation: isolate;
  /* Anti-pattern #2 guard: media zone clipping */
  clip-path: inset(0 round 0);
}

/* Page-level ambient bloom · fixed full-width so background continuity is
   preserved at any viewport width (no banding inside the 1440 container).
   Sits behind everything except the body bg + noise.
   Lives on body via ::after rather than scoped to the hero.
   Cool neutral palette only — background never carries brand color. */
body::after {
  content: "";
  position: fixed;
  inset: 0 0 auto 0;
  height: min(900px, 75vh);
  pointer-events: none;
  z-index: 0;
  opacity: 0;
  background:
    radial-gradient(ellipse 60% 50% at 50% 22%, rgba(40,65,90,0.18) 0%, transparent 60%),
    radial-gradient(ellipse 40% 35% at 22% 35%, rgba(35,55,80,0.10) 0%, transparent 55%),
    radial-gradient(ellipse 35% 30% at 78% 40%, rgba(48,75,105,0.07) 0%, transparent 55%);
  animation: pageAmbientBloom 2.4s var(--ease) 0.05s forwards;
}
@keyframes pageAmbientBloom {
  0%   { opacity: 0; transform: scale(0.96); }
  100% { opacity: 0.85; transform: scale(1); }
}
@media (prefers-reduced-motion: reduce) {
  body::after { opacity: 0.65 !important; animation: none !important; }
}

/* Old hero-scoped ambient is now a no-op visual buffer (kept so existing
   markup doesn't break, and so any future hero-only effects can hook here) */
.instr-hero__ambient {
  display: none;
}

.instr-hero > *:not(.instr-hero__ambient) {
  position: relative;
  z-index: 2;
}

/* Lead block — title, SEO H2, tagline · full width above video */
.instr-hero__lead {
  margin-bottom: 2.5rem;
  max-width: 880px;
}
@media (max-width: 1024px) { .instr-hero__lead { margin-bottom: 2rem; } }

/* Decision row — single column · action card full width (after pillar row above) */
.instr-hero__decision {
  display: flex;
  flex-direction: column;
  margin-top: 4rem;
}
@media (max-width: 1024px) {
  .instr-hero__decision { margin-top: 3rem; }
}
@media (max-width: 640px) {
  .instr-hero__decision { margin-top: 2.5rem; }
}

/* ─── HERO PILLAR ROW · 4-card horizontal row · sits between video and action card ─── */


















/* Left column: pricing card · same glass treatment as action card · same height via stretch */
.instr-hero__decision-lead {
  display: flex;
  flex-direction: column;
  padding: 1.8rem 1.6rem;
  border-radius: 18px;
  background: linear-gradient(160deg, rgba(255,255,255,0.025) 0%, rgba(255,255,255,0.01) 60%);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  box-shadow:
    0 12px 40px rgba(0,0,0,0.25),
    inset 0 1px 0 rgba(255,255,255,0.04);
  position: relative;
  overflow: hidden;
  isolation: isolate;
  min-width: 0;
}
@media (max-width: 1024px) {
  .instr-hero__decision-lead { padding: 1.2rem 1rem; border-radius: 14px; }
}
@media (max-width: 640px) {
  .instr-hero__decision-lead { padding: 1.1rem 1rem; border-radius: 14px; }
}
.instr-hero__decision-lead-eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  margin-bottom: 1.1rem;
}
@media (max-width: 1024px) {
  .instr-hero__decision-lead-eyebrow { font-size: 0.46rem; letter-spacing: 0.22em; margin-bottom: 0.85rem; }
}
.instr-hero__decision-lead-eyebrow::before {
  content: "";
  width: 14px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-hero__decision-divider {
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.06), transparent);
  margin: 1.2rem 0;
  flex-shrink: 0;
}
@media (max-width: 1024px) {
  .instr-hero__decision-divider { margin: 0.8rem 0; }
}
/* Vertical layout: eyebrow at top, pillars breathe in middle, soft CTA at bottom.
   Pillars get a relaxed gap so the 4 items naturally fill the card height
   set by the action card on the right. No empty void, no cramped CTA. */
.instr-hero__decision-lead .instr-hero__pillars {
  flex: 1;
  justify-content: space-between;
  padding-bottom: 0.4rem;
}
.instr-hero__decision-lead .instr-hero__decision-divider {
  margin-top: 0.9rem;
  margin-bottom: 0.7rem;
}
.instr-hero__decision-lead .instr-hero__soft-cta {
  margin-top: 0;
}

/* Hero trust pillars · sit inside the hero left card slot · same vertical
   rhythm as the previous mini-process list so card height stays identical */
.instr-hero__pillars {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}
.instr-hero__pillar {
  display: flex;
  align-items: flex-start;
  gap: 0.7rem;
}
.instr-hero__pillar-icon {
  width: 24px;
  height: 24px;
  border-radius: 7px;
  background: rgba(117,194,73, 0.08);
  border: 1px solid rgba(117,194,73, 0.18);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  margin-top: 1px;
}
.instr-hero__pillar-icon svg {
  width: 13px;
  height: 13px;
  stroke: var(--green-light);
  fill: none;
}
.instr-hero__pillar-body {
  display: flex;
  flex-direction: column;
  gap: 0.12rem;
  min-width: 0;
}
.instr-hero__pillar-name {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 600;
  color: #fff;
  letter-spacing: 0.005em;
  line-height: 1.3;
}
.instr-hero__pillar-desc {
  font-family: "Outfit", sans-serif;
  font-size: 0.72rem;
  font-weight: 400;
  line-height: 1.45;
  color: var(--text-tertiary);
  letter-spacing: 0.005em;
}
@media (max-width: 1024px) {
  .instr-hero__pillars { gap: 0.6rem; }
  .instr-hero__pillar-icon { width: 22px; height: 22px; border-radius: 6px; }
  .instr-hero__pillar-icon svg { width: 11px; height: 11px; }
  .instr-hero__pillar-name { font-size: 0.74rem; }
  .instr-hero__pillar-desc { font-size: 0.68rem; }
}

/* ─── LEFT: Title block ─── */
.instr-hero__breadcrumb {
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  margin-bottom: 1.4rem;
}
.instr-hero__breadcrumb::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-hero__breadcrumb a {
  color: var(--text-quiet);
  transition: color 0.25s ease;
}
.instr-hero__breadcrumb a:hover { color: var(--green-light); }
.instr-hero__breadcrumb-sep { opacity: 0.4; margin: 0 0.1rem; }

.instr-hero__title {
  font-family: "Playfair Display", serif;
  font-weight: 900;
  font-size: clamp(4rem, 13vw, 7.5rem);
  line-height: 1.05;
  letter-spacing: -0.02em;
  color: var(--text-primary);
  margin: 0 0 1.1rem;
  /* Anti-pattern #1: tight line-height + gradient fill = descender clipping risk
     "Sitar" has no true descender but defensive padding stays */
  padding-bottom: 0.05rem;
}
.instr-hero__title-word {
  display: inline-block;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 35%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  text-shadow: 0 2px 25px rgba(0,0,0,0.3);
  /* line-height min 1.15 enforced via parent */
}

/* SEO H2 subhead — long-tail descriptive · domination via H1 visual + H2 keywords */
.instr-hero__subhead {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.9rem, 1.4vw, 1.18rem);
  font-weight: 400;
  line-height: 1.4;
  color: var(--text-secondary);
  margin: 0 0 1.6rem;
  letter-spacing: 0.005em;
  max-width: 620px;
}
.instr-hero__subhead-accent {
  color: var(--green-light);
  font-weight: 500;
}

/* Italic tagline — poetic positioning · only after the SEO line so flow goes:
   visual H1 → SEO H2 → emotional voice → spec line → action */
.instr-hero__tagline {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-weight: 400;
  font-size: clamp(0.92rem, 1.25vw, 1.1rem);
  line-height: 1.55;
  color: var(--text-muted);
  margin: 0 0 2.2rem;
  max-width: 540px;
  letter-spacing: 0.005em;
}

/* Pricing rows — 3-col grid desktop · table-style stack mobile · clean alignment */
/* Pricing chip row — sits inside the decision-lead card now
   Desktop: 3-column grid (each item gets equal width column)
   Mobile: 3-column grid persists (cleaner than awkward row-wrap) */
.instr-hero__spec {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 1.4rem;
  padding: 0;
  margin: 0;
  background: none;
  border: none;
  box-shadow: none;
  backdrop-filter: none;
  -webkit-backdrop-filter: none;
}
/* Hide the inline separators — grid handles spacing now */
.instr-hero__spec-sep { display: none; }

/* Each item: label on top (caps), value below (prominent) — desktop default */
.instr-hero__spec-item {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 0.45rem;
  min-width: 0;
}

.instr-hero__spec-label {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--text-quiet);
  white-space: nowrap;
  line-height: 1.2;
}
.instr-hero__spec-value {
  color: var(--text-primary);
  font-size: 1.25rem;
  font-weight: 700;
  letter-spacing: -0.01em;
  font-variant-numeric: tabular-nums;
  font-family: "Outfit", sans-serif;
  white-space: nowrap;
  line-height: 1.15;
}
.instr-hero__spec-value--rare { color: var(--warning); }

/* Tablet 2-up: card narrower → switch to single-column stack with row-aligned items */
@media (max-width: 1024px) and (min-width: 641px) {
  .instr-hero__spec {
    grid-template-columns: 1fr;
    gap: 0.7rem;
  }
  .instr-hero__spec-item {
    flex-direction: row;
    align-items: baseline;
    justify-content: space-between;
    gap: 0.6rem;
    width: 100%;
  }
  .instr-hero__spec-value { font-size: 0.95rem; }
  .instr-hero__spec-label { font-size: 0.46rem; letter-spacing: 0.18em; }
}

/* Mobile 1-up: single column · row-aligned (label left, value right) · clean rate table feel */
@media (max-width: 640px) {
  .instr-hero__spec {
    grid-template-columns: 1fr;
    gap: 0.55rem;
  }
  .instr-hero__spec-item {
    flex-direction: row;
    align-items: baseline;
    justify-content: space-between;
    gap: 0.6rem;
    width: 100%;
  }
  .instr-hero__spec-label {
    font-size: 0.55rem;
    letter-spacing: 0.18em;
    color: var(--text-secondary);
    font-weight: 700;
  }
  .instr-hero__spec-value {
    font-size: 0.92rem;
    font-weight: 600;
    color: var(--text-primary);
  }
}

/* Soft CTA — italic ghost link · the "I'm not sure" exit ramp */
.instr-hero__soft-cta {
  display: inline-flex;
  align-items: center;
  gap: 0.45rem;
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-weight: 400;
  font-size: 0.85rem;
  color: var(--text-muted);
  position: relative;
  transition: color 0.3s ease, transform 0.3s ease;
  padding-bottom: 2px;
}
@media (max-width: 1024px) {
  .instr-hero__soft-cta { font-size: 0.78rem; line-height: 1.4; flex-wrap: wrap; }
}
@media (max-width: 480px) {
  .instr-hero__soft-cta { font-size: 0.72rem; }
}
.instr-hero__soft-cta::after {
  content: "";
  position: absolute;
  left: 0; bottom: 0;
  width: 0; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), rgba(117,194,73,0.2));
  transition: width 0.4s var(--ease);
}
.instr-hero__soft-cta:hover {
  color: var(--green-light);
  transform: translateX(3px);
}
.instr-hero__soft-cta:hover::after { width: 100%; }
.instr-hero__soft-cta-arrow {
  font-style: normal;
  transition: transform 0.3s ease;
  font-size: 0.85rem;
}
.instr-hero__soft-cta:hover .instr-hero__soft-cta-arrow { transform: translateX(3px); }

/* ─── RIGHT: Action card ─── */
.instr-hero__action {
  display: grid;
  grid-template-columns: minmax(260px, 1fr) minmax(0, 1.4fr);
  column-gap: 2.4rem;
  padding: 2rem;
  border-radius: 18px;
  background:
    linear-gradient(180deg, rgba(255,255,255, 0.04) 0%, rgba(255,255,255, 0.012) 60%),
    rgba(8, 12, 18, 0.7);
  border: 1px solid rgba(255,255,255, 0.05);
  border-top-color: rgba(255,255,255, 0.10);
  backdrop-filter: blur(16px) saturate(1.2);
  -webkit-backdrop-filter: blur(16px) saturate(1.2);
  box-shadow:
    0 22px 60px rgba(0,0,0, 0.5),
    inset 0 1px 0 rgba(255,255,255, 0.06),
    inset 0 -1px 0 rgba(0,0,0, 0.2);
  position: relative;
  overflow: hidden;
  align-items: stretch;
}
.instr-hero__action-lead {
  display: flex;
  flex-direction: column;
  gap: 0.8rem;
  justify-content: center;
}
.instr-hero__action > .instr-hero__credits {
  margin: 0;
  padding: 0;
  border: 0;
}

@media (max-width: 1100px) {
  .instr-hero__action {
    grid-template-columns: minmax(0, 1fr);
    column-gap: 0;
    row-gap: 1.2rem;
    padding: 1.6rem 1.2rem;
    align-items: start;
  }
  .instr-hero__action-lead { gap: 0.6rem; }
}
@media (max-width: 640px) {
  .instr-hero__action {
    padding: 1.2rem 1rem;
    row-gap: 1rem;
    border-radius: 14px;
  }
}
/* Soft inner glow — depth without noise */
.instr-hero__action::before {
  content: "";
  position: absolute;
  top: -40%; right: -30%;
  width: 220px; height: 220px;
  background: radial-gradient(circle, rgba(117,194,73,0.12) 0%, transparent 60%);
  pointer-events: none;
  z-index: 0;
}
.instr-hero__action > * { position: relative; z-index: 1; }

.instr-hero__action-eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  margin-bottom: 0.4rem;
}
@media (max-width: 1024px) {
  .instr-hero__action-eyebrow { font-size: 0.46rem; letter-spacing: 0.22em; margin-bottom: 0.2rem; }
}
.instr-hero__action-eyebrow::before {
  content: "";
  width: 14px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}

/* Primary CTA — matches LIBINNER's .cta--primary pattern exactly.
   Solid green gradient, dark text, clean lift on hover. NO magnetic pull,
   NO cursor tracking, NO breathing pulse — those felt jittery. This is
   the same stable pill used across LIBINNER. */
.instr-hero__cta {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.55rem;
  padding: 0.95rem 1.7rem;
  border-radius: 50px;
  background: linear-gradient(135deg, var(--green-light), var(--green-primary));
  color: #0a0d12;
  border: none;
  font-family: "Outfit", sans-serif;
  font-size: 0.82rem;
  font-weight: 700;
  letter-spacing: 0.02em;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: all 0.4s var(--ease);
  white-space: nowrap;
  text-align: center;
  box-shadow:
    0 8px 24px rgba(0,0,0, 0.35),
    inset 0 1px 0 rgba(255,255,255, 0.22);
}
@media (max-width: 1024px) {
  .instr-hero__cta { padding: 0.7rem 0.9rem; font-size: 0.7rem; gap: 0.4rem; }
}
@media (max-width: 640px) {
  .instr-hero__cta { padding: 0.85rem 1.4rem; font-size: 0.78rem; }
}
.instr-hero__cta:hover {
  transform: translateY(-2px);
  box-shadow:
    0 14px 36px rgba(0,0,0, 0.4),
    0 0 24px rgba(117,194,73, 0.22),
    inset 0 1px 0 rgba(255,255,255, 0.25);
}
.instr-hero__cta-arrow {
  transition: transform 0.3s ease;
  display: inline-block;
}
.instr-hero__cta:hover .instr-hero__cta-arrow {
  transform: translateX(5px);
}

.instr-hero__action-meta {
  font-size: 0.66rem;
  font-weight: 400;
  color: var(--text-muted);
  letter-spacing: 0.04em;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.4rem;
  flex-wrap: wrap;
}
@media (max-width: 1024px) {
  .instr-hero__action-meta { font-size: 0.58rem; gap: 0.3rem; }
}
@media (max-width: 640px) {
  .instr-hero__action-meta { font-size: 0.66rem; flex-direction: row; gap: 0.4rem; }
}
.instr-hero__action-meta-dot {
  width: 4px; height: 4px;
  border-radius: 50%;
  background: var(--green-primary);
  box-shadow: 0 0 6px rgba(117,194,73,0.4);
  flex-shrink: 0;
}

/* Recent credits · horizontal logo scroll · sits between meta and trust */
.instr-hero__credits {
  display: flex;
  flex-direction: column;
  gap: 0.85rem;
  padding: 0.85rem 0 0;
  margin-top: 0.4rem;
  border-top: 1px solid rgba(255,255,255, 0.05);
}
.instr-hero__credits-eyebrow {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
}
.instr-hero__credits-eyebrow::before {
  content: "";
  width: 12px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
/* Horizontal scrollable strip · 5 credit cards · custom scrollbar hidden */
.instr-hero__credits-strip {
  display: flex;
  align-items: stretch;
  gap: 0.55rem;
  overflow-x: auto;
  overscroll-behavior-x: contain;
  scrollbar-width: none;
  -ms-overflow-style: none;
  padding-bottom: 0.15rem;
  scroll-snap-type: x proximity;
  /* Edge fade · subtle hint that more is to scroll */
  -webkit-mask-image: linear-gradient(90deg, transparent 0%, #000 4%, #000 96%, transparent 100%);
          mask-image: linear-gradient(90deg, transparent 0%, #000 4%, #000 96%, transparent 100%);
}
.instr-hero__credits-strip::-webkit-scrollbar { display: none; }

/* Single credit card · network OR composer */
.credit-card {
  flex-shrink: 0;
  width: 168px;
  padding: 0.55rem 0.65rem 0.6rem;
  display: flex;
  flex-direction: column;
  gap: 0.18rem;
  border-radius: 9px;
  background: rgba(255,255,255, 0.022);
  border: 1px solid rgba(255,255,255, 0.06);
  scroll-snap-align: start;
  transition:
    background 0.4s cubic-bezier(0.22, 1, 0.36, 1),
    border-color 0.4s cubic-bezier(0.22, 1, 0.36, 1),
    transform 0.45s cubic-bezier(0.22, 1, 0.36, 1);
}
.credit-card:hover {
  background: rgba(117,194,73, 0.06);
  border-color: rgba(117,194,73, 0.28);
  transform: translateY(-1px);
}
/* Network logo wordmark · top of card */
.credit-card__network {
  display: inline-flex;
  align-items: center;
  height: 18px;
  margin-bottom: 0.15rem;
  color: rgba(255,255,255, 0.85);
}
.credit-card__network svg {
  height: 14px;
  width: auto;
  display: block;
}
/* Role label for composer/collective cards · replaces network */
.credit-card__role {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--green-light);
  height: 18px;
  display: inline-flex;
  align-items: center;
  margin-bottom: 0.15rem;
}
.credit-card__title {
  font-family: "Outfit", sans-serif;
  font-size: 0.74rem;
  font-weight: 600;
  color: rgba(255,255,255, 0.95);
  letter-spacing: 0.005em;
  line-height: 1.25;
}
.credit-card__meta {
  font-family: "Outfit", sans-serif;
  font-size: 0.62rem;
  font-weight: 400;
  color: var(--text-tertiary);
  letter-spacing: 0.015em;
  line-height: 1.35;
}
.credit-card--composer .credit-card__title {
  font-family: "Playfair Display", Georgia, serif;
  font-weight: 700;
  font-style: italic;
  font-size: 0.85rem;
}
.credit-card--collective {
  background: linear-gradient(135deg, rgba(117,194,73, 0.05) 0%, rgba(255,255,255, 0.015) 100%);
  border-color: rgba(117,194,73, 0.18);
}

.instr-hero__credits-summary {
  display: none; /* Removed · summary lived under old strip */
}

@media (max-width: 1024px) {
  .instr-hero__credits { gap: 0.5rem; padding-top: 0.7rem; }
  .instr-hero__credits-eyebrow { font-size: 0.46rem; letter-spacing: 0.22em; }
  .instr-hero__credits-strip { gap: 0.45rem; }
  .credit-card { width: 152px; padding: 0.65rem 0.7rem 0.7rem; }
  .credit-card__network { height: 16px; }
  .credit-card__network svg { height: 12px; }
  .credit-card__role { font-size: 0.46rem; height: 16px; }
  .credit-card__title { font-size: 0.7rem; }
  .credit-card--composer .credit-card__title { font-size: 0.78rem; }
  .credit-card__meta { font-size: 0.58rem; }
}

.instr-hero__action-trust {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.5rem 0.85rem;
  flex-wrap: wrap;
  padding-top: 0.85rem;
  border-top: 1px solid rgba(255,255,255,0.04);
  font-size: 0.6rem;
  font-weight: 500;
  letter-spacing: 0.06em;
  color: var(--text-quiet);
  text-transform: uppercase;
}
@media (max-width: 1024px) {
  .instr-hero__action-trust {
    justify-content: center;
    font-size: 0.5rem;
    padding-top: 0.55rem;
    gap: 0.35rem 0.55rem;
    letter-spacing: 0.04em;
  }
}
@media (max-width: 640px) {
  .instr-hero__action-trust { font-size: 0.55rem; padding-top: 0.7rem; gap: 0.5rem 0.75rem; }
  .instr-hero__action-trust svg { width: 11px; height: 11px; }
}
.instr-hero__action-trust span {
  display: inline-flex;
  align-items: center;
  gap: 0.3rem;
}
.instr-hero__action-trust svg {
  width: 11px; height: 11px;
  stroke: var(--green-light);
  stroke-width: 1.8;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
  flex-shrink: 0;
}

/* ─── 16:9 video facade (YouTube no-cookie embed) — sits between lead and decision ─── */
.instr-hero__video {
  position: relative;
  width: 100%;
  aspect-ratio: 16 / 9;
  border-radius: 18px;
  overflow: hidden;
  background: linear-gradient(135deg, #1a1f28, #0d1117);
  box-shadow:
    0 30px 80px rgba(0,0,0,0.6),
    0 8px 30px rgba(0,0,0,0.4),
    0 0 60px rgba(75,145,65,0.04);
  cursor: pointer;
  isolation: isolate;
  margin: 0;
}
/* Mobile · unified premium player — video + filmstrip wrapped in ONE frame.
   Premium treatment moves UP to the stage; the video becomes a clean inner
   surface (nested radius < outer). Matches 03 lib-hero cinematic framing. */
@media (max-width: 600px) {
  .instr-hero__stage {
    gap: 0.75rem;
    padding: 12px;
    background: linear-gradient(135deg, #1a1f28, #0d1117);
    border: 1px solid var(--glass-border);
    border-radius: 22px;
    box-shadow:
      0 30px 80px rgba(0,0,0,0.6),
      0 8px 30px rgba(0,0,0,0.4),
      0 0 60px rgba(75,145,65,0.04);
  }
  .instr-hero__video {
    aspect-ratio: 4 / 3;
    border-radius: 16px;
    background: linear-gradient(160deg, #243042, #11161f);
    box-shadow: none;
  }
}
.instr-hero__video-poster {
  position: absolute;
  inset: 0;
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform 0.8s var(--ease), filter 0.6s ease;
  filter: brightness(0.78) contrast(1.05);
}
.instr-hero__video:hover .instr-hero__video-poster {
  transform: scale(1.02);
  filter: brightness(0.9) contrast(1.05);
}
.instr-hero__video-overlay {
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 50% 50%, transparent 30%, rgba(5,8,16,0.6) 100%),
    linear-gradient(180deg, rgba(5,8,16,0.1) 0%, rgba(5,8,16,0.55) 100%);
  pointer-events: none;
  transition: opacity 0.5s ease;
}
.instr-hero__video:hover .instr-hero__video-overlay { opacity: 0.7; }

/* Cursor-aware highlight (heritage signature) — neutral, no mix-blend-mode
   (DESIGN-SYSTEM ban on page-body mix-blend), matches library hero. */
.instr-hero__video-highlight {
  position: absolute;
  width: 380px; height: 380px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(255,255,255,0.10) 0%, rgba(255,255,255,0.03) 40%, transparent 70%);
  transform: translate(-50%, -50%);
  pointer-events: none;
  opacity: 0;
  transition: opacity 0.4s ease;
  z-index: 2;
}
.instr-hero__video:hover .instr-hero__video-highlight { opacity: 1; }
@media (hover: none), (pointer: coarse) {
  .instr-hero__video-highlight { display: none; }
}

/* Play button — large, glassy, breathing pulse · VISUAL ONLY · clicks pass through */
.instr-hero__video-play {
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  width: 92px; height: 92px;
  border-radius: 50%;
  background:
    linear-gradient(160deg, rgba(255,255,255,0.18) 0%, rgba(255,255,255,0.06) 100%);
  border: 1px solid rgba(255,255,255,0.32);
  backdrop-filter: blur(14px) saturate(1.2);
  -webkit-backdrop-filter: blur(14px) saturate(1.2);
  display: flex;
  align-items: center;
  justify-content: center;
  pointer-events: none; /* clicks pass through to parent .instr-hero__video */
  transition: all 0.4s var(--ease);
  z-index: 3;
  box-shadow:
    0 14px 44px rgba(0,0,0,0.42),
    inset 0 1px 0 rgba(255,255,255,0.5),    /* top specular highlight */
    inset 0 -1px 3px rgba(0,0,0,0.2);        /* bottom inner shade */
}
/* .instr-hero__video-play::before pulse ring REMOVED · page-05 polish E3a
   §11 ban: no infinite pulse on rest-state UI. Confident interfaces sit still. */
.instr-hero__video-play svg {
  width: 28px; height: 28px;
  stroke: #fff;
  fill: rgba(255,255,255,0.05);
  stroke-width: 1.5;
  stroke-linejoin: round;
  margin-left: 4px; /* optical center for play triangle */
  filter: drop-shadow(0 1px 3px rgba(0,0,0,0.4));
}
.instr-hero__video:hover .instr-hero__video-play {
  background:
    linear-gradient(160deg, rgba(255,255,255,0.26) 0%, rgba(255,255,255,0.10) 100%);
  border-color: rgba(255,255,255,0.5);
  box-shadow:
    0 18px 54px rgba(0,0,0,0.5),
    inset 0 1px 0 rgba(255,255,255,0.65),
    inset 0 -1px 3px rgba(0,0,0,0.22);
  transform: translate(-50%, -50%) scale(1.06);
}
.instr-hero__video:hover .instr-hero__video-play svg { stroke: #fff; }
/* Keyboard focus indicator on the video container itself */
.instr-hero__video:focus-visible {
  outline: 2px solid var(--green-light);
  outline-offset: 4px;
}

@media (max-width: 560px) {
  .instr-hero__video-play { width: 68px; height: 68px; }
  .instr-hero__video-play svg { width: 22px; height: 22px; }
}

/* Video caption strip — bottom-left, attribution + duration if known */
.instr-hero__video-caption {
  position: absolute;
  bottom: 1.4rem; left: 1.4rem; right: 1.4rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  z-index: 2;
  pointer-events: none;
}
.instr-hero__video-caption-title {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-size: clamp(0.78rem, 1.05vw, 0.94rem);
  font-weight: 400;
  color: rgba(255,255,255,0.78);
  letter-spacing: 0.005em;
  text-shadow: 0 2px 18px rgba(0,0,0,0.6);
  max-width: 70%;
  line-height: 1.4;
}
.instr-hero__video-caption-meta {
  font-family: "Outfit", sans-serif;
  font-size: 0.55rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.5);
  white-space: nowrap;
}
@media (max-width: 560px) {
  /* Clean mobile hero: hide the text caption (title + meta), keep just the
     video + play button. */
  .instr-hero__video-caption { display: none; }
}

/* ═══════════════════════════════════════════════════════════════
   §1 HERO · Multi-video stage — main frame + thumbnail rail
   ═══════════════════════════════════════════════════════════════ */
.instr-hero__stage {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
}

/* Thumbnail rail — scalable for 1-N videos · centered · tight cinematic tiles */
.instr-hero__rail {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 0.6rem;
  padding: 0;
}
/* If only one video, JS hides the rail entirely (see initRail()). */

@media (max-width: 768px) {
  /* Mobile: horizontal scroll-snap (handles any count gracefully) */
  .instr-hero__rail {
    flex-wrap: nowrap;
    justify-content: flex-start;
    overflow-x: auto;
    overscroll-behavior-x: contain;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    padding: 0.2rem 1.1rem 0.6rem;
    margin: 0 -1.1rem;
    scrollbar-width: none;
  }
  .instr-hero__rail::-webkit-scrollbar { display: none; }
  .instr-hero__rail-thumb { scroll-snap-align: start; }
}

/* Single thumbnail · poster-only tile · info overlaid · ~140-180px wide */
.instr-hero__rail-thumb {
  position: relative;
  display: block;
  width: clamp(96px, 16vw, 180px);
  flex-shrink: 0;
  padding: 0;
  background: rgba(255,255,255,0.025);
  border: 1px solid var(--glass-border);
  border-radius: 10px;
  overflow: hidden;
  cursor: pointer;
  font-family: "Outfit", sans-serif;
  text-align: left;
  transition: all 0.4s var(--ease);
  isolation: isolate;
  appearance: none;
  -webkit-appearance: none;
  aspect-ratio: 16 / 9;
}
@media (max-width: 768px) {
  .instr-hero__rail-thumb {
    width: clamp(150px, 38vw, 200px);
  }
}

.instr-hero__rail-thumb:hover {
  border-color: rgba(117,194,73,0.22);
  transform: translateY(-2px);
  box-shadow:
    0 10px 28px rgba(0,0,0,0.32),
    0 0 18px rgba(117,194,73,0.08);
}
.instr-hero__rail-thumb:focus-visible {
  outline: 2px solid var(--green-light);
  outline-offset: 2px;
}

/* Active state — green border + dot indicator */
.instr-hero__rail-thumb.is-active {
  border-color: rgba(117,194,73,0.5);
  box-shadow:
    0 10px 28px rgba(0,0,0,0.32),
    0 0 22px rgba(117,194,73,0.18),
    inset 0 0 0 1px rgba(117,194,73,0.15);
}

/* Poster fills the entire card (16:9 aspect) */
.instr-hero__rail-thumb-img-wrap {
  position: absolute;
  inset: 0;
  overflow: hidden;
  background: var(--bg-darkest);
}
.instr-hero__rail-thumb-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(0.78) contrast(1.05);
  transition: filter 0.4s ease, transform 0.6s var(--ease);
}
.instr-hero__rail-thumb:hover .instr-hero__rail-thumb-img {
  filter: brightness(0.92) contrast(1.05);
  transform: scale(1.04);
}
.instr-hero__rail-thumb.is-active .instr-hero__rail-thumb-img {
  filter: brightness(0.88) contrast(1.05);
}

/* Gradient overlay — top-fade for duration, bottom-fade for role label */
.instr-hero__rail-thumb-overlay {
  position: absolute;
  inset: 0;
  background:
    linear-gradient(180deg, rgba(5,8,16,0.7) 0%, transparent 28%, transparent 55%, rgba(5,8,16,0.85) 100%);
  pointer-events: none;
  z-index: 1;
}

/* Mini play icon · centered · scales on hover */
.instr-hero__rail-thumb-play {
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  width: 28px; height: 28px;
  border-radius: 50%;
  background:
    linear-gradient(160deg, rgba(255,255,255,0.20) 0%, rgba(255,255,255,0.07) 100%);
  border: 1px solid rgba(255,255,255,0.30);
  backdrop-filter: blur(10px) saturate(1.2);
  -webkit-backdrop-filter: blur(10px) saturate(1.2);
  box-shadow:
    0 4px 14px rgba(0,0,0,0.4),
    inset 0 1px 0 rgba(255,255,255,0.45);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
  transition: all 0.4s var(--ease);
  pointer-events: none;
}
.instr-hero__rail-thumb-play svg {
  width: 10px; height: 10px;
  fill: #fff;
  margin-left: 1.5px;
  filter: drop-shadow(0 1px 2px rgba(0,0,0,0.4));
}
.instr-hero__rail-thumb:hover .instr-hero__rail-thumb-play {
  background:
    linear-gradient(160deg, rgba(255,255,255,0.30) 0%, rgba(255,255,255,0.12) 100%);
  border-color: rgba(255,255,255,0.5);
  transform: translate(-50%, -50%) scale(1.15);
}
.instr-hero__rail-thumb.is-active .instr-hero__rail-thumb-play {
  background:
    linear-gradient(160deg, rgba(255,255,255,0.42) 0%, rgba(255,255,255,0.18) 100%);
  border-color: rgba(255,255,255,0.7);
  box-shadow:
    0 4px 14px rgba(0,0,0,0.4),
    inset 0 1px 0 rgba(255,255,255,0.6);
}

/* Active dot — top-right corner, on top of poster */
.instr-hero__rail-thumb-active-dot {
  position: absolute;
  top: 7px; left: 7px;
  width: 7px; height: 7px;
  border-radius: 50%;
  background: var(--green-primary);
  box-shadow: 0 0 8px rgba(117,194,73,0.7);
  z-index: 4;
  opacity: 0;
  transform: scale(0.6);
  transition: opacity 0.3s ease, transform 0.3s var(--ease);
}
.instr-hero__rail-thumb.is-active .instr-hero__rail-thumb-active-dot {
  opacity: 1;
  transform: scale(1);
  animation: railThumbDotPulse 2.2s ease-in-out infinite;
}
@keyframes railThumbDotPulse {
  0%, 100% { box-shadow: 0 0 8px rgba(117,194,73,0.7); }
  50%      { box-shadow: 0 0 14px rgba(117,194,73,1); }
}

/* Duration · top-right overlay (YouTube-style) */
.instr-hero__rail-thumb-duration {
  display: none;
  position: absolute;
  top: 6px; right: 6px;
  z-index: 3;
  padding: 0.18rem 0.4rem;
  border-radius: 4px;
  background: rgba(0,0,0,0.7);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  font-size: 0.55rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  color: rgba(255,255,255,0.9);
  font-variant-numeric: tabular-nums;
  line-height: 1.2;
}

/* Role label · bottom-left overlay */
.instr-hero__rail-thumb-role {
  display: none;
  position: absolute;
  bottom: 7px;
  left: 8px;
  right: 8px;
  z-index: 3;
  font-size: 0.6rem;
  font-weight: 600;
  letter-spacing: 0.02em;
  color: var(--text-secondary);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  transition: color 0.3s ease;
  text-shadow: 0 1px 4px rgba(0,0,0,0.6);
}
.instr-hero__rail-thumb:hover .instr-hero__rail-thumb-role {
  color: #fff;
}
.instr-hero__rail-thumb.is-active .instr-hero__rail-thumb-role {
  color: var(--green-light);
}

/* Hide the legacy meta wrapper (we render role + duration as direct children of card now) */
.instr-hero__rail-thumb-meta { display: none; }

@media (max-width: 600px) {
  /* Variant A · clean filmstrip — posters kept (the emotion), everything
     layered on top stripped. Inactive dimmed, active ringed.
     Breakpoint 600 (NOT 560) so it fires together with the stage frame —
     a phone reporting 561-600px CSS width must not get framed video + raw thumbs. */
  .instr-hero__rail {
    gap: 0.5rem;
    justify-content: center;
    align-items: center;
    /* cancel the @768 full-bleed (margin:0 -1.1rem) — inside the framed stage the
       rail must respect the inner width so thumbs align under the video's corners */
    margin: 0;
    padding: 0;
    overflow-x: visible;
    flex-wrap: nowrap;
  }
  .instr-hero__rail-thumb-play,
  .instr-hero__rail-thumb-duration,
  .instr-hero__rail-thumb-role,
  .instr-hero__rail-thumb-active-dot,
  .instr-hero__rail-thumb-overlay { display: none; }
  .instr-hero__rail-thumb {
    width: 66px;
    aspect-ratio: 16 / 9;
    min-height: 44px;          /* tap target (poster is ~37px; min-height pads it) */
    opacity: 0.55;
    background: var(--glass-bg);
    /* glass surround: hairline border + refractive top lip (cheap, visible part
       of glass — backdrop-blur intentionally omitted, wasted GPU at 72px) */
    border: 1px solid var(--glass-border);
    border-top-color: rgba(255,255,255,0.14);
    box-shadow: inset 0 1px 0 rgba(255,255,255,0.08);
    overflow: hidden;           /* button clips the poster to its radius (rounds all corners) */
    border-radius: 12px;        /* concentric with video 16px / frame 22px */
    transition: opacity 0.3s var(--ease), box-shadow 0.3s var(--ease);
  }
  .instr-hero__rail-thumb.is-active {
    opacity: 1;
    /* ring + lift via INSET shadow so it renders inside the clipped bounds
       (outline would be clipped away by overflow:hidden) */
    box-shadow:
      inset 0 0 0 2px var(--green-primary),
      0 6px 18px rgba(0,0,0,0.45);
  }
}

@media (prefers-reduced-motion: reduce) {
  .instr-hero__rail-thumb,
  .instr-hero__rail-thumb-img,
  .instr-hero__rail-thumb-play { transition: none !important; }
  .instr-hero__rail-thumb:hover { transform: none !important; }
  .instr-hero__rail-thumb-active-dot { animation: none !important; }
}

/* ═══════════════════════════════════════════════════════════════
   §1 HERO CHOREOGRAPHY · Desktop only
   Each element earns its arrival · gated by reduced-motion
   ═══════════════════════════════════════════════════════════════ */
@media (min-width: 1025px) and (prefers-reduced-motion: no-preference) {

  .instr-hero [data-reveal] {
    opacity: 0;
    transform: none;
    transition: none;
  }
  .instr-hero.choreographed [data-reveal] {
    animation-fill-mode: both;
  }
  /* H1 wrapper stays visible — the title-word span handles its own choreography */
  .instr-hero__title { opacity: 1; }

  /* 0.0s — Ambient bloom now lives on body::after (page-level continuity) */

  /* 0.15s — Breadcrumb */
  .instr-hero.choreographed .instr-hero__breadcrumb {
    animation: instrFadeUp 0.7s var(--ease) 0.15s forwards;
  }

  /* 0.30s — H1 word (Playfair, gradient, blur-clear) */
  .instr-hero__title-word {
    opacity: 0;
    transform: translateY(0.6em);
    filter: blur(8px);
    will-change: transform, opacity, filter;
  }
  .instr-hero.choreographed .instr-hero__title-word {
    animation: instrTitleWord 1.1s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards;
  }
  @keyframes instrTitleWord {
    0%   { opacity: 0; transform: translateY(0.6em); filter: blur(8px); }
    60%  { opacity: 1; filter: blur(0); }
    100% { opacity: 1; transform: translateY(0); filter: blur(0); }
  }

  /* 0.65s — SEO subhead */
  .instr-hero.choreographed .instr-hero__subhead {
    animation: instrFadeUp 0.85s var(--ease) 0.65s forwards;
  }

  /* 0.85s — Tagline (italic ghost-in) */
  .instr-hero.choreographed .instr-hero__tagline {
    animation: instrFadeUp 0.95s var(--ease) 0.85s forwards;
  }

  /* 1.05s — Pricing chip row */
  .instr-hero.choreographed .instr-hero__spec {
    animation: instrFadeUp 0.8s var(--ease) 1.05s forwards;
  }

  /* 1.20s — Soft CTA */
  .instr-hero.choreographed .instr-hero__soft-cta {
    animation: instrFadeUp 0.7s var(--ease) 1.2s forwards;
  }

  /* 0.95s — Hero pillar row + Action card bloom in together (after video stage) */
  .instr-hero.choreographed .hero-pillars,
  .instr-hero.choreographed .instr-hero__action {
    animation: instrCardBloom 1.1s var(--ease) 0.95s forwards;
  }
  @keyframes instrCardBloom {
    0%   { opacity: 0; transform: scale(0.97) translateY(20px); }
    100% { opacity: 1; transform: scale(1) translateY(0); }
  }

  /* 0.7s — Video stage (frame + rail) blooms in BEFORE the decision cards
     so users see the watch experience first, then the action choices. */
  .instr-hero.choreographed .instr-hero__stage {
    animation: instrCardBloom 1.1s var(--ease) 0.7s forwards;
  }

  @keyframes instrFadeUp {
    0%   { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
  }
}

@media (prefers-reduced-motion: reduce) {
  .instr-hero__title-word,
  .instr-hero [data-reveal] {
    opacity: 1 !important;
    transform: none !important;
    filter: none !important;
    animation: none !important;
  }
  .instr-hero__video-play::before { animation: none !important; }
}

/* ═══════════════════════════════════════════════════════════════
   §1.5 BOOKING PROCESS — INSTR-PROCESS-001
   4-step transparent booking flow · replaces tier pricing
   Cards · gradient frame on hover · numeral glow · meta strip
   Spacing: relies on .main-col parent grid gap for section rhythm.
   ═══════════════════════════════════════════════════════════════ */
.instr-process {
  position: relative;
}

.instr-process__head {
  display: flex;
  flex-direction: column;
  gap: 0.85rem;
  margin-bottom: 2.4rem;
  max-width: 720px;
}
@media (max-width: 1024px) {
  .instr-process__head { margin-bottom: 1.5rem; gap: 0.7rem; }
}
.instr-process__eyebrow {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.instr-process__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-process__title {
  font-family: "Playfair Display", Georgia, serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.instr-process__title-accent {
  display: inline-block;
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.instr-process__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
}
/* 4-card grid · 4 columns desktop · 2 columns tablet · 1 column mobile */
.instr-process__grid {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.1rem;
}
@media (max-width: 1180px) {
  .instr-process__grid { grid-template-columns: repeat(2, 1fr); gap: 0.9rem; }
}

/* Single step card */
.process-step {
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 0.65rem;
  padding: 1.6rem 1.4rem 1.4rem;
  border-radius: 14px;
  background:
    linear-gradient(160deg, rgba(255,255,255, 0.025) 0%, rgba(255,255,255, 0.01) 60%),
    rgba(10, 16, 12, 0.65);
  border: 1px solid rgba(255,255,255, 0.07);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  isolation: isolate;
  overflow: hidden;
  transition:
    background 0.45s cubic-bezier(0.22, 1, 0.36, 1),
    border-color 0.45s cubic-bezier(0.22, 1, 0.36, 1),
    transform 0.55s cubic-bezier(0.22, 1, 0.36, 1),
    box-shadow 0.55s cubic-bezier(0.22, 1, 0.36, 1);
  box-shadow:
    0 6px 18px rgba(0,0,0, 0.28),
    inset 0 1px 0 rgba(255,255,255, 0.04);
}
@media (max-width: 640px) {
  .process-step { padding: 1rem 0.85rem 0.85rem; gap: 0.45rem; border-radius: 12px; }
}
@media (max-width: 560px) {
  .process-step { padding: 0.85rem 0.75rem 0.75rem; gap: 0.4rem; }
}
/* Gradient corner accent on hover */
.process-step::after {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: inherit;
  pointer-events: none;
  background: linear-gradient(
    135deg,
    rgba(187,214,122, 0.18) 0%,
    transparent 30%,
    transparent 70%,
    rgba(117,194,73, 0.12) 100%
  );
  opacity: 0;
  transition: opacity 0.5s cubic-bezier(0.22, 1, 0.36, 1);
  z-index: 1;
  -webkit-mask:
    linear-gradient(#fff 0 0) content-box,
    linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
          mask-composite: exclude;
  padding: 1px;
}
.process-step:hover {
  background: rgba(117,194,73, 0.05);
  border-color: rgba(187,214,122, 0.4);
  transform: translateY(-3px);
  box-shadow:
    0 16px 36px rgba(0,0,0, 0.32),
    0 0 28px rgba(117,194,73, 0.1),
    inset 0 1px 0 rgba(255,255,255, 0.05);
}
.process-step:hover::after { opacity: 1; }
.process-step > * { position: relative; z-index: 2; }

.process-step__num {
  display: inline-block;
  font-family: "Playfair Display", Georgia, serif;
  font-style: italic;
  font-weight: 900;
  font-size: 1.1rem;
  letter-spacing: 0.08em;
  color: var(--green-primary);
  transition:
    color 0.4s ease,
    text-shadow 0.5s cubic-bezier(0.22, 1, 0.36, 1),
    transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);
  transform-origin: left center;
}
.process-step:hover .process-step__num {
  color: var(--green-light);
  text-shadow:
    0 0 14px rgba(117,194,73, 0.5),
    0 0 28px rgba(187,214,122, 0.2);
  transform: scale(1.08);
}

.process-step__title {
  font-family: "Playfair Display", Georgia, serif;
  font-size: 1.18rem;
  font-weight: 700;
  line-height: 1.18;
  color: #fff;
  letter-spacing: -0.005em;
  margin: 0;
}
@media (max-width: 640px) {
  .process-step__title { font-size: 1.05rem; }
}
@media (max-width: 560px) {
  /* num/title/meta sizing now owned by the vertical-rail block above (matches 04).
     __body is display:none in the rail. Only meta-dot remains here. */
  .process-step__meta-dot { width: 4px; height: 4px; }
}

.process-step__body {
  font-family: "Outfit", sans-serif;
  font-size: 0.82rem;
  font-weight: 300;
  line-height: 1.6;
  color: var(--text-muted);
  margin: 0;
  flex: 1;
}
.process-step__meta {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding-top: 0.7rem;
  margin-top: 0.4rem;
  border-top: 1px solid rgba(255,255,255, 0.05);
  font-family: "Outfit", sans-serif;
  font-size: 0.7rem;
  font-weight: 500;
  letter-spacing: 0.04em;
  color: var(--text-tertiary);
  text-transform: uppercase;
}
.process-step__meta-dot {
  width: 5px; height: 5px;
  border-radius: 50%;
  background: var(--green-primary);
  flex-shrink: 0;
  box-shadow: 0 0 6px rgba(117,194,73, 0.5);
}

@media (max-width: 560px) {
  /* Mobile: numbered vertical rail — matches 04 recording-services (LOCKED).
     Shared instr-process component must render identically on both pages. */
  .instr-process__grid {
    grid-template-columns: 1fr;
    gap: 0;
  }
  .process-step {
    aspect-ratio: auto;
    display: grid;
    grid-template-columns: 2.2rem 1fr;
    grid-template-rows: auto auto;
    column-gap: 0.9rem;
    row-gap: 0.3rem;
    align-items: start;
    padding: 1rem 0.5rem;
    border: none;
    border-radius: 0;
    border-top: 1px solid rgba(255,255,255, 0.07);
    background: none;
    backdrop-filter: none;
    -webkit-backdrop-filter: none;
    box-shadow: none;
    min-height: 0;
  }
  .process-step:first-child { border-top: none; }
  .process-step__body { display: none; }
  .process-step__num {
    grid-column: 1;
    grid-row: 1 / 3;
    font-size: 1.6rem;
    line-height: 1;
    text-align: left;
    margin: 0.05rem 0 0;
    align-self: start;
  }
  .process-step__title {
    grid-column: 2;
    grid-row: 1;
    font-size: 1.02rem;
    line-height: 1.2;
    margin: 0;
  }
  .process-step__meta {
    grid-column: 2;
    grid-row: 2;
    margin: 0;
    padding: 0;
    border-top: none;
    font-size: 0.6rem;
  }
}

@media (prefers-reduced-motion: reduce) {
  .process-step:hover { transform: none !important; }
  .process-step:hover .process-step__num { transform: none !important; }
}

/* ═══════════════════════════════════════════════════════════════
   §1B AUDIO DEMOS — "What sitar sounds like"
   3 cards (or N) · cc-demo-player engine v7 · MediaElement backend (lazy load)
   Only one card plays at a time · scrubbable waveform · brand-themed UI
   ═══════════════════════════════════════════════════════════════ */
.instr-demos {
  position: relative;
}

.instr-demos__head {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  margin-bottom: 2.4rem;
  max-width: 720px;
}
.instr-demos__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.instr-demos__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-demos__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.instr-demos__title-accent {
  display: inline-block;
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.instr-demos__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
}

/* Grid auto-flows · 3-up desktop, 2-up tablet, 1-up mobile */
.instr-demos__grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 1.4rem;
}
@media (max-width: 1100px) {
  .instr-demos__grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
}
@media (max-width: 640px) {
  /* 1-up mobile · boxy · same compact treatment as the 2-up version had */
  .instr-demos__grid { grid-template-columns: 1fr; gap: 0.8rem; }
  .instr-demos__head { margin-bottom: 1.5rem; }
}

/* ─── Demo card ─── */
.track-card {
  position: relative;
  display: flex;
  flex-direction: column;
  padding: 1.4rem 1.4rem 1.2rem;
  border-radius: 16px;
  background: rgba(255,255,255,0.025);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  box-shadow:
    0 12px 40px rgba(0,0,0,0.25),
    inset 0 1px 0 rgba(255,255,255,0.04);
  transition: all 0.4s var(--ease);
  isolation: isolate;
  overflow: hidden;
  min-height: 280px;
}
.track-card::before {
  /* Soft inner glow on hover only */
  content: "";
  position: absolute;
  top: -30%; right: -20%;
  width: 60%; height: 60%;
  background: radial-gradient(circle, rgba(117,194,73,0.08) 0%, transparent 65%);
  opacity: 0;
  transition: opacity 0.5s ease;
  pointer-events: none;
  z-index: 0;
}
.track-card:hover {
  border-color: rgba(117,194,73,0.18);
  background: rgba(255,255,255,0.035);
  transform: translateY(-3px);
  box-shadow:
    0 18px 55px rgba(0,0,0,0.35),
    0 0 22px rgba(117,194,73,0.06),
    inset 0 1px 0 rgba(255,255,255,0.06);
}
.track-card:hover::before { opacity: 1; }
.track-card.playing {
  border-color: rgba(117,194,73,0.32);
  background: rgba(117,194,73,0.04);
  box-shadow:
    0 18px 55px rgba(0,0,0,0.35),
    0 0 30px rgba(117,194,73,0.14),
    inset 0 1px 0 rgba(255,255,255,0.07);
}
.track-card.playing::before { opacity: 1; }
/* Snap playing-state green instantly (base uses transition:all 0.4s which fades
   every green property → flicker on rapid demo switching). */
.track-card.playing {
  transition: transform 0.4s var(--ease), border-color 0s, background 0s, box-shadow 0s;
}
.track-card.playing::before { transition: none; }
.track-card > * { position: relative; z-index: 1; }

/* Card top row: mood chip + duration */
.track-card__top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.8rem;
  margin-bottom: 1rem;
}
.track-card__tag {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.32rem 0.7rem;
  border-radius: 50px;
  background: rgba(117,194,73,0.08);
  border: 1px solid rgba(117,194,73,0.18);
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--green-light);
  white-space: nowrap;
}
.track-card__tag-dot {
  width: 5px; height: 5px;
  border-radius: 50%;
  background: var(--green-primary);
  box-shadow: 0 0 6px rgba(117,194,73,0.5);
}
.track-card.playing .track-card__tag-dot {
  animation: demoPulse 1.1s ease-in-out infinite;
}
@keyframes demoPulse {
  0%,100% { opacity: 1; transform: scale(1); }
  50%     { opacity: 0.6; transform: scale(1.4); }
}
.track-card__duration {
  font-family: "Outfit", sans-serif;
  font-size: 0.66rem;
  font-weight: 500;
  letter-spacing: 0.04em;
  color: var(--text-quiet);
  font-variant-numeric: tabular-nums;
  white-space: nowrap;
}

/* Card body — title + description */
.track-card__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.05rem, 1.4vw, 1.25rem);
  font-weight: 700;
  line-height: 1.2;
  color: var(--text-primary);
  margin: 0 0 0.45rem;
  letter-spacing: -0.005em;
}
.track-card__desc {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 300;
  line-height: 1.55;
  color: var(--text-muted);
  margin: 0 0 1.2rem;
  /* Clamp to 2 lines on tighter cards */
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Player row — play button + waveform inline */
.track-card__player {
  display: flex;
  align-items: center;
  gap: 0.85rem;
  margin-top: auto;
  padding-top: 0.4rem;
}

.track-card__play {
  flex-shrink: 0;
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(117,194,73,0.1);
  border: 1px solid rgba(117,194,73,0.32);
  cursor: pointer;
  transition: all 0.3s var(--ease);
  position: relative;
  color: var(--green-light);
  /* 1px inner highlight */
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.08);
}
.track-card__play:hover {
  background: rgba(117,194,73,0.18);
  border-color: rgba(117,194,73,0.5);
  transform: scale(1.06);
  color: #fff;
}
.track-card__play:active { transform: scale(0.96); }
.track-card__play:focus-visible {
  outline: 2px solid var(--green-light);
  outline-offset: 3px;
}
.track-card__play svg {
  width: 16px; height: 16px;
  fill: currentColor;
  stroke: none;
}
/* Each play state = different SVG content via data attribute · simpler than swapping nodes */
.track-card__icon-pause,
.track-card__icon-loading { display: none; }
.track-card.playing .track-card__icon-play { display: none; }
.track-card.playing .track-card__icon-pause { display: block; }
.track-card.is-loading .track-card__icon-play,
.track-card.is-loading .track-card__icon-pause { display: none; }
.track-card.is-loading .track-card__icon-loading {
  display: block;
  animation: demoSpin 0.8s linear infinite;
}
@keyframes demoSpin {
  from { transform: rotate(0deg); }
  to   { transform: rotate(360deg); }
}

/* Waveform container — the player engine renders an SVG inside */
.track-card__wave {
  flex: 1;
  height: 48px;
  min-width: 0;
  position: relative;
  cursor: pointer;
  border-radius: 4px;
  overflow: hidden;
}
.track-card__wave wave {
  /* the player engine's outer wave element */
  overflow: hidden !important;
}
/* the player engine canvas styling — set via JS waveColor/progressColor options */

/* Time row — current / total */
.track-card__time {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 0.55rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.6rem;
  font-weight: 500;
  letter-spacing: 0.05em;
  color: var(--text-quiet);
  font-variant-numeric: tabular-nums;
}
.track-card.playing .track-card__time-current {
  color: var(--green-light);
}

/* Initial waveform skeleton — placeholder bars before the player engine mounts */
.track-card__wave-skeleton {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  gap: 2px;
  pointer-events: none;
  transition: opacity 0.3s ease;
}
.track-card__wave-skeleton::before {
  content: "";
  position: absolute;
  inset: 0;
  background:
    repeating-linear-gradient(
      90deg,
      rgba(255,255,255,0.10) 0,
      rgba(255,255,255,0.10) 1.5px,
      transparent 1.5px,
      transparent 4px
    );
  mask: linear-gradient(180deg,
    transparent 30%,
    #000 45%,
    #000 55%,
    transparent 70%
  );
  -webkit-mask: linear-gradient(180deg,
    transparent 30%,
    #000 45%,
    #000 55%,
    transparent 70%
  );
}
.track-card.is-ready .track-card__wave-skeleton { opacity: 0; }

/* Mobile tweaks — compact boxy cards, 1 per row */
@media (max-width: 768px) {
  .track-card {
    padding: 1rem 1rem 0.85rem;
    min-height: 0;
    border-radius: 14px;
  }
  .track-card__top { margin-bottom: 0.7rem; gap: 0.5rem; }
  .track-card__tag {
    padding: 0.26rem 0.6rem;
    font-size: 0.46rem;
    letter-spacing: 0.2em;
  }
  .track-card__tag-dot { width: 5px; height: 5px; }
  .track-card__duration { font-size: 0.62rem; }
  .track-card__title {
    font-size: 0.95rem;
    margin: 0 0 0.35rem;
    line-height: 1.2;
  }
  .track-card__desc {
    font-size: 0.7rem;
    margin: 0 0 0.85rem;
    -webkit-line-clamp: 2;
    line-height: 1.5;
  }
  .track-card__player {
    gap: 0.7rem;
    padding-top: 0.25rem;
  }
  .track-card__play { width: 44px; height: 44px; }
  .track-card__play svg { width: 14px; height: 14px; }
  .track-card__wave { height: 40px; }
  .track-card__time {
    margin-top: 0.45rem;
    font-size: 0.56rem;
  }
}
@media (max-width: 480px) {
  .track-card { padding: 1.15rem 1.15rem 1.05rem; }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
  .track-card { transition: none !important; }
  .track-card:hover { transform: none !important; }
  .track-card__play { transition: none !important; }
  .track-card__tag-dot { animation: none !important; }
}

/* ═══════════════════════════════════════════════════════════════
   §2 WHAT THIS INSTRUMENT BRINGS
   2×2 glass card grid · each card = one angle (emotional, cinematic, iconic, cultural)
   Icon + bold lead phrase + body copy · subordinate to hero glass intensity
   ═══════════════════════════════════════════════════════════════ */
.instr-brings {
  position: relative;
}

.instr-brings__head {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  margin-bottom: 2.4rem;
  max-width: 760px;
}
.instr-brings__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.instr-brings__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-brings__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.instr-brings__title-accent {
  display: inline-block;
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.instr-brings__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
}

/* 2×2 grid · responsive */
.instr-brings__grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 1.4rem;
}
@media (max-width: 1024px) {
  .instr-brings__grid { gap: 1rem; }
}
@media (max-width: 640px) {
  .instr-brings__grid { grid-template-columns: 1fr; gap: 0.8rem; }
  .instr-brings__head { margin-bottom: 1.5rem; }
}

/* Single brings card */
.brings-card {
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 0.85rem;
  padding: 1.5rem 1.5rem 1.4rem;
  border-radius: 16px;
  background: rgba(255,255,255,0.022);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  box-shadow:
    0 12px 40px rgba(0,0,0,0.22),
    inset 0 1px 0 rgba(255,255,255,0.04);
  transition: all 0.4s var(--ease);
  isolation: isolate;
  overflow: hidden;
}
.brings-card::before {
  /* Soft top-corner ambient glow (only on hover) */
  content: "";
  position: absolute;
  top: -40%; right: -25%;
  width: 65%; height: 65%;
  background: radial-gradient(circle, rgba(117,194,73,0.08) 0%, transparent 65%);
  opacity: 0;
  transition: opacity 0.5s ease;
  pointer-events: none;
  z-index: 0;
}
.brings-card:hover {
  border-color: rgba(117,194,73,0.18);
  background: rgba(255,255,255,0.032);
  transform: translateY(-3px);
  box-shadow:
    0 18px 55px rgba(0,0,0,0.32),
    0 0 22px rgba(117,194,73,0.06),
    inset 0 1px 0 rgba(255,255,255,0.06);
}
.brings-card:hover::before { opacity: 1; }
.brings-card > * { position: relative; z-index: 1; }

@media (max-width: 640px) {
  .brings-card { padding: 1.2rem 1.1rem 1.1rem; gap: 0.7rem; border-radius: 14px; }
}

/* Icon · top-left, brand green, light stroke */
.brings-card__icon {
  width: 28px;
  height: 28px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 8px;
  background: rgba(117,194,73,0.06);
  border: 1px solid rgba(117,194,73,0.16);
  flex-shrink: 0;
  transition:
    background 0.4s cubic-bezier(0.22, 1, 0.36, 1),
    border-color 0.4s cubic-bezier(0.22, 1, 0.36, 1),
    box-shadow 0.5s cubic-bezier(0.22, 1, 0.36, 1),
    transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);
}
.brings-card:hover .brings-card__icon {
  background: rgba(117,194,73,0.18);
  border-color: rgba(187,214,122, 0.4);
  box-shadow:
    0 0 18px rgba(117,194,73, 0.35),
    0 0 36px rgba(187,214,122, 0.12),
    inset 0 1px 0 rgba(255,255,255, 0.08);
  transform: scale(1.06) rotate(-2deg);
}
.brings-card__icon svg {
  width: 16px;
  height: 16px;
  stroke: var(--green-light);
  stroke-width: 1.6;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
  transition: stroke 0.4s ease;
}
.brings-card:hover .brings-card__icon svg {
  stroke: #fff;
}
@media (max-width: 640px) {
  .brings-card__icon { width: 24px; height: 24px; border-radius: 6px; }
  .brings-card__icon svg { width: 14px; height: 14px; }
}

/* Eyebrow above title — small caps, brand-green */
.brings-card__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.26em;
  text-transform: uppercase;
  color: var(--green-light);
  margin: 0;
}

/* Title (bold lead phrase) — Playfair, prominent */
.brings-card__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.1rem, 1.45vw, 1.35rem);
  font-weight: 700;
  line-height: 1.2;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
@media (max-width: 640px) {
  .brings-card__title { font-size: 1.05rem; line-height: 1.22; }
}

/* Body copy — Outfit, readable */
.brings-card__body {
  font-family: "Outfit", sans-serif;
  font-size: 0.82rem;
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  letter-spacing: 0.005em;
}
@media (max-width: 640px) {
  .brings-card__body { font-size: 0.78rem; line-height: 1.6; }
}

/* Italic emphasis (for transliterated terms like meend, raga) */
.brings-card__body em {
  font-style: italic;
  color: var(--text-secondary);
  font-family: "Playfair Display", serif;
  font-weight: 400;
  letter-spacing: 0.005em;
}

@media (prefers-reduced-motion: reduce) {
  .brings-card { transition: none !important; }
  .brings-card:hover { transform: none !important; }
}

/* ═══════════════════════════════════════════════════════════════
   §3 THE INSTRUMENT UP CLOSE
   Part A: anatomy photo with 5 numbered hotspot dots + always-visible legend
   Part B: 3-card variant comparison (which sitar to book)
   Repeatable pattern for 14 other instruments — swap photo + relabel.
   ═══════════════════════════════════════════════════════════════ */
.instr-anatomy {
  position: relative;
}

.instr-anatomy__head {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  margin-bottom: 2.4rem;
  max-width: 760px;
}
.instr-anatomy__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.instr-anatomy__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-anatomy__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.instr-anatomy__title-accent {
  display: inline-block;
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.instr-anatomy__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
}
@media (max-width: 640px) {
  .instr-anatomy__head {
    gap: 0.55rem;
    margin-bottom: 1.5rem;
  }
  .instr-anatomy__title {
    font-size: 1.4rem;
    line-height: 1.2;
  }
  .instr-anatomy__sub {
    font-size: 0.78rem;
    line-height: 1.5;
  }
}

/* ─── PART A: Anatomy stage · 2-column desktop (photo + info card) · stacks on mobile ─── */
.anatomy-stage {
  display: grid;
  grid-template-columns: minmax(0, 0.95fr) minmax(380px, 1fr);
  gap: 2rem;
  align-items: start;
  margin-bottom: 4rem;
}
@media (max-width: 900px) {
  .anatomy-stage {
    grid-template-columns: 1fr;
    gap: 0.9rem;
    margin-bottom: 2rem;
  }
}

/* ─── Photo zone · UNIVERSAL ANATOMY CONTAINER ───
   Works for every instrument (sitar, tabla, sarod, bansuri, sarangi, vocals).
   
   Per-instrument variables (set on .anatomy-photo inline):
   --photo-aspect:  the natural aspect ratio
       1/2  → sitar     (tall vertical with long neck)
       4/3  → tabla     (wide pair of drums)
       1/4  → bansuri   (long thin flute)
       3/4  → sarangi   (short and stout)
       1/1  → vocals    (square icon-style)
       4/5  → default
   --photo-max-h: max height the photo can grow to
       sitar:    600px (default)
       tabla:    460px (so width stays within column)
       bansuri:  600px
       
   For tall/narrow instruments, ALSO add class .anatomy-photo--tall to use
   height-driven sizing (preserves natural narrow shape rather than stretching). */
.anatomy-photo {
  position: relative;
  aspect-ratio: var(--photo-aspect, 4/5);
  width: 100%;
  max-height: var(--photo-max-h, min(64vh, 600px));
  height: auto;
  margin: 0 auto;
  isolation: isolate;
}
.anatomy-photo--tall {
  width: auto;
  height: var(--photo-h, min(64vh, 600px));
  max-width: 100%;
}
@media (max-width: 1024px) {
  .anatomy-photo {
    max-height: var(--photo-max-h-tablet, var(--photo-max-h, min(60vh, 500px)));
  }
  .anatomy-photo--tall {
    height: var(--photo-h-tablet, var(--photo-h, min(60vh, 500px)));
  }
}
@media (max-width: 900px) {
  .anatomy-photo,
  .anatomy-photo--tall {
    width: 100%;
    height: auto;
    max-height: min(55vh, 480px);
    max-width: 100%;
  }
}
@media (max-width: 640px) {
  .anatomy-photo,
  .anatomy-photo--tall {
    max-height: min(50vh, 420px);
    width: 100%;
    max-width: 100%;
    height: auto;
  }
}

/* Inner clipped frame · holds SVG + background · keeps rounded edges */
.anatomy-photo__frame {
  position: absolute;
  inset: 0;
  border-radius: 16px;
  overflow: hidden;
  background:
    radial-gradient(ellipse at 50% 60%, rgba(117,194,73,0.04) 0%, transparent 60%),
    linear-gradient(180deg, rgba(15,22,30,0.4) 0%, rgba(8,12,18,0.7) 100%),
    var(--bg-darkest);
  border: 1px solid var(--glass-border);
  box-shadow:
    0 12px 40px rgba(0,0,0,0.3),
    inset 0 1px 0 rgba(255,255,255,0.04);
}
.anatomy-photo__img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(0.92) contrast(1.05);
}
.anatomy-photo__svg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  display: block;
  filter: drop-shadow(0 8px 24px rgba(0,0,0,0.4));
}
.anatomy-photo__placeholder {
  /* Visible only when no real img source loads · pure CSS placeholder */
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 0.5rem;
  color: var(--text-quiet);
  font-family: "Outfit", sans-serif;
  font-size: 0.6rem;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  pointer-events: none;
  background:
    repeating-linear-gradient(
      45deg,
      rgba(255,255,255,0.012) 0,
      rgba(255,255,255,0.012) 1px,
      transparent 1px,
      transparent 14px
    );
}
.anatomy-photo__placeholder svg {
  width: 38px; height: 38px;
  stroke: rgba(255,255,255,0.12);
  stroke-width: 1.2;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
}
.anatomy-photo__placeholder-label {
  opacity: 0.5;
}

/* Hotspot dots — positioned via inline style: --x and --y as percentages */
.anatomy-photo__hotspots {
  position: absolute;
  inset: 0;
  pointer-events: none;
  z-index: 2;
}
.anatomy-hotspot {
  position: absolute;
  left: var(--x, 50%);
  top: var(--y, 50%);
  transform: translate(-50%, -50%);
  width: 28px; height: 28px;
  border-radius: 50%;
  background: rgba(117,194,73,0.18);
  border: 1.5px solid var(--green-primary);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "Outfit", sans-serif;
  font-size: 0.7rem;
  font-weight: 700;
  color: #fff;
  cursor: pointer;
  pointer-events: auto;
  transition: all 0.3s var(--ease);
  appearance: none;
  -webkit-appearance: none;
  padding: 0;
  z-index: 3;
  box-shadow:
    0 0 0 4px rgba(117,194,73,0.15),
    0 0 14px rgba(117,194,73,0.4);
}
/* .anatomy-hotspot::before pulse ring REMOVED · page-05 polish E3b
   §11 ban: no infinite pulse on rest-state UI. The :hover / :focus-visible /
   .is-active states (rule below) still provide the interactive affordance —
   the hotspot grows and glows on interaction, just not constantly. */
.anatomy-hotspot:hover,
.anatomy-hotspot:focus-visible,
.anatomy-hotspot.is-active {
  background: rgba(117,194,73,0.45);
  transform: translate(-50%, -50%) scale(1.18);
  box-shadow:
    0 0 0 6px rgba(117,194,73,0.22),
    0 0 24px rgba(117,194,73,0.7);
  outline: none;
  z-index: 11;
}

/* Tooltip · HIDDEN at all viewports.
   The right-column info card now shows the active part's description,
   so we don't need a hover tooltip on the photo itself.
   The HTML is preserved for accessibility (screen readers, aria-describedby).
   .anatomy-hotspot__tooltip kept in HTML for aria use, hidden visually. */
.anatomy-hotspot__tooltip {
  position: absolute;
  width: 1px; height: 1px;
  padding: 0; margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}

/* ─── Info card · right column on desktop, below photo on mobile ─── */
.anatomy-info {
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
  padding: 1.6rem 1.4rem;
  border-radius: 16px;
  background: rgba(255,255,255,0.022);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  align-self: stretch;
  min-height: 0;
}
@media (max-width: 900px) {
  .anatomy-info { padding: 0.9rem 0.85rem; gap: 0.7rem; }
}

.anatomy-info__head {
  display: flex;
  flex-direction: column;
  gap: 0.45rem;
  padding-bottom: 0.9rem;
  border-bottom: 1px solid rgba(255,255,255,0.05);
}
@media (max-width: 900px) {
  /* Section heading already carries the title/sub on mobile · skip the duplicate. */
  .anatomy-info__head { display: none; }
}
.anatomy-info__eyebrow {
  font-family: "Outfit", sans-serif;
  font-size: 0.55rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
}
.anatomy-info__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.25rem, 1.8vw, 1.55rem);
  font-weight: 700;
  line-height: 1.2;
  color: var(--text-primary);
  margin: 0;
}
.anatomy-info__sub {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 300;
  line-height: 1.5;
  color: var(--text-muted);
  margin: 0;
}

/* ─── Pill column · vertical inside info card on desktop, wraps on mobile ─── */
.anatomy-legend {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  padding: 0;
}
@media (max-width: 900px) {
  .anatomy-legend {
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
    gap: 0.4rem;
  }
}

/* Pill styling (preserved from horizontal version, slight tweaks for vertical) */
.anatomy-legend__item {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  padding: 0.55rem 0.95rem 0.55rem 0.55rem;
  border-radius: 50px;
  background: rgba(255,255,255,0.022);
  border: 1px solid var(--glass-border);
  cursor: pointer;
  transition: all 0.3s var(--ease);
  appearance: none;
  -webkit-appearance: none;
  font-family: inherit;
  white-space: nowrap;
  width: fit-content;
}
.anatomy-legend__item:hover,
.anatomy-legend__item.is-active {
  background: rgba(117,194,73,0.08);
  border-color: rgba(117,194,73,0.32);
  transform: translateX(2px);
}
@media (max-width: 900px) {
  .anatomy-legend__item:hover,
  .anatomy-legend__item.is-active {
    transform: translateY(-1px);
  }
}
.anatomy-legend__item:focus-visible {
  outline: 2px solid var(--green-light);
  outline-offset: 2px;
}

.anatomy-legend__num {
  flex-shrink: 0;
  width: 22px; height: 22px;
  border-radius: 50%;
  background: rgba(117,194,73,0.14);
  border: 1px solid rgba(117,194,73,0.36);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "Outfit", sans-serif;
  font-size: 0.6rem;
  font-weight: 700;
  color: var(--green-light);
  transition: all 0.3s var(--ease);
}
.anatomy-legend__item.is-active .anatomy-legend__num {
  background: rgba(117,194,73,0.4);
  border-color: var(--green-primary);
  color: #fff;
  box-shadow: 0 0 10px rgba(117,194,73,0.4);
}

.anatomy-legend__body {
  display: inline-flex;
  align-items: baseline;
  gap: 0.35rem;
  min-width: 0;
}
.anatomy-legend__name {
  font-family: "Playfair Display", serif;
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--text-primary);
  line-height: 1.2;
}
.anatomy-legend__name em {
  font-style: italic;
  font-weight: 400;
  color: var(--text-secondary);
  font-size: 0.92em;
}
.anatomy-legend__role { display: none; }

@media (max-width: 900px) {
  .anatomy-legend__item { padding: 0.5rem 0.8rem 0.5rem 0.5rem; gap: 0.45rem; min-height: 44px; }
  .anatomy-legend__name { font-size: 0.78rem; }
  .anatomy-legend__num { width: 20px; height: 20px; font-size: 0.55rem; }
}

/* ─── Active-part description panel ───
   Desktop: always rendered, fades in when a pill/dot is active
   Mobile: only renders when active */
.anatomy-reveal {
  margin-top: auto;
  padding: 0.95rem 1.05rem;
  border-radius: 12px;
  background: rgba(117,194,73,0.05);
  border: 1px solid rgba(117,194,73,0.18);
  min-height: 0;
  opacity: 0;
  transition: opacity 0.3s var(--ease);
}
.anatomy-reveal[data-active] { opacity: 1; }

@media (max-width: 900px) {
  /* On mobile, only render when active (no pre-allocated space) */
  .anatomy-reveal:not([data-active]) { display: none; }
}

.anatomy-reveal__label {
  display: block;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--green-light);
  margin-bottom: 0.4rem;
}
.anatomy-reveal__text {
  display: block;
  font-family: "Outfit", sans-serif;
  font-size: 0.82rem;
  font-weight: 300;
  line-height: 1.55;
  color: var(--text-secondary);
}
.anatomy-reveal__text em {
  font-style: italic;
  color: var(--text-primary);
  font-family: "Playfair Display", serif;
  font-weight: 400;
}

/* ─── PART B: Variants 3-card row ─── */
.instr-variants {
  margin-top: 1rem;
}
.instr-variants__head {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  margin-bottom: 1.6rem;
  max-width: 720px;
}
@media (max-width: 640px) {
  .instr-variants__head { margin-bottom: 1.5rem; }
}
.instr-variants__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.instr-variants__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-variants__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.25rem, 1.9vw, 1.6rem);
  font-weight: 700;
  line-height: 1.2;
  color: var(--text-primary);
  margin: 0;
  letter-spacing: -0.005em;
}
.instr-variants__sub {
  font-family: "Outfit", sans-serif;
  font-size: 0.82rem;
  font-weight: 300;
  line-height: 1.6;
  color: var(--text-muted);
  margin: 0.2rem 0 0;
  max-width: 580px;
}

.instr-variants__grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 1.2rem;
}
@media (max-width: 1024px) {
  .instr-variants__grid { gap: 0.9rem; }
}
@media (max-width: 768px) {
  .instr-variants__grid { grid-template-columns: 1fr; gap: 0.7rem; }
}

.variant-card {
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 0.7rem;
  padding: 1.4rem 1.3rem 1.2rem;
  border-radius: 14px;
  background: rgba(255,255,255,0.022);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  box-shadow:
    0 12px 40px rgba(0,0,0,0.22),
    inset 0 1px 0 rgba(255,255,255,0.04);
  transition: all 0.4s var(--ease);
  isolation: isolate;
  overflow: hidden;
}
.variant-card:hover {
  border-color: rgba(117,194,73,0.18);
  background: rgba(255,255,255,0.032);
  transform: translateY(-3px);
  box-shadow:
    0 18px 55px rgba(0,0,0,0.32),
    0 0 22px rgba(117,194,73,0.06),
    inset 0 1px 0 rgba(255,255,255,0.06);
}
@media (max-width: 768px) {
  .variant-card { padding: 1.1rem 1rem 1rem; gap: 0.55rem; }
}

/* Variant chip — small school identifier (Maihar / Imdadkhani / Studio) */
.variant-card__chip {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.3rem 0.65rem;
  border-radius: 50px;
  background: rgba(117,194,73,0.08);
  border: 1px solid rgba(117,194,73,0.18);
  font-family: "Outfit", sans-serif;
  font-size: 0.46rem;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--green-light);
  width: fit-content;
}
.variant-card__chip-dot {
  width: 5px; height: 5px;
  border-radius: 50%;
  background: var(--green-primary);
  box-shadow: 0 0 6px rgba(117,194,73,0.5);
}

.variant-card__name {
  font-family: "Playfair Display", serif;
  font-size: clamp(1rem, 1.3vw, 1.18rem);
  font-weight: 700;
  line-height: 1.2;
  color: var(--text-primary);
  margin: 0;
  letter-spacing: -0.005em;
}
.variant-card__name em {
  font-style: italic;
  font-weight: 400;
  color: var(--text-secondary);
  display: block;
  font-size: 0.7em;
  margin-top: 0.1rem;
}

.variant-card__character {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 300;
  line-height: 1.55;
  color: var(--text-muted);
  margin: 0;
}

/* When-to-book block · pinned to card bottom */
.variant-card__when {
  margin-top: auto;
  padding-top: 0.85rem;
  border-top: 1px solid rgba(255,255,255,0.04);
  display: flex;
  flex-direction: column;
  gap: 0.3rem;
}
.variant-card__when-label {
  font-size: 0.46rem;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--text-quiet);
}
.variant-card__when-text {
  font-family: "Outfit", sans-serif;
  font-size: 0.72rem;
  font-weight: 400;
  line-height: 1.45;
  color: var(--text-secondary);
}

@media (prefers-reduced-motion: reduce) {
  .anatomy-hotspot,
  .anatomy-hotspot__tooltip,
  .anatomy-legend__item,
  .variant-card { transition: none !important; }
  .anatomy-hotspot::before { animation: none !important; }
  .variant-card:hover { transform: none !important; }
}

/* ═══════════════════════════════════════════════════════════════════
   §4 · ARTICULATIONS · Phrase Precision
   What the player can do for your cue. Universal scaffold:
   - Variable card count per instrument (sitar 10, bansuri 6, tabla 14...)
   - Each card: Play button + Playfair name + italic sub + 1-2 line description
   - Auto-fit grid scales to count
   - the player engine audio loads only on first play (zero network on page load)
   - Single-card play registry (one at a time)
   ═══════════════════════════════════════════════════════════════════ */
.instr-arts {
  position: relative;
  padding-top: 2rem;
  border-top: 1px solid var(--glass-border);
}
@media (max-width: 900px) {
  .instr-arts { padding-top: 1.6rem; }
}
@media (max-width: 640px) {
  .instr-arts { padding-top: 1.4rem; }
}

.instr-arts__head {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  margin-bottom: 2.4rem;
  max-width: 760px;
}
.instr-arts__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.instr-arts__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-arts__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.instr-arts__title-accent {
  display: inline-block;
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.instr-arts__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
}
@media (max-width: 640px) {
  .instr-arts__head { gap: 0.55rem; margin-bottom: 1.5rem; }
  .instr-arts__title { font-size: 1.4rem; line-height: 1.2; }
  .instr-arts__sub { font-size: 0.78rem; line-height: 1.5; }
}

/* Universal auto-fit grid — handles any card count */
.instr-arts__grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 1rem;
}
@media (max-width: 1024px) {
  .instr-arts__grid {
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 0.85rem;
  }
}
@media (max-width: 640px) {
  .instr-arts__grid { grid-template-columns: 1fr; gap: 0.7rem; }
}


/* ─── Mobile compact: tighter art cards ─── */
@media (max-width: 640px) {
  .instr-arts__grid { gap: 0.55rem; }
}

/* ═══════════════════════════════════════════════════════════════════
   §5 · SONIC PROFILE · Mix Fit
   How the instrument behaves in a mix · written for engineers.
   Single comprehensive card · universal scaffold for any instrument.
   Per-instrument variables: frequency range %, sweet spot %, all text.
   ═══════════════════════════════════════════════════════════════════ */
.instr-sonic {
  position: relative;
  padding-top: 2rem;
  border-top: 1px solid var(--glass-border);
}
@media (max-width: 900px) {
  .instr-sonic { padding-top: 1.6rem; }
}
@media (max-width: 640px) {
  .instr-sonic { padding-top: 1.4rem; }
}

.instr-sonic__head {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  margin-bottom: 2.4rem;
  max-width: 760px;
}
.instr-sonic__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.instr-sonic__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-sonic__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.instr-sonic__title-accent {
  display: inline-block;
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.instr-sonic__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
}
@media (max-width: 640px) {
  .instr-sonic__head { gap: 0.55rem; margin-bottom: 1.5rem; }
  .instr-sonic__title { font-size: 1.4rem; line-height: 1.2; }
  .instr-sonic__sub { font-size: 0.78rem; line-height: 1.5; }
}

/* ─── Sonic profile card ─── */
.sonic-card {
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 2rem;
  padding: 2rem;
  border-radius: 18px;
  background:
    radial-gradient(ellipse at 0% 0%, rgba(117,194,73,0.04) 0%, transparent 50%),
    rgba(255,255,255,0.022);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  box-shadow:
    0 12px 40px rgba(0,0,0,0.18),
    inset 0 1px 0 rgba(255,255,255,0.04);
}
@media (max-width: 900px) {
  .sonic-card { padding: 1.4rem 1.2rem; gap: 1.5rem; }
}
@media (max-width: 640px) {
  .sonic-card { padding: 1.1rem 1rem; gap: 1.1rem; border-radius: 14px; }
}
@media (max-width: 480px) {
  .sonic-card { padding: 1rem 0.9rem; gap: 1rem; }
}

/* Block label (used inside the card for each section) */
.sonic-block { display: flex; flex-direction: column; gap: 0.7rem; }
.sonic-block__label {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
}

/* ─── Frequency profile bar ─── */
.sonic-freq { display: flex; flex-direction: column; gap: 0.75rem; }
.sonic-freq__bar {
  position: relative;
  height: 30px;
  margin-top: 1.5rem;
  border-radius: 8px;
  background: linear-gradient(90deg,
    rgba(255,255,255,0.04) 0%,
    rgba(255,255,255,0.06) 50%,
    rgba(255,255,255,0.04) 100%);
  border: 1px solid rgba(255,255,255,0.06);
}
.sonic-freq__range {
  position: absolute;
  top: 0; bottom: 0;
  left: var(--range-start, 15%);
  right: calc(100% - var(--range-end, 75%));
  background: linear-gradient(90deg,
    rgba(117,194,73,0.18) 0%,
    rgba(187,214,122,0.32) 50%,
    rgba(117,194,73,0.18) 100%);
  border-left: 1px solid rgba(187,214,122,0.4);
  border-right: 1px solid rgba(187,214,122,0.4);
  border-radius: 6px;
}
.sonic-freq__sweet {
  position: absolute;
  top: -2px; bottom: -2px;
  left: var(--sweet, 50%);
  width: 2px;
  background: var(--green-light);
  box-shadow: 0 0 12px rgba(187,214,122,0.7);
}
.sonic-freq__sweet::after {
  content: attr(data-label);
  position: absolute;
  top: -22px;
  left: 50%;
  transform: translateX(-50%);
  font-family: "Outfit", sans-serif;
  font-size: 0.55rem;
  font-weight: 700;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--green-light);
  white-space: nowrap;
}
.sonic-freq__scale {
  display: flex;
  justify-content: space-between;
  font-family: "Outfit", sans-serif;
  font-size: 0.62rem;
  font-weight: 400;
  letter-spacing: 0.08em;
  color: var(--text-muted);
}
.sonic-freq__caption {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 300;
  line-height: 1.5;
  color: var(--text-secondary);
}
.sonic-freq__caption em {
  font-style: italic;
  color: var(--text-primary);
  font-family: "Playfair Display", serif;
  font-weight: 400;
}

/* ─── 3-up engineering specs grid ─── */
.sonic-specs {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 0;
  padding: 1.2rem;
  border-radius: 12px;
  background: rgba(0,0,0,0.16);
  border: 1px solid rgba(255,255,255,0.04);
}
@media (max-width: 720px) {
  .sonic-specs { grid-template-columns: 1fr; padding: 0.9rem; gap: 0.7rem; }
}
.sonic-spec {
  display: flex;
  flex-direction: column;
  gap: 0.45rem;
  min-width: 0;
  padding: 0 1.1rem;
}
.sonic-spec:first-child { padding-left: 0; }
.sonic-spec:last-child  { padding-right: 0; }
.sonic-spec + .sonic-spec {
  border-left: 1px solid rgba(255,255,255,0.05);
}
@media (max-width: 720px) {
  .sonic-spec { padding: 0; gap: 0.3rem; }
  .sonic-spec + .sonic-spec { border-left: none; padding-top: 0.7rem; border-top: 1px solid rgba(255,255,255,0.05); }
  .sonic-spec__value { font-size: 0.95rem; }
  .sonic-spec__detail { font-size: 0.74rem; line-height: 1.45; }
}
.sonic-spec__label {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.24em;
  text-transform: uppercase;
  color: var(--text-muted);
}
.sonic-spec__value {
  font-family: "Playfair Display", serif;
  font-size: 1rem;
  font-weight: 700;
  line-height: 1.3;
  color: var(--text-primary);
}
.sonic-spec__detail {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 300;
  line-height: 1.5;
  color: var(--text-secondary);
}


/* ═══════════════════════════════════════════════════════════════════
   §6 · PAIRS WELL WITH · Cross-sell related instruments
   3 cards (variable per instrument) · each card has icon-silhouette,
   name, sub, description, "why pair" reasons, CTA link.
   Universal scaffold — only the icon, copy, and CTA href change.
   ═══════════════════════════════════════════════════════════════════ */
.instr-pairs {
  position: relative;
  padding-top: 2rem;
  border-top: 1px solid var(--glass-border);
}
@media (max-width: 900px) {
  .instr-pairs { padding-top: 1.6rem; }
}
@media (max-width: 640px) {
  .instr-pairs { padding-top: 1.4rem; }
}

.instr-pairs__head {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  margin-bottom: 2.4rem;
  max-width: 760px;
}
.instr-pairs__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.instr-pairs__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-pairs__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.instr-pairs__title-accent {
  display: inline-block;
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.instr-pairs__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
}
@media (max-width: 640px) {
  .instr-pairs__head { gap: 0.55rem; margin-bottom: 1.5rem; }
  .instr-pairs__title { font-size: 1.4rem; line-height: 1.2; }
  .instr-pairs__sub { font-size: 0.78rem; line-height: 1.5; }
}

/* ─── Pairs grid · auto-fit handles 2/3/4 card variations ─── */
.instr-pairs__grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1.25rem;
}
@media (max-width: 640px) {
  .instr-pairs__grid { grid-template-columns: 1fr; gap: 1rem; }
}

/* ─── Pair card ─── */
.pair-card {
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 1rem;
  padding: 1.6rem 1.4rem 1.3rem;
  border-radius: 16px;
  background:
    radial-gradient(ellipse at 0% 0%, rgba(117,194,73,0.05) 0%, transparent 55%),
    rgba(255,255,255,0.022);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  text-decoration: none;
  color: inherit;
  transition: all 0.4s var(--ease);
  isolation: isolate;
  overflow: hidden;
}
.pair-card::after {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: inherit;
  background: radial-gradient(ellipse at 100% 0%, rgba(117,194,73,0.08) 0%, transparent 50%);
  opacity: 0;
  transition: opacity 0.4s var(--ease);
  pointer-events: none;
  z-index: -1;
}
.pair-card:hover {
  border-color: rgba(117,194,73,0.32);
  transform: translateY(-3px);
  box-shadow:
    0 16px 50px rgba(0,0,0,0.3),
    0 0 30px rgba(117,194,73,0.08);
}
.pair-card:hover::after { opacity: 1; }
.pair-card:focus-visible {
  outline: 2px solid var(--green-light);
  outline-offset: 3px;
}

/* Icon silhouette */
.pair-card__icon {
  width: 56px; height: 56px;
  border-radius: 12px;
  background: rgba(117,194,73,0.08);
  border: 1px solid rgba(117,194,73,0.22);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: all 0.4s var(--ease);
}
.pair-card:hover .pair-card__icon {
  background: rgba(117,194,73,0.14);
  border-color: rgba(117,194,73,0.4);
  box-shadow: 0 0 16px rgba(117,194,73,0.15);
}
.pair-card__icon svg {
  width: 36px; height: 36px;
  stroke: var(--green-light);
  fill: none;
  stroke-width: 1.4;
  stroke-linecap: round;
  stroke-linejoin: round;
  opacity: 0.9;
}

/* Title block */
.pair-card__title-block {
  display: flex;
  flex-direction: column;
  gap: 0.15rem;
  padding-top: 0.2rem;
}
.pair-card__name {
  font-family: "Playfair Display", serif;
  font-size: 1.4rem;
  font-weight: 700;
  line-height: 1.15;
  color: var(--text-primary);
  margin: 0;
}
.pair-card__sub {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-size: 0.85rem;
  font-weight: 400;
  color: var(--text-secondary);
  line-height: 1.3;
}

/* Description */
.pair-card__desc {
  font-family: "Outfit", sans-serif;
  font-size: 0.84rem;
  font-weight: 300;
  line-height: 1.55;
  color: var(--text-secondary);
  margin: 0;
}
.pair-card__desc em {
  font-style: italic;
  color: var(--text-primary);
  font-family: "Playfair Display", serif;
  font-weight: 400;
}

/* Why-pair micro section */
.pair-card__why {
  display: flex;
  flex-direction: column;
  gap: 0.45rem;
  padding-top: 0.85rem;
  margin-top: 0.25rem;
  border-top: 1px solid rgba(255,255,255,0.05);
}
.pair-card__why-label {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.24em;
  text-transform: uppercase;
  color: var(--green-light);
}
.pair-card__why-list {
  display: flex;
  flex-direction: column;
  gap: 0.3rem;
  margin: 0;
  padding: 0;
  list-style: none;
}
.pair-card__why-item {
  position: relative;
  padding-left: 0.95rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 300;
  line-height: 1.5;
  color: var(--text-secondary);
}
.pair-card__why-item::before {
  content: "▸";
  position: absolute;
  left: 0;
  color: var(--green-primary);
  font-size: 0.7rem;
  top: 1px;
}
.pair-card__why-item em {
  font-style: italic;
  color: var(--text-primary);
  font-family: "Playfair Display", serif;
  font-weight: 400;
}

/* CTA arrow row */
.pair-card__cta {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  margin-top: auto;
  padding-top: 0.85rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--green-light);
  transition: all 0.3s var(--ease);
}
.pair-card__cta-arrow {
  display: inline-block;
  transition: transform 0.3s var(--ease);
}
.pair-card:hover .pair-card__cta {
  color: #fff;
}
.pair-card:hover .pair-card__cta-arrow {
  transform: translateX(4px);
}

@media (prefers-reduced-motion: reduce) {
  .pair-card { transition: none !important; }
  .pair-card:hover { transform: none !important; }
}

/* ─── Mobile compact: tighter pair cards ─── */
@media (max-width: 640px) {
  .instr-pairs__grid { gap: 0.7rem; }
  .pair-card { padding: 1.1rem 1.05rem 1rem; gap: 0.7rem; border-radius: 14px; }
  .pair-card__icon { width: 44px; height: 44px; border-radius: 10px; }
  .pair-card__icon svg { width: 28px; height: 28px; }
  .pair-card__name { font-size: 1.15rem; }
  .pair-card__sub { font-size: 0.78rem; }
  .pair-card__desc { font-size: 0.78rem; line-height: 1.5; }
  .pair-card__why { padding-top: 0.65rem; gap: 0.35rem; }
  .pair-card__why-item { font-size: 0.74rem; line-height: 1.45; }
  .pair-card__cta { font-size: 0.72rem; padding-top: 0.65rem; }
}

/* ═══════════════════════════════════════════════════════════════════
   §7 · INSTANT-DELIVERY CTA STRIP · Kontakt cross-sell (subtle)
   For the impatient buyer who can't wait for a session.
   Single horizontal strip · icon + copy + CTA. No section heading.
   Sits between §6 (Pairs) and §8 (FAQ) without competing for attention.
   Per-instrument variables: library name + href.
   ═══════════════════════════════════════════════════════════════════ */
.instant-strip {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  padding: 1.4rem 1.6rem;
  border-radius: 14px;
  background:
    radial-gradient(ellipse at 100% 50%, rgba(117,194,73,0.06) 0%, transparent 65%),
    rgba(255,255,255,0.022);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  text-decoration: none;
  color: inherit;
  transition: all 0.4s var(--ease);
  position: relative;
  overflow: hidden;
}
.instant-strip::after {
  content: "";
  position: absolute;
  top: 0; right: 0;
  width: 30%; height: 100%;
  background: radial-gradient(ellipse at 100% 50%, rgba(117,194,73,0.08) 0%, transparent 70%);
  opacity: 0;
  transition: opacity 0.4s var(--ease);
  pointer-events: none;
}
.instant-strip:hover {
  border-color: rgba(117,194,73,0.32);
  transform: translateY(-1px);
}
.instant-strip:hover::after { opacity: 1; }
.instant-strip:focus-visible {
  outline: 2px solid var(--green-light);
  outline-offset: 3px;
}
@media (max-width: 720px) {
  .instant-strip {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.25rem 1.2rem;
  }
}

/* Icon tile (lightning bolt - urgency cue) */
.instant-strip__icon {
  flex-shrink: 0;
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(117,194,73,0.12);
  border: 1px solid rgba(117,194,73,0.32);
  display: flex;
  align-items: center;
  justify-content: center;
}
.instant-strip__icon svg {
  width: 22px; height: 22px;
  stroke: var(--green-light);
  fill: rgba(117,194,73,0.18);
  stroke-width: 1.5;
  stroke-linejoin: round;
}

/* Copy block */
.instant-strip__body {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
  min-width: 0;
}
.instant-strip__label {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
}
.instant-strip__title {
  font-family: "Playfair Display", serif;
  font-size: 1.05rem;
  font-weight: 700;
  line-height: 1.3;
  color: var(--text-primary);
}
.instant-strip__title em {
  font-style: italic;
  color: var(--text-primary);
  font-weight: 400;
}
.instant-strip__sub {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 300;
  line-height: 1.5;
  color: var(--text-secondary);
}
@media (max-width: 480px) {
  .instant-strip__title { font-size: 0.95rem; }
  .instant-strip__sub { font-size: 0.74rem; }
}

/* CTA button on the right */
.instant-strip__cta {
  flex-shrink: 0;
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  padding: 0.7rem 1.1rem;
  border-radius: 8px;
  background: rgba(117,194,73,0.1);
  border: 1px solid rgba(117,194,73,0.32);
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--green-light);
  transition: all 0.3s var(--ease);
}
.instant-strip__cta-arrow {
  display: inline-block;
  transition: transform 0.3s var(--ease);
}
.instant-strip:hover .instant-strip__cta {
  background: rgba(117,194,73,0.2);
  border-color: var(--green-primary);
  color: #fff;
}
.instant-strip:hover .instant-strip__cta-arrow {
  transform: translateX(3px);
}
@media (max-width: 720px) {
  .instant-strip__cta { align-self: stretch; justify-content: center; }
}

@media (prefers-reduced-motion: reduce) {
  .instant-strip { transition: none !important; }
  .instant-strip:hover { transform: none !important; }
}

/* ═══════════════════════════════════════════════════════════════════
   §8 · FAQ · Booking blockers · FAQ-001 · v1
   Standard accordion · 6 questions per instrument · universal scaffold.
   Per-instrument: just change the 6 Q&A pairs.
   ═══════════════════════════════════════════════════════════════════ */
.instr-faq {
  position: relative;
  padding-top: 2rem;
  border-top: 1px solid var(--glass-border);
}
@media (max-width: 900px) {
  .instr-faq { padding-top: 1.6rem; }
}
@media (max-width: 640px) {
  .instr-faq { padding-top: 1.4rem; }
}

.instr-faq__head {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  margin-bottom: 2.4rem;
  max-width: 760px;
}
.instr-faq__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.instr-faq__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-faq__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.instr-faq__title-accent {
  display: inline-block;
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.instr-faq__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
}
@media (max-width: 640px) {
  .instr-faq__head { gap: 0.55rem; margin-bottom: 1.5rem; }
  .instr-faq__title { font-size: 1.4rem; line-height: 1.2; }
  .instr-faq__sub { font-size: 0.78rem; line-height: 1.5; }
}

/* ─── FAQ list ─── */
.instr-faq__list {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
}

/* Single FAQ item · uses native <details>/<summary> for accessibility */
.faq-item {
  position: relative;
  border-radius: 12px;
  background: rgba(255,255,255,0.022);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  transition:
    background 0.5s cubic-bezier(0.22, 1, 0.36, 1),
    border-color 0.5s cubic-bezier(0.22, 1, 0.36, 1),
    box-shadow 0.5s cubic-bezier(0.22, 1, 0.36, 1);
  overflow: hidden;
  isolation: isolate;
}
/* Gradient corner accent · only visible when open */
.faq-item::after {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: inherit;
  pointer-events: none;
  background: linear-gradient(
    135deg,
    rgba(187,214,122, 0.22) 0%,
    transparent 25%,
    transparent 75%,
    rgba(117,194,73, 0.14) 100%
  );
  opacity: 0;
  transition: opacity 0.5s cubic-bezier(0.22, 1, 0.36, 1);
  z-index: 1;
  -webkit-mask:
    linear-gradient(#fff 0 0) content-box,
    linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
          mask-composite: exclude;
  padding: 1px;
}
.faq-item[open] {
  background: rgba(117,194,73,0.04);
  border-color: rgba(117,194,73,0.18);
  box-shadow:
    0 12px 32px rgba(0,0,0, 0.25),
    inset 0 1px 0 rgba(255,255,255, 0.04);
}
.faq-item[open]::after { opacity: 1; }

/* Summary (the question row) */
.faq-item__summary {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 1.05rem 1.3rem;
  cursor: pointer;
  list-style: none;
  user-select: none;
  transition: all 0.3s var(--ease);
}
.faq-item__summary::-webkit-details-marker { display: none; }
.faq-item__summary:hover { background: rgba(255,255,255,0.018); }
.faq-item__summary:focus-visible {
  outline: 2px solid var(--green-light);
  outline-offset: -2px;
}

.faq-item__q {
  flex: 1;
  font-family: "Playfair Display", serif;
  font-size: 0.98rem;
  font-weight: 700;
  line-height: 1.35;
  color: var(--text-primary);
  margin: 0;
}
@media (max-width: 640px) {
  .faq-item__summary { padding: 1.1rem 1.15rem; gap: 0.7rem; }
  .faq-item__q { font-size: 0.88rem; }
}

/* Plus/minus icon */
.faq-item__icon {
  flex-shrink: 0;
  width: 28px; height: 28px;
  border-radius: 50%;
  background: rgba(117,194,73,0.1);
  border: 1px solid rgba(117,194,73,0.3);
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  transition:
    background 0.45s cubic-bezier(0.22, 1, 0.36, 1),
    border-color 0.45s cubic-bezier(0.22, 1, 0.36, 1),
    box-shadow 0.45s cubic-bezier(0.22, 1, 0.36, 1),
    transform 0.55s cubic-bezier(0.22, 1, 0.36, 1);
}
.faq-item__summary:hover .faq-item__icon {
  background: rgba(117,194,73,0.18);
  border-color: rgba(187,214,122, 0.45);
}
.faq-item[open] .faq-item__icon {
  background: rgba(117,194,73,0.32);
  border-color: var(--green-primary);
  transform: rotate(45deg);
  box-shadow:
    0 0 16px rgba(117,194,73,0.5),
    0 0 32px rgba(187,214,122, 0.15),
    inset 0 1px 0 rgba(255,255,255, 0.12);
}
.faq-item__icon::before,
.faq-item__icon::after {
  content: "";
  position: absolute;
  background: var(--green-light);
  transition: background 0.3s var(--ease);
}
.faq-item__icon::before { width: 12px; height: 1.4px; }
.faq-item__icon::after  { width: 1.4px; height: 12px; }
.faq-item[open] .faq-item__icon::before,
.faq-item[open] .faq-item__icon::after { background: #fff; }

/* Answer body */
.faq-item__body {
  padding: 0 1.3rem 1.2rem 1.3rem;
}
@media (max-width: 640px) {
  .faq-item__body { padding: 0 1.15rem 1.15rem 1.15rem; }
}
.faq-item__a {
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-secondary);
  margin: 0 0 0.7rem 0;
  padding-top: 0.5rem;
  border-top: 1px solid rgba(255,255,255,0.05);
}
.faq-item__a:last-child { margin-bottom: 0; }
.faq-item__a em {
  font-style: italic;
  color: var(--text-primary);
  font-family: "Playfair Display", serif;
  font-weight: 400;
}
.faq-item__a strong {
  font-weight: 600;
  color: var(--text-primary);
  font-family: "Outfit", sans-serif;
}

/* Soft post-FAQ contact prompt */
.faq-still-stuck {
  margin-top: 2rem;
  padding: 1.2rem 1.4rem;
  border-radius: 12px;
  background:
    radial-gradient(ellipse at 0% 50%, rgba(117,194,73,0.04) 0%, transparent 60%),
    rgba(255,255,255,0.022);
  border: 1px solid var(--glass-border);
  display: flex;
  align-items: center;
  gap: 1rem;
}
@media (max-width: 640px) {
  .faq-still-stuck { flex-direction: column; align-items: center; text-align: center; gap: 0.7rem; padding: 1rem; }
}
.faq-still-stuck__text {
  flex: 1;
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  font-weight: 300;
  line-height: 1.55;
  color: var(--text-secondary);
}
.faq-still-stuck__text strong {
  color: var(--text-primary);
  font-weight: 600;
}
.faq-still-stuck__cta {
  flex-shrink: 0;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 0.6rem 1rem;
  min-height: 44px;
  border-radius: 8px;
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--green-light);
  border: 1px solid rgba(117,194,73,0.32);
  background: rgba(117,194,73,0.08);
  text-decoration: none;
  transition: all 0.3s var(--ease);
}
.faq-still-stuck__cta:hover {
  background: rgba(117,194,73,0.18);
  border-color: var(--green-primary);
  color: #fff;
}
.faq-still-stuck__cta-arrow { transition: transform 0.3s var(--ease); }
.faq-still-stuck__cta:hover .faq-still-stuck__cta-arrow { transform: translateX(3px); }

@media (prefers-reduced-motion: reduce) {
  .faq-item, .faq-item__icon, .faq-still-stuck__cta-arrow { transition: none !important; }
  .faq-item[open] .faq-item__icon { transform: none !important; }
}

.booking-modal {
  position: fixed;
  inset: 0;
  z-index: 2000;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem 1rem;
  pointer-events: none;
  opacity: 0;
  transition: opacity 0.4s cubic-bezier(0.22, 1, 0.36, 1);
}
.booking-modal.is-open {
  pointer-events: auto;
  opacity: 1;
}
.booking-modal__backdrop {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.65);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
}
.booking-modal__sheet {
  position: relative;
  width: 100%;
  max-width: 720px;
  max-height: calc(100vh - 4rem);
  overflow-y: auto;
  padding: 2.4rem 2.4rem 2rem;
  border-radius: 22px;
  background:
    linear-gradient(160deg, rgba(20, 28, 22, 0.98) 0%, rgba(12, 18, 14, 0.99) 100%);
  border: 1px solid rgba(117,194,73, 0.18);
  border-top-color: rgba(187,214,122, 0.3);
  box-shadow:
    0 30px 80px rgba(0, 0, 0, 0.55),
    0 0 60px rgba(117,194,73, 0.06),
    inset 0 1px 0 rgba(255,255,255, 0.06);
  transform: translateY(20px) scale(0.97);
  transition:
    transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);
}
.booking-modal.is-open .booking-modal__sheet {
  transform: translateY(0) scale(1);
}
.booking-modal__sheet::-webkit-scrollbar { width: 6px; }
.booking-modal__sheet::-webkit-scrollbar-track { background: rgba(255,255,255,0.02); }
.booking-modal__sheet::-webkit-scrollbar-thumb { background: rgba(117,194,73, 0.25); border-radius: 6px; }

@media (max-width: 640px) {
  .booking-modal { padding: 0; align-items: stretch; }
  .booking-modal__sheet {
    max-width: none;
    max-height: 100vh;
    height: 100vh;
    border-radius: 18px 18px 0 0;
    padding: 1.6rem 1.2rem 1.4rem;
    transform: translateY(40px);
  }
  .booking-modal.is-open .booking-modal__sheet { transform: translateY(0); }
}

.booking-modal__close {
  position: absolute;
  top: 1.1rem;
  right: 1.1rem;
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(255,255,255, 0.08);
  border-radius: 50%;
  background: rgba(255,255,255, 0.025);
  color: var(--text-muted);
  cursor: pointer;
  transition: all 0.3s ease;
  z-index: 2;
}
.booking-modal__close:hover {
  background: rgba(117,194,73, 0.1);
  border-color: rgba(187,214,122, 0.4);
  color: var(--green-light);
  transform: rotate(90deg);
}
.booking-modal__close svg { width: 16px; height: 16px; }

.booking-modal__head {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
  margin-bottom: 1.6rem;
  max-width: 540px;
}
.booking-modal__eyebrow {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.booking-modal__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.booking-modal__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.5rem, 2.6vw, 2.1rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.booking-modal__title-accent {
  display: inline-block;
  font-style: italic;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 50%, #75C249 100%);
  -webkit-background-clip: text;
          background-clip: text;
  -webkit-text-fill-color: transparent;
}
.booking-modal__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
}

/* FORM */
.booking-form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
.booking-form__row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0.85rem;
}
@media (max-width: 560px) {
  .booking-form__row { grid-template-columns: 1fr; gap: 0.85rem; }
}
.booking-form__field {
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
  min-width: 0;
}
.booking-form__field--full { grid-column: 1 / -1; }
.booking-form__label {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--text-quiet);
}
.booking-form__input {
  font-family: "Outfit", sans-serif;
  font-size: 0.92rem;
  font-weight: 400;
  color: #fff;
  padding: 0.75rem 0.9rem;
  background: rgba(255,255,255, 0.025);
  border: 1px solid rgba(255,255,255, 0.08);
  border-radius: 10px;
  transition: border-color 0.3s ease, background 0.3s ease;
  width: 100%;
  box-sizing: border-box;
  min-width: 0;
}
.booking-form__input::placeholder { color: var(--text-quiet); }
.booking-form__input:focus {
  outline: none;
  border-color: rgba(117,194,73, 0.5);
  background: rgba(117,194,73, 0.05);
  box-shadow: 0 0 0 3px rgba(117,194,73, 0.08);
}
.booking-form__input--select {
  appearance: none;
  -webkit-appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 8' fill='none' stroke='%23BBD67A' stroke-width='2' stroke-linecap='round'%3E%3Cpolyline points='1 1 6 6 11 1'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 0.85rem center;
  background-size: 11px;
  padding-right: 2.2rem;
}
.booking-form__input--select option {
  background: #0d1410;
  color: #fff;
}
.booking-form__input--textarea {
  resize: vertical;
  min-height: 90px;
  line-height: 1.5;
  font-family: inherit;
}
.booking-form__nda {
  display: flex;
  align-items: flex-start;
  gap: 0.65rem;
  cursor: pointer;
  user-select: none;
  padding-top: 0.2rem;
}
.booking-form__nda-input {
  position: absolute;
  opacity: 0;
  pointer-events: none;
}
.booking-form__nda-box {
  width: 18px;
  height: 18px;
  border-radius: 5px;
  border: 1.5px solid rgba(255,255,255, 0.18);
  background: rgba(255,255,255, 0.025);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: all 0.3s ease;
  position: relative;
}
.booking-form__nda-box::after {
  content: "";
  width: 10px; height: 10px;
  border-radius: 2px;
  background: linear-gradient(135deg, var(--green-light), var(--green-primary));
  box-shadow: 0 0 8px rgba(117,194,73, 0.5);
  transform: scale(0);
  transition: transform 0.25s cubic-bezier(0.22, 1, 0.36, 1);
}
.booking-form__nda-input:checked ~ .booking-form__nda-box {
  border-color: var(--green-primary);
  background: rgba(117,194,73, 0.08);
}
.booking-form__nda-input:checked ~ .booking-form__nda-box::after { transform: scale(1); }
.booking-form__nda-label {
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  color: var(--text-secondary);
  line-height: 1.45;
}
.booking-form__nda-note {
  display: block;
  margin-top: 0.2rem;
  font-size: 0.76rem;
  color: var(--text-quiet);
}

.booking-form__footer {
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 1rem;
  align-items: center;
  margin-top: 0.6rem;
  padding-top: 1.2rem;
  border-top: 1px solid rgba(255,255,255, 0.06);
}
@media (max-width: 560px) {
  .booking-form__footer { grid-template-columns: 1fr; gap: 0.85rem; }
}
.booking-form__note {
  font-family: "Outfit", sans-serif;
  font-size: 0.74rem;
  font-weight: 300;
  line-height: 1.55;
  color: var(--text-quiet);
  margin: 0;
}
.booking-form__submit {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.55rem;
  padding: 0.95rem 1.6rem;
  background: linear-gradient(135deg, var(--green-light), var(--green-primary));
  border: none;
  color: #0a0d12;
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  font-weight: 700;
  letter-spacing: 0.02em;
  border-radius: 50px;
  cursor: pointer;
  transition: all 0.4s var(--ease);
  box-shadow: 0 8px 24px rgba(0,0,0, 0.35), inset 0 1px 0 rgba(255,255,255, 0.22);
  white-space: nowrap;
}
.booking-form__submit:hover {
  transform: translateY(-2px);
  box-shadow: 0 14px 36px rgba(0,0,0, 0.4), 0 0 24px rgba(117,194,73, 0.22), inset 0 1px 0 rgba(255,255,255, 0.25);
}
.booking-form__submit:active { transform: translateY(0); }
.booking-form__submit-arrow {
  display: inline-flex; align-items: center; justify-content: center;
  flex-shrink: 0; width: 0.95em; height: 0.95em;
}
.booking-form__submit-arrow svg { width: 100%; height: 100%; display: block; }
.booking-form__submit[aria-disabled="true"] {
  opacity: 0.4;
  box-shadow: 0 8px 24px rgba(0,0,0, 0.25), inset 0 1px 0 rgba(255,255,255, 0.12);
}
.booking-form__submit[aria-disabled="true"]:hover {
  transform: none;
  box-shadow: 0 8px 24px rgba(0,0,0, 0.25), inset 0 1px 0 rgba(255,255,255, 0.12);
}

/* Gate message · shown only after a blocked send */
.booking-form__gate {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem; font-weight: 400; line-height: 1.5;
  color: var(--green-light);
  margin: 0 0 0.2rem;
}
.booking-form__gate strong { font-weight: 700; }

/* Single acknowledgement, placed inside How-we-work */
.booking-form__ack--inhow {
  margin-top: 0.4rem;
  padding-top: 0.95rem;
  border-top: 1px solid rgba(255,255,255, 0.06);
}

/* One-shot attention flash on the accordion when send is blocked.
   Single run (forwards, no infinite) — §11-safe: class added by JS,
   removed on animationend. Uses cinematic easing. */
@keyframes bookingHowFlash {
  0%   { border-color: rgba(255,255,255, 0.08); background: rgba(255,255,255, 0.015); }
  35%  { border-color: rgba(187,214,122, 0.55); background: rgba(117,194,73, 0.07); }
  100% { border-color: rgba(255,255,255, 0.08); background: rgba(255,255,255, 0.015); }
}
.booking-form__how.is-flash {
  animation: bookingHowFlash 0.65s cubic-bezier(0.22, 1, 0.36, 1) 1;
}
@media (prefers-reduced-motion: reduce) {
  .booking-form__how.is-flash { animation: none; border-color: rgba(187,214,122, 0.55); }
}

/* Multi-add rows (instrument · reference) */
.booking-form__multi { display: flex; flex-direction: column; gap: 0.5rem; }
.booking-form__multi-row { display: flex; gap: 0.5rem; align-items: center; }
.booking-form__multi-row .booking-form__input { flex: 1 1 auto; }
.booking-form__multi-remove {
  flex: 0 0 auto;
  width: 36px; height: 36px;
  border-radius: 8px;
  border: 1px solid rgba(255,255,255, 0.1);
  background: rgba(255,255,255, 0.025);
  color: var(--text-muted);
  font-size: 1.2rem; line-height: 1;
  cursor: pointer;
  transition: all 0.25s var(--ease);
}
.booking-form__multi-remove:hover { color: var(--green-light); border-color: rgba(187,214,122, 0.4); }
.booking-form__multi-add {
  align-self: flex-start;
  margin-top: 0.5rem;
  padding: 0.4rem 0.2rem;
  min-height: 44px;
  display: inline-flex;
  align-items: center;
  background: none; border: none;
  color: var(--green-light);
  font-family: "Outfit", sans-serif;
  font-size: 0.8rem; font-weight: 600;
  letter-spacing: 0.02em;
  cursor: pointer;
}
.booking-form__multi-add:hover { text-decoration: underline; text-underline-offset: 3px; }

/* How we work · accordion */
.booking-form__how {
  border: 1px solid rgba(255,255,255, 0.08);
  border-radius: 12px;
  background: rgba(255,255,255, 0.015);
  overflow: hidden;
}
.booking-form__how-summary {
  display: flex; align-items: center; justify-content: space-between;
  gap: 1rem;
  padding: 0.95rem 1.1rem;
  cursor: pointer;
  list-style: none;
  font-family: "Outfit", sans-serif;
  font-size: 0.82rem; font-weight: 600;
  color: var(--green-light);
}
.booking-form__how-summary::-webkit-details-marker { display: none; }
.booking-form__how-chev { transition: transform 0.3s var(--ease); font-size: 0.9rem; }
.booking-form__how[open] .booking-form__how-chev { transform: rotate(90deg); }
.booking-form__how-body { padding: 0 1.1rem 1.1rem; }
.booking-form__how-body p {
  font-family: "Outfit", sans-serif;
  font-size: 0.8rem; font-weight: 300; line-height: 1.6;
  color: var(--text-secondary);
  margin: 0 0 0.85rem;
}
.booking-form__how-body p strong { color: #fff; font-weight: 600; }
.booking-form__how-foot {
  border-top: 1px solid rgba(255,255,255, 0.06);
  padding-top: 0.85rem;
  color: var(--text-quiet) !important;
}

/* Acknowledgements */
.booking-form__acks { display: flex; flex-direction: column; gap: 0.85rem; }
.booking-form__ack {
  display: flex; align-items: flex-start; gap: 0.65rem;
  cursor: pointer; user-select: none;
}
.booking-form__ack-input { position: absolute; opacity: 0; pointer-events: none; }
.booking-form__ack .booking-form__nda-box { margin-top: 0.1rem; }
.booking-form__ack-input:checked ~ .booking-form__nda-box {
  border-color: var(--green-primary);
  background: rgba(117,194,73, 0.08);
}
.booking-form__ack-input:checked ~ .booking-form__nda-box::after { transform: scale(1); }
.booking-form__ack-label {
  font-family: "Outfit", sans-serif;
  font-size: 0.8rem; font-weight: 300; line-height: 1.5;
  color: var(--text-secondary);
}
.booking-form__ack-label strong { color: #fff; font-weight: 600; }

.booking-confirm {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 1.5rem 0.5rem 0.5rem;
}
.booking-confirm__check { width: 64px; height: 64px; margin-bottom: 1.2rem; }
.booking-confirm__check svg { width: 100%; height: 100%; }
.booking-confirm__check-ring {
  stroke: var(--green-primary);
  stroke-width: 2.5;
  stroke-dasharray: 151;
  stroke-dashoffset: 151;
}
.booking-confirm__check-tick {
  stroke: var(--green-light);
  stroke-width: 3;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-dasharray: 40;
  stroke-dashoffset: 40;
}
.booking-confirm[data-shown] .booking-confirm__check-ring {
  animation: bookingCheckRing 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}
.booking-confirm[data-shown] .booking-confirm__check-tick {
  animation: bookingCheckTick 0.35s cubic-bezier(0.22, 1, 0.36, 1) 0.4s forwards;
}
@keyframes bookingCheckRing { to { stroke-dashoffset: 0; } }
@keyframes bookingCheckTick { to { stroke-dashoffset: 0; } }
@media (prefers-reduced-motion: reduce) {
  .booking-confirm__check-ring,
  .booking-confirm__check-tick { animation: none !important; stroke-dashoffset: 0 !important; }
}
.booking-confirm__title {
  font-family: "Playfair Display", serif;
  font-size: 1.6rem; font-weight: 700;
  color: #fff; margin: 0 0 0.6rem;
}
.booking-confirm__body {
  font-family: "Outfit", sans-serif;
  font-size: 0.88rem; font-weight: 300; line-height: 1.6;
  color: var(--text-secondary);
  max-width: 30rem; margin: 0 0 0.8rem;
}
.booking-confirm__hint {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem; color: var(--text-quiet);
  margin: 0 0 1.6rem;
}
.booking-confirm__done { min-width: 8rem; justify-content: center; }

</style>

<!-- ─── Stage 3 JSON-LD: Service + BreadcrumbList — data-driven per instrument ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "@id": "https://cryptocipher.in/recording/{{ $instrument->detail_slug }}#service",
  "serviceType": "Remote {{ $instrument->name }} recording",
  "name": "{{ $instrument->name }} Live Recording Sessions",
  "provider": { "@id": "https://cryptocipher.in/#organization" },
  "areaServed": "Worldwide",
  "url": "https://cryptocipher.in/recording/{{ $instrument->detail_slug }}",
  "description": {!! json_encode($instrument->meta_description ?: "Custom {$instrument->name} recording sessions with Indian master musicians.") !!}
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://cryptocipher.in/" },
    { "@type": "ListItem", "position": 2, "name": "Recording", "item": "https://cryptocipher.in/recording" },
    { "@type": "ListItem", "position": 3, "name": "{{ $instrument->name }}", "item": "https://cryptocipher.in/recording/{{ $instrument->detail_slug }}" }
  ]
}
</script>

@if ($instrument->faqs->isNotEmpty())
<!-- ─── Stage 4 AEO JSON-LD: FAQPage — data-driven per instrument ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "@id": "https://cryptocipher.in/recording/{{ $instrument->detail_slug }}#faq",
  "isPartOf": { "@id": "https://cryptocipher.in/#website" },
  "about": { "@id": "https://cryptocipher.in/recording#service" },
  "mainEntity": [
    @foreach ($instrument->faqs as $faq)
    {
      "@type": "Question",
      "name": {!! json_encode($faq->question) !!},
      "acceptedAnswer": { "@type": "Answer", "text": {!! json_encode($faq->plainAnswer()) !!} }
    }@if (!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endif
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "DefinedTermSet",
  "@id": "https://cryptocipher.in/glossary#indian-classical",
  "name": "Indian classical music glossary",
  "hasDefinedTerm": [
    { "@type": "DefinedTerm", "@id": "https://cryptocipher.in/glossary#raga",
      "name": "Raga", "description": "A melodic framework in Indian classical music — a set of notes with rules for ascent, descent, and characteristic phrases that define a mood." },
    { "@type": "DefinedTerm", "@id": "https://cryptocipher.in/glossary#gharana",
      "name": "Gharana", "description": "A lineage or school of Indian classical music, transmitting a distinct style of phrasing and ornamentation from teacher to student across generations." },
    { "@type": "DefinedTerm", "@id": "https://cryptocipher.in/glossary#meend",
      "name": "Meend", "description": "A smooth glide or pitch bend between notes on instruments such as the sitar or sarangi, a defining expressive ornament in Indian classical melody." },
    { "@type": "DefinedTerm", "@id": "https://cryptocipher.in/glossary#gamak",
      "name": "Gamak", "description": "A forceful oscillation or shake between notes, adding weight and ornamentation to a melodic line in Indian classical performance." }
  ]
}
</script>

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
