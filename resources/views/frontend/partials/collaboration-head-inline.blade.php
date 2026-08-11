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

/* Reveal pattern */
[data-reveal] {
  opacity: 0;
  transform: translateY(24px);
  transition: opacity 0.9s var(--ease), transform 0.9s var(--ease);
}
[data-reveal].visible { opacity: 1; transform: translateY(0); }
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
.modal {
  position: fixed;
  inset: 0;
  z-index: 200;
  display: none;
  align-items: center;
  justify-content: center;
  padding: 2rem 1.5rem;
}
.modal.is-open { display: flex; }
.modal__backdrop {
  position: absolute;
  inset: 0;
  background: rgba(5, 8, 16, 0.85);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  animation: modalFadeIn 0.3s ease forwards;
}
@keyframes modalFadeIn { from { opacity: 0; } to { opacity: 1; } }
.modal__panel {
  position: relative;
  z-index: 1;
  width: 100%;
  max-width: 720px;
  max-height: 85vh;
  overflow-y: auto;
  border-radius: 18px;
  background: linear-gradient(135deg, rgba(15, 20, 28, 0.98), rgba(8, 12, 18, 0.98));
  border: 1px solid rgba(255,255,255,0.08);
  box-shadow: 0 30px 80px rgba(0,0,0,0.7), 0 0 60px rgba(117,194,73,0.05);
  padding: 2.5rem 2.5rem 2rem;
  animation: modalSlideIn 0.4s var(--ease) forwards;
}
@keyframes modalSlideIn {
  from { opacity: 0; transform: translateY(20px) scale(0.97); }
  to   { opacity: 1; transform: translateY(0) scale(1); }
}
.modal__panel::-webkit-scrollbar { width: 6px; }
.modal__panel::-webkit-scrollbar-thumb { background: rgba(117,194,73,0.18); border-radius: 6px; }
@media (max-width: 600px) { .modal__panel { padding: 1.6rem 1.3rem 1.4rem; } }

.modal__close {
  position: absolute;
  top: 1.1rem;
  right: 1.1rem;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--glass-border);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-muted);
  cursor: pointer;
  transition: all 0.25s ease;
}
.modal__close:hover {
  background: rgba(117,194,73,0.1);
  color: #fff;
  border-color: rgba(117,194,73,0.3);
}
.modal__close svg { width: 12px; height: 12px; }

.modal__head {
  margin-bottom: 1.6rem;
  padding-bottom: 1.4rem;
  border-bottom: 1px solid var(--glass-border);
}
.modal__head .eyebrow { display: inline-flex; }
.modal__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.4rem, 2.4vw, 1.85rem);
  font-weight: 900;
  line-height: 1.15;
  color: var(--text-primary);
  margin: 0.7rem 0 0.5rem;
}
.modal__sub {
  font-size: 0.78rem;
  color: var(--text-muted);
  font-weight: 300;
  line-height: 1.55;
}

.modal__body {
  display: flex;
  flex-direction: column;
  gap: 1.4rem;
}
.modal__row {
  display: flex;
  flex-direction: column;
  gap: 0.7rem;
  padding: 1.1rem 1.2rem;
  border-radius: 12px;
  background: rgba(255,255,255,0.02);
  border: 1px solid var(--glass-border);
}
.modal__row--allow { border-color: rgba(117,194,73,0.2); background: rgba(117,194,73,0.04); }
.modal__row--deny  { border-color: rgba(180,140,50,0.2); background: rgba(180,140,50,0.04); }
.modal__row-label {
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  font-family: "Playfair Display", serif;
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--text-primary);
}
.modal__row--allow .modal__row-label svg {
  width: 16px; height: 16px;
  padding: 4px;
  border-radius: 50%;
  background: rgba(117,194,73,0.18);
  color: var(--green-light);
}
.modal__row--deny .modal__row-label svg {
  width: 16px; height: 16px;
  padding: 4px;
  border-radius: 50%;
  background: rgba(180,140,50,0.18);
  color: var(--warning);
}

.modal__row-list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}
.modal__row-list li {
  font-size: 0.74rem;
  line-height: 1.6;
  color: var(--text-secondary);
  font-weight: 300;
  display: flex;
  align-items: flex-start;
  gap: 0.55rem;
}
.modal__row-list li::before {
  content: "";
  flex-shrink: 0;
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: var(--text-quiet);
  margin-top: 0.55rem;
}
.modal__row--allow .modal__row-list li::before { background: var(--green-light); }
.modal__row--deny  .modal__row-list li::before { background: var(--warning); }

.modal__foot {
  margin-top: 0.4rem;
  padding-top: 1.2rem;
  border-top: 1px solid var(--glass-border);
}
.modal__foot p {
  font-size: 0.7rem;
  color: var(--text-muted);
  font-weight: 300;
  line-height: 1.6;
}
.modal__link {
  color: var(--green-light);
  text-decoration: underline;
  text-decoration-color: rgba(117,194,73,0.3);
  text-underline-offset: 3px;
  transition: text-decoration-color 0.25s ease;
}
.modal__link:hover { text-decoration-color: var(--green-light); }

@keyframes waveAdvance {
  0% { width: 0%; }
  100% { width: 100%; }
}
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
  /* body.has-mobile-side-index { padding-bottom: 60px; }  ← removed (dead space below footer; no fixed bottom bar uses it) */
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

  /* Text hierarchy */
  --text-primary: #ffffff;
  --text-secondary: rgba(255,255,255,0.65);
  --text-muted: rgba(255,255,255,0.45);
  --text-tertiary: rgba(255,255,255,0.38);
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
  --section-gap-desktop: 3.75rem; /* 60px */
  --section-gap-tablet: 2.75rem; /* 44px */
  --section-gap-mobile: 2rem;    /* 32px */

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
  background-color: #0d1117; /* §3C — no white overscroll flash on mobile */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

body {
  font-family: "Outfit", sans-serif;
  background: var(--bg-deep);
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


/* ═══════════════════════════════════════════════════════════════
   HERITAGE-001 · scoped CSS · adapts library-inner shell tokens
   All cards uniform geometry — long titles clamp at 2 lines,
   meta at 1 line. No card grows taller than its siblings.
   ═══════════════════════════════════════════════════════════════ */

/* Shared eyebrow rule used across all heritage section heads */


/* Section heads (highlights / archive use this pattern) */

/* Standardize section-to-section spacing across all heritage sections */




/* ───────────────────────────────────────────────
   §2 FEATURED — single hero spotlight card
   ─────────────────────────────────────────────── */

.heritage-feature-card {
  position: relative;
  display: grid;
  grid-template-columns: 1fr;
  background: rgba(255, 255, 255, 0.02);
  border: 1px solid rgba(187, 214, 122, 0.15);
  border-radius: 16px;
  overflow: hidden;
  cursor: pointer;
  transition: transform 0.45s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              border-color 0.45s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              box-shadow 0.45s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-feature-card:hover {
  transform: translateY(-3px);
  border-color: rgba(187, 214, 122, 0.35);
  box-shadow: 0 24px 80px -32px rgba(117, 194, 73, 0.25);
}
.heritage-feature-card__media {
  position: relative;
  aspect-ratio: 21 / 9;
  background: linear-gradient(135deg, #0b0e15 0%, #161c2a 100%);
  overflow: hidden;
}
.heritage-feature-card__thumb {
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.85;
  transition: opacity 0.5s, transform 0.7s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-feature-card:hover .heritage-feature-card__thumb {
  opacity: 1;
  transform: scale(1.03);
}
.heritage-feature-card__vignette {
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 60% 80% at 50% 50%, transparent 0%, rgba(13, 17, 23, 0.35) 70%, rgba(13, 17, 23, 0.85) 100%),
    linear-gradient(to bottom, transparent 30%, rgba(13, 17, 23, 0.7) 100%);
  pointer-events: none;
}
.heritage-feature-card__play {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  transition: transform 0.4s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
  pointer-events: none;
}
.heritage-feature-card:hover .heritage-feature-card__play {
  transform: translate(-50%, -50%) scale(1.08);
}
.heritage-feature-card__badges {
  position: absolute;
  top: 20px;
  left: 20px;
  display: flex;
  gap: 0.5rem;
  z-index: 2;
}



.heritage-feature-card__duration {
  position: absolute;
  top: 20px;
  right: 20px;
  background: rgba(13, 17, 23, 0.65);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 6px;
  padding: 5px 10px;
  font-family: "Outfit", sans-serif;
  font-size: 0.7rem;
  font-weight: 500;
  color: rgba(255, 255, 255, 0.92);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  z-index: 2;
}
.heritage-feature-card__body {
  padding: 1.8rem 2rem 2rem;
}
.heritage-feature-card__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.4rem, 2.2vw, 1.9rem);
  font-weight: 600;
  line-height: 1.2;
  color: var(--text-primary);
  margin: 0 0 0.6rem;
  letter-spacing: -0.01em;
}
.heritage-feature-card__meta {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  letter-spacing: 0.05em;
  color: rgba(255, 255, 255, 0.5);
  margin: 0 0 1rem;
  text-transform: uppercase;
}
.heritage-feature-card__desc {
  font-family: "Outfit", sans-serif;
  font-size: 0.95rem;
  line-height: 1.7;
  color: rgba(255, 255, 255, 0.72);
  font-weight: 300;
  margin: 0;
  max-width: 70ch;
}

/* ───────────────────────────────────────────────
   §3 HIGHLIGHTS — 3-up curated cards
   ─────────────────────────────────────────────── */


/* ───────────────────────────────────────────────
   §4 ARCHIVE — filter chips + 3-col grid
   ─────────────────────────────────────────────── */



.heritage-chip.is-active {
  background: rgba(117, 194, 73, 0.18);
  border-color: rgba(187, 214, 122, 0.5);
  color: var(--green-light);
}




/* Hidden state for filter */
.heritage-card.is-hidden {
  display: none;
}

/* ───────────────────────────────────────────────
   Universal heritage-card · uniform geometry
   Title clamps at 2 lines, meta at 1 line.
   No card grows taller than its siblings.
   ─────────────────────────────────────────────── */
.heritage-card {
  display: flex;
  flex-direction: column;
  background: rgba(255, 255, 255, 0.02);
  border: 1px solid rgba(255, 255, 255, 0.07);
  border-radius: 12px;
  overflow: hidden;
  cursor: pointer;
  transition: transform 0.4s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              border-color 0.4s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              box-shadow 0.4s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-card:hover {
  transform: translateY(-3px);
  border-color: rgba(187, 214, 122, 0.3);
  box-shadow: 0 16px 48px -20px rgba(117, 194, 73, 0.2);
}
.heritage-card__media {
  position: relative;
  aspect-ratio: 16 / 9;
  background: linear-gradient(135deg, #0b0e15, #161c2a);
  overflow: hidden;
}
.heritage-card__thumb {
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.78;
  transition: opacity 0.45s, transform 0.6s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-card:hover .heritage-card__thumb {
  opacity: 1;
  transform: scale(1.04);
}
.heritage-card__vignette {
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 50% 50%, transparent 35%, rgba(13, 17, 23, 0.55) 100%),
    linear-gradient(to bottom, transparent 50%, rgba(13, 17, 23, 0.6) 100%);
  pointer-events: none;
}
.heritage-card__play {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0.85;
  transition: transform 0.35s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)), opacity 0.35s;
  pointer-events: none;
}
.heritage-card:hover .heritage-card__play {
  transform: translate(-50%, -50%) scale(1.1);
  opacity: 1;
}
.heritage-card__duration {
  position: absolute;
  top: 10px;
  right: 10px;
  background: rgba(13, 17, 23, 0.7);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 5px;
  padding: 3px 7px;
  font-family: "Outfit", sans-serif;
  font-size: 0.65rem;
  font-weight: 500;
  color: rgba(255, 255, 255, 0.9);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  z-index: 2;
}

.heritage-card__body {
  padding: 1rem 1.1rem 1.1rem;
  display: flex;
  flex-direction: column;
  gap: 0.3rem;
  flex: 1;
  min-height: 92px;
}
.heritage-card__title {
  font-family: "Playfair Display", serif;
  font-size: 1rem;
  font-weight: 600;
  line-height: 1.3;
  color: var(--text-primary);
  margin: 0;
  letter-spacing: -0.005em;
  /* Clamp to 2 lines — guarantees uniform card height regardless of title length */
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  min-height: calc(1.3em * 2);
}
.heritage-card__meta {
  font-family: "Outfit", sans-serif;
  font-size: 0.75rem;
  font-weight: 300;
  color: rgba(255, 255, 255, 0.5);
  margin: 0;
  /* Clamp to 1 line */
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Highlight cards — slightly larger typography but same geometry pattern */
.heritage-card--highlight .heritage-card__title {
  font-size: 1.1rem;
}
.heritage-card--highlight .heritage-card__body {
  padding: 1.1rem 1.2rem 1.2rem;
  min-height: 100px;
}

/* Load more */





/* ───────────────────────────────────────────────
   Archive outbound · discrete link to full YouTube playlist
   For users who want continuous background play
   ─────────────────────────────────────────────── */








/* ═══════════════════════════════════════════════════════════════
   CINEHERO · Netflix-style featured film hero
   Backdrop video/thumb fills container · title + tagline + meta
   overlay bottom-left · play button + secondary CTA below · all
   in one cinematic frame visible on page load.
   ═══════════════════════════════════════════════════════════════ */
.heritage-cinehero {
  padding-top: 0;
  margin-bottom: 6rem;
}

@media (max-width: 640px) {
  /* Standardize section-to-section rhythm on mobile · 64px everywhere */
  .heritage-cinehero,
  .heritage-highlights,
  .heritage-archive {
    margin-bottom: 4rem;
  }
  
  
}
.heritage-cinehero__section-head {
  display: inline-flex;
  align-items: center;
  gap: 0.8rem;
  margin: 0 0 1rem;
}
.heritage-cinehero__section-rule {
  display: inline-block;
  width: 28px;
  height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.heritage-cinehero__section-label {
  font-family: "Outfit", sans-serif;
  font-size: 0.62rem;
  font-weight: 600;
  letter-spacing: 0.32em;
  text-transform: uppercase;
  color: var(--green-light);
}
.heritage-cinehero__card {
  position: relative;
  overflow: hidden;
  border-radius: 20px;
  width: 100%;
  /* Cinematic 21:9 on desktop, taller on smaller screens for content room */
  aspect-ratio: 21 / 10;
  min-height: 0; /* Don't force min-height — aspect-ratio handles it */
  cursor: pointer;
  border: 1px solid rgba(187, 214, 122, 0.18);
  /* Cinematic fallback when thumb doesn't load · radial bloom + atmospheric depth */
  background:
    radial-gradient(ellipse 80% 60% at 70% 40%,
      rgba(117, 194, 73, 0.18) 0%,
      rgba(117, 194, 73, 0.05) 40%,
      transparent 70%),
    radial-gradient(ellipse 60% 80% at 30% 80%,
      rgba(187, 214, 122, 0.08) 0%,
      transparent 60%),
    linear-gradient(135deg, #0b0e15 0%, #1a2030 40%, #0d1117 100%);
  transition: border-color 0.45s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              box-shadow 0.45s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-cinehero__card:hover {
  border-color: rgba(187, 214, 122, 0.22);
  box-shadow:
    0 36px 90px -24px rgba(0, 0, 0, 0.8),
    0 12px 32px -8px rgba(0, 0, 0, 0.55),
    inset 0 1px 0 rgba(255, 255, 255, 0.06);
  transform: translateY(-2px);
}

/* Backdrop layer: thumb image · later swap for muted YouTube preview */
.heritage-cinehero__backdrop {
  position: absolute;
  inset: 0;
  z-index: 0;
}
.heritage-cinehero__thumb {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center center;
  opacity: 0.7;
  transition: opacity 0.6s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              transform 0.9s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-cinehero__card:hover .heritage-cinehero__thumb {
  opacity: 0.85;
  transform: scale(1.025);
}
/* Cinematic scrim: dark left + bottom for text legibility, transparent center-right */
.heritage-cinehero__scrim {
  position: absolute;
  inset: 0;
  background:
    linear-gradient(to right,
      rgba(13, 17, 23, 0.92) 0%,
      rgba(13, 17, 23, 0.75) 35%,
      rgba(13, 17, 23, 0.35) 65%,
      rgba(13, 17, 23, 0.55) 100%
    ),
    linear-gradient(to bottom,
      rgba(13, 17, 23, 0.45) 0%,
      transparent 30%,
      transparent 60%,
      rgba(13, 17, 23, 0.88) 100%
    );
  pointer-events: none;
}

/* Content overlay (left-aligned, anchored to bottom-left like Netflix) */
.heritage-cinehero__content {
  position: absolute;
  inset: 0;
  z-index: 2;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 2.8rem 3.2rem 2.8rem;
  max-width: 760px;
  pointer-events: none;
}
.heritage-cinehero__content > * {
  pointer-events: auto;
}

.heritage-cinehero__crumb {
  position: absolute;
  top: 2rem;
  left: 3rem;
  display: flex;
  align-items: center;
  gap: 0.6rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.7rem;
  font-weight: 500;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.55);
}
.heritage-cinehero__crumb a {
  color: rgba(255, 255, 255, 0.7);
  transition: color 0.3s;
}
.heritage-cinehero__crumb a:hover {
  color: var(--green-light);
}
.heritage-cinehero__crumb-sep {
  color: rgba(255, 255, 255, 0.25);
}
.heritage-cinehero__crumb-current {
  color: var(--green-light);
}

.heritage-cinehero__eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 0.7rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.62rem;
  font-weight: 600;
  letter-spacing: 0.32em;
  text-transform: uppercase;
  color: var(--green-light);
  margin: 0 0 0.75rem;
}
.heritage-cinehero__rule {
  display: inline-block;
  width: 28px;
  height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}

.heritage-cinehero__title {
  font-family: "Playfair Display", serif;
  font-weight: 500;
  font-size: clamp(32px, 3.8vw, 50px);
  line-height: 1.08;
  letter-spacing: -0.022em;
  color: #fff;
  margin: 0 0 1.1rem;
  padding-bottom: 4px;
  max-width: 16ch;
  text-shadow: 0 2px 24px rgba(0, 0, 0, 0.4);
}
.heritage-cinehero__title em {
  font-style: italic;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
  padding-bottom: 0.08em;
}

.heritage-cinehero__tagline {
  font-family: "Outfit", sans-serif;
  font-size: clamp(14px, 1vw, 16px);
  line-height: 1.6;
  color: rgba(255, 255, 255, 0.78);
  font-weight: 300;
  margin: 0 0 1.3rem;
  max-width: 58ch;
  text-shadow: 0 1px 12px rgba(0, 0, 0, 0.5);
}

.heritage-cinehero__meta {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  gap: 0.55rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  letter-spacing: 0.04em;
  color: rgba(255, 255, 255, 0.65);
  margin: 0 0 1.5rem;
  text-shadow: 0 1px 8px rgba(0, 0, 0, 0.5);
}
.heritage-cinehero__chip {
  display: inline-flex;
  align-items: center;
  padding: 4px 10px;
  border-radius: 4px;
  background: rgba(117, 194, 73, 0.18);
  border: 1px solid rgba(187, 214, 122, 0.35);
  color: var(--green-light);
  font-size: 0.62rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  text-transform: uppercase;
}
.heritage-cinehero__dot {
  color: rgba(255, 255, 255, 0.35);
}

.heritage-cinehero__actions {
  display: flex;
  gap: 0.7rem;
  flex-wrap: wrap;
}

.heritage-cinehero__play-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  padding: 13px 26px;
  background: var(--green-light);
  border: 1px solid var(--green-light);
  border-radius: 999px;
  color: #0d1117;
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  cursor: pointer;
  transition: all 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-cinehero__play-btn:hover {
  background: #fff;
  border-color: #fff;
  transform: translateY(-1px);
  box-shadow: 0 16px 40px -16px rgba(187, 214, 122, 0.55);
}
.heritage-cinehero__play-btn svg {
  margin-left: 1px;
}

.heritage-cinehero__secondary-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  padding: 13px 22px;
  background: rgba(255, 255, 255, 0.06);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 999px;
  color: rgba(255, 255, 255, 0.92);
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  font-weight: 500;
  letter-spacing: 0.04em;
  cursor: pointer;
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  transition: all 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-cinehero__secondary-btn:hover {
  background: rgba(255, 255, 255, 0.14);
  border-color: rgba(255, 255, 255, 0.35);
  color: #fff;
}

/* Center play button — visible on hover (desktop) and always (mobile) for tap affordance */
.heritage-cinehero__center-play {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 3;
  background: transparent;
  border: 0;
  padding: 0;
  opacity: 0;
  pointer-events: none;
  cursor: pointer;
  transition: opacity 0.4s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              transform 0.4s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-cinehero__card:hover .heritage-cinehero__center-play {
  opacity: 1;
  pointer-events: auto;
}
.heritage-cinehero__center-play:hover {
  transform: translate(-50%, -50%) scale(1.08);
}

.heritage-cinehero__duration {
  position: absolute;
  top: 1.8rem;
  right: 2rem;
  z-index: 2;
  background: rgba(13, 17, 23, 0.65);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 6px;
  padding: 6px 12px;
  font-family: "Outfit", sans-serif;
  font-size: 0.75rem;
  font-weight: 500;
  color: rgba(255, 255, 255, 0.92);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
}

/* ─── Responsive ─────────────────────────────────────────── */
@media (max-width: 1024px) {
  .heritage-cinehero__card {
    aspect-ratio: 16 / 11;
    min-height: 0;
  }
  .heritage-cinehero__content {
    padding: 2rem 2.4rem 2.2rem;
    max-width: 90%;
  }
  .heritage-cinehero__crumb {
    top: 1.6rem;
    left: 2.4rem;
  }
  .heritage-cinehero__duration {
    top: 1.4rem;
    right: 1.5rem;
  }
  .heritage-cinehero__scrim {
    background:
      linear-gradient(to right,
        rgba(13, 17, 23, 0.88) 0%,
        rgba(13, 17, 23, 0.72) 50%,
        rgba(13, 17, 23, 0.55) 100%
      ),
      linear-gradient(to bottom,
        rgba(13, 17, 23, 0.55) 0%,
        transparent 35%,
        rgba(13, 17, 23, 0.92) 100%
      );
  }
}
@media (max-width: 640px) {
  /* Mobile hero · 4:5 aspect → ~444px tall on 355w · content anchored to TOP */
  .heritage-cinehero__card {
    aspect-ratio: 4 / 5;
    min-height: 0;
    border-radius: 16px;
  }
  /* Content overlay: anchor TOP, push down with padding so content fills frame */
  .heritage-cinehero__content {
    position: absolute;
    inset: 0;
    justify-content: flex-end;
    padding: 1.5rem 1.4rem 1.6rem;
    max-width: 100%;
  }
  .heritage-cinehero__crumb {
    top: 1.1rem;
    left: 1.4rem;
    font-size: 0.58rem;
    letter-spacing: 0.14em;
  }
  .heritage-cinehero__duration {
    top: 1rem;
    right: 1.1rem;
    padding: 3px 8px;
    font-size: 0.62rem;
  }
  .heritage-cinehero__title {
    font-size: clamp(28px, 8vw, 38px);
    margin: 0 0 0.7rem;
  }
  .heritage-cinehero__tagline {
    font-size: 0.84rem;
    line-height: 1.55;
    margin: 0 0 0.85rem;
    max-width: 100%;
  }
  .heritage-cinehero__meta {
    font-size: 0.66rem;
    gap: 0.35rem;
    margin: 0 0 1rem;
  }
  .heritage-cinehero__chip {
    font-size: 0.54rem;
    padding: 3px 8px;
  }
  .heritage-cinehero__play-btn,
  .heritage-cinehero__secondary-btn {
    padding: 10px 16px;
    font-size: 0.76rem;
  }
  /* Center play — visible for tap */
  .heritage-cinehero__center-play {
    opacity: 0.85;
    pointer-events: auto;
    top: 28%;
  }
  .heritage-cinehero__center-play svg {
    width: 56px;
    height: 56px;
  }
}

/* ───────────────────────────────────────────────
   LIGHTBOX MODAL · Netflix-style fullscreen player
   Medium-speed fade (400ms cubic-bezier)
   ─────────────────────────────────────────────── */
/* ═══════════════════════════════════════════════════════════════
   LIGHTBOX · Centered card-style popup
   Matches homepage Heritage Video frame aesthetic: rounded 28px,
   deep shadow, subtle green halo, soft scale-in animation.
   Click backdrop or × to close.
   ═══════════════════════════════════════════════════════════════ */

.heritage-lightbox.is-active {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}

/* Inner card — Homepage hvid__frame styling: rounded, shadowed, premium */

.heritage-lightbox.is-active .heritage-lightbox__inner {
  transform: scale(1) translateY(0);
  opacity: 1;
}
/* Subtle gradient border accent — matches homepage frame */


/* Iframe fills card · scaled 108%/116% to crop YouTube branding chrome */


/* Close button — top-right of card, matches homepage hvid__close exactly */

.heritage-lightbox.is-active .heritage-lightbox__close {
  opacity: 1;
  pointer-events: auto;
}



/* SR-only title for ARIA */


/* Mobile · slightly smaller padding, smaller radius */


/* Body scroll-lock */


/* ───────────────────────────────────────────────
   RESPONSIVE
   ─────────────────────────────────────────────── */
@media (max-width: 1024px) {
  
  .heritage-feature-card__media {
    aspect-ratio: 16 / 9;
  }
  .heritage-feature-card__body {
    padding: 1.4rem 1.5rem 1.6rem;
  }
}
@media (max-width: 640px) {
  /* 2-up grid for both highlights and archive — compact gallery feel */
  
  /* Smaller card text scale at 2-up density */
  .heritage-card {
    border-radius: 10px;
  }
  .heritage-card__body {
    padding: 0.7rem 0.75rem 0.85rem;
    min-height: 0;
  }
  .heritage-card__title {
    font-size: 0.78rem;
    line-height: 1.25;
  }
  .heritage-card__meta {
    font-size: 0.62rem;
    margin-top: 0.3rem;
  }
  .heritage-card__duration {
    font-size: 0.58rem;
    padding: 2px 6px;
    top: 6px;
    right: 6px;
  }
  .heritage-card__tag {
    font-size: 0.5rem;
    padding: 2px 7px;
    bottom: 6px;
    left: 6px;
  }
  .heritage-card__play svg {
    width: 36px;
    height: 36px;
  }
  .heritage-feature-card__badges {
    top: 12px;
    left: 12px;
    gap: 0.35rem;
  }
  
  .heritage-feature-card__duration {
    top: 12px;
    right: 12px;
    font-size: 0.62rem;
  }
  .heritage-feature-card__body {
    padding: 1.2rem 1.2rem 1.4rem;
  }
  .heritage-feature-card__title {
    font-size: 1.25rem;
  }
  
  
  /* On mobile, anchor video+meta to top (not centered) so video doesn't float
     awkwardly with empty space above it */
  
  
  }


/* ═══════════════════════════════════════════════════════════════
   COLLAB PAGE STYLES · Inherits library-inner chrome.
   Section rhythm matches Heritage: 96px desktop / 64px mobile.
   ═══════════════════════════════════════════════════════════════ */

/* ─── Section eyebrow pattern (matches Heritage / library-inner) ─── */
.collab-section-head {
  display: inline-flex;
  align-items: center;
  gap: 0.8rem;
  margin: 0 0 1rem;
}
.collab-section-head__rule {
  display: inline-block;
  width: 28px;
  height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.collab-section-head__label {
  font-family: "Outfit", sans-serif;
  font-size: 0.62rem;
  font-weight: 600;
  letter-spacing: 0.32em;
  text-transform: uppercase;
  color: var(--green-light);
}
.collab-section-head__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(28px, 3vw, 40px);
  font-weight: 500;
  line-height: 1.15;
  letter-spacing: -0.018em;
  color: #fff;
  margin: 0 0 0.8rem;
  padding-bottom: 4px;
  max-width: 22ch;
}
.collab-section-head__title em {
  font-style: italic;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
  padding-bottom: 0.06em;
}
.collab-section-head__sub {
  font-family: "Outfit", sans-serif;
  font-size: 0.95rem;
  line-height: 1.65;
  font-weight: 300;
  color: rgba(255, 255, 255, 0.65);
  margin: 0 0 2.4rem;
  max-width: 64ch;
}

/* ═══════════════════════════════════════════════════════════════
   §1 HERO · Manifesto block · text-only (no card)
   ═══════════════════════════════════════════════════════════════ */
.collab-hero {
  margin-bottom: 2.5rem;
}
.collab-hero__section-head {
  display: inline-flex;
  align-items: center;
  gap: 0.8rem;
  margin: 0 0 1.4rem;
}
.collab-hero__section-rule {
  display: inline-block;
  width: 28px;
  height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.collab-hero__section-label {
  font-family: "Outfit", sans-serif;
  font-size: 0.62rem;
  font-weight: 600;
  letter-spacing: 0.32em;
  text-transform: uppercase;
  color: var(--green-light);
}
.collab-hero__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(36px, 4.2vw, 56px);
  font-weight: 500;
  line-height: 1.1;
  letter-spacing: -0.022em;
  color: #fff;
  margin: 0 0 1.5rem;
  padding-bottom: 4px;
}
.collab-hero__title em {
  font-style: italic;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
  padding-bottom: 0.08em;
}
.collab-hero__tagline {
  font-family: "Outfit", sans-serif;
  font-size: clamp(15px, 1.05vw, 17px);
  line-height: 1.7;
  font-weight: 300;
  color: rgba(255, 255, 255, 0.78);
  margin: 0 0 2rem;
  max-width: 62ch;
}
.collab-hero__actions {
  display: flex;
  flex-wrap: wrap;
  gap: 0.7rem;
  margin: 0 0 1.4rem;
}
.collab-hero__cta-primary {
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  padding: 13px 26px;
  background: var(--green-light);
  border: 1px solid var(--green-light);
  border-radius: 999px;
  color: #0d1117;
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  cursor: pointer;
  transition: all 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.collab-hero__cta-primary:hover {
  background: #fff;
  border-color: #fff;
  transform: translateY(-1px);
}
.collab-hero__cta-secondary {
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  padding: 13px 22px;
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.14);
  border-radius: 999px;
  color: rgba(255, 255, 255, 0.92);
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  font-weight: 500;
  letter-spacing: 0.04em;
  cursor: pointer;
  transition: all 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.collab-hero__cta-secondary:hover {
  background: rgba(255, 255, 255, 0.1);
  border-color: rgba(255, 255, 255, 0.3);
  color: #fff;
}
.collab-hero__meta-line {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  line-height: 1.55;
  font-weight: 300;
  font-style: italic;
  color: rgba(255, 255, 255, 0.45);
  margin: 0;
  max-width: 56ch;
}

/* ═══════════════════════════════════════════════════════════════
   §2 WHY · 3 outcome pillars
   ═══════════════════════════════════════════════════════════════ */








/* ═══════════════════════════════════════════════════════════════
   §3 ROLES · 3 categories · cards
   ═══════════════════════════════════════════════════════════════ */
.collab-roles {
  margin-bottom: 2.5rem;
}
.collab-roles__category {
  margin: 0 0 3.2rem;
}
.collab-roles__category:last-child {
  margin-bottom: 0;
}
.collab-roles__cat-head {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
  margin: 0 0 1.4rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.06);
}
.collab-roles__cat-num {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 500;
  letter-spacing: 0.1em;
  color: rgba(255, 255, 255, 0.45);
  padding-top: 0.45rem;
  min-width: 28px;
}
.collab-roles__cat-info {
  flex: 1;
}
.collab-roles__cat-title {
  font-family: "Playfair Display", serif;
  font-size: 1.7rem;
  font-weight: 500;
  line-height: 1.2;
  color: #fff;
  margin: 0 0 0.3rem;
}
.collab-roles__cat-bar {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  line-height: 1.5;
  font-weight: 300;
  font-style: italic;
  color: rgba(255, 255, 255, 0.5);
  margin: 0;
}
.collab-roles__grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;
}

/* ─── Role card · Apple-style index ─── */
.collab-role-card {
  display: flex;
  flex-direction: column;
  min-width: 0;
  overflow-wrap: anywhere;
  background: rgba(255, 255, 255, 0.02);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 12px;
  padding: 1.4rem 1.4rem 1.2rem;
  transition: border-color 0.4s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              background-color 0.4s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              transform 0.4s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.collab-role-card:hover {
  border-color: rgba(187, 214, 122, 0.22);
  background: rgba(255, 255, 255, 0.04);
  transform: translateY(-2px);
}
.collab-role-card__head {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 0.7rem;
  margin: 0 0 0.7rem;
}
.collab-role-card__title {
  font-family: "Playfair Display", serif;
  font-size: 1.15rem;
  font-weight: 500;
  line-height: 1.25;
  color: #fff;
  margin: 0;
}
.collab-role-card__tag {
  flex-shrink: 0;
  font-family: "Outfit", sans-serif;
  font-size: 0.55rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  padding: 4px 9px;
  border-radius: 4px;
  background: rgba(117, 194, 73, 0.14);
  border: 1px solid rgba(187, 214, 122, 0.28);
  color: var(--green-light);
}
.collab-role-card__tag--growth {
  background: rgba(255, 255, 255, 0.04);
  border-color: rgba(255, 255, 255, 0.14);
  color: rgba(255, 255, 255, 0.6);
}
.collab-role-card__body {
  font-family: "Outfit", sans-serif;
  font-size: 0.86rem;
  line-height: 1.6;
  font-weight: 300;
  color: rgba(255, 255, 255, 0.65);
  margin: 0 0 1.1rem;
  flex: 1;
}
.collab-role-card__apply {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  align-self: flex-start;
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  color: var(--green-light);
  padding: 0;
  transition: color 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              gap 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.collab-role-card__apply:hover {
  color: #fff;
  gap: 0.7rem;
}
.collab-role-card__apply svg {
  transition: transform 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}

/* ═══════════════════════════════════════════════════════════════
   §4 HOW IT WORKS · numbered steps
   ═══════════════════════════════════════════════════════════════ */
.collab-how {
  margin-bottom: 2.5rem;
}
.collab-how__steps {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.4rem;
  list-style: none;
  margin: 1.6rem 0 0;
  padding: 0;
}
.collab-how__step {
  display: flex;
  gap: 1.1rem;
  min-width: 0;
  overflow-wrap: anywhere;
  background: rgba(255, 255, 255, 0.02);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 14px;
  padding: 1.5rem 1.5rem 1.4rem;
  transition: border-color 0.4s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.collab-how__step:hover {
  border-color: rgba(187, 214, 122, 0.2);
}
.collab-how__step-num {
  flex-shrink: 0;
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-size: 2rem;
  font-weight: 500;
  line-height: 1;
  background: linear-gradient(135deg, var(--green-light), var(--green-primary));
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.08em;
}
.collab-how__step-body {
  flex: 1;
}
.collab-how__step-title {
  font-family: "Playfair Display", serif;
  font-size: 1.2rem;
  font-weight: 500;
  line-height: 1.2;
  color: #fff;
  margin: 0 0 0.4rem;
}
.collab-how__step-text {
  font-family: "Outfit", sans-serif;
  font-size: 0.86rem;
  line-height: 1.65;
  font-weight: 300;
  color: rgba(255, 255, 255, 0.65);
  margin: 0;
}

/* ═══════════════════════════════════════════════════════════════
   §5 STANDARDS · what we look for
   ═══════════════════════════════════════════════════════════════ */

/* CC-ENQUIRY-HUB · collab surface placement (page-local; full section, card centered) */
.collab-enquiry {
  width: 100%;
  display: flex;
  justify-content: center;
}
.collab-enquiry .cchub { max-width: 720px; }
@media (max-width: 560px) {
  .collab-enquiry .cchub { max-width: 100%; }
}





/* ═══════════════════════════════════════════════════════════════
   §7 FAQ · uses inherited .faq pattern from library-inner
   ═══════════════════════════════════════════════════════════════ */



/* ═══════════════════════════════════════════════════════════════
   §8 CLOSING
   ═══════════════════════════════════════════════════════════════ */






/* ═══════════════════════════════════════════════════════════════
   RESPONSIVE · Mobile rhythm matches Heritage (64px sections)
   ═══════════════════════════════════════════════════════════════ */
@media (max-width: 900px) and (min-width: 641px) {
  .collab-pillars,
  .collab-roles__grid,
  .collab-how__steps,
  .collab-standards__grid {
    grid-template-columns: 1fr;
  }
}
@media (max-width: 640px) {
  /* 2-up cards on mobile · uniform height via grid auto-rows */
  .collab-pillars,
  .collab-roles__grid,
  .collab-standards__grid {
    grid-template-columns: repeat(2, 1fr);
    grid-auto-rows: 1fr;
    gap: 0.6rem;
  }
  /* How it works · stays 1-up rows on mobile · steps are sequential */
  .collab-how__steps {
    grid-template-columns: 1fr;
    gap: 0.55rem;
  }
  /* Cards · flex column · no aspect-ratio · grid 1fr auto-rows ensures equal height */
  .collab-role-card,
  .collab-pillar {
    padding: 0.85rem 0.85rem 0.75rem;
    height: 100%;
  }
  .collab-how__step {
    padding: 0.8rem 0.95rem;
    align-items: center;
  }
  .collab-how__step-num { font-size: 1.4rem; }
  .collab-how__step-title { font-size: 0.92rem; margin-bottom: 0.2rem; }
  .collab-how__step-text { font-size: 0.76rem; line-height: 1.5; }
  /* Tighter card text */
  .collab-role-card__title { font-size: 0.82rem; line-height: 1.2; }
  .collab-role-card__body { font-size: 0.72rem; line-height: 1.5; margin-bottom: 0.7rem; }
  .collab-role-card__tag { font-size: 0.48rem; padding: 2px 6px; }
  .collab-role-card__apply { font-size: 0.7rem; }
  
  
  
  
}
@media (max-width: 640px) {
  .collab-hero,
  .collab-why,
  .collab-roles,
  .collab-how,
  .collab-standards,
  .collab-faq {
    margin-bottom: 2.5rem;
  }
  .collab-hero__title {
    font-size: clamp(28px, 8vw, 38px);
  }
  .collab-section-head__title {
    font-size: clamp(24px, 6vw, 32px);
  }
  .collab-section-head__sub {
    font-size: 0.88rem;
    margin: 0 0 1.8rem;
  }
  .collab-hero__cta-primary,
  .collab-hero__cta-secondary {
    padding: 11px 18px;
    font-size: 0.78rem;
  }
  .collab-pillar,
  .collab-role-card,
  .collab-how__step {
    padding: 0.95rem 0.95rem 1rem;
  }
  .collab-role-card__title { font-size: 0.95rem; }
  .collab-role-card__body { font-size: 0.78rem; line-height: 1.55; margin-bottom: 0.8rem; }
  .collab-role-card__tag { font-size: 0.5rem; padding: 3px 7px; }
  .collab-role-card__apply { font-size: 0.72rem; }
  
  .collab-how__step-text { font-size: 0.78rem; }
  
  
  
  .collab-pillar__title,
  .collab-how__step-title {
    font-size: 1.1rem;
  }
  .collab-roles__cat-title {
    font-size: 1.35rem;
  }
  .collab-roles__category {
    margin-bottom: 2.4rem;
  }
  
}

</style>

<!-- ════════════════════════════════════════════════════════════════
     PAGE-14 polish overrides · single inline block
     Sits after page inline CSS, before polish.css link, so it
     overrides page-local declarations while polish.css still wins
     on shared primitives (.eyebrow, .founder-sig, .cta-pill, etc).
     ════════════════════════════════════════════════════════════════ -->
<style>
/* ─── OP 10 · section rhythm · break the 2.5rem uniformity ────
   Replaces uniform margin-bottom with intentional cadence.
   Short / tall / short — REFINEMENT-BRIEF §3 visual rhythm. */
.collab-hero      { margin-bottom: 2.5rem !important; }

.collab-roles     { margin-bottom: 4.5rem !important; }
.collab-how       { margin-bottom: 3rem   !important; }


@media (max-width: 768px) {
  .collab-hero      { margin-bottom: 2rem   !important; }
  
  .collab-roles     { margin-bottom: 3rem   !important; }
  .collab-how       { margin-bottom: 2.25rem !important; }
  
  
}

/* ─── OP 5 · hero primary CTA → hairline treatment ────────────
   Reserve filled green for the page's ONE primary CTA (closing).
   Hero CTAs become two equal-weight hairlines = clean entrance. */
.collab-hero__cta-primary {
  background: transparent !important;
  border: 1px solid rgba(187, 214, 122, 0.45) !important;
  color: var(--green-light) !important;
}
.collab-hero__cta-primary:hover {
  background: rgba(187, 214, 122, 0.06) !important;
  border-color: rgba(187, 214, 122, 0.75) !important;
  color: #fff !important;
  transform: translateY(-1px);
}

/* ─── OP 11 · canonical card hover on collab body containers ──
   Extends polish.css §4 hover pattern. Cards lighter than headings:
   2px lift, refractive top edge, neutral shadow. */
@media (hover: hover) and (pointer: fine) {
  .collab-pillar,
  .collab-role-card,
  .collab-how__step {
    transition:
      transform 0.35s cubic-bezier(0.22, 1, 0.36, 1),
      border-color 0.35s cubic-bezier(0.22, 1, 0.36, 1),
      box-shadow 0.35s cubic-bezier(0.22, 1, 0.36, 1);
  }
  .collab-pillar:hover,
  .collab-role-card:hover,
  .collab-how__step:hover {
    transform: translateY(-2px);
    border-top-color: rgba(255, 255, 255, 0.12);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.3);
  }
}

/* ─── OP 12 · Playfair numerals · DESIGN-SYSTEM §6 ────────────
   Numerals in Playfair (oldstyle figures where supported). */
.collab-pillar__num,
.collab-how__step-num,
.collab-roles__cat-num {
  font-family: "Playfair Display", serif !important;
  font-feature-settings: "onum" 1, "lnum" 0;
}

/* ─── OP 7 support · founder pull-quote in §why ───────────────
   Large Playfair italic with hanging gold quote mark. The page's
   one handcrafted moment. Placeholder copy is forgiven by the
   editorial treatment — once Sumit's real review lands, no
   styling change needed. */







/* ─── OP 8 support · §current heritage-gold treatment ─────────
   REMOVED · §current section deleted from page entirely.
   Italic Playfair eyebrow class (.eyebrow--italic) still lives in
   polish.css §2 for any future use; no page-local helpers needed. */

/* ─── OP 9 support · closing section layout for cta-pill ──────
   Closing section originally styled its own CTA; cta-pill is
   thinner. Keep section padding the same, just centre the pill. */

</style>
<!-- CC-ENQUIRY-HUB · form styles (form surfaces only) -->
<!-- ─── Stage 3 JSON-LD: WebPage + BreadcrumbList ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Collaborate",
  "url": "https://cryptocipher.in/collaborate",
  "isPartOf": { "@id": "https://cryptocipher.in/#website" },
  "publisher": { "@id": "https://cryptocipher.in/#organization" }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://cryptocipher.in/" },
    { "@type": "ListItem", "position": 2, "name": "Collaborate", "item": "https://cryptocipher.in/collaborate" }
  ]
}
</script>

<!-- ─── Stage 4 AEO JSON-LD: FAQPage (collaboration) ─── -->

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
