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

html { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

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

/* Reveal pattern · OWNED BY polish.css §3 + polish.js (.is-revealed)
   Page-local block deleted to close HANDOFF #16 dual-reveal trap.
   d1/d2 markup classes on hero paragraphs are now inert — hero
   elements use [data-reveal-hero] + data-reveal-delay below. */

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

/* Contact page layout */
.contact-hero {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 1rem 0 4rem;
  gap: 1.6rem;
}

/* Namaste glyph (Wikimedia anjali mudra SVG, brand-themed) */
.contact-hero__glyph-wrap {
  position: relative;
  width: 180px;
  height: 200px;
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.contact-hero__glyph--namaste {
  width: 100%;
  height: 100%;
  transform-origin: center;
  filter: drop-shadow(0 10px 28px rgba(117, 194, 73, 0.28))
          drop-shadow(0 0 18px rgba(187, 214, 122, 0.18));
  animation: namasteWelcome 6s ease-in-out infinite;
}

.contact-hero__glyph-figure { transform-origin: center; }

@keyframes namasteWelcome {
  0%, 100% { transform: scale(0.97); }
  50% { transform: scale(1.03); }
}

@media (prefers-reduced-motion: reduce) {
  .contact-hero__glyph--namaste { animation: none; transform: none; }
}

@media (max-width: 640px) {
  .contact-hero__glyph-wrap { width: 140px; height: 160px; }
}

.contact-hero__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(2.8rem, 5vw, 4.2rem);
  font-weight: 900;
  letter-spacing: -0.02em;
  line-height: 1.05;
  margin: 0;
  color: var(--text-primary);
  background: linear-gradient(180deg, #fff 0%, #d8e0c8 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.2rem;
}

.contact-hero__greeting {
  font-family: "Playfair Display", serif;
  font-size: clamp(1rem, 1.4vw, 1.25rem);
  font-weight: 400;
  font-style: italic;
  letter-spacing: 0.01em;
  color: var(--green-light);
  margin: 0 0 0.4rem;
  line-height: 1.5;
  text-wrap: balance;
}

.contact-hero__greeting em {
  font-style: normal;
  font-weight: 500;
  color: #d8e0c8;
}

.contact-hero__sub em,
.contact-hero__lead em {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-weight: 500;
  color: var(--green-light);
}

.contact-hero__lead {
  font-family: "Outfit", sans-serif;
  font-size: clamp(1.08rem, 1.5vw, 1.3rem);
  font-weight: 300;
  line-height: 1.55;
  color: var(--text-primary);
  max-width: 34rem;
  margin: 0 auto;
  text-wrap: balance;
}

.contact-hero__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.95rem, 1.3vw, 1.08rem);
  font-weight: 300;
  line-height: 1.8;
  color: var(--text-secondary);
  max-width: 40rem;
  margin: 0 auto;
  text-wrap: pretty;
}

.contact-hero__listen { color: var(--green-light); white-space: nowrap; }

@media (max-width: 640px) {
  .contact-hero__lead { font-size: 1.1rem; line-height: 1.5; max-width: 26ch; }
  .contact-hero__sub { font-size: 0.95rem; line-height: 1.72; }
}

/* ?ref= banner */
.contact-ref-banner {
  display: none;
  align-items: center;
  gap: 1rem;
  padding: 1rem 1.4rem;
  margin: 0 auto 3rem;
  max-width: 720px;
  background: rgba(212,181,110, 0.05);
  border: 1px solid rgba(212,181,110, 0.2);
  border-radius: 14px;
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
}

.contact-ref-banner.is-visible { display: flex; }

.contact-ref-banner__icon {
  flex-shrink: 0;
  width: 28px;
  height: 28px;
  color: #d4b56e;
}

.contact-ref-banner__text {
  flex: 1 1 auto;
  font-family: "Outfit", sans-serif;
  font-size: 0.88rem;
  color: var(--text-secondary);
  line-height: 1.5;
}

.contact-ref-banner__path {
  font-family: "JetBrains Mono", "Courier New", monospace;
  font-size: 0.82rem;
  color: #d4b56e;
  word-break: break-all;
}

.contact-ref-banner__action {
  flex-shrink: 0;
  padding: 0.65rem 1.1rem;
  border: 1px solid rgba(212,181,110, 0.4);
  border-radius: 10px;
  background: rgba(212,181,110, 0.08);
  color: #d4b56e;
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 500;
  letter-spacing: 0.02em;
  cursor: pointer;
  transition: all 0.25s var(--ease);
}

.contact-ref-banner__action:hover {
  background: rgba(212,181,110, 0.15);
  border-color: rgba(212,181,110, 0.6);
}

@media (max-width: 640px) {
  .contact-ref-banner {
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
  }

  .contact-ref-banner__action {
    align-self: stretch;
    text-align: center;
  }
}

/* Enquiry hub placement */
.contact-enquiry {
  width: 100%;
  display: flex;
  justify-content: center;
  margin-bottom: 3.5rem;
}

.contact-enquiry .cchub { max-width: 720px; }

@media (max-width: 560px) {
  .contact-enquiry { margin-bottom: 2.5rem; }
  .contact-enquiry .cchub { max-width: 100%; }
}

.contact-trust {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1.2rem;
  padding: 2.5rem 2rem;
  text-align: center;
  border-top: 1px solid rgba(255,255,255, 0.05);
}

.contact-trust__line {
  font-family: "Outfit", sans-serif;
  font-size: 0.88rem;
  font-weight: 300;
  color: var(--text-secondary);
  line-height: 1.7;
  max-width: 680px;
}

.contact-trust__line strong {
  color: var(--text-primary);
  font-weight: 500;
}

.contact-trust__links {
  display: flex;
  gap: 1.6rem;
  flex-wrap: wrap;
  justify-content: center;
}

.contact-trust__link {
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 400;
  letter-spacing: 0.04em;
  color: var(--text-muted, rgba(255,255,255, 0.5));
  text-decoration: none;
  position: relative;
  padding-bottom: 2px;
  transition: color 0.25s ease;
}

.contact-trust__link::after {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  height: 1px;
  background: rgba(117,194,73, 0.5);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.3s var(--ease);
}

.contact-trust__link:hover { color: var(--text-primary); }
.contact-trust__link:hover::after { transform: scaleX(1); }


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

.modal.is-open { display: flex; }

@keyframes modalFadeIn { from { opacity: 0; } to { opacity: 1; } }

@keyframes modalSlideIn {
  from { opacity: 0; transform: translateY(20px) scale(0.97); }
  to   { opacity: 1; transform: translateY(0) scale(1); }
}









.modal__head .eyebrow { display: inline-flex; }

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
   Removed: no fixed bottom side-index exists on this page, so the 60px
   reserved dead space below the footer. Class left on <body> (harmless).
   ——————————————————————————————————————————————— */
@media (max-width: 1024px) {
  /* body.has-mobile-side-index { padding-bottom: 60px; }  ← removed (dead space) */
}


</style>

<!-- CC-ENQUIRY-HUB · form styles (form surfaces only) -->

<!-- ——— Stage 3 JSON-LD: ContactPage ——— -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "url": "https://cryptocipher.in/contact",
  "isPartOf": { "@id": "https://cryptocipher.in/#website" },
  "about": { "@id": "https://cryptocipher.in/#organization" },
  "mainEntity": {
    "@type": "Organization",
    "@id": "https://cryptocipher.in/#organization",
    "email": "admin@cryptocipher.in",
    "contactPoint": {
      "@type": "ContactPoint",
      "email": "admin@cryptocipher.in",
      "contactType": "customer support",
      "availableLanguage": ["en"]
    }
  }
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
