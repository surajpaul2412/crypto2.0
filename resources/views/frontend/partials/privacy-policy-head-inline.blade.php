@verbatim
<!-- Search engine verification — HUMAN: paste tokens from GSC + Bing -->
<meta name="google-site-verification" content="REPLACE_GSC_TOKEN">
<meta name="msvalidate.01" content="REPLACE_BING_TOKEN">
<!-- Stage 8 · perf: connection hints (head-only) -->
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="dns-prefetch" href="https://www.youtube.com">
<!-- Consolidated shared layers (Phase 1+2) · load before inline <style>, before polish.css -->

<style>
/* Critical: park skip-link before first paint (FOUC). */
.skip-link { position: absolute; left: 12px; top: -56px; z-index: 10000; }

/* ═══════════════════════════════════════════════════════════════
   LIBINNER-001 · v4 LOCKED
   Voices of Ancient India · single inner page
   ═══════════════════════════════════════════════════════════════ */
* { box-sizing: border-box; margin: 0; padding: 0; }

html { /* scroll-behavior:smooth removed — Safari scroll-back jank; Lenis handles Chrome */ -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

body {
  font-family: 'Outfit', sans-serif;
  background: transparent;
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
  content: '';
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 1;
  opacity: 0.035;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.7' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  background-size: 200px;
  mix-blend-mode: overlay;
}

/* Selection / scrollbar */
::selection { background: rgba(117,194,73,0.25); color: #fff; }
::-webkit-scrollbar { width: 10px; }
::-webkit-scrollbar-track { background: var(--bg-darker); }
::-webkit-scrollbar-thumb { background: rgba(117,194,73,0.18); border-radius: 10px; }
::-webkit-scrollbar-thumb:hover { background: rgba(117,194,73,0.32); }

/* Reveal pattern · OWNED BY polish.css §3 · polish.js adds .is-revealed
   Page-local block removed (was: [data-reveal].visible) — HANDOFF #16 trap.
   Page-local .d1–.d5 stagger classes are inert markup now; harmless. */

/* [dead-code purge] lib-hero choreography removed — no .lib-hero in markup (legal template). */

/* Universal eyebrow */
.eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  font-family: 'Outfit', sans-serif;
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
}
.eyebrow::before {
  content: '';
  width: 22px;
  height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}

.gradient-text {
  background: linear-gradient(135deg, var(--green-primary), var(--green-light));
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* Reusable CTA system */
.cta {
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  padding: 0.75rem 1.5rem;
  border-radius: 50px;
  font-family: 'Outfit', sans-serif;
  font-size: 0.74rem;
  font-weight: 600;
  letter-spacing: 0.02em;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: all 0.4s var(--ease);
  white-space: nowrap;
  border: 1px solid transparent;
}
.cta--primary {
  background: linear-gradient(135deg, var(--green-light), var(--green-primary));
  color: #0a0d12;
  border-color: transparent;
  box-shadow: 0 8px 24px rgba(0,0,0, 0.35), inset 0 1px 0 rgba(255,255,255, 0.22);
}
.cta--primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 14px 36px rgba(0,0,0, 0.4), 0 0 24px rgba(117,194,73, 0.22), inset 0 1px 0 rgba(255,255,255, 0.25);
}
.cta--ghost {
  background: rgba(117,194,73,0.04);
  border-color: rgba(117,194,73,0.15);
  color: var(--text-secondary);
}
.cta--ghost:hover {
  color: #fff;
  border-color: rgba(117,194,73,0.3);
  background: rgba(117,194,73,0.08);
  transform: translateY(-2px);
}
.cta--text {
  padding: 0.55rem 0.5rem;
  color: var(--text-muted);
  border-radius: 4px;
}
.cta--text:hover { color: #fff; }
.cta__arrow { transition: transform 0.3s ease; display: inline-block; }
.cta:hover .cta__arrow { transform: translateX(5px); }

@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
  [data-reveal] { opacity: 1 !important; transform: none !important; }
}

@keyframes logoTextureDrift {
  0%, 100% { transform: translate(0, 0) rotate(0deg); }
  33% { transform: translate(5%, -3%) rotate(1deg); }
  66% { transform: translate(-3%, 4%) rotate(-1deg); }
}

@keyframes logoShimmer {
  0%, 100% { left: -100%; }
  50% { left: 150%; }
}

/* ═══════════════════════════════════════════════════════════════
   LIBINNER LAYOUT — 2 column with sticky side index
   v4.9 · Proportional balance:
   ┌─[A: 48px]─[ MENU 340 ]─[B: 80px]─[ PAGE ]─[C: 48px]─┐
   A=C (symmetry), B=1.66×A (generous gap between menu and page)
   ═══════════════════════════════════════════════════════════════ */
.libinner {
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
  .libinner { grid-template-columns: 1fr; gap: 0; padding: 6.5rem 1.5rem 3rem; }
}
@media (max-width: 560px) {
  .libinner { padding: 6.5rem 1.1rem 2.5rem; }
}
@keyframes pullPulse {
  0%, 100% { opacity: 0.6; transform: translateX(-50%) scaleX(1); }
  50%      { opacity: 0.95; transform: translateX(-50%) scaleX(1.12); }
}

/* ───────────────────────────────────────────────
   MAIN COLUMN — section frame
   ─────────────────────────────────────────────── */
.main-col {
  display: flex;
  flex-direction: column;
  gap: 5rem;
  min-width: 0;
}

.section {
  position: relative;
}
.section__head {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-bottom: 2rem;
}
.section__title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
}
.section__sub {
  font-family: 'Outfit', sans-serif;
  font-size: clamp(0.78rem, 1vw, 0.9rem);
  font-weight: 300;
  color: var(--text-muted);
  line-height: 1.65;
  max-width: 580px;
}

/* ───────────────────────────────────────────────
   §1C TECHNICAL SPECS — inline horizontal rows (Apple-spec-sheet pattern)
   Each row: label (left, 200px) | values (right, flex 1, separated by ·)
   Compact, professional, proportional to content
   ─────────────────────────────────────────────── */
.tech-specs { /* [dead-code purge] tech-specs/tech-row removed — no .tech-specs in markup (legal template). */ }

/* ───────────────────────────────────────────────
   LICENSE MODAL
   ─────────────────────────────────────────────── */
.modal { /* [dead-code purge] license modal removed — no .modal in markup (legal template). */ }

/* ───────────────────────────────────────────────
   §5 PATCHES — 3-column grid
   ─────────────────────────────────────────────── */
.patches { /* [dead-code purge] patches/patch removed — no .patches in markup (legal template). */ }

/* ───────────────────────────────────────────────
   §6 DESCRIPTION — 2-column: prose 60% / accent rail 40%
   ─────────────────────────────────────────────── */
.description { /* [dead-code purge] description block removed — no .description in markup (legal template). */ }

/* ───────────────────────────────────────────────
   §7 CREDITS — sleek card grid (replaces full-width box)
   3 cols desktop · 2 cols tablet · 1 col mobile
   Featured + studio + wide variants for visual rhythm
   ─────────────────────────────────────────────── */
.credits-grid { /* [dead-code purge] credits-grid/credit-card/credits-list/credit-row removed — not in markup (legal template). */ }

/* ───────────────────────────────────────────────
   §8 RECOMMENDED — small card grid
   ─────────────────────────────────────────────── */
/* [dead-code purge] recommended/rec-card/cc-card/cc-format-chip removed — no such markup on legal page (was copied product template). */

/* ══════════════════════════════════════════════════════════
   SHARED CARD TITLE ROW + ACTIONS (mirrors homepage definition)
   ══════════════════════════════════════════════════════════ */

/* ══════════════════════════════════════════════════════════
   FORMAT CHIP — bottom-left of rec-card art
   ══════════════════════════════════════════════════════════ */

/* ───────────────────────────────────────────────
   §9 BUNDLE callout
   ─────────────────────────────────────────────── */
/* [dead-code purge] bundle-cta removed — no .bundle-cta markup on legal page (was copied product template). */

/* ───────────────────────────────────────────────
   §10 RECORDING CTA + §11 HERITAGE — soft blocks
   ─────────────────────────────────────────────── */
/* [dead-code purge] soft-cta removed — no .soft-cta markup on legal page (was copied product template). */

/* ───────────────────────────────────────────────
   §12 FAQ — same pattern as LIBSHOP, smooth animation
   ─────────────────────────────────────────────── */
.faq {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
  max-width: 920px;
}
.faq__item {
  border-radius: 12px;
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  overflow: hidden;
  transition: all 0.4s var(--ease);
}
.faq__item[open] {
  border-color: rgba(117,194,73,0.16);
  background: rgba(117,194,73,0.02);
}
.faq__item:hover { border-color: rgba(255,255,255,0.08); }

.faq__q {
  list-style: none;
  cursor: pointer;
  padding: 1.05rem 1.4rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1.2rem;
  font-family: 'Playfair Display', serif;
  font-size: 0.88rem;
  font-weight: 700;
  color: var(--text-primary);
  transition: color 0.3s ease;
}
.faq__q::-webkit-details-marker { display: none; }

.faq__icon {
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
.faq__q:hover .faq__icon {
  background: rgba(117,194,73,0.18);
  border-color: rgba(187,214,122, 0.45);
}
.faq__icon::before, .faq__icon::after {
  content: '';
  position: absolute;
  background: var(--green-light);
  border-radius: 1px;
  transition: background 0.3s var(--ease);
}
.faq__icon::before { width: 12px; height: 1.4px; }
.faq__icon::after  { width: 1.4px; height: 12px; }
.faq__item[open] .faq__icon {
  background: rgba(117,194,73,0.32);
  border-color: var(--green-primary);
  transform: rotate(45deg);
  box-shadow:
    0 0 16px rgba(117,194,73,0.5),
    0 0 32px rgba(187,214,122, 0.15),
    inset 0 1px 0 rgba(255,255,255, 0.12);
}
.faq__item[open] .faq__icon::before,
.faq__item[open] .faq__icon::after { background: #fff; }

.faq__a-wrap {
  display: grid;
  grid-template-rows: 0fr;
  transition: grid-template-rows 0.45s var(--ease);
}
.faq__item[open] .faq__a-wrap { grid-template-rows: 1fr; }
.faq__a {
  overflow: hidden;
  padding: 0 1.4rem;
  max-height: 0;
  opacity: 0;
  transition: padding 0.45s var(--ease), max-height 0.45s var(--ease), opacity 0.4s var(--ease) 0.05s;
  font-size: 0.74rem;
  line-height: 1.7;
  color: var(--text-muted);
  font-weight: 300;
}
.faq__item[open] .faq__a {
  padding: 0 1.4rem 1.3rem;
  max-height: 600px;
  opacity: 1;
}

/* ───────────────────────────────────────────────
   Mobile spacer for side index pull
   ─────────────────────────────────────────────── */
/* mobile side-index clearance is now canonical in shell.css (Phase-5) */

/* ═══════════════════════════════════════════════════════════════
   CC-TOKENS-V1 · APPENDED AT END (cascade override)
   ═══════════════════════════════════════════════════════════════ */
/* ═══════════════════════════════════════════════════════════════
   CRYPTO CIPHER® · DESIGN TOKENS · v1.0
   Single source of truth · imported by every page
   ═══════════════════════════════════════════════════════════════ */
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

html { /* scroll-behavior:smooth removed — Safari jank; Lenis handles Chrome */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

body {
  font-family: 'Outfit', sans-serif;
  background: var(--bg-deep);
  color: var(--text-primary);
  line-height: 1.5;
  overflow-x: hidden;
  position: relative;
}

::selection { background: rgba(117,194,73,0.25); color: #fff; }

/* Subtle noise overlay · part of design DNA */
body::before {
  content: '';
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 1;
  opacity: 0.035;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.7' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  background-size: 200px;
  mix-blend-mode: overlay;
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
  content: '';
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
  content: '';
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
  will-change: transform, opacity;
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
  0%, 100% { opacity: var(--twinkMin, 0.55); }
  50%      { opacity: var(--twinkMax, 1); }
}
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
.section-eyebrow {
  font-family: 'Outfit', sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.section-eyebrow::before {
  content: '';
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.section-title {
  font-family: 'Playfair Display', serif;
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
.section-sub {
  font-family: 'Outfit', sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
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
  .instr { padding: 6.5rem 1.1rem 2.5rem; }
}
@keyframes pullPulse {
  0%, 100% { opacity: 0.6; transform: translateX(-50%) scaleX(1); }
  50%      { opacity: 0.95; transform: translateX(-50%) scaleX(1.12); }
}

/* ═══════════════════════════════════════════════════════════════
   CC-PROCESS · 6-step booking process section · INSTR-PROCESS-001
   Reusable across instrument pages + recording-services
   ═══════════════════════════════════════════════════════════════ */

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
  .instr-process__head { margin-bottom: 1.8rem; gap: 0.7rem; }
}
.instr-process__eyebrow {
  font-family: 'Outfit', sans-serif;
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
  content: '';
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-process__title {
  font-family: 'Playfair Display', Georgia, serif;
  font-size: clamp(1.5rem, 2.6vw, 2.1rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
  padding-bottom: 0.05rem;
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
  font-family: 'Outfit', sans-serif;
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
@media (max-width: 560px) {
  /* Mobile: 2-column compact cards */
  .instr-process__grid { grid-template-columns: repeat(2, 1fr); gap: 0.55rem; }
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
  content: '';
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
  font-family: 'Playfair Display', Georgia, serif;
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
  font-family: 'Playfair Display', Georgia, serif;
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
  .process-step__num { font-size: 0.95rem; }
  .process-step__title { font-size: 0.92rem; line-height: 1.22; }
  .process-step__body { font-size: 0.74rem; line-height: 1.45; }
  .process-step__meta {
    font-size: 0.55rem;
    letter-spacing: 0.05em;
    padding-top: 0.5rem;
    margin-top: 0.3rem;
    gap: 0.35rem;
  }
  .process-step__meta-dot { width: 4px; height: 4px; }
}
.process-step__body {
  font-family: 'Outfit', sans-serif;
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
  font-family: 'Outfit', sans-serif;
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

@media (prefers-reduced-motion: reduce) {
  .process-step:hover { transform: none !important; }
  .process-step:hover .process-step__num { transform: none !important; }
}

/* ═══════════════════════════════════════════════════════════════
   BOOKING MODAL · slide-up sheet on desktop · full-bleed on mobile
   Glass aesthetic to match site DNA · trap focus when open
   ═══════════════════════════════════════════════════════════════ */
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
  font-family: 'Outfit', sans-serif;
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
  content: '';
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.booking-modal__title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.5rem, 2.6vw, 2.1rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.booking-modal__title-accent {
  display: inline-block;
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
          background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.booking-modal__sub {
  font-family: 'Outfit', sans-serif;
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
  font-family: 'Outfit', sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--text-quiet);
}
.booking-form__input {
  font-family: 'Outfit', sans-serif;
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
  align-items: center;
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
  content: '';
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
  font-family: 'Outfit', sans-serif;
  font-size: 0.85rem;
  color: var(--text-secondary);
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
  font-family: 'Outfit', sans-serif;
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
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 60%, var(--green-dark) 100%);
  color: #0d1410;
  font-family: 'Outfit', sans-serif;
  font-size: 0.85rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  border: none;
  border-radius: 999px;
  cursor: pointer;
  white-space: nowrap;
  transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.4s ease;
  box-shadow:
    0 8px 22px rgba(117,194,73, 0.3),
    inset 0 1px 0 rgba(255,255,255, 0.3);
}
.booking-form__submit:hover {
  transform: translateY(-2px);
  box-shadow:
    0 14px 32px rgba(117,194,73, 0.45),
    0 0 30px rgba(187,214,122, 0.25),
    inset 0 1px 0 rgba(255,255,255, 0.4);
}
.booking-form__submit:active { transform: translateY(0); }

/* Lock body scroll when modal is open */
body.booking-locked { overflow: hidden; }

/* ═══════════════════════════════════════════════════════════════
   INLINE VIDEO PLAY · iframe replaces card content while playing
   Card retains its shape, radius, shadow · close button restores poster
   ═══════════════════════════════════════════════════════════════ */
.video-embed {
  position: absolute;
  inset: 0;
  z-index: 20;
  background: #000;
  border-radius: inherit;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.4s cubic-bezier(0.22, 1, 0.36, 1);
}
.video-embed.is-active {
  opacity: 1;
  pointer-events: auto;
}
.video-embed iframe {
  width: 100%;
  height: 100%;
  display: block;
  border: 0;
  border-radius: inherit;
}
.video-embed__close {
  position: absolute;
  top: 12px;
  right: 12px;
  z-index: 2;
  width: 36px; height: 36px;
  border-radius: 50%;
  background: rgba(15, 22, 18, 0.85);
  border: 1px solid rgba(117,194,73, 0.35);
  color: var(--green-light);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
}
.video-embed__close svg { width: 14px; height: 14px; }
.video-embed__close:hover {
  background: rgba(117,194,73, 0.20);
  border-color: var(--green-primary);
  transform: rotate(90deg);
}
/* [dead-code purge] lib-hero/videos__panel is-playing overlay rules removed — no such markup on legal page. */

/* ═══════════════════════════════════════════════════════════════
   AWWWARDS-LEVEL FINAL POLISH · v1.0
   Grain texture · refined scrollbar · focus halo · selection · smooth scroll
   ═══════════════════════════════════════════════════════════════ */

/* 1. Film grain overlay · 4% noise · cinematic surface */
.cosmic-bg::before {
  background-image:
    radial-gradient(ellipse 100% 50% at 50% 110%, rgba(20, 28, 38, 0.4) 0%, transparent 60%),
    radial-gradient(ellipse 30% 100% at 0% 50%, rgba(0,0,0, 0.35) 0%, transparent 50%),
    radial-gradient(ellipse 30% 100% at 100% 50%, rgba(0,0,0, 0.35) 0%, transparent 50%);
}
.cosmic-bg__beam {
  background-image:
    linear-gradient(180deg, rgba(255,255,255, 0.018) 0%, transparent 25%),
    linear-gradient(0deg, rgba(0,0,0, 0.35) 0%, transparent 22%),
    /* Subtle noise grain via tiny SVG */
    url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' /><feColorMatrix values='0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.04 0' /></filter><rect width='100' height='100' filter='url(%23n)' /></svg>");
  background-size: auto, auto, 280px 280px;
  background-repeat: no-repeat, no-repeat, repeat;
}

/* 2. Refined scrollbar · matches palette */
::-webkit-scrollbar { width: 10px; height: 10px; }
::-webkit-scrollbar-track { background: rgba(0, 0, 0, 0.3); }
::-webkit-scrollbar-thumb {
  background: rgba(255,255,255, 0.08);
  border-radius: 10px;
  border: 2px solid rgba(0, 0, 0, 0.6);
}
::-webkit-scrollbar-thumb:hover { background: rgba(117,194,73, 0.35); }
* { scrollbar-color: rgba(255,255,255, 0.08) rgba(0, 0, 0, 0.3); scrollbar-width: thin; }

/* 3. Focus-visible halo · accessibility + DNA */
*:focus { outline: none; }
*:focus-visible {
  outline: 2px solid rgba(117,194,73, 0.65);
  outline-offset: 3px;
  border-radius: 6px;
  transition: outline-offset 0.2s var(--ease);
}
button:focus-visible, a:focus-visible {
  box-shadow: 0 0 0 4px rgba(117,194,73, 0.15);
}

/* 4. Selection · brand */
::selection { background: rgba(117,194,73, 0.3); color: #fff; }

/* 5. Image smoothing · prevents jagged edges on retina */
img { image-rendering: -webkit-optimize-contrast; }

/* 6. Smooth scroll · with respect for reduced-motion */
html { /* scroll-behavior:smooth removed — Safari jank; Lenis handles Chrome */ }
@media (prefers-reduced-motion: reduce) {
  html { scroll-behavior: auto; }
}

/* 7. Tap highlight · brand color, not blue */
* { -webkit-tap-highlight-color: rgba(117,194,73, 0.18); }

/* 8 & 9. [dead-code purge] CTA hover-lift (lib-hero/bundle/soft/recsvc/heritage) + card hover-lift (patch/description__stat/credit-card/recommended__card) removed — no such markup on legal page. */

/* 10. [dead-code purge] composer-tag/player__composer/credit-card__role font-feature rule removed — no such markup on legal page. */

</style>
<!-- ═══════════════════════════════════════════════════════════════
     LEGAL-001 v2 · Canon-aligned shared template
     Mirrors: .libinner / .instr / .recsvc grid skeleton
     ═══════════════════════════════════════════════════════════════ -->
<style>
/* ─── Main grid (canon-aligned) ─────────────────────────────── */
/* ─── Sidebar (per-page TOC, lives in --side-index-w column) ─── */
/* Fallback: when sticky fails (some browser/extension contexts), JS adds .legal-side--fixed */
.legal-side--fixed {
  position: fixed;
  top: 7rem;
  /* left + width are set by JS based on .legal-main bounding rect */
}
/* ─── Main column (canon-aligned) ─────────────────────────────── */
/* Reveal pattern · OWNED BY polish.css §3 · was .libinner [data-reveal].is-visible */

/* ═══════════════════════════════════════════════════════════════
   HERO  ·  canon page-H1
   ═══════════════════════════════════════════════════════════════ */
.legal-hero {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  max-width: 880px;
}
.legal-hero__eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  font-family: 'Outfit', sans-serif;
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
}

/* Legal eyebrow ("Legal · Privacy/Terms/Cookies") hidden on mobile per standard.
   Hero is a flex column with gap:1.5rem, so removing this element auto-reclaims the
   space — no manual margin needed. Desktop keeps the eyebrow. */
@media (max-width: 560px) {
  .legal-hero__eyebrow { display: none; }
}
.legal-hero__eyebrow::before {
  content: '';
  width: 22px;
  height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.legal-hero__title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(2.2rem, 4.6vw, 3.8rem);
  font-weight: 900;
  letter-spacing: -0.02em;
  line-height: 1.05;
  color: var(--text-primary);
  margin: 0;
}
.legal-hero__title em {
  font-style: normal;
  display: inline-block;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.legal-hero__sub {
  font-family: 'Outfit', sans-serif;
  font-size: clamp(0.78rem, 1vw, 0.9rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  max-width: 680px;
  margin: 0;
}

/* Meta chips */
.legal-hero__meta {
  display: flex;
  flex-wrap: wrap;
  gap: 0.6rem;
  margin-top: 0.5rem;
}
.legal-meta-chip {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.45rem 0.9rem;
  border-radius: 50px;
  background: rgba(255,255,255, 0.04);
  border: 1px solid var(--glass-border);
  border-top-color: rgba(255,255,255, 0.14);
  font-family: 'Outfit', sans-serif;
  font-size: 0.62rem;
  font-weight: 500;
  letter-spacing: 0.04em;
  color: var(--text-secondary);
}
.legal-meta-chip__label {
  font-size: 0.46rem;
  font-weight: 700;
  letter-spacing: 0.24em;
  text-transform: uppercase;
  color: var(--text-muted);
}
.legal-meta-chip__value { color: var(--text-primary); }
.legal-meta-chip--draft .legal-meta-chip__value { color: var(--heritage-gold); }

/* Draft banner */
.legal-draft-banner {
  display: flex;
  align-items: flex-start;
  gap: 0.85rem;
  padding: 1rem 1.2rem;
  border-radius: 12px;
  background: var(--heritage-gold-faint);
  border: 1px solid var(--heritage-gold-soft);
  margin-top: 1rem;
}
.legal-draft-banner svg {
  width: 16px; height: 16px;
  color: var(--heritage-gold);
  flex-shrink: 0;
  margin-top: 0.15rem;
}
.legal-draft-banner__text {
  font-family: 'Outfit', sans-serif;
  font-size: 0.72rem;
  font-weight: 400;
  line-height: 1.55;
  color: var(--text-secondary);
}
.legal-draft-banner__text strong {
  color: var(--heritage-gold);
  font-weight: 600;
}

/* ═══════════════════════════════════════════════════════════════
   SECTIONS  ·  canon-aligned H2
   ═══════════════════════════════════════════════════════════════ */
.legal-section { scroll-margin-top: 8rem; max-width: 860px; }
.legal-section__num {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  font-family: 'JetBrains Mono', 'Courier New', monospace;
  font-size: 0.58rem;
  font-weight: 500;
  letter-spacing: 0.18em;
  color: var(--green-light);
  margin-bottom: 0.85rem;
}
.legal-section__num::before {
  content: '';
  width: 22px;
  height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.legal-section__title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  letter-spacing: -0.01em;
  line-height: 1.15;
  color: var(--text-primary);
  margin: 0 0 1.5rem 0;
}

/* Prose */
.legal-prose {
  font-family: 'Outfit', sans-serif;
  font-size: 0.92rem;
  font-weight: 300;
  line-height: 1.75;
  color: var(--text-secondary);
}
.legal-prose p { margin-bottom: 1.1rem; }
.legal-prose p:last-child { margin-bottom: 0; }
.legal-prose strong { color: var(--text-primary); font-weight: 600; }
.legal-prose em { color: var(--green-light); font-style: italic; }
.legal-prose a {
  color: var(--green-light);
  text-decoration: underline;
  text-underline-offset: 3px;
  text-decoration-thickness: 1px;
  transition: color 0.25s ease;
}
.legal-prose a:hover { color: var(--text-primary); }

.legal-prose h3 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.05rem, 1.6vw, 1.25rem);
  font-weight: 700;
  color: var(--text-primary);
  margin-top: 2rem;
  margin-bottom: 0.85rem;
  letter-spacing: -0.005em;
  line-height: 1.3;
}
.legal-prose h3:first-child { margin-top: 0; }

.legal-prose ul,
.legal-prose ol {
  margin: 0.5rem 0 1.3rem 1.4rem;
  padding: 0;
}
.legal-prose li {
  margin-bottom: 0.6rem;
  padding-left: 0.35rem;
}
.legal-prose li::marker { color: var(--green-light); }

/* Table */
.legal-table-wrap {
  margin: 1.4rem 0 1.6rem;
  overflow-x: auto;
  border-radius: 12px;
  background: rgba(255,255,255, 0.02);
  border: 1px solid var(--glass-border);
}
.legal-table {
  width: 100%;
  border-collapse: collapse;
  font-family: 'Outfit', sans-serif;
  font-size: 0.78rem;
  line-height: 1.55;
}
.legal-table thead th {
  text-align: left;
  padding: 0.9rem 1.1rem;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--green-light);
  background: rgba(117,194,73, 0.04);
  border-bottom: 1px solid var(--glass-border);
  white-space: nowrap;
}
.legal-table tbody td {
  padding: 0.9rem 1.1rem;
  color: var(--text-secondary);
  border-bottom: 1px solid rgba(255,255,255, 0.04);
  vertical-align: top;
  font-weight: 300;
}
.legal-table tbody tr:last-child td { border-bottom: none; }
.legal-table tbody td strong { color: var(--text-primary); font-weight: 600; }
.legal-table tbody td em { color: var(--green-light); font-style: italic; }

/* Callout */
.legal-callout {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
  padding: 1.3rem 1.5rem;
  margin: 1.4rem 0;
  background: rgba(117,194,73, 0.04);
  border: 1px solid rgba(117,194,73, 0.18);
  border-left: 2px solid var(--green-primary);
  border-radius: 10px;
}
.legal-callout__label {
  font-family: 'Outfit', sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
}
.legal-callout__body {
  font-family: 'Outfit', sans-serif;
  font-size: 0.85rem;
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-secondary);
}
.legal-callout__body strong { color: var(--text-primary); font-weight: 600; }

/* Doc footer */
.legal-doc-footer {
  margin-top: 1.5rem;
  padding-top: 2.5rem;
  border-top: 1px solid var(--glass-border);
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}
.legal-doc-footer__row {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
}
.legal-doc-footer__cell { flex: 1 1 240px; }
.legal-doc-footer__cell-label {
  font-family: 'Outfit', sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--text-muted);
  margin-bottom: 0.6rem;
}
.legal-doc-footer__cell-body {
  font-family: 'Outfit', sans-serif;
  font-size: 0.78rem;
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-secondary);
}
.legal-doc-footer__cell-body strong { color: var(--text-primary); }

/* Cross-doc nav */
.legal-cross-nav {
  display: flex;
  flex-wrap: wrap;
  gap: 0.85rem;
  margin-top: 1.5rem;
}

/* Cross-nav (Privacy / Terms / Cookie) · mobile = full-width STACK.
   Forcing one row clipped/overlapped the labels on <=414px (3 long labels cannot
   fit 320-414px). Stacking guarantees no clip/overlap on every device. */
@media (max-width: 560px) {
  .legal-cross-nav {
    flex-wrap: wrap;
    flex-direction: column;
    align-items: stretch;
    gap: 0.5rem;
  }
  .legal-cross-nav__link {
    width: 100%;
    justify-content: center;
    padding: 0.85rem 1rem;
    font-size: 0.7rem;
    letter-spacing: 0.03em;
    white-space: nowrap;
  }
}
.legal-cross-nav__link {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.7rem 1.2rem;
  border-radius: 50px;
  background: transparent;
  border: 1px solid var(--cta-secondary-border);
  color: var(--cta-secondary-fg);
  font-family: 'Outfit', sans-serif;
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  text-decoration: none;
  transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
}
.legal-cross-nav__link:hover {
  background: rgba(117,194,73, 0.06);
  border-color: rgba(117,194,73, 0.5);
}
.legal-cross-nav__link--current {
  background: rgba(117,194,73, 0.08);
  border-color: rgba(117,194,73, 0.4);
  color: var(--text-primary);
  pointer-events: none;
}

/* ═══════════════════════════════════════════════════════════════
   RESPONSIVE  ·  canon ladder
   ═══════════════════════════════════════════════════════════════ */
@media (max-width: 1024px) {
  .legal-main {
    grid-template-columns: 1fr;
    gap: 0;
    padding: 7rem 1.5rem 8rem;  /* 8rem bottom = clear the 64px pull-tab + breathing room */
    z-index: auto;
  }

  /* Mobile bottom-sheet drawer (canon-matched, scoped to legal-side) */
  /* The original sidebar header becomes the pull-tab on mobile */
  /* Hide the desktop gradient line on mobile, replace with full-width green hairline */
  /* Mobile pull-grip: tiny pill above the label */
  .legal-side.is-open @keyframes legalPullPulse {
    0%, 100% { opacity: 0.6; transform: translateX(-50%) scaleX(1); }
    50%      { opacity: 0.95; transform: translateX(-50%) scaleX(1.12); }
  }

  /* List scrolls inside the drawer */
  }
@media (max-width: 768px) {
  .legal-hero__meta { gap: 0.5rem; }
  .legal-meta-chip { font-size: 0.55rem; padding: 0.4rem 0.75rem; }
  .legal-prose { font-size: 0.85rem; }
  .legal-table { font-size: 0.7rem; }
  .legal-table thead th,
  .legal-table tbody td { padding: 0.75rem 0.85rem; }
}
@media (max-width: 560px) {
  .legal-main { padding: 6.5rem 1.1rem 2.5rem; }
  .legal-prose { font-size: 0.82rem; line-height: 1.7; }
  .legal-table-wrap {
    margin-left: -0.5rem;
    margin-right: -0.5rem;
    border-radius: 8px;
  }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
  .libinner [data-reveal] { opacity: 1; transform: none; transition: none; }
}

/* Privacy variant: when stuck, vertically centered in viewport (not top:7rem) */

/* Inline table of contents (sits between hero and section 1) */
@media (max-width: 768px) {
  }

/* Anchor link on hover (small # next to section H2) */
.legal-section__title {
  position: relative;
}
.legal-section__title::after {
  content: '#';
  position: absolute;
  margin-left: 0.5rem;
  color: var(--green-light);
  opacity: 0;
  transition: opacity 0.25s ease;
  font-weight: 400;
}
.legal-section:hover .legal-section__title::after {
  opacity: 0.4;
}

/* ═══════════════════════════════════════════════════════════════
   PAGE-08 KILL-LIST · verified by grep · perf override
   Mirrors page-03 pattern. Page-08 has NO legal-body backdrop-filter
   declarations (all 59 source-level instances belong to inherited
   components that don't render in this page's DOM — verified by grep,
   selectors like .libs__card, .videos__panel-btn, .recsvc__*, etc.).
   Only the mix-blend-mode page-body overlay needs neutralising here.
   ═══════════════════════════════════════════════════════════════ */

/* mix-blend-mode ban (DESIGN-SYSTEM §11) · neutralises both page-body
   noise overlays (declared twice on body::before, lines ~45 + ~4613).
   .ft__svantra footer overlay deliberately untouched (shared concern). */
body::before {
  mix-blend-mode: normal !important;
  opacity: 0.025 !important; /* compensate for lost overlay blend */
}
</style>
<!-- Canonical polish layer · LAST link before 
@endverbatim
