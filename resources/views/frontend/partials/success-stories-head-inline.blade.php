@verbatim
<!-- Search engine verification — HUMAN: paste tokens from GSC + Bing -->
<meta name="google-site-verification" content="REPLACE_GSC_TOKEN">
<meta name="msvalidate.01" content="REPLACE_BING_TOKEN">
<!-- Stage 8 · perf: connection hints (head-only) -->
<link rel="dns-prefetch" href="https://i.ytimg.com">
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
  font-family: "Outfit", sans-serif;
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
  content: "";
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

/* Reveal pattern · owned by polish.css §3 (.is-revealed) + polish.js IO.
   Local .d1–.d5 delay tokens retained for hero choreography only.
   Inline .visible class system removed (HANDOFF-NOTES #16). */
[data-reveal].d1 { transition-delay: 0.05s; }
[data-reveal].d2 { transition-delay: 0.12s; }
[data-reveal].d3 { transition-delay: 0.18s; }
[data-reveal].d4 { transition-delay: 0.24s; }
[data-reveal].d5 { transition-delay: 0.30s; }

/* ═══════════════════════════════════════════════════════════════
   HERO CHOREOGRAPHY · v4.12 (Stroke 1 / 7 — title sequence)
   Desktop only. Mobile keeps simple data-reveal fade for perf.
   Total duration ~1.6s. Each element earns its arrival.
   ═══════════════════════════════════════════════════════════════ */
@media (min-width: 1025px) and (prefers-reduced-motion: no-preference) {
  @keyframes heroAmbientBloom {
    0%   { opacity: 0; transform: scale(0.94); }
    100% { opacity: 0.6; transform: scale(1); }
  }
  @keyframes heroTitleWord {
    0%   { opacity: 0; transform: translateY(0.6em); filter: blur(8px); }
    60%  { opacity: 1; filter: blur(0); }
    100% { opacity: 1; transform: translateY(0); filter: blur(0); }
  }
  @keyframes heroVideoBloom {
    0%   { opacity: 0; transform: scale(0.97) translateY(20px); }
    100% { opacity: 1; transform: scale(1) translateY(0); }
  }

  /* Shared keyframe for fade-up elements */
  @keyframes heroFadeUp {
    0%   { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
  }
}

/* Universal eyebrow */
.eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
}
.eyebrow::before {
  content: "";
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
  font-family: "Outfit", sans-serif;
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

/* mix-blend-mode · DESIGN-SYSTEM §11 explicit ban + HANDOFF perf audit.
   Two page-body instances (body::before noise overlay, duplicated).
   Footer instance is shared-component concern, deferred to footer-pass. */
body::before {
  mix-blend-mode: normal !important;
  /* Compensate: noise was relying on overlay blend for visibility.
     With 'normal' we keep the same perceptual weight via opacity. */
  opacity: 0.025 !important;
}

/* backdrop-filter cull · 59 instances → ~10 essentials kept.
   Per HANDOFF perf ceilings: ≤4 per page is the target, but sticky-
   nav + modal + sticky price-panel + footer cards are structurally
   necessary glass surfaces. Page-body cards do NOT need frosting —
   they sit on dark backgrounds where backdrop-filter has no visible
   effect anyway (it's painting cost for nothing).
   Kept: .cc-nav, .cc-nav__dropdown, .cc-nav__mobile-panel,
         .modal__backdrop, .booking-modal__backdrop, .video-embed__close,
         .price-panel, .sidenav, footer (.ft__*).
   Culled: every other page-body surface. */
.cc-card,
.cc-format-chip,
.libs__card,
.libs__card-price,
.lib-hero__play-btn,
.patch,
.credit-card,
.description__quote,
.description__stat,
.bundle-cta,
.buybar,
.buybox,
.player-box,
.process-step,
.rec-card__price,
.sidenav__pull,
.soft-cta,
.videos__panel-btn,
.videos__thumb-play {
  backdrop-filter: none !important;
  -webkit-backdrop-filter: none !important;
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

@keyframes libsGlow {
  0%, 100% { opacity: 0.6; transform: scale(1); }
  50% { opacity: 1; transform: scale(1.08); }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
  .cc-nav, .cc-nav__link, .cc-nav__cta, .cc-nav__logo, .cc-nav__logo::before, .cc-nav__logo::after,
  .libs__eyebrow, .libs__title, .libs__subtitle, .libs__card, .libs__footer,
  .libs__ambient::before, .libs__ambient::after {
    transition-duration: 0.01ms !important;
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
  }
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
  .libinner { grid-template-columns: 1fr; gap: 0; padding: 5.75rem 1.5rem 1.5rem; }
}
@media (max-width: 560px) {
  .libinner { padding: 5.75rem 1.1rem 1.25rem; }
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
  /* gap owned by the token-based source (§ SECTION RHYTHM) to avoid the
     561–768px breakpoint-zone collision [R8]. Do not re-add gap here. */
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
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
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


/* ───────────────────────────────────────────────
   §1B PRICE PANEL — standalone section · full-width 2-col composition
   Sits below hero (after meta strip), before player.
   Left: price + features (60%) · Right: warning + Buy + secondary (40%)
   ─────────────────────────────────────────────── */


/* Hero → Price panel · negative pull tuned per breakpoint
   Desktop: ~48px gap (paired with hero meta strip)
   Mobile: ~40px gap (consistent with all other section gaps) */
#price-panel-section { margin-top: calc(-5rem + 4rem); }
@media (max-width: 1024px) {
  #price-panel-section { margin-top: 0; }
}




/* Left column: eyebrow + price */







/* Right column — Awwwards composition
   Vertical stack: Buy (focal) → Warning (below) → Secondary text-links (smallest)
   No card-y dividers, pure typographic hierarchy */


/* ── Buy CTA — Awwwards pill button with asymmetric inner content ── */












/* ── Warning — sits BELOW button (the structural change) ── */




/* ── Secondary — pure text-links, no chip backgrounds ── */







.price-panel__link.active { color: var(--green-light); }
.price-panel__link.active svg { fill: var(--green-light); stroke: var(--green-light); }
@keyframes playPulse {
  0%, 100% { transform: scale(1); opacity: 0.6; }
  50% { transform: scale(1.12); opacity: 0; }
}


/* ───────────────────────────────────────────────
   §1C TECHNICAL SPECS — inline horizontal rows (Apple-spec-sheet pattern)
   Each row: label (left, 200px) | values (right, flex 1, separated by ·)
   Compact, professional, proportional to content
   ─────────────────────────────────────────────── */












/* ───────────────────────────────────────────────
   LICENSE MODAL
   ─────────────────────────────────────────────── */

.modal.is-open { display: flex; }

@keyframes modalFadeIn { from { opacity: 0; } to { opacity: 1; } }

@keyframes modalSlideIn {
  from { opacity: 0; transform: translateY(20px) scale(0.97); }
  to   { opacity: 1; transform: translateY(0) scale(1); }
}









.modal__head .eyebrow { display: inline-flex; }
@keyframes playerSpin {
  to { transform: rotate(360deg); }
}
@keyframes playerBlockedPulse {
  0%, 100% { box-shadow: 0 4px 12px rgba(0,0,0,0.3), 0 0 0 0 rgba(212, 169, 85, 0.32); }
  50%      { box-shadow: 0 4px 12px rgba(0,0,0,0.3), 0 0 0 8px rgba(212, 169, 85, 0);    }
}

@media (max-width: 600px) {
  
  
  
  
  
  /* Larger tap area on touch — visual stays small, padding extends the hit */
  
}

@keyframes waveAdvance {
  0% { width: 0%; }
  100% { width: 100%; }
}
/* CSS-driven .playing fill DISABLED — width is now controlled by JS
   via --player-progress (real mode reads audio.currentTime,
   fake mode reads a setTimeout-driven counter). */
@keyframes waveFill {
  0% { width: 0%; }
  100% { width: 100%; }
}

/* ───────────────────────────────────────────────
   §5 PATCHES — 3-column grid
   ─────────────────────────────────────────────── */












.patch__play.playing svg { fill: var(--green-light); transform: none; }



/* ───────────────────────────────────────────────
   §6 DESCRIPTION — 2-column: prose 60% / accent rail 40%
   ─────────────────────────────────────────────── */








/* ── Accent rail — pull quote + stats ── */















/* ───────────────────────────────────────────────
   §7 CREDITS — sleek card grid (replaces full-width box)
   3 cols desktop · 2 cols tablet · 1 col mobile
   Featured + studio + wide variants for visual rhythm
   ─────────────────────────────────────────────── */







/* Featured (Producer) — slight green-amber accent */



/* Studio — full row, distinct treatment */


/* Wide — spans 2 columns on desktop */



















/* Inline list (Quality Testing — names in a row) */




/* Compact credits list — single-line rows · denser than card grid */













/* ───────────────────────────────────────────────
   §8 RECOMMENDED — small card grid
   ─────────────────────────────────────────────── */




.rec-card {
  position: relative;
  border-radius: 14px;
  background: rgba(255,255,255,0.025);
  border: 1px solid var(--glass-border);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: all 0.4s var(--ease);
  isolation: isolate;
}
.rec-card:hover {
  border-color: rgba(117,194,73,0.18);
  transform: translateY(-3px);
  box-shadow: 0 18px 50px rgba(0,0,0,0.4);
}

.rec-card__art {
  position: relative;
  aspect-ratio: 4 / 5;
  overflow: hidden;
}
.rec-card__art-bg {
  position: absolute;
  inset: 0;
  transition: transform 1s var(--ease);
  background-size: cover;
  background-position: center top;  /* matches "rule of thirds top" subject placement */
}
.rec-card__art-bg img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center top;
  display: block;
}
.rec-card:hover .rec-card__art-bg { transform: scale(1.05); }
.rec-card__art::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(5,8,16,0.6) 0%, transparent 50%);
  z-index: 1;
}
.rec-card__body {
  padding: 0.95rem 1.05rem 1.1rem;
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
  position: relative;
  z-index: 2;
}
.rec-card__meta {
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--green-light);
}
.rec-card__name {
  font-family: "Playfair Display", serif;
  font-size: 0.92rem;
  font-weight: 700;
  color: var(--text-primary);
  line-height: 1.2;
  margin: 0;
  min-width: 0;
  flex: 1 1 auto;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

/* ══════════════════════════════════════════════════════════
   SHARED CARD TITLE ROW + ACTIONS (mirrors homepage definition)
   ══════════════════════════════════════════════════════════ */


.cc-card-action-btn {
  appearance: none;
  -webkit-appearance: none;
  background: transparent;
  border: 0;
  padding: 0.32rem;
  margin: 0;
  cursor: pointer;
  border-radius: 6px;
  color: rgba(255,255,255,0.5);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 26px;
  height: 26px;
  transition:
    color 0.25s cubic-bezier(0.22, 1, 0.36, 1),
    background 0.25s cubic-bezier(0.22, 1, 0.36, 1),
    transform 0.25s cubic-bezier(0.22, 1, 0.36, 1);
}
.cc-card-action-btn svg {
  width: 14px;
  height: 14px;
  display: block;
  pointer-events: none;
}
.cc-card-action-btn:hover {
  color: #BBD67A;
  background: rgba(117,194,73,0.10);
  transform: translateY(-1px);
}
.cc-card-action-btn:active { transform: translateY(0) scale(0.94); }
.cc-card-action-btn:focus-visible {
  outline: none;
  box-shadow: 0 0 0 2px rgba(117,194,73,0.5);
}
.cc-card-action-btn.is-active { color: #BBD67A; }
.cc-card-action-btn.is-active svg { fill: rgba(117,194,73,0.18); }

@media (max-width: 768px) {
  .cc-card-action-btn { width: 30px; height: 30px; padding: 0.4rem; }
  .cc-card-action-btn svg { width: 16px; height: 16px; }
}

/* ══════════════════════════════════════════════════════════
   FORMAT CHIP — bottom-left of rec-card art
   ══════════════════════════════════════════════════════════ */


.rec-card:hover .cc-format-chip {
  background: rgba(13,17,23,0.92);
  border-color: rgba(117,194,73,0.3);
  color: #fff;
}

.rec-card__artist {
  font-size: 0.62rem;
  color: var(--text-quiet);
  font-style: italic;
  font-weight: 300;
  line-height: 1.35;
}

/* ── Price · floating pill on art (top-right) · matches shop catalogue ── */
.rec-card__price {
  position: absolute;
  top: 0.7rem;
  right: 0.7rem;
  z-index: 3;
  display: inline-flex;
  align-items: center;
  padding: 0.32rem 0.6rem;
  border-radius: 50px;
  background: rgba(13,17,23,0.78);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255,255,255,0.10);
  font-family: "Outfit", sans-serif;
  font-size: 0.66rem;
  font-weight: 700;
  letter-spacing: 0.02em;
  color: var(--text-primary);
  font-variant-numeric: tabular-nums;
  box-shadow: 0 4px 14px rgba(0,0,0,0.35);
  transition: all 0.3s var(--ease);
}
.rec-card:hover .rec-card__price {
  background: rgba(13,17,23,0.92);
  border-color: rgba(117,194,73,0.25);
}
.rec-card__price--free {
  background: rgba(117,194,73,0.18);
  border-color: rgba(117,194,73,0.4);
  color: var(--green-light);
  text-transform: uppercase;
  font-size: 0.56rem;
  letter-spacing: 0.16em;
  font-weight: 700;
}

/* Mobile rec cards — tighter body, smaller fonts to keep 2-col proportional */
@media (max-width: 600px) {
  .rec-card { border-radius: 12px; }
  .rec-card__body { padding: 0.7rem 0.75rem 0.8rem; gap: 0.3rem; }
  .rec-card__meta { font-size: 0.42rem; letter-spacing: 0.16em; }
  .rec-card__name { font-size: 0.78rem; line-height: 1.2; }
  .rec-card__artist { font-size: 0.55rem; }
  .rec-card__price { font-size: 0.58rem; padding: 0.26rem 0.5rem; top: 0.55rem; right: 0.55rem; }
}

/* ───────────────────────────────────────────────
   §9 BUNDLE callout
   ─────────────────────────────────────────────── */














/* ───────────────────────────────────────────────
   §10 RECORDING CTA + §11 HERITAGE — soft blocks
   ─────────────────────────────────────────────── */










/* ───────────────────────────────────────────────
   §12 FAQ — same pattern as LIBSHOP, smooth animation
   ─────────────────────────────────────────────── */





















/* ───────────────────────────────────────────────
   Mobile spacer for side index pull
   ─────────────────────────────────────────────── */
@media (max-width: 1024px) {
  body.has-mobile-side-index { padding-bottom: 60px; }
}


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

  /* Heritage accent — matches homepage :root (was missing on this page, so all
     var(--heritage-gold) refs fell back to currentColor/white). */
  --heritage-gold: #D4A656;

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
  font-family: "Outfit", sans-serif;
  /* Transparent so .cosmic-bg (fixed, z-index 0) shows through across
     ALL sections, not just hero. The ambient star + glow layer is the
     page's dwell-time motion — it must be visible the whole scroll. */
  background: transparent;
  color: var(--text-primary);
  line-height: 1.5;
  overflow-x: hidden;
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









/* 4-card grid · 4 columns desktop · 2 columns tablet · 1 column mobile */


@media (max-width: 560px) {
  /* Mobile: 2-column compact cards */
  
}

/* Single step card */



/* Gradient corner accent on hover */


















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
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
          background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
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
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 60%, var(--green-dark) 100%);
  color: #0d1410;
  font-family: "Outfit", sans-serif;
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

/* 8. Subtle hover lift on all CTA-class buttons · awwwards micro-interaction */
.lib-hero__buy-btn,
.bundle-cta .price-panel__buy,
.soft-cta__btn,
.recsvc-cta__btn,
.heritage-cta__btn {
  position: relative;
  transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1),
              box-shadow 0.4s cubic-bezier(0.22, 1, 0.36, 1);
}
.lib-hero__buy-btn:hover,
.bundle-cta:hover .price-panel__buy,
.soft-cta:hover .soft-cta__btn,
.recsvc-cta:hover .recsvc-cta__btn,
.heritage-cta:hover .heritage-cta__btn {
  transform: translateY(-1px);
}

/* 9. Card hover surface lift · adds dimensionality */


/* 10. Composer + meta italics · refined to brand · for premium feel */
.composer-tag, .player__composer, .credit-card__role { font-feature-settings: "liga", "kern"; }


/* PAGE-04 · drop sidenav rail · single-column main (fixes left dead-space) */
.libinner { grid-template-columns: 1fr !important; gap: 0 !important; }
.main-col { max-width: 1180px; margin: 0 auto; width: 100%; }
  /* PAGE-04: FAQ fills column, no right dead-space */

/* PAGE-04 section CSS */
/* Fallback: never let a reveal element get stranded invisible if JS/polish is delayed */
.no-js [data-reveal], html:not(.js) [data-reveal] { opacity: 1; transform: none; }

/* ═══════════════════════════════════════════════════════════════
   PAGE-04 · Success Stories · section-scoped CSS
   Section-scoped CSS for the Success Stories page. Page-specific,
   All values derive from DESIGN-SYSTEM.md. Reuses canonical tokens.
   ═══════════════════════════════════════════════════════════════ */

/* ─── Section rhythm · break the uniform 5rem gap (BRIEF §10) ──
   The gallery is the tall chapter; it gets extra breathing room
   above so the hero heading can sit alone. No two adjacent
   sections share padding. */
.stories {
  position: relative;
  padding-top: 0;             /* PAGE-04: rely on .main-col gap; no double space above */
}

/* ─── Hero · heading allowed to sit alone (BRIEF §3, checklist) ── */
.stories-hero {
  position: relative;
  max-width: 760px;
  margin-bottom: 1rem;
}
.stories-hero__eyebrow--italic {
  /* Playfair italic "Since 2010" moment — the page's handcrafted
     typography signature (different from page 03's lead-in). */
  display: block;
  margin-top: 0.85rem;
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-weight: 400;
  font-size: 0.95rem;
  letter-spacing: 0.01em;
  color: var(--text-secondary);
}
.stories-hero__sub {
  margin-top: 1rem;            /* locked heading→para gap */
  max-width: 560px;
}

/* ─── Gallery grid · equal columns, geometry holds regardless of
   how long any composer's credit string is (BRIEF: survive real
   data). auto-fill keeps cards a consistent width; the clamp on
   the teaser keeps every card the same height. ──────────────── */
.stories-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(248px, 1fr));
  gap: 1.4rem;
  margin-top: 0.5rem;   /* PAGE-04: head margin already provides separation */
}

/* ─── Card · canonical glass surface (DESIGN-SYSTEM §6) ──────── */
.story-card {
  position: relative;
  display: flex;
  flex-direction: column;
  text-align: left;
  background: rgba(255, 255, 255, 0.025);
  border: 1px solid var(--glass-border);
  border-top-color: rgba(255, 255, 255, 0.10);
  border-radius: 14px;
  overflow: hidden;
  cursor: pointer;
  /* hover transition handled by polish.css §4 (.story-card not in
     that list, so declare the same canonical transition here). */
  transition:
    transform   var(--motion-fast) var(--ease-out-cinematic),
    border-color var(--motion-fast) var(--ease-out-cinematic),
    box-shadow  var(--motion-fast) var(--ease-out-cinematic),
    background  var(--motion-fast) var(--ease-out-cinematic);
}
@media (hover: hover) and (pointer: fine) {
  .story-card:hover {
    transform: translateY(-2px);
    border-top-color: rgba(255, 255, 255, 0.12);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.3);
  }
  .story-card:hover .story-card__img { transform: scale(1.04); }
  .story-card:hover .story-card__more { color: #fff; }
  .story-card:hover .story-card__more-arrow { transform: translateX(3px); }
}
.story-card:focus-visible {
  outline: 2px solid var(--green-light);
  outline-offset: 3px;
}

/* Portrait · 4:5 to match .hol__portrait framing on homepage */
.story-card__portrait {
  position: relative;
  aspect-ratio: 4 / 5;
  background: var(--bg-surface);
  overflow: hidden;
}
.story-card__img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 22%;
  transition: transform var(--motion-medium) var(--ease-out-cinematic);
}
/* Monogram fallback — shown when img errors out (onerror toggles
   this on). Never lets a missing photo break the geometry. */
.story-card__mono {
  position: absolute;
  inset: 0;
  display: none;
  align-items: center;
  justify-content: center;
  font-family: "Playfair Display", serif;
  font-weight: 700;
  font-size: 2.4rem;
  letter-spacing: 0.02em;
  color: rgba(255, 255, 255, 0.16);
  background:
    radial-gradient(120% 90% at 50% 0%, rgba(255,255,255,0.05), transparent 60%),
    var(--bg-surface);
}
.story-card.is-mono .story-card__img  { display: none; }
.story-card.is-mono .story-card__mono { display: flex; }

/* Bottom-anchored gradient scrim so a name could overlay later if
   wanted; here it just adds depth to the portrait base. */
.story-card__portrait::after {
  content: "";
  position: absolute;
  inset: 0;
  pointer-events: none;
  background: linear-gradient(180deg, transparent 55%, rgba(8, 11, 16, 0.55) 100%);
}

/* Video flag · subtle "ready light" chip, NOT a pulsing element */
.story-card__flag {
  position: absolute;
  top: 0.65rem;
  right: 0.65rem;
  z-index: 2;
  display: inline-flex;
  align-items: center;
  gap: 0.3rem;
  padding: 0.28rem 0.55rem;
  border-radius: 50px;
  background: rgba(0, 0, 0, 0.5);
  border: 1px solid rgba(255, 255, 255, 0.10);
  color: var(--green-light);
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
}
.story-card__flag svg { width: 8px; height: 8px; fill: var(--green-light); }

/* Card body */
.story-card__body {
  display: flex;
  flex-direction: column;
  flex: 1;
  padding: 1.1rem 1.15rem 1.2rem;
}
.story-card__role {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--green-light);
  line-height: 1.4;
  margin-bottom: 0.5rem;
  /* clamp the role so a 68-word credit string never wrecks the card */
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.story-card__name {
  font-family: "Playfair Display", serif;
  font-size: 1.05rem;
  font-weight: 700;
  line-height: 1.25;
  color: #fff;
  margin-bottom: 0.6rem;
}
.story-card__teaser {
  font-family: "Outfit", sans-serif;
  font-size: 0.72rem;
  font-weight: 300;
  line-height: 1.55;
  color: var(--text-muted);
  /* the load-bearing clamp — equal card heights from unequal text */
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  margin-bottom: 1rem;
}
.story-card__more {
  margin-top: auto;
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.68rem;
  font-weight: 600;
  letter-spacing: 0.02em;
  color: var(--green-light);
  transition: color var(--motion-fast) var(--ease-out-cinematic);
}
.story-card__more-arrow {
  transition: transform var(--motion-medium) var(--ease-out-cinematic);
}

/* ════════════════════════════════════════════════════════════
   DETAIL MODAL · reuses .modal backdrop pattern from page 03
   (kept in backdrop-filter allow-list). Two-column: portrait /
   quote + lazy video. Glass panel per DESIGN-SYSTEM §6.
   ════════════════════════════════════════════════════════════ */
.story-modal {
  position: fixed;
  inset: 0;
  z-index: 1200;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1.5rem;
  opacity: 0;
  visibility: hidden;
  transition:
    opacity    0.22s ease,
    visibility 0.22s ease;
}
.story-modal.is-open { opacity: 1; visibility: visible; }

.story-modal__backdrop {
  position: absolute;
  inset: 0;
  background: rgba(5, 8, 12, 0.78);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
}

.story-modal__panel {
  position: relative;
  z-index: 1;
  width: min(880px, 100%);
  max-height: 88vh;
  overflow: hidden;
  display: grid;
  grid-template-columns: 300px 1fr;
  border-radius: 16px;
  /* canonical glass popup */
  background:
    linear-gradient(135deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02), rgba(255,255,255,0.06)),
    linear-gradient(180deg, rgba(15,22,30,0.55), rgba(10,14,19,0.65));
  backdrop-filter: blur(18px) saturate(1.8) contrast(1.05);
  -webkit-backdrop-filter: blur(18px) saturate(1.8) contrast(1.05);
  border: 1px solid rgba(255, 255, 255, 0.10);
  border-top-color: rgba(255, 255, 255, 0.18);
  border-bottom-color: rgba(255, 255, 255, 0.04);
  box-shadow:
    0 1px 0 rgba(255,255,255,0.08) inset,
    0 -1px 0 rgba(0,0,0,0.3) inset,
    0 18px 40px rgba(0,0,0,0.45),
    0 32px 80px rgba(0,0,0,0.35);
  /* push-in entrance — matches the homepage state-popup "pop" (BRIEF §5) */
  opacity: 0;
  transform: translateY(12px) scale(0.98);
  transition:
    opacity 0.2s ease,
    transform 0.26s cubic-bezier(0.22, 1, 0.36, 1);
}
.story-modal.is-open .story-modal__panel { opacity: 1; transform: translateY(0) scale(1); }

/* Left · portrait column */
.story-modal__portrait {
  position: relative;
  background: var(--bg-surface);
  overflow: hidden;
}
.story-modal__portrait img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 20%;
}
.story-modal__portrait-mono {
  position: absolute;
  inset: 0;
  display: none;
  align-items: center;
  justify-content: center;
  font-family: "Playfair Display", serif;
  font-weight: 700;
  font-size: 3.4rem;
  color: rgba(255, 255, 255, 0.16);
  background: var(--bg-surface);
}
.story-modal__portrait.is-mono img  { display: none; }
.story-modal__portrait.is-mono .story-modal__portrait-mono { display: flex; }

/* Right · content column */
.story-modal__content {
  position: relative;
  padding: 2.2rem 2.2rem 2rem;
  overflow-y: auto;
}
/* Hide the scrollbar — the global green ::-webkit-scrollbar (10px) crosses the
   panel's 16px rounded corners. Same fix as the booking modal (polish.css §).
   Scroll still works (touch / wheel). */
.story-modal__panel::-webkit-scrollbar,
.story-modal__content::-webkit-scrollbar { width: 0 !important; height: 0 !important; display: none !important; }
.story-modal__panel,
.story-modal__content { scrollbar-width: none !important; -ms-overflow-style: none !important; }
.story-modal__close {
  position: absolute;
  top: 1rem;
  right: 1rem;
  z-index: 3;
  width: 34px;
  height: 34px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid var(--glass-border);
  color: var(--text-secondary);
  transition:
    background   var(--motion-fast) var(--ease-out-cinematic),
    color        var(--motion-fast) var(--ease-out-cinematic),
    border-color var(--motion-fast) var(--ease-out-cinematic);
}
.story-modal__close:hover {
  background: rgba(255, 255, 255, 0.08);
  color: #fff;
  border-color: rgba(255, 255, 255, 0.16);
}
.story-modal__close svg { width: 16px; height: 16px; }
/* Expand tap target to 44px without changing the 34px visual disc [tap>=44].
   Invisible centered overlay; pointer hits register on the larger box. */
.story-modal__close::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 44px;
  height: 44px;
  transform: translate(-50%, -50%);
}

.story-modal__role {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--green-light);
  line-height: 1.5;
  margin-bottom: 0.6rem;
  padding-right: 2.5rem;          /* clear the close button */
}
.story-modal__name {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.5rem, 3vw, 2rem);
  font-weight: 900;
  letter-spacing: -0.01em;
  line-height: 1.1;
  color: #fff;
  margin-bottom: 1.3rem;
}
/* Quote · reuses the gold vertical-rule lead treatment from
   polish.css §6 — the page's editorial pull-quote moment. */
.story-modal__quote {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-size: clamp(0.95rem, 1.6vw, 1.12rem);
  font-weight: 400;
  line-height: 1.65;
  color: rgba(255, 255, 255, 0.82);
  border-left: 2px solid var(--heritage-gold);
  padding-left: 1.25rem;
  /* hanging punctuation — handcrafted typography (BRIEF §6) */
  text-indent: -0.42em;
}
.story-modal__quote::before { content: "“"; }
.story-modal__quote::after  { content: "”"; }

/* Lazy video container — iframe injected on open, destroyed on close */
.story-modal__video {
  position: relative;
  width: 100%;
  margin-top: 1.6rem;
  aspect-ratio: 16 / 9;
  min-height: 180px;
  border-radius: 12px;
  overflow: hidden;
  isolation: isolate;
  /* Subtle surface (not bare #000) so the moment before the thumbnail/iframe
     loads reads as an intentional placeholder, not a black flash on open. */
  background: linear-gradient(160deg, #161d26, #0c1117);
  border: 1px solid var(--glass-border);
}
.story-modal__video iframe {
  width: 100%;
  height: 100%;
  display: block;
  border: 0;
  border-radius: inherit;
}
.story-modal__video-play {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.55rem;
  color: var(--text-secondary);
  font-family: "Outfit", sans-serif;
  font-size: 0.72rem;
  font-weight: 500;
  letter-spacing: 0.04em;
}
.story-modal__video-play svg { width: 16px; height: 16px; fill: var(--green-light); }
.story-modal__video-play::before{content:"";position:absolute;inset:0;background:rgba(5,8,12,.45);transition:background .35s var(--ease-out-cinematic);}
.story-modal__video-play:hover::before{background:rgba(5,8,12,.25);}
.story-modal__video-badge{position:relative;z-index:1;display:inline-flex;align-items:center;gap:.55rem;}
.story-modal__video-badge svg{width:16px;height:16px;fill:var(--green-light);}


/* Credits chips — like .hol__credit-box */
.story-modal__credits {
  display: flex;
  flex-wrap: wrap;
  gap: 0.45rem;
  margin-top: 1.6rem;
}
.story-modal__credit {
  font-family: "Outfit", sans-serif;
  font-size: 0.58rem;
  font-weight: 500;
  letter-spacing: 0.04em;
  color: var(--text-muted);
  padding: 0.32rem 0.7rem;
  border-radius: 50px;
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid var(--glass-border);
}

/* A note line for softened-attribution items (Rahman) */
.story-modal__note {
  margin-top: 1.4rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.62rem;
  font-weight: 300;
  font-style: italic;
  line-height: 1.5;
  color: var(--text-muted);
}

/* ─── Responsive ───────────────────────────────────────────── */
@media (max-width: 768px) {
  .stories-grid { grid-template-columns: repeat(2, 1fr); gap: 0.9rem; }  /* PAGE-04: 2 per row */
  .story-card__body { padding: 0.85rem 0.9rem 1rem; }
  .story-card__name { font-size: 0.92rem; }

  .story-modal__panel {
    grid-template-columns: 1fr;
    max-height: 92vh;
    overflow-y: auto;
    /* Mobile: solid opaque panel — the glass gradients + backdrop-filter render
       see-through on Android (filter often degraded) and the filter repaint
       causes a flash on open. Use a solid surface, no panel backdrop-filter. */
    background: #11161d;
    backdrop-filter: none;
    -webkit-backdrop-filter: none;
    /* No scale/translate on mobile: animating a transform on a scrollable
       (overflow:auto) panel re-rasterizes it mid-open → flash on cards whose
       content exceeds the viewport (huttner/desai/swihart/maas/kjsingh).
       The parent .story-modal opacity fade is enough. */
    transform: none;
    transition: none;
  }
  .story-modal.is-open .story-modal__panel { transform: none; }
  .story-modal__portrait { aspect-ratio: 16 / 10; }
  .story-modal__content { padding: 1.6rem 1.4rem 1.6rem; }
  /* Stronger scrim so the page behind is fully hidden; drop blur (cheap + no flash). */
  .story-modal__backdrop { background: rgba(5, 8, 12, 0.92); backdrop-filter: none; -webkit-backdrop-filter: none; }
}

/* ─── Reduced motion ───────────────────────────────────────── */
@media (prefers-reduced-motion: reduce) {
  .story-card__img,
  .story-modal__panel { transition: none; transform: none; }
}

</style>
<!-- ═══ Shared polish layer · DO NOT inline · loads last in head ═══ -->
<!-- ─── Stage 3 JSON-LD: Review[] (12 real on-page composer endorsements) + BreadcrumbList. No AggregateRating (no on-page rating system). Rahman = notability asset (Stage 5), not a structured Review. ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "@id": "https://cryptocipher.in/#organization",
  "review": [
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Jörg Hüttner"
      },
      "reviewBody": "I'm trying out Crypto Cipher sample libraries which I really like — really great sounding and super useful across productions, with a simple but useful interface in Kontakt. My favourites are the Tongue Drum, Swarmandal and Tabla."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Nainita Desai"
      },
      "reviewBody": "Crypto Cipher is using great Indian talent from all over the country. There is no other company out there doing quite what you do. Please keep producing more unusual libraries that are so inspiring to film and television composers."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "John Swihart"
      },
      "reviewBody": "Really loving these new libraries. The Tabla is very playable, the Swarmandal sounds amazing, and the Dholak is amazing. The loops are great and they come with great options. Very happy working with them."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "BT"
      },
      "reviewBody": "Absolutely freaking out on these sample libraries. If you're looking for unusual Kontakt libraries, check out Crypto Cipher."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Shankar Tucker"
      },
      "reviewBody": "Good job, Crypto Cipher. Please keep making cool libraries, especially loop libraries at the level of quality you used for the Dholak Loops. I'll definitely be getting the next one."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Sanchit Balhara"
      },
      "reviewBody": "Crypto Cipher is doing really a great job in bringing the revolution at world level, and I wish them all the best."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Michael Maas"
      },
      "reviewBody": "I hired Crypto Cipher directly from India for live solo sitar and they did a really great job — I never imagined a sound quality and performance like the one they gave us. I highly recommend the company's services and plugins."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Pete Lockett"
      },
      "reviewBody": "It's quite a versatile set of instruments — definitely worth checking out Crypto Cipher. I'm going to bring them into some of my own productions."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Adriano Clemente"
      },
      "reviewBody": "It's really interesting to see what kind of solutions people can come up with using these libraries — a great way to get out of your usual set of tools and sounds."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Laurent Zillani"
      },
      "reviewBody": "It's a great collection of Indian instruments and sound design. I particularly like the Solo Tabla and Solo Dholak, which are beautifully recorded and give you a lot of options."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "K.J. Singh"
      },
      "reviewBody": "The team at Crypto Cipher has taken great pains to record high-quality sounds. They've got very talented musicians, and deep programming has gone into making them playable and as authentic as possible."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "David Buckley"
      },
      "reviewBody": "I love the samples from Crypto Cipher. They have been recorded and programmed with such care and attention to detail. They stand in a different league to most other ethnic sample libraries because they offer something authentic."
    }
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://cryptocipher.in/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Success Stories",
      "item": "https://cryptocipher.in/testimonials"
    }
  ]
}
</script>

<!-- ─── Stage 4 AEO JSON-LD: FAQPage (testimonials Common questions) ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "@id": "https://cryptocipher.in/testimonials#faq",
  "isPartOf": { "@id": "https://cryptocipher.in/#website" },
  "mainEntity": [
    { "@type": "Question", "name": "Are these endorsements real, or paid placements?",
      "acceptedAnswer": { "@type": "Answer", "text": "Real, and unpaid. Every quote comes from a working composer, producer, or engineer who used our instruments or recording services on actual productions. Where a video exists, it is the artist in their own words — unscripted, unpaid." } },
    { "@type": "Question", "name": "Can I hire the same musicians these composers used?",
      "acceptedAnswer": { "@type": "Answer", "text": "Yes. Several composers here hired our players directly for bespoke live recordings. We record any of our Indian instrumentalists or vocalists for your cue: direct the performance, request retakes, lock the take. 3–4 day delivery, sync-cleared, AI-training-free." } },
    { "@type": "Question", "name": "Which library should I start with?",
      "acceptedAnswer": { "@type": "Answer", "text": "It depends on the cue. For percussion-led scoring, Solo Tabla and the Tabla/Dholak loop libraries. For melodic and devotional work, Voices of Ancient India and Voices of Ragas. For ornamentation, Swarmandal and Tarangs." } },
    { "@type": "Question", "name": "Can I use these in Hollywood, OTT, and sync placements?",
      "acceptedAnswer": { "@type": "Answer", "text": "Yes — globally. The single license covers theatrical film, OTT and streaming, broadcast, advertising, sync, and games. Every library is sync-cleared and AI-training-free at the performance-contract level." } },
    { "@type": "Question", "name": "What makes your recordings different from other Indian sample libraries?",
      "acceptedAnswer": { "@type": "Answer", "text": "Two things: lineage — our players are working performers from named gharanas and traditions, not session fill, so every recording carries inherited phrasing; and depth — deep scripting, full articulations, and authentic ornamentation built for cue scoring." } }
  ]
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

<style id="cc-poster-card">
.stories-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:1.5rem}
.story-card{position:relative;aspect-ratio:3/4.4;text-decoration:none;display:block;border-radius:22px;overflow:hidden;text-align:left;cursor:pointer;background:linear-gradient(150deg,#1a2230,#0d1117);border:1px solid rgba(255,255,255,.08);box-shadow:0 12px 38px rgba(0,0,0,.34);transition:border-color .5s var(--ease),box-shadow .5s var(--ease),transform .5s var(--ease)}
.story-card__img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center 12%;display:block;filter:saturate(1.04) contrast(1.07) brightness(.96);transition:filter .6s var(--ease),transform .9s var(--ease)}
.story-card__mono{display:none;position:absolute;inset:0;align-items:center;justify-content:center;font-family:"Playfair Display",serif;font-size:3rem;font-weight:700;color:rgba(255,255,255,.16)}
.story-card.is-mono .story-card__img{display:none}.story-card.is-mono .story-card__mono{display:flex}
.story-card::before{content:"";position:absolute;inset:0;z-index:1;pointer-events:none;background:radial-gradient(120% 75% at 50% 10%,transparent 38%,rgba(5,8,16,.34) 100%),linear-gradient(180deg,rgba(255,255,255,.06) 0%,transparent 20%)}
.story-card__sheen{position:absolute;inset:0;z-index:2;pointer-events:none;background:linear-gradient(125deg,rgba(255,255,255,.12) 0%,rgba(255,255,255,.02) 16%,transparent 34%);opacity:.65;transition:opacity .6s var(--ease),transform 1s var(--ease)}
.story-card__flag{position:absolute;top:.7rem;right:.7rem;z-index:5;display:inline-flex;align-items:center;gap:.32rem;padding:.3rem .6rem;border-radius:50px;background:rgba(5,8,16,.82);border:1px solid rgba(255,255,255,.14);font-size:.48rem;font-weight:600;letter-spacing:.06em;text-transform:uppercase;color:rgba(255,255,255,.88)}
.story-card__flag svg{width:8px;height:8px;fill:var(--green-light)}
.story-card__caption{position:absolute;left:0;right:0;bottom:0;z-index:4;padding:2.8rem .95rem 1rem;background:linear-gradient(180deg,transparent,rgba(5,8,16,.5) 28%,rgba(5,8,16,.94));display:flex;flex-direction:column;gap:0}
.story-card__role{font-size:.58rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--green-light);transition:color .4s var(--ease)}
.story-card__name{font-family:"Playfair Display",serif;font-size:1.22rem;font-weight:700;color:#fff;line-height:1.1;transition:color .4s var(--ease)}
.story-card__quote{font-family:"Playfair Display",serif;font-style:italic;font-size:.74rem;font-weight:400;color:rgba(255,255,255,.78);line-height:1.3;margin-top:.1rem;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;position:relative;padding-left:.7rem}
.story-card__quote::before{content:""";position:absolute;left:0;top:-.05em;color:var(--heritage-gold);font-size:.95rem;line-height:1}
/* Fixed 2-row film-credit zone (homepage .crow box style, always visible —
   no hover reveal). JS fitCredits() hides tags that overflow row 2 and keeps
   a single "+more" chip at the end. Fixed height = identical cards, no clip,
   no overlap. Full filmography lives in the modal (tap a card). */
.story-card__credits{display:flex;flex-wrap:wrap;gap:.3rem;margin-top:.5rem;height:3.4em;overflow:hidden;align-content:flex-start}
.story-card__credit{display:inline-flex;align-items:center;padding:.2rem .5rem;border-radius:5px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);font-size:.6rem;font-weight:500;color:rgba(255,255,255,.85);white-space:nowrap;line-height:1.2}
.story-card__credit--more{background:transparent;border-color:rgba(212,166,86,.4);color:var(--heritage-gold)}
.story-card__credit[hidden]{display:none}
@media(hover:hover){
 .story-card:hover{border-color:rgba(212,166,86,.45);box-shadow:0 22px 56px rgba(0,0,0,.46),0 0 16px rgba(212,166,86,.05);transform:translateY(-5px)}
 .story-card:hover .story-card__img{filter:saturate(1.12) contrast(1.09) brightness(1.0);transform:scale(1.045)}
 .story-card:hover .story-card__sheen{opacity:1;transform:translateX(8%)}
 .story-card:hover .story-card__role{color:var(--heritage-gold)}
}
.stories{scroll-margin-top:90px;margin-top:-3.25rem}
.stories-hero{margin-bottom:0.5rem}
/* Hero title gradient-clip em + symmetric eyebrow hairline — parity with
   homepage .crow head. Scoped to .stories-hero to avoid sweeping shared
   .section__title / .eyebrow on other sections. */
.stories-hero .section__title em{font-style:italic;background:linear-gradient(100deg,#fff,var(--green-light) 60%,var(--heritage-gold) 100%);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;color:transparent}
.stories-hero .eyebrow::after{content:"";width:22px;height:1px;background:linear-gradient(90deg,transparent,var(--green-primary))}
@media(max-width:768px){
  .stories{margin-top:-2.75rem}
  .stories-hero{margin-bottom:0.75rem}
  /* Hide the "Few Words From The Pros" eyebrow on mobile (declutter); flex gap
     it contributed collapses automatically. Trim head bottom margin to balance. */
  .stories-hero .eyebrow{display:none}
  .stories-hero .section__head{gap:.7rem;margin-bottom:1.25rem}
  .stories-grid{grid-template-columns:repeat(2,1fr);gap:.85rem;margin-top:0.5rem}
  .story-card{aspect-ratio:3/4.5}
  .story-card__caption{padding:1.8rem .7rem .9rem;gap:0}
  .story-card__role{font-size:.5rem;letter-spacing:.08em;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
  .story-card__name{font-size:.95rem;line-height:1.12}
  /* Mobile is dense — drop the quote here; full testimonial is in the modal.
     Desktop keeps the quote. Credit zone reclaims the freed space. */
  .story-card__quote{display:none}
  .story-card__credits{gap:.28rem;margin-top:.05rem;height:3em}
  .story-card__credit{font-size:.5rem;padding:.15rem .4rem;max-width:100%;overflow:hidden;text-overflow:ellipsis}
}
@media(max-width:360px){
  /* Narrowest cards (~136px): shrink the name a touch so the longest name
     ("Adriano Clemente") stays on ONE line — keeps every card's name/credits
     vertically aligned. 360px+ keeps the larger .95rem. */
  .story-card__name{font-size:.88rem}
}
</style>
@endverbatim
