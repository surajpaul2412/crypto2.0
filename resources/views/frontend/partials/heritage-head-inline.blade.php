@verbatim
<!-- Search engine verification — HUMAN: paste tokens from GSC + Bing -->
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

/* Reveal pattern · OWNED BY polish.css §3 (single-system after dual-reveal cleanup).
   The inline [data-reveal] / .visible / .d1-.d5 block was deleted in E2:
   - .visible was the page-local toggle racing polish.js's .is-revealed
   - .d1-.d5 delay classes were never used in markup (dead CSS).
   polish.css now owns opacity/transform/transition for [data-reveal]. */

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
.cta:hover .cta__arrow { transform: translateX(5px); }@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
  [data-reveal] { opacity: 1 !important; transform: none !important; }}

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
}@media (max-width: 1024px) {
  .libinner { grid-template-columns: 1fr; gap: 0; padding: 6.5rem 1.5rem 3rem; }}@media (max-width: 560px) {
  .libinner { padding: 6.5rem 1.1rem 2.5rem; }}
@keyframes pullPulse {
  0%, 100% { opacity: 0.6; transform: translateX(-50%) scaleX(1); }
  50%      { opacity: 0.95; transform: translateX(-50%) scaleX(1.12); }
}


/* ───────────────────────────────────────────────
   MAIN COLUMN — section frame
   ─────────────────────────────────────────────── */
/* .main-col rhythm consolidated below into the token-based definition
   (--section-gap-desktop/tablet/mobile). Duplicate removed to kill the
   561-768px gap conflict. */

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
#price-panel-section { margin-top: calc(-5rem + 4rem); }@media (max-width: 1024px) {
  #price-panel-section { margin-top: 0; }}


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
.modal__panel::-webkit-scrollbar-thumb { background: rgba(117,194,73,0.18); border-radius: 6px; }@media (max-width: 600px) { .modal__panel { padding: 1.6rem 1.3rem 1.4rem; }}

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
.cc-card-action-btn.is-active svg { fill: rgba(117,194,73,0.18); }@media (max-width: 768px) {
  .cc-card-action-btn { width: 30px; height: 30px; padding: 0.4rem; }
  .cc-card-action-btn svg { width: 16px; height: 16px; }}

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

  /* Section rhythm · aligned to page-03 (03_library-inner.php) for
     site-wide visual consistency. Was 5rem/3.5rem/2.5rem (heritage-only).
     Now matches canonical library-inner rhythm. */
  --section-gap-desktop: 4rem;   /* 64px */
  --section-gap-tablet:  3rem;   /* 48px */
  --section-gap-mobile:  2.5rem; /* 40px */

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
}@media (prefers-reduced-motion: reduce) {
  .cosmic-bg__star { animation: none; opacity: 0.6; }
  .cosmic-bg__glow { animation: none; opacity: 0.4; }
  .cosmic-bg::after { animation: none; }}

/* ═══════════════════════════════════════════════════════════════
   SECTION RHYTHM · main column
   Use .main-col on the parent that holds all section blocks
   ═══════════════════════════════════════════════════════════════ */
.main-col {
  display: flex;
  flex-direction: column;
  gap: var(--section-gap-desktop);
  min-width: 0;
}@media (max-width: 1024px) { .main-col { gap: var(--section-gap-tablet); }}@media (max-width: 560px)  { .main-col { gap: var(--section-gap-mobile); }}

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
}@media (max-width: 1024px) {
  .instr {
    grid-template-columns: 1fr;
    gap: 0;
    padding: 7.5rem 1.5rem 3rem;
    z-index: auto; /* defensive: prevent stacking-context trap */
  }}@media (max-width: 560px) {
  .instr { padding: 6.5rem 1.1rem 2.5rem; }}
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
.booking-modal__sheet::-webkit-scrollbar-thumb { background: rgba(117,194,73, 0.25); border-radius: 6px; }@media (max-width: 640px) {
  .booking-modal { padding: 0; align-items: stretch; }
  .booking-modal__sheet {
    max-width: none;
    max-height: 100vh;
    height: 100vh;
    border-radius: 18px 18px 0 0;
    padding: 1.6rem 1.2rem 1.4rem;
    transform: translateY(40px);
  }
  .booking-modal.is-open .booking-modal__sheet { transform: translateY(0); }}

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
}@media (max-width: 560px) {
  .booking-form__row { grid-template-columns: 1fr; gap: 0.85rem; }}
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
}@media (max-width: 560px) {
  .booking-form__footer { grid-template-columns: 1fr; gap: 0.85rem; }}
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
html { /* scroll-behavior:smooth removed — Safari jank; Lenis handles Chrome */ }@media (prefers-reduced-motion: reduce) {
  html { scroll-behavior: auto; }}

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
.heritage-eyebrow__rule {
  display: inline-block;
  width: 28px;
  height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
  margin-right: 0.8rem;
  vertical-align: middle;
}

/* Section heads (highlights / archive use this pattern) */
.heritage-section-head {
  margin-bottom: 3rem;
  max-width: 760px;
}
/* E6 · Section spacing fix · v2 (post-revert)
   Original page had .heritage-highlights / .heritage-archive { margin-bottom: 5rem }
   which DOUBLED the canonical 5rem .main-col gap = ~180px void between sections.
   v1 added padding-top: 3.5rem on .heritage-archive → made it worse.
   v2: deletion alone. .main-col gap (5rem desktop / 3.5rem mobile) handles rhythm.
   No section-specific override. Canonical spec wins. */
/* E3 · Real Section H2 (was fake H2 styled as eyebrow) ────────
   Per DESIGN-SYSTEM §4: Playfair Display, clamp 1.8–2.8rem, 900 weight,
   <em> accent uses the canonical gradient stop. */
.heritage-section-title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  letter-spacing: -0.01em;
  line-height: 1.15;
  color: #fff;
  margin: 0 0 1rem;
}
.heritage-section-title em {
  font-style: normal;
  display: inline-block;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  -webkit-background-clip: text;
          background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}

/* E3 · Heritage eyebrow override · GOLD not green (DESIGN-SYSTEM §14)
   Targets only the eyebrow inside heritage section heads.
   Inherits canonical .eyebrow sizing from polish.css §2. */
.heritage-section-head .eyebrow.heritage-eyebrow {
  color: var(--green-light);
  gap: 0.35rem;
  margin: 0 0 1.1rem;
}
.heritage-section-head .heritage-eyebrow__rule {
  width: 18px;
  height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
  display: inline-block;
  /* margin-right removed — flex `gap: 0.55rem` on parent .eyebrow owns
     the rule-to-text spacing. Having both produced ~17.6px instead of ~9px. */
}

/* E5 · Signature handcrafted moment · "Since 2010" italic Playfair eyebrow.
   Applied only to the Archive section. Heritage-gold, no dash prefix
   (Playfair italic + the year is the whole visual). */
.heritage-section-head .eyebrow--italic.heritage-since {
  color: var(--green-light);
  margin: 0 0 1.1rem;
}

/* E3 · LEGACY · The fake-H2 selector is preserved as a no-op so any
   stale ::before/::after or modal references don't crash. New markup
   uses .heritage-section-title. */
.heritage-section-head__eyebrow,
.heritage-featured__eyebrow {
  font-family: "Outfit", sans-serif;
  font-size: 0.62rem;
  font-weight: 600;
  letter-spacing: 0.32em;
  text-transform: uppercase;
  color: var(--heritage-gold);
  margin: 0 0 1rem;
  display: flex;
  align-items: center;
}
.heritage-section-head__sub {
  font-family: "Outfit", sans-serif;
  font-size: 1rem;
  line-height: 1.65;
  color: rgba(255, 255, 255, 0.65);
  font-weight: 300;
  max-width: 60ch;
  margin: 0;
}
/* Mobile balance: the VIDEOS are the focus, the head is supporting. Smaller
   title + sub, tighter rhythm, sub clamped to a teaser so the text block no
   longer out-weighs the cards (was ~1.34× a card; target <1.0×). Desktop keeps
   the full editorial head. */
@media (max-width: 640px) {
  .heritage-section-head { margin-bottom: 1.5rem; }
  .heritage-section-title { font-size: 1.35rem; line-height: 1.15; margin: 0 0 0.5rem; }
  .heritage-section-head__sub {
    font-size: 0.82rem; line-height: 1.5; color: rgba(255,255,255,0.55);
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
  }
  /* eyebrow→title tighter too */
  .heritage-section-head .eyebrow.heritage-eyebrow,
  .heritage-section-head .eyebrow--italic.heritage-since { margin: 0 0 0.5rem; }
}

/* ───────────────────────────────────────────────
   §2 FEATURED — single hero spotlight card
   ─────────────────────────────────────────────── */




.heritage-filters {
  display: flex; flex-wrap: wrap; gap: 0.5rem; align-items: center;
  margin: 0 0 1.6rem; padding: 0;
}
.heritage-chip {
  display: inline-flex; align-items: center; gap: 0.4rem;
  padding: 0.45rem 0.95rem; min-height: 36px; box-sizing: border-box;
  border-radius: 999px; cursor: pointer;
  font-family: "Outfit", sans-serif; font-size: 0.8rem; font-weight: 500;
  letter-spacing: 0.01em; line-height: 1; white-space: nowrap;
  color: rgba(255,255,255,0.72);
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.12);
  transition: all 0.3s var(--hz-ease);
}
.heritage-chip:hover {
  color: #fff; border-color: rgba(255,255,255,0.28);
  background: rgba(255,255,255,0.09);
}
.heritage-chip.is-active {
  color: #0a0d12; font-weight: 700;
  background: linear-gradient(135deg, var(--green-light), var(--green-primary));
  border-color: transparent;
  box-shadow: 0 6px 18px rgba(0,0,0,0.3), inset 0 1px 0 rgba(255,255,255,0.2);
}
/* Mobile: smaller filter chips (the desktop size read too chunky on phones).
   Chips are exempt from the 44px tap rule — they sit in a row of many. */
@media (max-width: 640px) {
  .heritage-filters {
    flex-wrap: nowrap;               /* one row — no wrapping clutter */
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
    scroll-snap-type: x proximity;
    gap: 0.35rem; margin: 0 -1rem 1.1rem;  /* bleed to edges */
    padding: 0 1rem 0.2rem;
    overscroll-behavior-x: contain;
    cursor: grab;
  }
  .heritage-filters::-webkit-scrollbar { display: none; }
  .heritage-filters:active { cursor: grabbing; }
  .heritage-chip { flex: 0 0 auto; scroll-snap-align: start; }  /* chips keep size, scroll instead of shrink/wrap */
  .heritage-chip {
    padding: 0.26rem 0.6rem; min-height: 24px;
    font-size: 0.62rem; gap: 0.25rem; font-weight: 600;
  }
  .heritage-chip__count { font-size: 0.52rem; }
}
.heritage-chip__count {
  font-size: 0.7rem;
  font-weight: 600;
  opacity: 0.55;
  font-weight: 400;
}

/* Load more */
.heritage-archive__loadmore {
  display: flex;
  justify-content: center;
  margin-top: 2rem;
}




/* ───────────────────────────────────────────────
   Archive outbound · discrete link to full YouTube playlist
   For users who want continuous background play
   ─────────────────────────────────────────────── */
.heritage-archive__outbound {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  gap: 1rem;
  margin: 3rem auto 0;
  padding: 1.4rem 2rem;
  max-width: 640px;
  background: linear-gradient(180deg,
    rgba(255, 255, 255, 0.02) 0%,
    rgba(255, 255, 255, 0.01) 100%);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 16px;
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  font-family: "Outfit", sans-serif;
  font-size: 0.88rem;
  line-height: 1.5;
  color: rgba(255, 255, 255, 0.55);
  font-weight: 300;
  box-shadow:
    0 8px 24px -12px rgba(0, 0, 0, 0.4),
    inset 0 1px 0 rgba(255, 255, 255, 0.03);
}
.heritage-archive__outbound-prefix {
  font-style: italic;
  letter-spacing: 0.01em;
}
.heritage-archive__outbound-link {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.55rem 1.1rem;
  background: rgba(117, 194, 73, 0.1);
  border: 1px solid rgba(187, 214, 122, 0.25);
  color: var(--green-light);
  font-weight: 500;
  font-size: 0.82rem;
  letter-spacing: 0.02em;
  border-radius: 999px;
  transition: background-color 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              border-color 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              color 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1)),
              transform 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-archive__outbound-link:hover {
  background: rgba(117, 194, 73, 0.18);
  border-color: rgba(187, 214, 122, 0.45);
  color: #fff;
  transform: translateY(-1px);
}
.heritage-archive__outbound-link svg {
  opacity: 0.9;
  transition: transform 0.3s var(--ease, cubic-bezier(0.22, 1, 0.36, 1));
}
.heritage-archive__outbound-link:hover svg {
  transform: translate(2px, -2px);
}
.heritage-highlights {
  /* margin-bottom removed: same reason as .heritage-cinehero above.
     .main-col gap (4rem/3rem/2.5rem) is the single source of section rhythm. */
}@media (max-width: 640px) {
  /* Section-to-section rhythm on mobile owned by .main-col gap @560px (40px).
     No section-specific margin-bottom needed. */
  .heritage-archive__outbound {
    flex-direction: column;
    text-align: center;
    gap: 0.9rem;
    margin-top: 4rem;
    padding: 1.3rem 1.3rem;
    font-size: 0.82rem;
  }
  .heritage-archive__outbound-link {
    padding: 0.6rem 1.2rem;
  }}

/* ─── Responsive ─────────────────────────────────────────── */


/* Mobile · slightly smaller padding, smaller radius */


/* ───────────────────────────────────────────────
   RESPONSIVE
   ─────────────────────────────────────────────── */
@media (max-width: 1024px) {
  .heritage-feature-card__media { aspect-ratio: 16 / 9; }
  .heritage-feature-card__body { padding: 1.4rem 1.5rem 1.6rem; }
}

/* E4 body::before override REVERTED (post-ship regression fix).
   The mix-blend-mode kill on body::before was over-zealous — §11's ban
   targets scroll-jank-prone full-page layers, but body::before is a
   static noise grain with no scroll involvement. Original CSS owns it. */

</style>

<style id="heritage-components">
/* ═══════════════════════════════════════════════════════════════════════
   HERITAGE · CINEMATIC COMPONENTS — CONSOLIDATED & CLEAN (rebuild 2026-06-14)
   Single source of truth for: cinematic hero, premium video frame, film
   cards (highlights + archive), tag, lightbox. Built on DESIGN-SYSTEM tokens
   and the 05 recording-inner premium frame language. One motion language:
   ease cubic-bezier(.22,1,.36,1), translateY(-2/-3px) hover, neutral shadow
   + single faint green glow. No infinite anims on rest state. ONE responsive
   ladder: base = mobile-first, ≥641 tablet, ≥1025 desktop.
   ═══════════════════════════════════════════════════════════════════════ */

:root {
  --hz-ease: cubic-bezier(0.22, 1, 0.36, 1);
  --hz-frame-radius: 18px;
  --hz-frame-shadow:
    0 30px 80px rgba(0,0,0,0.6),
    0 8px 30px rgba(0,0,0,0.4),
    0 0 60px rgba(75,145,65,0.05),
    inset 0 1px 0 rgba(255,255,255,0.06);
  --hz-frame-shadow-hover:
    0 36px 96px rgba(0,0,0,0.66),
    0 10px 34px rgba(0,0,0,0.45),
    0 0 70px rgba(75,145,65,0.08),
    inset 0 1px 0 rgba(255,255,255,0.08);
}

/* ─────────────────────────────────────────────────────────────
   PREMIUM GLASS FRAME — shared by hero card + all film cards
   ───────────────────────────────────────────────────────────── */



/* ═══ 1 · CINEMATIC HERO ════════════════════════════════════════ */
.heritage-cinehero { margin: 0; }
.heritage-cinehero__section-head {
  display: flex; align-items: center; gap: 0.7rem; margin-bottom: 1.1rem;
}
.heritage-cinehero__section-rule {
  width: 28px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.heritage-cinehero__section-label {
  font-family: "Outfit", sans-serif; font-size: 0.6rem; font-weight: 700;
  letter-spacing: 0.3em; text-transform: uppercase; color: var(--green-light);
}
/* Mobile: drop the "Featured Film" eyebrow above the hero card — the hero
   card itself is the feature; the label is redundant on small screens.
   Hidden (not just transparent) so its space is fully reclaimed. */
@media (max-width: 640px) {
  .heritage-cinehero__section-head { display: none; }
  /* Custom portrait key-art is pre-framed → center it (no upper-third bias). */
  .heritage-cinehero__thumb { object-position: center center; }
}

/* Card = framed cinematic still */
.heritage-cinehero__card {
  position: relative;
  width: 100%;
  aspect-ratio: 4 / 5;                 /* mobile portrait */
  border-radius: var(--hz-frame-radius);
  background: linear-gradient(135deg, #1a1f28, #0d1117);
  border: 1px solid rgba(255,255,255,0.08);
  border-top-color: rgba(255,255,255,0.14);
  box-shadow: var(--hz-frame-shadow);
  overflow: hidden;
  isolation: isolate;
  cursor: pointer;
  transition: transform 0.45s var(--hz-ease),
              border-color 0.45s var(--hz-ease),
              box-shadow 0.45s var(--hz-ease);
}
.heritage-cinehero__card:hover {
  transform: translateY(-2px);
  border-color: rgba(187,214,122,0.28);
  box-shadow: var(--hz-frame-shadow-hover);
}
.heritage-cinehero__backdrop { position: absolute; inset: 0; z-index: 0; }
.heritage-cinehero__thumb {
  width: 100%; height: 100%; object-fit: cover; object-position: center 25%;
  opacity: 1;
  transition: opacity 0.6s var(--hz-ease), transform 0.9s var(--hz-ease);
}
.heritage-cinehero__card:hover .heritage-cinehero__thumb { transform: scale(1.025); }
/* Cinematic bottom-fade scrim (text base) */
.heritage-cinehero__scrim {
  position: absolute; inset: 0; pointer-events: none;
  background: linear-gradient(to bottom,
    rgba(13,17,23,0.10) 0%, rgba(13,17,23,0.10) 38%,
    rgba(13,17,23,0.62) 62%, rgba(13,17,23,0.92) 82%, rgba(13,17,23,0.97) 100%);
}
/* Content overlays the lower fade, bottom-anchored */
.heritage-cinehero__content {
  position: absolute; inset: 0; z-index: 2;
  display: flex; flex-direction: column; justify-content: flex-end;
  padding: 1.5rem 1.4rem 1.5rem; max-width: 100%; pointer-events: none;
}
.heritage-cinehero__content > * { pointer-events: auto; }
.heritage-cinehero__crumb { display: none; }   /* mobile: hidden; desktop re-enables */
.heritage-cinehero__title {
  font-family: "Playfair Display", serif; font-weight: 500;
  font-size: clamp(26px, 7.2vw, 32px); line-height: 1.08; letter-spacing: -0.022em;
  color: #fff; margin: 0 0 0.5rem; max-width: 18ch;
  text-shadow: 0 2px 20px rgba(0,0,0,0.5);
}
.heritage-cinehero__title em {
  font-style: italic;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
  display: inline-block; padding-bottom: 0.08em;
}
.heritage-cinehero__tagline {
  font-family: "Outfit", sans-serif; font-size: 0.8rem; line-height: 1.5;
  color: rgba(255,255,255,0.82); font-weight: 300; margin: 0 0 0.7rem; max-width: 100%;
  text-shadow: 0 1px 10px rgba(0,0,0,0.6);
}
.heritage-cinehero__meta {
  display: flex; align-items: center; flex-wrap: wrap; gap: 0.3rem;
  font-family: "Outfit", sans-serif; font-size: 0.62rem; letter-spacing: 0.04em;
  color: rgba(255,255,255,0.68); margin: 0 0 0.9rem;
  text-shadow: 0 1px 8px rgba(0,0,0,0.6);
}
.heritage-cinehero__chip {
  display: inline-flex; align-items: center; padding: 2px 7px; border-radius: 4px;
  background: rgba(117,194,73,0.18); border: 1px solid rgba(187,214,122,0.35);
  color: var(--green-light); font-size: 0.52rem; font-weight: 600;
  letter-spacing: 0.14em; text-transform: uppercase;
}
.heritage-cinehero__dot { color: rgba(255,255,255,0.35); }
/* Buttons — premium pills (DESIGN-SYSTEM §7 / 05 spec) */
.heritage-cinehero__actions {
  display: flex; flex-wrap: nowrap; gap: 0.5rem; align-items: stretch;
}
.heritage-cinehero__play-btn,
.heritage-cinehero__secondary-btn {
  display: inline-flex; align-items: center; justify-content: center;
  gap: 0.42rem; padding: 0.6rem 1.1rem; min-height: 44px; box-sizing: border-box;
  border-radius: 50px; font-family: "Outfit", sans-serif; font-size: 0.74rem;
  letter-spacing: 0.02em; line-height: 1; cursor: pointer; white-space: nowrap;
  transition: all 0.4s var(--hz-ease);
}
.heritage-cinehero__play-btn {
  flex: 1 1 0; font-weight: 700; color: #0a0d12; border: none;
  background: linear-gradient(135deg, var(--green-light), var(--green-primary));
  box-shadow: 0 8px 24px rgba(0,0,0,0.35), inset 0 1px 0 rgba(255,255,255,0.22);
}
.heritage-cinehero__play-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 14px 36px rgba(0,0,0,0.4), 0 0 24px rgba(117,194,73,0.22), inset 0 1px 0 rgba(255,255,255,0.25);
}
.heritage-cinehero__play-btn svg { width: 12px; height: 12px; margin-left: 2px; margin-right: -1px; flex: 0 0 auto; }
.heritage-cinehero__secondary-btn {
  flex: 1 1 0; font-weight: 600; color: rgba(255,255,255,0.92);
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.18);
  backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.10);
}
.heritage-cinehero__secondary-btn:hover {
  transform: translateY(-2px); background: rgba(255,255,255,0.12);
  border-color: rgba(255,255,255,0.32); color: #fff;
}
.heritage-cinehero__secondary-btn svg { display: none; }   /* arrow hidden on mobile */
.heritage-cinehero__duration { display: none; }            /* time removed per spec */
.heritage-cinehero__center-play { display: none; }         /* redundant; card is tap-to-play */

/* ═══ 2 · FILM CARDS (highlights + archive) ════════════════════ */
.heritage-highlights__grid { display: grid; grid-template-columns: 1fr; gap: 0.9rem; }
/* ── Mobile: horizontal slider (matches homepage New Release scroller) ── */
@media (max-width: 640px) {
  .heritage-highlights__grid {
    display: flex;
    flex-wrap: nowrap;
    gap: 0.9rem;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scroll-snap-type: x proximity;
    scrollbar-width: none;
    /* peek the next card at the right edge so the slider affordance reads */
    padding: 0.25rem 1rem 0.5rem;
    margin: 0 -1rem;            /* bleed to screen edges */
    cursor: grab;
    overscroll-behavior-x: contain;
  }
  .heritage-highlights__grid::-webkit-scrollbar { display: none; }
  .heritage-highlights__grid:active { cursor: grabbing; }
  .heritage-highlights__grid .heritage-card--highlight {
    flex: 0 0 82%;             /* ~one card + peek of next */
    scroll-snap-align: start;
  }
}
/* Narrowest phones: tag scales down so it stays proportionate on the
   82%-width slider card (≤0.20 of card width). */
@media (max-width: 380px) {
  .heritage-card--highlight .heritage-tag { font-size: 0.38rem; padding: 2px 5px; letter-spacing: 0.08em; }
}
.heritage-archive__grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.7rem; }
.heritage-card.is-hidden { display: none; }

/* Card = framed image; caption overlays bottom gradient */
.heritage-card {
  position: relative; display: block;
  border-radius: var(--hz-frame-radius);
  background: linear-gradient(135deg, #1a1f28, #0d1117);
  border: 1px solid rgba(255,255,255,0.08);
  border-top-color: rgba(255,255,255,0.14);
  box-shadow: var(--hz-frame-shadow);
  overflow: hidden; isolation: isolate; cursor: pointer;
  transition: transform 0.4s var(--hz-ease), border-color 0.4s var(--hz-ease), box-shadow 0.4s var(--hz-ease);
}
.heritage-card:hover {
  transform: translateY(-3px); border-color: rgba(187,214,122,0.28);
  box-shadow: var(--hz-frame-shadow-hover);
}
.heritage-card__media { position: absolute; inset: 0; width: 100%; height: 100%; border-radius: inherit; overflow: hidden; }
.heritage-card__thumb {
  width: 100%; height: 100%; object-fit: cover; opacity: 0.92;
  transition: opacity 0.45s, transform 0.6s var(--hz-ease);
}
.heritage-card:hover .heritage-card__thumb { opacity: 1; transform: scale(1.04); }
.heritage-card__vignette {
  position: absolute; inset: 0; pointer-events: none;
  /* Ramp dark EARLY so the overlay title (starts ~62-69% down) sits on a
     strong scrim and stays legible on bright thumbnails (sandstone, sky). */
  background: linear-gradient(to bottom,
    rgba(13,17,23,0.00) 0%, rgba(13,17,23,0.00) 24%,
    rgba(13,17,23,0.50) 44%, rgba(13,17,23,0.85) 60%,
    rgba(13,17,23,0.95) 78%, rgba(13,17,23,0.98) 100%);
}
.heritage-card__play {
  position: absolute; top: 32%; left: 50%; transform: translate(-50%, -50%);
  opacity: 0.9; pointer-events: none; z-index: 2;
  transition: transform 0.35s var(--hz-ease), opacity 0.35s;
}
.heritage-card:hover .heritage-card__play { transform: translate(-50%, -50%) scale(1.1); opacity: 1; }
.heritage-card__play svg { width: 44px; height: 44px; }
/* Play glyph removed from film cards (highlights + archive). The framed
   image + tag + tap-to-play signal "film"; the glyph + its disc collided
   with titles/faces and read as a ghost ring. One affordance, on the hero. */
.heritage-card .heritage-card__play { display: none !important; }
.heritage-card__duration {
  position: absolute; top: 10px; right: 10px; z-index: 3;
  background: rgba(13,17,23,0.7); border: 1px solid rgba(255,255,255,0.08);
  border-radius: 5px; padding: 3px 7px; font-family: "Outfit", sans-serif;
  font-size: 0.6rem; font-weight: 500; color: rgba(255,255,255,0.9);
  backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px);
}
/* TAG — small, top-left, proportionate */
.heritage-tag {
  position: absolute; top: 9px; left: 9px; z-index: 3;
  background: rgba(13,17,23,0.7); border: 1px solid rgba(187,214,122,0.22);
  border-radius: 999px; padding: 2px 6px; font-family: "Outfit", sans-serif;
  font-size: 0.44rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase;
  color: var(--green-light); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px);
}
/* Caption overlays bottom (no separate panel) */
.heritage-card__body {
  position: absolute; inset: auto 0 0 0; z-index: 3;
  display: flex; flex-direction: column; gap: 0.25rem;
  padding: 0.7rem 0.75rem 0.8rem; background: transparent; pointer-events: none;
}
.heritage-card__title {
  font-family: "Playfair Display", serif; font-size: 0.82rem; font-weight: 600;
  line-height: 1.25; color: #fff; margin: 0; letter-spacing: -0.005em;
  text-shadow: 0 2px 14px rgba(0,0,0,0.6);
  display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.heritage-card__meta {
  font-family: "Outfit", sans-serif; font-size: 0.62rem; font-weight: 300;
  color: rgba(255,255,255,0.72); margin: 0; text-shadow: 0 1px 10px rgba(0,0,0,0.7);
  white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
/* Highlights = full-bleed posters (A) */
.heritage-card--highlight { aspect-ratio: 16 / 9; }
.heritage-card--highlight .heritage-card__media { aspect-ratio: auto; }
.heritage-card--highlight .heritage-card__title { font-size: 0.85rem; line-height: 1.25; -webkit-line-clamp: 2; }
.heritage-card--highlight .heritage-card__body { padding: 1rem 1.1rem 1.1rem; }
.heritage-card--highlight .heritage-card__play { top: 24%; }
/* Archive tiles = image-first (B) */
.heritage-archive .heritage-card { aspect-ratio: 4 / 3; }
.heritage-archive .heritage-card__title { font-size: 0.72rem; line-height: 1.25; -webkit-line-clamp: 2; }
.heritage-archive .heritage-card__meta { display: none; }
.heritage-archive .heritage-card__body { padding: 0.6rem 0.7rem 0.65rem; }
/* Archive play glyph hidden — small tiles, glyph collided with 2-line titles
   on real thumbnails. Frame + tag + tap-to-play already signal "film". */
.heritage-archive .heritage-card__play { display: none; }
/* Archive title: 2 rows so full title shows at a small, crisp size
   (mobile tiles can't fit long titles on one line). */
.heritage-archive .heritage-card__title { -webkit-line-clamp: 2; }

/* ═══ 3 · LIGHTBOX ═════════════════════════════════════════════ */
.heritage-lightbox {
  position: fixed; inset: 0; z-index: 9999; display: flex;
  align-items: center; justify-content: center; padding: 4vh 4vw;
  background: rgba(4,6,11,0.97);
  /* backdrop-filter CULLED: it shared a stacking context with the playing video,
     so the backdrop re-blurred every frame the video repainted → GPU contention →
     audio buffer underruns (the glitch). The 0.97 opaque bg already hides the page;
     the blur was visually near-zero behind 94%+ opacity. */
  opacity: 0; visibility: hidden; pointer-events: none;
  transition: opacity 0.45s var(--hz-ease), visibility 0.45s var(--hz-ease);
}
.heritage-lightbox.is-active { opacity: 1; visibility: visible; pointer-events: auto; }
.heritage-lightbox__inner {
  position: relative; width: 100%; max-width: min(1100px, 92vw);
  aspect-ratio: 16 / 9; max-height: 84vh; height: auto;
  border-radius: 20px; overflow: hidden; background: #0d1117;
  border: 1px solid rgba(255,255,255,0.06);
  box-shadow: 0 30px 80px rgba(0,0,0,0.6), 0 8px 30px rgba(0,0,0,0.4), 0 0 60px rgba(75,145,65,0.06);
  transform: scale(0.94) translateY(20px); opacity: 0;
  transition: transform 0.55s var(--hz-ease), opacity 0.45s var(--hz-ease);
}
.heritage-lightbox.is-active .heritage-lightbox__inner { transform: scale(1) translateY(0); opacity: 1; }
.heritage-lightbox__iframe {
  /* Match homepage hvid player: full-size, no over-scale. Over-scaling
     pushed YouTube's own title bar above the frame's clip edge (title
     appeared cropped). 100%/100% keeps YouTube's chrome fully inside. */
  position: absolute; inset: 0; width: 100%; height: 100%;
  border: 0; background: #0d1117; display: block; pointer-events: auto;
  border-radius: inherit;
}
.heritage-lightbox__close {
  position: absolute; top: 1rem; right: 1rem; width: 44px; height: 44px; border-radius: 50%;
  background: rgba(13,17,23,0.65); backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
  border: 1px solid rgba(255,255,255,0.1); color: rgba(255,255,255,0.85);
  display: flex; align-items: center; justify-content: center; cursor: pointer; z-index: 12;
  opacity: 0; pointer-events: none;
  transition: opacity 0.6s var(--hz-ease) 0.3s, background-color 0.3s, border-color 0.3s, color 0.3s, transform 0.3s var(--hz-ease);
}
.heritage-lightbox.is-active .heritage-lightbox__close { opacity: 1; pointer-events: auto; }
.heritage-lightbox__close:hover { background: rgba(13,17,23,0.85); border-color: rgba(187,214,122,0.35); color: #BBD67A; transform: rotate(90deg); }
.heritage-lightbox__close svg { width: 14px; height: 14px; pointer-events: none; }
.heritage-lightbox__title {
  position: absolute !important; width: 1px !important; height: 1px !important;
  padding: 0 !important; margin: -1px !important; overflow: hidden !important;
  clip: rect(0,0,0,0) !important; white-space: nowrap !important; border: 0 !important;
}
body.heritage-lightbox-open { overflow: hidden; }

/* ═══ TABLET ≥641 ══════════════════════════════════════════════ */
@media (min-width: 641px) {
  .heritage-highlights__grid { grid-template-columns: repeat(3, 1fr); gap: 1.1rem; }
  .heritage-archive__grid { grid-template-columns: repeat(3, 1fr); gap: 1.1rem; }
  .heritage-cinehero__card { aspect-ratio: 16 / 10; }
  .heritage-cinehero__crumb {
    display: flex; position: absolute; top: 1.6rem; left: 2rem; z-index: 3;
    align-items: center; gap: 0.6rem; font-family: "Outfit", sans-serif;
    font-size: 0.62rem; font-weight: 500; letter-spacing: 0.16em; text-transform: uppercase;
    color: rgba(255,255,255,0.6); pointer-events: auto;
  }
  .heritage-cinehero__crumb a { color: rgba(255,255,255,0.7); transition: color 0.3s; }
  .heritage-cinehero__crumb a:hover { color: var(--green-light); }
  .heritage-cinehero__crumb-sep { color: rgba(255,255,255,0.25); }
  .heritage-cinehero__crumb-current { color: var(--green-light); }
  .heritage-cinehero__content { padding: 2.2rem 2.6rem; max-width: 680px; }
  .heritage-cinehero__title { font-size: clamp(30px, 4vw, 40px); margin: 0 0 0.7rem; }
  .heritage-cinehero__tagline { font-size: 0.9rem; margin: 0 0 1rem; max-width: 60ch;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
  .heritage-cinehero__meta { font-size: 0.72rem; margin: 0 0 1.1rem; }
  .heritage-cinehero__secondary-btn svg { display: inline-block; width: 13px; height: 13px; flex: 0 0 auto; transition: transform 0.3s; }
  .heritage-cinehero__secondary-btn:hover svg { transform: translateY(2px); }
  .heritage-card__title { font-size: 0.95rem; }
  .heritage-archive .heritage-card__meta { display: block; }
  /* 3-col highlight cards are short (~128px) — play glyph can't coexist with
     the bottom caption without overlap. Hide it; card stays tap-to-play and the
     frame + tag already signal "film". Title clamps 1 line; smaller tag. */
  .heritage-card--highlight .heritage-card__play { display: none; }
  .heritage-card--highlight .heritage-card__title { font-size: 0.98rem; -webkit-line-clamp: 1; }
  .heritage-card--highlight .heritage-card__body { padding: 0.85rem 0.95rem 0.95rem; }
  .heritage-tag { font-size: 0.4rem; padding: 2px 5px; letter-spacing: 0.1em; }
}

/* ═══ DESKTOP ≥1025 ════════════════════════════════════════════ */
@media (min-width: 1025px) {
  .heritage-cinehero__card { aspect-ratio: 21 / 10; }
  .heritage-cinehero__content { padding: 2.4rem 3.2rem; max-width: 720px; }
  .heritage-cinehero__title { font-size: clamp(28px, 3vw, 42px); }
  .heritage-cinehero__tagline { font-size: 14px; max-width: 64ch; }
  .heritage-cinehero__play-btn,
  .heritage-cinehero__secondary-btn { min-height: 36px; padding: 0.5rem 1.4rem; font-size: 0.78rem; }
  .heritage-cinehero__card:hover .heritage-cinehero__center-play { opacity: 0; pointer-events: none; }
  .heritage-card--highlight .heritage-card__title { font-size: 1.02rem; }
}

/* ═══ REDUCED MOTION ═══════════════════════════════════════════ */
@media (prefers-reduced-motion: reduce) {
  .heritage-cinehero__card, .heritage-card, .hz-frame,
  .heritage-cinehero__thumb, .heritage-card__thumb { transition: none !important; }
  .heritage-cinehero__card:hover, .heritage-card:hover, .hz-frame:hover { transform: none !important; }
}

</style>
@endverbatim
