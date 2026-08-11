@verbatim
<!-- Search engine verification — HUMAN: paste tokens from GSC + Bing -->
<meta name="google-site-verification" content="REPLACE_GSC_TOKEN">
<meta name="msvalidate.01" content="REPLACE_BING_TOKEN">
<!-- Stage 8 · perf: connection hints (head-only) -->
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<!-- Consolidated shared layers (Phase 1+2) · load before inline <style>, before polish.css -->

<style>
/* Critical: park skip-link before first paint (FOUC). */
.skip-link { position: absolute; left: 12px; top: -56px; z-index: 10000; }

/* ═══════════════════════════════════════════════════════════════
   GLOBAL TOKENS — from CRYPTO-CIPHER-DESIGN-SYSTEM.md
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
  --heritage-gold: #D4A656;
  --heritage-gold-soft: rgba(212,166,86,0.22);

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

  --ease: cubic-bezier(0.22, 1, 0.36, 1);
}

* { box-sizing: border-box; margin: 0; padding: 0; }

html { /* scroll-behavior:smooth removed — Safari scroll-back jank; Lenis handles Chrome */ -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

body {
  font-family: 'Outfit', sans-serif;
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
/* Page surface depth · pushed to edges so middle stays readable */
.cosmic-bg::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    /* Top center · light source · pushed up */
    radial-gradient(ellipse 80% 45% at 50% -20%, rgba(117,194,73, 0.08) 0%, transparent 60%),
    /* Bottom · ambient pool · pushed down */
    radial-gradient(ellipse 100% 60% at 50% 120%, rgba(47,105,66, 0.12) 0%, transparent 70%),
    /* Left edge · cool fill · pushed off-canvas */
    radial-gradient(ellipse 40% 60% at -15% 50%, rgba(187,214,122, 0.04) 0%, transparent 55%),
    /* Right edge · warm fill · pushed off-canvas */
    radial-gradient(ellipse 40% 60% at 115% 50%, rgba(117,194,73, 0.05) 0%, transparent 55%);
  opacity: 1;
}
/* Second depth layer · slow drifting nebula · subtler */
.cosmic-bg::after {
  content: '';
  position: absolute;
  inset: -10%;
  background:
    radial-gradient(circle 500px at 20% 15%, rgba(117,194,73, 0.025), transparent 70%),
    radial-gradient(circle 400px at 80% 85%, rgba(187,214,122, 0.02), transparent 70%);
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

/* Mobile perf · star animations are CPU/battery expensive on small viewports.
   Keep the stars rendered (visual continuity) but freeze them and dim slightly. */
@media (max-width: 768px) {
  .cosmic-bg__star { animation: none; opacity: 0.55; }
  .cosmic-bg::after { animation: none; }
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
   LIBSHOP-001 — LIBRARY SHOP PAGE
   v4 LOCKED · Inner page deeper than homepage
   ═══════════════════════════════════════════════════════════════ */

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
[data-reveal].d6 { transition-delay: 0.36s; }

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
  background: linear-gradient(135deg, var(--green-primary), var(--green-light));
  color: var(--bg-deep);
  border-color: transparent;
  box-shadow: 0 8px 24px rgba(0,0,0,0.35), inset 0 1px 0 rgba(255,255,255,0.22);
}
.cta--primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 30px rgba(117,194,73,0.30), 0 0 16px rgba(117,194,73,0.20), inset 0 1px 0 rgba(255,255,255,0.28);
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
  box-shadow: 0 6px 22px rgba(0,0,0,0.2), 0 0 18px rgba(117,194,73,0.06);
}
.cta--text {
  padding: 0.55rem 0.5rem;
  color: var(--text-muted);
  border-radius: 4px;
}
.cta--text::after {
  content: '';
  position: absolute;
  bottom: 4px;
  left: 0.5rem;
  right: 0.5rem;
  height: 0.5px;
  background: linear-gradient(90deg, var(--green-primary), rgba(117,194,73,0.2));
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.4s var(--ease);
}
.cta--text:hover { color: #fff; transform: translateX(3px); }
.cta--text:hover::after { transform: scaleX(1); }
.cta__arrow { transition: transform 0.3s ease; display: inline-block; }
.cta:hover .cta__arrow { transform: translateX(5px); }

@media (max-width: 768px) {
  .cta { padding: 0.65rem 1.2rem; font-size: 0.7rem; }
  .cta--primary, .cta--ghost { padding-top: 0.88rem; padding-bottom: 0.88rem; }
}



/* ───────────────────────────────────────────────
   §2 TOOLBAR + FILTER PANEL — v5 style B
   Spotify/Soundcloud pattern: search + sort + collapsible filter panel
   ─────────────────────────────────────────────── */
.lib-toolbar-wrap {
  position: sticky;
  top: 5.5rem;
  z-index: 50;
  background: rgba(13, 17, 23, 0.55);
  backdrop-filter: blur(16px) saturate(1.4);
  -webkit-backdrop-filter: blur(16px) saturate(1.4);
  border-top: 1px solid var(--glass-border);
  border-bottom: 1px solid var(--glass-border);
  /* Resting state · subtle depth · sits above cards */
  box-shadow:
    0 1px 0 rgba(255,255,255,0.03) inset,
    0 8px 24px rgba(0,0,0,0.25),
    0 16px 40px rgba(0,0,0,0.18);
  transition: background 0.3s var(--ease), box-shadow 0.3s var(--ease), border-color 0.3s var(--ease);
}
/* DESKTOP: don't stick under the menu. The toolbar scrolls normally; once its
   natural position crosses above the menu bar, JS adds .is-docked to float it
   at the BOTTOM of the viewport with a smooth fade. Mobile (<=768px) keeps the
   original sticky behaviour untouched (override re-applied in the media query). */
@media (min-width: 769px) {
  .lib-toolbar-wrap {
    position: static;
  }
  .lib-toolbar-wrap.is-docked {
    position: fixed;
    top: auto;            /* cancel the sticky top:5.5rem, else top+bottom stretches it tall */
    left: 50%;
    bottom: 1.5rem;
    transform: translateX(-50%) translateY(0);
    width: calc(100% - 12rem);
    max-width: 1020px;
    border-radius: 18px;
    border: 1px solid var(--glass-border);
    z-index: 60;
    background: rgba(8, 12, 18, 0.92);
    box-shadow:
      0 1px 0 rgba(255,255,255,0.04) inset,
      0 16px 48px rgba(0,0,0,0.5),
      0 28px 70px rgba(0,0,0,0.4);
    /* fade + slight rise on entry */
    animation: toolbarDockIn 0.4s var(--ease) both;
  }
  .lib-toolbar-wrap.is-docking-out {
    animation: toolbarDockOut 0.35s var(--ease) both;
  }
}
@keyframes toolbarDockIn {
  from { opacity: 0; transform: translateX(-50%) translateY(16px); }
  to   { opacity: 1; transform: translateX(-50%) translateY(0); }
}
@keyframes toolbarDockOut {
  from { opacity: 1; transform: translateX(-50%) translateY(0); }
  to   { opacity: 0; transform: translateX(-50%) translateY(16px); }
}
.lib-toolbar-wrap.stuck {
  background: rgba(8, 12, 18, 0.94);
  /* Stuck state · pronounced cinematic depth */
  box-shadow:
    0 1px 0 rgba(117,194,73,0.08) inset,
    0 12px 36px rgba(0,0,0,0.55),
    0 24px 60px rgba(0,0,0,0.45),
    0 32px 80px rgba(117,194,73,0.04);
  border-bottom-color: rgba(117,194,73,0.15);
}

.lib-toolbar {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0.95rem 2rem;
  display: grid;
  grid-template-columns: 1fr auto auto;
  align-items: center;
  gap: 1rem;
}
@media (max-width: 768px) {
  .lib-toolbar {
    padding: 0.65rem 0.85rem;
    gap: 0.4rem;
    grid-template-columns: 1fr auto auto;
  }
  .lib-toolbar__search input {
    padding: 0.8rem 0.85rem 0.8rem 2.2rem;
    font-size: 0.78rem;
  }
  .lib-toolbar__search-icon { left: 0.75rem; width: 12px; height: 12px; }
  /* Compact icon-only sort + filter buttons on mobile · equal visual weight */
  .lib-toolbar__sort-btn,
  .lib-toolbar__filters-btn {
    padding: 0;
    gap: 0;
    min-width: 44px;
    width: 44px;
    height: 44px;
    justify-content: center;
    align-items: center;
  }
  .lib-toolbar__sort-text,
  .lib-toolbar__filters-text,
  .lib-toolbar__sort-chevron,
  .lib-toolbar__filters-btn .icon-chevron { display: none !important; }
  .lib-toolbar__sort-icon,
  .lib-toolbar__filters-btn .icon-filter,
  .lib-toolbar__sort-btn svg {
    width: 16px !important;
    height: 16px !important;
    margin: 0;
  }
}
@media (max-width: 380px) {
  .lib-toolbar { padding: 0.55rem 0.65rem; gap: 0.3rem; }
  .lib-toolbar__search input { padding: 0.8rem 0.7rem 0.8rem 2rem; font-size: 0.74rem; }
  .lib-toolbar__sort-btn,
  .lib-toolbar__filters-btn { width: 44px; height: 44px; min-width: 44px; }
}

/* ═══════════════════════════════════════════════════════════════
   §2.5 TOTAL BUNDLE — hero (buy-the-whole-collection)
   Desktop: wide SVG on top, text + CTA row below, 3D bend on hover.
   Mobile (option A): compact centered motif, claim, price, single CTA.
   Price values are DISPLAY-ONLY placeholders — backend-replaceable at Stage C.
   ═══════════════════════════════════════════════════════════════ */
.total-bundle {
  position: relative;
  padding: 4rem 2rem 4.5rem;
  overflow: hidden;
  content-visibility: auto;
  contain-intrinsic-size: 1px 600px;
}
.total-bundle__inner {
  max-width: 1080px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}
.total-bundle__card {
  position: relative;
  border-radius: 20px;
  padding: 2.4rem 2.4rem 2.6rem;
  background:
    linear-gradient(135deg, rgba(212,166,86,0.06), rgba(255,255,255,0.02) 40%, rgba(212,166,86,0.05)),
    linear-gradient(180deg, rgba(15,22,30,0.55), rgba(10,14,19,0.66));
  border: 1px solid rgba(212,166,86,0.22);
  border-top-color: rgba(212,166,86,0.34);
  box-shadow:
    0 1px 0 rgba(255,255,255,0.06) inset,
    0 24px 60px rgba(0,0,0,0.45);
  transform-style: preserve-3d;
  transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease);
  will-change: transform;
}
.total-bundle__card::before {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: inherit;
  pointer-events: none;
  border: 1px solid transparent;
}
/* Graphic on top */
.total-bundle__graphic {
  width: 100%;
  max-width: 760px;
  margin: 0 auto 1.8rem;
  aspect-ratio: 16 / 6;
  display: flex;
  align-items: center;
  justify-content: center;
}
.total-bundle__graphic svg { width: 100%; height: 100%; display: block; }
/* Text + CTA row */
.total-bundle__body {
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: 2rem;
  align-items: center;
}
.total-bundle__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: block;
  margin-bottom: 0.7rem;
}
.total-bundle__title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.6rem, 3vw, 2.4rem);
  font-weight: 900;
  letter-spacing: -0.01em;
  line-height: 1.12;
  color: #fff;
  margin: 0 0 0.7rem;
}
.total-bundle__sub {
  font-size: clamp(0.78rem, 1vw, 0.9rem);
  font-weight: 300;
  line-height: 1.6;
  color: var(--text-secondary);
  margin: 0;
  max-width: 38ch;
}
.total-bundle__buy {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  gap: 1rem;
}
.total-bundle__actions .cta {
  flex: 1 1 100%;
  justify-content: center;
}
.total-bundle__price {
  display: flex;
  align-items: baseline;
  justify-content: center;
  gap: 0.7rem;
  flex-wrap: wrap;
}
.total-bundle__price-was {
  font-size: 0.95rem;
  color: var(--text-muted);
  text-decoration: line-through;
}
.total-bundle__price-now {
  font-family: 'Playfair Display', serif;
  font-size: 2.4rem;
  font-weight: 900;
  color: #fff;
  line-height: 1;
}
.total-bundle__save {
  font-size: 0.6rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  color: var(--green-light);
  background: rgba(117,194,73,0.14);
  border-radius: 50px;
  padding: 0.3rem 0.7rem;
}
.total-bundle__meta {
  font-size: 0.62rem;
  color: var(--text-muted);
  letter-spacing: 0.04em;
  text-align: center;
}
.total-bundle__actions {
  display: flex;
  gap: 0.7rem;
  flex-wrap: wrap;
}
/* Mobile — option A: compact, capped height, single CTA */
@media (max-width: 768px) {
  .total-bundle { padding: 2rem 1rem; }
  .total-bundle__card { padding: 1.6rem 1.3rem 1.7rem; border-radius: 16px; }
  .total-bundle__card:hover { transform: none; }          /* no bend on touch */
  .total-bundle__graphic {
    width: 70%;
    max-width: 240px;
    aspect-ratio: 300 / 120;
    margin: 0 auto 1.2rem;
  }
  .total-bundle__body { grid-template-columns: 1fr; gap: 1.1rem; text-align: center; }
  .total-bundle__sub { max-width: none; margin-inline: auto; }
  .total-bundle__title { font-size: 1.4rem; }
  .total-bundle__buy { align-items: center; }
  .total-bundle__price-now { font-size: 2rem; }
  .total-bundle__actions { width: 100%; }
  .total-bundle__actions .cta { width: 100%; justify-content: center; }
}

/* Search */
.lib-toolbar__search {
  position: relative;
  display: flex;
  align-items: center;
}
.lib-toolbar__search input {
  width: 100%;
  padding: 0.8rem 1rem 0.8rem 2.6rem;
  border-radius: 50px;
  background: rgba(10, 14, 20, 0.85);
  border: 1px solid rgba(255,255,255,0.18);
  color: var(--text-primary);
  font-family: 'Outfit', sans-serif;
  font-size: 0.78rem;
  font-weight: 400;
  letter-spacing: 0.01em;
  outline: none;
  transition: all 0.3s var(--ease);
}
.lib-toolbar__search input::placeholder { color: var(--text-quiet); font-weight: 300; }
.lib-toolbar__search input:focus,
.lib-toolbar__search input:hover {
  border-color: rgba(117,194,73,0.28);
  background: rgba(117,194,73,0.04);
}
.lib-toolbar__search input:focus {
  box-shadow: 0 0 0 4px rgba(117,194,73,0.08);
}
.lib-toolbar__search-icon {
  position: absolute;
  left: 1rem;
  width: 14px;
  height: 14px;
  color: var(--text-muted);
  pointer-events: none;
}
.lib-toolbar__search-clear {
  position: absolute;
  right: 0.75rem;
  width: 22px;
  height: 22px;
  border-radius: 50%;
  background: rgba(255,255,255,0.06);
  display: none;
  align-items: center;
  justify-content: center;
  color: var(--text-muted);
  transition: all 0.25s ease;
}
.lib-toolbar__search-clear.visible { display: flex; }
.lib-toolbar__search-clear:hover { background: rgba(117,194,73,0.18); color: #fff; }
.lib-toolbar__search-clear svg { width: 10px; height: 10px; }

/* Sort dropdown */
.lib-toolbar__sort {
  position: relative;
}
.lib-toolbar__sort-btn {
  display: inline-flex;
  align-items: center;
  border-radius: 50px;
  background: rgba(255,255,255,0.03);
  border: 1px solid var(--glass-border);
  color: var(--text-secondary);
  font-family: 'Outfit', sans-serif;
  font-size: 0.7rem;
  font-weight: 500;
  letter-spacing: 0.02em;
  white-space: nowrap;
  transition: all 0.3s var(--ease);
}
@media (min-width: 769px) {
  .lib-toolbar__sort-btn {
    justify-content: space-between;
    gap: 0.5rem;
    padding: 0.7rem 1rem;
    min-width: 200px;
  }
}
.lib-toolbar__sort-btn-label {
  font-size: 0.55rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--text-quiet);
}
.lib-toolbar__sort-btn:hover,
.lib-toolbar__sort-btn[aria-expanded="true"] {
  color: #fff;
  border-color: rgba(117,194,73,0.25);
  background: rgba(117,194,73,0.05);
}
.lib-toolbar__sort-btn svg {
  transition: transform 0.3s var(--ease);
}
@media (min-width: 769px) {
  .lib-toolbar__sort-btn svg {
    width: 10px;
    height: 10px;
  }
}
.lib-toolbar__sort-btn[aria-expanded="true"] svg { transform: rotate(180deg); }
.lib-toolbar__sort-menu {
  position: absolute;
  top: calc(100% + 0.5rem);
  right: 0;
  min-width: 200px;
  padding: 0.5rem;
  border-radius: 14px;
  background: rgba(15, 20, 28, 0.95);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border: 1px solid var(--glass-border-hover);
  box-shadow: 0 18px 50px rgba(0,0,0,0.5);
  display: none;
  flex-direction: column;
  gap: 0.1rem;
  z-index: 1200;
}
.lib-toolbar__sort-menu.open { display: flex; }
/* Sort menu drops below the toolbar into the area where the next
   section + cards paint. Its z-index is otherwise resolved inside the
   toolbar-wrap's backdrop-filter stacking context and the cards below
   intercept clicks. Fix: when open, raise BOTH the wrap and the menu's
   immediate positioning parent into a high stacking context. The menu's
   own z-index is set high in its base block above. */
.lib-toolbar-wrap:has(.lib-toolbar__sort-menu.open) { z-index: 200; }
.lib-toolbar__sort:has(.lib-toolbar__sort-menu.open) { z-index: 200; }
.lib-toolbar__sort-option {
  padding: 0.55rem 0.85rem;
  border-radius: 8px;
  font-size: 0.7rem;
  color: var(--text-secondary);
  text-align: left;
  transition: all 0.25s ease;
}
.lib-toolbar__sort-option:hover { color: #fff; background: rgba(255,255,255,0.04); }
.lib-toolbar__sort-option.active { color: var(--green-light); background: rgba(117,194,73,0.08); }

/* Filters button */
.lib-toolbar__filters-btn {
  display: inline-flex;
  align-items: center;
  border-radius: 50px;
  background: rgba(117,194,73,0.06);
  border: 1px solid rgba(117,194,73,0.18);
  color: var(--text-primary);
  font-family: 'Outfit', sans-serif;
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.02em;
  white-space: nowrap;
  transition: all 0.3s var(--ease);
  position: relative;
}
@media (min-width: 769px) {
  .lib-toolbar__filters-btn {
    gap: 0.5rem;
    padding: 0.7rem 1.1rem;
  }
}
.lib-toolbar__filters-btn:hover,
.lib-toolbar__filters-btn[aria-expanded="true"] {
  background: rgba(117,194,73,0.12);
  border-color: rgba(117,194,73,0.32);
  box-shadow: 0 0 18px rgba(117,194,73,0.10);
}
@media (min-width: 769px) {
  .lib-toolbar__filters-btn svg.icon-filter {
    width: 12px;
    height: 12px;
  }
}
.lib-toolbar__filters-btn svg.icon-filter {
  color: var(--green-light);
}
.lib-toolbar__filters-btn svg.icon-chevron {
  width: 10px;
  height: 10px;
  transition: transform 0.4s var(--ease);
  color: var(--text-muted);
}
.lib-toolbar__filters-btn[aria-expanded="true"] svg.icon-chevron { transform: rotate(180deg); }
.lib-toolbar__filters-count {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 18px;
  height: 18px;
  padding: 0 0.4rem;
  border-radius: 50px;
  background: var(--green-primary);
  color: var(--bg-deep);
  font-size: 0.6rem;
  font-weight: 800;
  letter-spacing: 0;
  line-height: 1;
}
.lib-toolbar__filters-count[hidden] { display: none; }

/* First-scroll attention pulse */
@keyframes filterPulse {
  0%, 100% { box-shadow: 0 0 0 0 rgba(117,194,73,0); }
  30% { box-shadow: 0 0 0 8px rgba(117,194,73,0.15); }
  60% { box-shadow: 0 0 0 14px rgba(117,194,73,0); }
}
.lib-toolbar__filters-btn.pulse { animation: filterPulse 2.4s ease-out 0.6s 1; }

/* ─── FILTER PANEL — drops down below toolbar ─── */
.lib-panel {
  max-width: 1320px;
  margin: 0 auto;
  overflow: hidden;
  max-height: 0;
  transition: max-height 0.5s var(--ease);
}
.lib-panel.open { max-height: 800px; }

.lib-panel__inner {
  padding: 1.5rem 2rem 1.75rem;
  border-top: 1px solid var(--glass-border);
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 1.5rem 2rem;
  position: relative;
}
@media (max-width: 1024px) {
  .lib-panel__inner { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
  .lib-panel__inner { grid-template-columns: 1fr; padding: 1.2rem 1.25rem 1.4rem; gap: 1.2rem; }
}

/* ── Filter panel · mobile bottom-sheet (≤768) ─────────────────
   Accordion on desktop; on mobile it becomes a fixed sheet that
   scrolls internally (overscroll contained) so the page behind does
   not move. body.booking-locked (set by the JS) engages the shared
   sitewide scroll-lock backstop in polish.css. */
@media (max-width: 768px) {
  .lib-panel {
    position: fixed;
    left: 0;
    right: 0;
    bottom: 0;
    top: auto;
    max-width: none;
    margin: 0;
    max-height: 82vh;
    border-radius: 18px 18px 0 0;
    background: rgba(13, 17, 23, 0.98);
    border: 1px solid var(--glass-border-hover);
    border-bottom: none;
    box-shadow: 0 -18px 50px rgba(0,0,0,0.5);
    overflow-y: auto;
    overscroll-behavior: contain;
    -webkit-overflow-scrolling: touch;
    transform: translateY(100%);
    transition: transform 0.4s var(--ease);
    z-index: 1100;
    visibility: hidden;
  }
  .lib-panel.open {
    transform: translateY(0);
    visibility: visible;
    max-height: 82vh;          /* override desktop accordion max-height */
  }
  .lib-panel__inner { border-top: none; }
  /* Tap-to-dismiss backdrop (added by JS) */
  .lib-panel__backdrop {
    position: fixed;
    inset: 0;
    background: rgba(5, 8, 16, 0.6);
    backdrop-filter: blur(2px);
    -webkit-backdrop-filter: blur(2px);
    z-index: 1099;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s var(--ease);
  }
  .lib-panel__backdrop.open { opacity: 1; visibility: visible; }
}

.lib-panel__group {
  display: flex;
  flex-direction: column;
  gap: 0.55rem;
}
.lib-panel__group-label {
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
  margin-bottom: 0.2rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}
.lib-panel__group-label::before {
  content: '';
  width: 14px;
  height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}

.lib-panel__option {
  display: flex;
  align-items: center;
  gap: 0.55rem;
  min-height: 44px;
  padding: 0.4rem 0.55rem;
  border-radius: 8px;
  font-family: 'Outfit', sans-serif;
  font-size: 0.7rem;
  font-weight: 400;
  color: var(--text-secondary);
  text-align: left;
  cursor: pointer;
  transition: all 0.25s var(--ease);
  border: none;
  background: none;
  width: 100%;
}
.lib-panel__option:hover {
  color: #fff;
  background: rgba(255,255,255,0.03);
}
.lib-panel__option.active {
  color: var(--green-light);
  background: rgba(117,194,73,0.07);
}
.lib-panel__option-check {
  flex-shrink: 0;
  width: 14px;
  height: 14px;
  border-radius: 4px;
  border: 1.2px solid rgba(255,255,255,0.18);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.25s var(--ease);
}
.lib-panel__option.active .lib-panel__option-check {
  border-color: var(--green-primary);
  background: var(--green-primary);
}
.lib-panel__option-check svg { width: 9px; height: 9px; opacity: 0; }
.lib-panel__option.active .lib-panel__option-check svg { opacity: 1; }

/* Panel footer with Clear + Apply */
.lib-panel__footer {
  grid-column: 1 / -1;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 1.2rem;
  margin-top: 0.4rem;
  border-top: 1px solid var(--glass-border);
  gap: 1rem;
  flex-wrap: wrap;
}
.lib-panel__summary {
  font-size: 0.68rem;
  color: var(--text-muted);
  font-weight: 400;
}
.lib-panel__summary strong { color: var(--green-light); font-weight: 700; }
.lib-panel__actions {
  display: flex;
  gap: 0.6rem;
}
.lib-panel__btn {
  padding: 0.55rem 1.2rem;
  border-radius: 50px;
  font-family: 'Outfit', sans-serif;
  font-size: 0.68rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  cursor: pointer;
  transition: all 0.3s var(--ease);
  border: 1px solid transparent;
}
.lib-panel__btn--clear {
  background: transparent;
  color: var(--text-muted);
  border-color: var(--glass-border);
}
.lib-panel__btn--clear:hover { color: #fff; border-color: rgba(255,255,255,0.15); }
.lib-panel__btn--apply {
  background: linear-gradient(135deg, var(--green-primary), var(--green-light));
  color: var(--bg-deep);
  border-color: transparent;
  box-shadow: 0 8px 24px rgba(0,0,0,0.35), inset 0 1px 0 rgba(255,255,255,0.22);
}
.lib-panel__btn--apply:hover {
  transform: translateY(-1px);
  box-shadow: 0 6px 22px rgba(117,194,73,0.28);
}

/* Search/filter status bar (above grid) */
.lib-status {
  max-width: 1320px;
  margin: 0 auto;
  padding: 1.2rem 2rem 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  flex-wrap: wrap;
}
.lib-status__count {
  font-size: 0.6rem;
  font-weight: 500;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--text-quiet);
}
.lib-status__count strong { color: var(--green-light); font-weight: 700; }
.lib-status__active {
  display: flex;
  flex-wrap: wrap;
  gap: 0.4rem;
  align-items: center;
}
.lib-status__chip {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.25rem 0.65rem 0.25rem 0.75rem;
  border-radius: 50px;
  background: rgba(117,194,73,0.08);
  border: 1px solid rgba(117,194,73,0.2);
  color: var(--green-light);
  font-size: 0.62rem;
  font-weight: 500;
}
.lib-status__chip-x {
  width: 14px;
  height: 14px;
  border-radius: 50%;
  background: rgba(117,194,73,0.18);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.25s ease;
}
.lib-status__chip-x:hover { background: rgba(117,194,73,0.32); }
.lib-status__chip-x svg { width: 7px; height: 7px; color: var(--green-light); }
.lib-status__clear {
  font-size: 0.6rem;
  font-weight: 500;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--text-quiet);
  cursor: pointer;
  padding: 0.25rem 0.5rem;
  border-radius: 4px;
  transition: color 0.25s ease;
  border: none;
  background: none;
  font-family: 'Outfit', sans-serif;
}
.lib-status__clear:hover { color: var(--green-light); }
.lib-status__clear[hidden] { display: none; }

@media (max-width: 768px) {
  .lib-toolbar-wrap { top: 4.5rem; }
  .lib-toolbar { background: rgba(8, 11, 16, 0.96); }
  .lib-status { padding: 1rem 1.25rem 0; }
}


/* ───────────────────────────────────────────────
   §6 PAGE HEADER (replaces hero) — minimal, anchored
   ─────────────────────────────────────────────── */
.lib-page-header {
  position: relative;
  padding: 9rem 2rem 4rem;
  overflow: hidden;
}
.lib-page-header__ambient {
  position: absolute;
  inset: 0;
  pointer-events: none;
  z-index: 0;
}
.lib-page-header__ambient::before {
  content: '';
  position: absolute;
  top: 10%;
  left: -10%;
  width: 50vw;
  height: 50vw;
  max-width: 700px;
  max-height: 700px;
  background: radial-gradient(circle, rgba(47,105,66,0.22) 0%, rgba(117,194,73,0.06) 35%, transparent 65%);
  border-radius: 50%;
  animation: heroGlow 14s ease-in-out infinite;
  filter: blur(16px);
}
.lib-page-header__ambient::after {
  content: '';
  position: absolute;
  bottom: -10%;
  right: -10%;
  width: 45vw;
  height: 45vw;
  max-width: 600px;
  max-height: 600px;
  background: radial-gradient(circle, rgba(180,140,50,0.04) 0%, transparent 50%), radial-gradient(circle at 60% 60%, rgba(117,194,73,0.08) 0%, transparent 55%);
  border-radius: 50%;
  animation: heroGlow 18s ease-in-out infinite reverse;
  filter: blur(16px);
}
.lib-page-header__inner {
  max-width: 1320px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
  align-items: flex-start;
}
.lib-page-header__title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(2.2rem, 4.6vw, 3.8rem);
  font-weight: 900;
  line-height: 1.05;
  letter-spacing: -0.02em;
  color: var(--text-primary);
  text-shadow: 0 2px 30px rgba(0,0,0,0.4);
  max-width: 900px;
}
.lib-page-header__sub {
  font-family: 'Playfair Display', serif;
  font-size: clamp(0.95rem, 1.4vw, 1.2rem);
  font-style: italic;
  line-height: 1.55;
  color: var(--text-secondary);
  font-weight: 400;
  max-width: 640px;
}
@media (max-width: 768px) {
  .lib-page-header { padding: 6.5rem 1.25rem 2.5rem; }
  /* 5 · hide section-intro eyebrow + sub on mobile to save space
     (kept in DOM for SEO; H1 remains visible). Scoped to page-header
     so the global .eyebrow used site-wide is unaffected. */
  .lib-page-header .eyebrow,
  .lib-page-header__sub { display: none; }
}


/* ───────────────────────────────────────────────
   COMMON SECTION FRAME
   ─────────────────────────────────────────────── */
.lib-section {
  position: relative;
  padding: 5rem 2rem;
  overflow: hidden;
  /* Paint deferral — browser skips render work for offscreen sections
     until they near the viewport. Reserves space via contain-intrinsic-size. */
  content-visibility: auto;
  contain-intrinsic-size: 1px 800px;
}
/* Atmospheric edge fades · creates depth between layered sections */
.lib-section::before,
.lib-section::after {
  content: '';
  position: absolute;
  left: 0; right: 0;
  height: 100px;
  pointer-events: none;
  z-index: 1;
}
.lib-section::before {
  top: 0;
  background: linear-gradient(180deg, rgba(0,0,0,0.25) 0%, transparent 100%);
}
.lib-section::after {
  bottom: 0;
  background: linear-gradient(0deg, rgba(0,0,0,0.15) 0%, transparent 100%);
}
.lib-section--mid { background: rgba(10, 14, 20, 0.55); }
.lib-section--darker { background: rgba(8, 12, 18, 0.6); }
.lib-section--darkest { background: rgba(5, 8, 16, 0.65); }

.lib-section__inner {
  max-width: 1320px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

.lib-section__head {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-bottom: 2.5rem;
  max-width: 720px;
}
.lib-section__head--row {
  flex-direction: row;
  align-items: flex-end;
  justify-content: space-between;
  max-width: none;
}

.lib-section__title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.4rem, 2.6vw, 2.1rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
}
.lib-section__sub {
  font-family: 'Outfit', sans-serif;
  font-size: clamp(0.78rem, 1vw, 0.9rem);
  font-weight: 300;
  color: var(--text-muted);
  line-height: 1.65;
  max-width: 580px;
}

@media (max-width: 768px) {
  .lib-section { padding: 2rem 1.25rem; }
  .lib-section__head { margin-bottom: 1.5rem; }
  .lib-section__head--row { flex-direction: column; align-items: flex-start; gap: 0.6rem; }
}
@media (max-width: 480px) {
  .lib-section { padding: 1.5rem 1rem; }
  .lib-section__head { margin-bottom: 1.5rem; }
}

/* Ambient layer (reusable per section) */
.lib-section__ambient {
  position: absolute;
  inset: 0;
  pointer-events: none;
  z-index: 0;
  opacity: 0.6;
}
.lib-section__ambient--left::before {
  content: '';
  position: absolute;
  top: -10%;
  left: -10%;
  width: 50vw;
  height: 50vw;
  max-width: 700px;
  max-height: 700px;
  background: radial-gradient(circle, rgba(47,105,66,0.18) 0%, transparent 60%);
  border-radius: 50%;
  filter: blur(16px);
}
.lib-section__ambient--right::after {
  content: '';
  position: absolute;
  bottom: -10%;
  right: -10%;
  width: 45vw;
  height: 45vw;
  max-width: 600px;
  max-height: 600px;
  background: radial-gradient(circle, rgba(117,194,73,0.10) 0%, transparent 55%);
  border-radius: 50%;
  filter: blur(16px);
}


/* ───────────────────────────────────────────────
   CARD SYSTEM — used in Rows 1, 2, 3
   ─────────────────────────────────────────────── */
.lib-grid {
  display: grid;
  gap: 1.25rem;
  max-width: 1280px;
  margin-left: auto;
  margin-right: auto;
}
/* B-fix: grid fades in as one settled unit after JS injects cards, so a
   scrolled reload never shows the bare gradient art-strips mid-injection. */
#full-grid {
  opacity: 1;
  transition: opacity 0.45s cubic-bezier(0.22, 1, 0.36, 1);
}
/* Hide instantly (no transition on the way down) so the art never flashes;
   only the fade-IN is animated when is-loading is removed. */
#full-grid.is-loading { opacity: 0; transition: none; }
.lib-grid--3 { grid-template-columns: repeat(3, 1fr); }
.lib-grid--4 { grid-template-columns: repeat(4, 1fr); }

@media (max-width: 1024px) {
  .lib-grid--3 { grid-template-columns: repeat(2, 1fr); }
  .lib-grid--4 { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 768px) {
  .lib-grid--3, .lib-grid--4 { grid-template-columns: repeat(2, 1fr); gap: 0.85rem; }
}
@media (max-width: 480px) {
  .lib-grid--3, .lib-grid--4 { grid-template-columns: repeat(2, 1fr); gap: 0.65rem; }
}
@media (max-width: 360px) {
  .lib-grid--3, .lib-grid--4 { grid-template-columns: repeat(2, 1fr); gap: 0.6rem; }
}

.lib-card {
  position: relative;
  border-radius: 16px;
  background: rgba(255,255,255,0.02);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  overflow: hidden;
  isolation: isolate;
  cursor: pointer;
  transition: all 0.5s var(--ease);
  /* Cinematic resting depth · sits below toolbar */
  box-shadow:
    0 1px 2px rgba(0,0,0,0.3),
    0 8px 20px rgba(0,0,0,0.2),
    0 18px 48px rgba(0,0,0,0.18),
    inset 0 1px 0 rgba(255,255,255,0.04);
  display: flex;
  flex-direction: column;
}
.lib-card::after {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 50%;
  height: 100%;
  background: linear-gradient(105deg, transparent 30%, rgba(255,255,255,.015) 45%, rgba(255,255,255,.04) 50%, rgba(255,255,255,.015) 55%, transparent 70%);
  animation: cardSweep 9s ease-in-out infinite;
  pointer-events: none;
  z-index: 3;
}
@keyframes cardSweep {
  0%, 100% { left: -100%; }
  50% { left: 120%; }
}
.lib-card:hover {
  border-color: rgba(117,194,73,0.18);
  transform: translateY(-2px);
  box-shadow:
    0 1px 2px rgba(0,0,0,0.4),
    0 14px 32px rgba(0,0,0,0.35),
    0 28px 70px rgba(0,0,0,0.4),
    0 0 32px rgba(117,194,73,0.08),
    inset 0 1px 0 rgba(255,255,255,0.06);
}

.lib-card__art {
  position: relative;
  aspect-ratio: 4 / 5;
  overflow: hidden;
  border-top-left-radius: 16px;
  border-top-right-radius: 16px;
  background: #0a0e14;
  isolation: isolate;
}
.lib-card__art-bg {
  position: absolute;
  inset: 0;
  z-index: 0;
  background-size: cover;
  background-position: center top;
  transition: transform 1.2s var(--ease), filter 0.6s var(--ease);
}
.lib-card__art-bg img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center top;
  display: block;
}
.lib-card:hover .lib-card__art-bg {
  transform: scale(1.06);
  filter: brightness(1.1);
}
.lib-card__art::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 30% 30%, transparent 0%, rgba(5,8,16,0.35) 90%),
    linear-gradient(to top, rgba(5,8,16,0.7) 0%, transparent 50%);
  z-index: 1;
  pointer-events: none;
}

.lib-card__badge {
  position: absolute;
  top: 0.7rem;
  left: 0.7rem;
  z-index: 2;
  display: inline-flex;
  align-items: center;
  gap: 0.3rem;
  padding: 0.25rem 0.55rem;
  border-radius: 50px;
  font-size: 0.46rem;
  font-weight: 700;
  letter-spacing: 0.16em;
  text-transform: uppercase;
}
.lib-card__badge--new { background: rgba(117,194,73,0.18); color: var(--green-light); border: 1px solid rgba(117,194,73,0.35); }
.lib-card__badge--flagship { background: rgba(180,140,50,0.12); color: #d4b56e; border: 1px solid rgba(180,140,50,0.32); }
.lib-card__badge--free { background: rgba(255,255,255,0.10); color: #fff; border: 1px solid rgba(255,255,255,0.22); }
.lib-card__badge--bundle { background: rgba(117,194,73,0.10); color: var(--green-light); border: 1px solid rgba(117,194,73,0.22); }
.lib-card__badge--limited { background: rgba(180,140,50,0.10); color: #d4b56e; border: 1px solid rgba(180,140,50,0.25); }



/* ── Body · simplified · no foot row · no tagline ── */
/* Fonts/spacing match library-inner .rec-card for cross-page consistency */
.lib-card__body {
  padding: 0.95rem 1.05rem 1.1rem;
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
  position: relative;
  z-index: 2;
}

.lib-card__meta {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  gap: 0.3rem 0.4rem;
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--green-light);
}
.lib-card__meta-divider {
  width: 3px;
  height: 3px;
  border-radius: 50%;
  background: rgba(187,214,122,0.4);
}
.lib-card__meta-region { color: var(--text-muted); }

.lib-card__name {
  font-family: 'Playfair Display', serif;
  font-size: 0.92rem;
  font-weight: 700;
  line-height: 1.2;
  color: var(--text-primary);
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
.cc-card-title-row {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  min-width: 0;
}
.cc-card-actions {
  position: absolute;
  bottom: 0.7rem;
  right: 0.7rem;
  z-index: 3;
  display: inline-flex;
  align-items: center;
  gap: 0.1rem;
  padding: 0.15rem;
  border-radius: 50px;
  background: rgba(8, 12, 18, 0.55);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border: 1px solid rgba(255,255,255,0.12);
}
.cc-card-action-btn {
  appearance: none;
  -webkit-appearance: none;
  background: transparent;
  border: 0;
  padding: 0.32rem;
  margin: 0;
  cursor: pointer;
  border-radius: 50%;
  color: rgba(255,255,255,0.92);
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

.lib-card__artist {
  font-size: 0.62rem;
  color: var(--text-quiet);
  font-style: italic;
  font-weight: 300;
  line-height: 1.35;
}

/* Mobile · tighter spacing/fonts to match library-inner mobile rec-card */
@media (max-width: 600px) {
  .lib-card__body { padding: 0.85rem 0.85rem 0.9rem; gap: 0.45rem; }
  .lib-card__meta { font-size: 0.42rem; letter-spacing: 0.16em; }
  .lib-card__name { font-size: 0.78rem; line-height: 1.2; }
  .lib-card__artist { font-size: 0.55rem; }
}

/* ── Card footer geometry · mobile (≤600) ──────────────────────
   Title full (wrap to max 2 lines, reserved height so 2-up cards
   align), artist + region hidden to save space (kept in DOM/backend),
   wishlist+cart on their own row below the title. */
@media (max-width: 600px) {
  /* 4 · drop region tag, keep family only (region stays in DOM) */
  .lib-card__meta-region,
  .lib-card__meta-divider { display: none; }

  /* 1 · title full, wrap to 2 lines max, reserved height = both cards align */
  .cc-card-title-row {
    display: block;            /* title no longer shares row with actions */
    min-width: 0;
  }
  .lib-card__name {
    white-space: normal;        /* was nowrap+ellipsis — allow wrap */
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    min-height: calc(0.78rem * 1.2 * 2);   /* reserve 2 lines → 1-line & 2-line cards align */
    flex: none;
  }

  /* 3 · actions on their own row under the title (heart + cart kept).
     §25-override lives in its own 768 block below (matches §25's range). */
  .cc-card-action-btn {
    width: 32px;
    height: 32px;
    padding: 0;
  }
  .cc-card-action-btn svg { width: 18px; height: 18px; }

  /* 2 · artist line hidden on mobile (kept in DOM/desktop) */
  .lib-card__artist { display: none; }
}

/* ── Price · floating pill on art (top-right) · Splice pattern ── */
.lib-card__price {
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
  font-family: 'Outfit', sans-serif;
  font-size: 0.66rem;
  font-weight: 700;
  letter-spacing: 0.02em;
  color: var(--text-primary);
  font-variant-numeric: tabular-nums;
  box-shadow: 0 4px 14px rgba(0,0,0,0.35);
  transition: all 0.3s var(--ease);
}
.lib-card:hover .lib-card__price {
  background: rgba(13,17,23,0.92);
  border-color: rgba(117,194,73,0.25);
}
.lib-card__price--free {
  background: rgba(117,194,73,0.18);
  border-color: rgba(117,194,73,0.4);
  color: var(--green-light);
  text-transform: uppercase;
  font-size: 0.56rem;
  letter-spacing: 0.16em;
  font-weight: 700;
}
.lib-card:hover .lib-card__price--free {
  background: rgba(117,194,73,0.28);
  border-color: rgba(117,194,73,0.55);
}

/* ══════════════════════════════════════════════════════════
   FORMAT CHIP — compatibility tag, BOTTOM-LEFT of card art
   Vocabulary: FOR KONTAKT · FOR KONTAKT PLAYER · STANDALONE APP · PLUGIN (VST3·AU)
   ══════════════════════════════════════════════════════════ */
.cc-format-chip {
  display: inline-flex;
  align-self: flex-start;
  align-items: center;
  gap: 0.3rem;
  padding: 0.14rem 0.45rem;
  border-radius: 4px;
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.10);
  font-family: 'Outfit', sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.7);
  white-space: nowrap;
  transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
}
.cc-format-chip::before {
  content: '';
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: #75C249;
}
.lib-card:hover .cc-format-chip {
  background: rgba(13,17,23,0.92);
  border-color: rgba(117,194,73,0.3);
  color: #fff;
}
@media (max-width: 768px) {
  .cc-format-chip {
    font-size: 0.42rem;
    letter-spacing: 0.1em;
    padding: 0.12rem 0.4rem;
  }
}

/* Filtering states */
.lib-card.is-hidden {
  display: none;
}

/* ───────────────────────────────────────────────
   §6 BUNDLES — editorial 2-card layout
   ─────────────────────────────────────────────── */
.lib-bundles {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.5rem;
}
@media (max-width: 1024px) {
  .lib-bundles { grid-template-columns: 1fr; }
}

.lib-bundle {
  position: relative;
  padding: 2.5rem 2.5rem 2.2rem;
  border-radius: 20px;
  background: rgba(255,255,255,0.025);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  overflow: hidden;
  isolation: isolate;
  transition: all 0.5s var(--ease);
  display: flex;
  flex-direction: column;
  gap: 1.4rem;
  box-shadow: 0 14px 50px rgba(0,0,0,0.3), inset 0 1px 0 rgba(255,255,255,0.04);
}
.lib-bundle::before {
  content: '';
  position: absolute;
  top: -40%;
  right: -20%;
  width: 60%;
  height: 140%;
  background: radial-gradient(ellipse, rgba(180,140,50,0.04) 0%, transparent 60%);
  pointer-events: none;
  z-index: 0;
}
.lib-bundle::after {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 60%;
  height: 100%;
  background: linear-gradient(105deg, transparent 30%, rgba(255,255,255,.02) 50%, transparent 70%);
  animation: cardSweep 11s ease-in-out infinite;
  pointer-events: none;
  z-index: 1;
}
.lib-bundle:hover {
  border-color: rgba(117,194,73,0.18);
  transform: translateY(-3px);
  box-shadow: 0 24px 70px rgba(0,0,0,0.5), 0 0 36px rgba(117,194,73,0.06), inset 0 1px 0 rgba(255,255,255,0.06);
}
.lib-bundle > * { position: relative; z-index: 2; }

.lib-bundle__head {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
}
.lib-bundle__eyebrow {
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: #d4b56e;
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.lib-bundle__eyebrow::before {
  content: '';
  width: 18px;
  height: 1px;
  background: linear-gradient(90deg, #d4b56e, transparent);
}
.lib-bundle__name {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.4rem, 2.4vw, 2rem);
  font-weight: 900;
  line-height: 1.1;
  color: var(--text-primary);
}
.lib-bundle__desc {
  font-size: 0.78rem;
  font-weight: 300;
  line-height: 1.6;
  color: var(--text-muted);
}

.lib-bundle__includes {
  display: flex;
  flex-wrap: wrap;
  gap: 0.45rem;
}
.lib-bundle__chip {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.4rem 0.8rem;
  border-radius: 50px;
  background: rgba(255,255,255,0.03);
  border: 1px solid rgba(255,255,255,0.06);
  font-size: 0.62rem;
  font-weight: 500;
  color: var(--text-secondary);
  transition: all 0.3s var(--ease);
}
.lib-bundle__chip:hover {
  border-color: rgba(117,194,73,0.2);
  color: #fff;
  background: rgba(117,194,73,0.05);
}

.lib-bundle__price {
  display: flex;
  align-items: baseline;
  gap: 1rem;
  padding-top: 1.3rem;
  border-top: 1px solid var(--glass-border);
}
.lib-bundle__price-now {
  font-family: 'Playfair Display', serif;
  font-size: 2rem;
  font-weight: 900;
  color: var(--text-primary);
  font-variant-numeric: tabular-nums;
}
.lib-bundle__price-was {
  font-size: 0.72rem;
  font-weight: 400;
  color: var(--text-quiet);
  text-decoration: line-through;
  text-decoration-color: rgba(255,255,255,0.25);
  font-variant-numeric: tabular-nums;
}
.lib-bundle__save {
  margin-left: auto;
  font-size: 0.6rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  align-self: center;
}
.lib-bundle__actions {
  display: flex;
  gap: 0.6rem;
  flex-wrap: wrap;
}
.lib-bundle__actions .cta {
  flex: 1 1 100%;
  justify-content: center;
}
@media (max-width: 768px) {
  .lib-bundle { padding: 1.8rem 1.5rem; }
  .lib-bundle__price-now { font-size: 1.6rem; }
}

/* ───────────────────────────────────────────────
   §7 CUSTOM RECORDING CTA
   ─────────────────────────────────────────────── */
.lib-custom {
  position: relative;
  padding: 3.5rem 3rem;
  border-radius: 24px;
  background: linear-gradient(135deg, rgba(15,20,28,0.7), rgba(8,12,18,0.7));
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  overflow: hidden;
  isolation: isolate;
  display: grid;
  grid-template-columns: 1fr 1.05fr;
  gap: 3rem;
  align-items: center;
  box-shadow: 0 24px 80px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.04);
}
.lib-custom::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 80% 50%, rgba(47,105,66,0.10) 0%, transparent 50%),
    radial-gradient(ellipse at 20% 80%, rgba(180,140,50,0.05) 0%, transparent 50%);
  z-index: 0;
}
.lib-custom > * { position: relative; z-index: 2; }

.lib-custom__copy { display: flex; flex-direction: column; gap: 1.4rem; }
.lib-custom__title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.8rem, 3.4vw, 2.8rem);
  font-weight: 900;
  line-height: 1.1;
  letter-spacing: -0.01em;
  color: var(--text-primary);
}
.lib-custom__sub {
  font-size: 0.92rem;
  line-height: 1.7;
  color: var(--text-muted);
  font-weight: 300;
  max-width: 540px;
}
.lib-custom__ctas {
  display: flex;
  flex-wrap: wrap;
  gap: 0.6rem;
  margin-top: 0.6rem;
}

/* ── Custom Recording · 3D-style microphone visual ── */
/* ─────────────────────────────────────────────
   Custom Recording · Studio Session Scene (SVG)
   Hand-drawn 3/4 perspective recording stage.
   Multi-mic Decca-tree style around the source.
   ───────────────────────────────────────────── */
.lib-custom__visual {
  position: relative;
  width: 100%;
  aspect-ratio: 4 / 3;
  border-radius: 18px;
  background:
    radial-gradient(ellipse 90% 60% at 50% 100%, rgba(117,194,73,0.18) 0%, transparent 60%),
    radial-gradient(ellipse 80% 50% at 50% 0%, rgba(47,105,66,0.10) 0%, transparent 55%),
    linear-gradient(180deg, #0f1820 0%, #0a1015 50%, #050810 100%);
  border: 1px solid rgba(187,214,122,0.10);
  overflow: hidden;
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.05),
    inset 0 -60px 100px rgba(0,0,0,0.4),
    0 24px 60px rgba(0,0,0,0.5);
  isolation: isolate;
}
/* Atmospheric dust motes */
.lib-custom__visual::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image:
    radial-gradient(1.5px 1.5px at 14% 18%, rgba(255,255,255,0.5), transparent 50%),
    radial-gradient(1px 1px at 78% 22%, rgba(187,214,122,0.6), transparent 50%),
    radial-gradient(2px 2px at 62% 12%, rgba(255,255,255,0.35), transparent 50%),
    radial-gradient(1px 1px at 18% 50%, rgba(117,194,73,0.45), transparent 50%),
    radial-gradient(1px 1px at 88% 60%, rgba(255,255,255,0.55), transparent 50%),
    radial-gradient(1.5px 1.5px at 32% 32%, rgba(187,214,122,0.4), transparent 50%);
  opacity: 0.85;
  animation: customMotes 14s ease-in-out infinite;
  pointer-events: none;
  z-index: 4;
}
@keyframes customMotes {
  0%, 100% { opacity: 0.55; }
  50% { opacity: 1; }
}
/* Volumetric god-ray from above the stage */
.lib-custom__visual::after {
  content: '';
  position: absolute;
  top: -10%;
  left: 50%;
  transform: translateX(-50%);
  width: 60%;
  height: 110%;
  background:
    linear-gradient(180deg,
      rgba(187,214,122,0.10) 0%,
      rgba(117,194,73,0.06) 35%,
      transparent 75%);
  filter: blur(16px);
  pointer-events: none;
  z-index: 1;
  animation: godRay 8s ease-in-out infinite;
}
@keyframes godRay {
  0%, 100% { opacity: 0.6; }
  50% { opacity: 1; }
}
.lib-custom__svg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 3;
  display: block;
}
/* Animation hooks for SVG elements */
.lib-custom__svg .ring-pulse {
  transform-origin: center;
  animation: ringPulse 4s cubic-bezier(0.22, 1, 0.36, 1) infinite;
}
.lib-custom__svg .ring-pulse--2 { animation-delay: 1.3s; }
.lib-custom__svg .ring-pulse--3 { animation-delay: 2.6s; }
@keyframes ringPulse {
  0%   { transform: scale(0.15); opacity: 0.9; }
  100% { transform: scale(1); opacity: 0; }
}
.lib-custom__svg .source-glow {
  transform-origin: center;
  animation: sourceGlow 3.5s ease-in-out infinite;
}
@keyframes sourceGlow {
  0%, 100% { opacity: 0.55; transform: scale(1); }
  50%      { opacity: 1; transform: scale(1.08); }
}
.lib-custom__svg .led-blink {
  animation: ledBlink 2.4s ease-in-out infinite;
}
@keyframes ledBlink {
  0%, 100% { opacity: 0.85; filter: drop-shadow(0 0 4px rgba(117,194,73,0.7)); }
  50%      { opacity: 1; filter: drop-shadow(0 0 8px rgba(117,194,73,1)); }
}
.lib-custom__svg .mic-rig {
  transform-origin: center bottom;
  transform-box: fill-box;
}
.lib-custom__svg .mic-rig--center {
  animation: micSwayCenter 7s ease-in-out infinite;
}
.lib-custom__svg .mic-rig--left {
  animation: micSwayLeft 8s ease-in-out infinite;
}
.lib-custom__svg .mic-rig--right {
  animation: micSwayRight 9s ease-in-out infinite;
}
@keyframes micSwayCenter {
  0%, 100% { translate: 0 0; }
  50%      { translate: 0 -2px; }
}
@keyframes micSwayLeft {
  0%, 100% { translate: 0 0; }
  50%      { translate: 0 -1.5px; }
}
@keyframes micSwayRight {
  0%, 100% { translate: 0 0; }
  50%      { translate: 0 -1.5px; }
}

@media (max-width: 1024px) {
  .lib-custom { grid-template-columns: 1fr; padding: 3rem 2rem; gap: 2rem; text-align: center; }
  .lib-custom__visual { max-width: 420px; margin: 0 auto; }
  .lib-custom__copy { align-items: center; }
  .lib-custom__sub { margin: 0 auto; }
  .lib-custom__ctas { justify-content: center; }
  .lib-custom__copy .eyebrow { justify-content: center; align-self: center; }
}
@media (max-width: 768px) {
  .lib-custom { padding: 2.5rem 1.5rem; border-radius: 18px; gap: 1.6rem; }
}

/* ───────────────────────────────────────────────
   §8 FAQ — instr-faq pattern (matches instrument-inner)
   ─────────────────────────────────────────────── */
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
  content: '';
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.instr-faq__title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.5rem, 2.6vw, 2.1rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.instr-faq__title-accent {
  display: inline-block;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 50%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.instr-faq__sub {
  font-family: 'Outfit', sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
}
@media (max-width: 640px) {
  .instr-faq__head { gap: 0.55rem; margin-bottom: 1.4rem; }
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
  content: '';
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
  border-color: rgba(117,194,73,0.32);
  box-shadow:
    0 12px 32px rgba(0,0,0, 0.25),
    0 0 28px rgba(117,194,73, 0.08),
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
  font-family: 'Playfair Display', serif;
  font-size: 0.98rem;
  font-weight: 700;
  line-height: 1.35;
  color: var(--text-primary);
  margin: 0;
}
@media (max-width: 640px) {
  .faq-item__summary { padding: 0.9rem 1rem; gap: 0.7rem; }
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
  content: '';
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
  .faq-item__body { padding: 0 1rem 1rem 1rem; }
}
.faq-item__a {
  font-family: 'Outfit', sans-serif;
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
  font-family: 'Playfair Display', serif;
  font-weight: 400;
}
.faq-item__a strong {
  font-weight: 600;
  color: var(--text-primary);
  font-family: 'Outfit', sans-serif;
}

/* Soft post-FAQ contact prompt */

@media (prefers-reduced-motion: reduce) {
  .faq-item, .faq-item__icon { transition: none !important; }
  .faq-item[open] .faq-item__icon { transform: none !important; }
}


/* ───────────────────────────────────────────────
   ACCESSIBILITY: reduced motion
   ─────────────────────────────────────────────── */
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
  [data-reveal] { opacity: 1 !important; transform: none !important; }
}

/* Selection */
::selection { background: rgba(117,194,73,0.25); color: #fff; }

/* Scrollbar (optional polish) */
::-webkit-scrollbar { width: 10px; }
::-webkit-scrollbar-track { background: var(--bg-darker); }
::-webkit-scrollbar-thumb { background: rgba(117,194,73,0.18); border-radius: 10px; }
::-webkit-scrollbar-thumb:hover { background: rgba(117,194,73,0.32); }


/* ═══════════════════════════════════════════════════════════════
   PERF-FIX · paint-cost reduction (added v4 polish pass)
   Eliminates scroll-time glitches caused by:
   - 14 simultaneous backdrop-filter rasterizations on catalogue cards
   - 18 rest-state infinite animations triggering paints during scroll
   - mix-blend-mode on full-page noise texture (DESIGN-SYSTEM §11 ban)

   Scope: page body only. Nav + footer keep their motion (locked).
   Net effect: scroll FPS stutter resolves. Cards become flat dark
   panes (still readable as cards); ambient orbs become static
   radial gradients; custom-recording SVG becomes a film still.
   ═══════════════════════════════════════════════════════════════ */

/* ── CUT 1 · Drop backdrop-filter on catalogue cards ──────────
   14 cards × backdrop-filter blur = 14 separate raster regions
   re-painted every scroll frame. Single biggest scroll cost. */
.lib-card {
  backdrop-filter: none;
  -webkit-backdrop-filter: none;
  /* Slightly stronger fill to compensate for lost glass effect */
  background: rgba(255,255,255,0.025);
}

/* ── CUT 2 · Freeze rest-state infinite animations ────────────
   Each animation: none kill is scoped to a specific selector,
   never to a container. Nav and footer animations preserved. */

/* Page-header ambient orbs */
.lib-page-header__ambient::before,
.lib-page-header__ambient::after { animation: none !important; opacity: 0.55; }

/* Section ambient orbs (lib-section__ambient--left / --right) */
.lib-section__ambient::before,
.lib-section__ambient::after,
.lib-section__ambient--left::before,
.lib-section__ambient--right::after { animation: none !important; }

/* Catalogue card shimmer sweep — 14 simultaneous = busy + costly */
.lib-card::after { animation: none !important; display: none; }

/* Rest-state status indicators */
.pulse-dot { animation: none !important; }

/* Custom Recording — freeze SVG ring pulses, glow, LED, mic sway */
.lib-custom__visual::before,
.lib-custom__visual::after { animation: none !important; opacity: 0.75; }
.lib-custom__svg .ring-pulse,
.lib-custom__svg .ring-pulse--2,
.lib-custom__svg .ring-pulse--3,
.lib-custom__svg .source-glow,
.lib-custom__svg .led-blink,
.lib-custom__svg .mic-rig,
.lib-custom__svg .mic-rig--center,
.lib-custom__svg .mic-rig--left,
.lib-custom__svg .mic-rig--right { animation: none !important; }

/* Frozen elements get static mid-state opacities so they read
   as a still frame, not as broken animation */
.lib-custom__svg .ring-pulse    { opacity: 0.55; }
.lib-custom__svg .ring-pulse--2 { opacity: 0.35; }
.lib-custom__svg .ring-pulse--3 { opacity: 0.20; }
.lib-custom__svg .source-glow   { opacity: 0.70; }
.lib-custom__svg .led-blink     { opacity: 0.85; }

/* ── CUT 3 · Remove mix-blend-mode on body noise ──────────────
   mix-blend-mode forces a stacking context that re-composites
   every scroll frame. Static opacity is visually near-identical
   and costs nothing. */
body::before {
  mix-blend-mode: normal;
  opacity: 0.022;
}

/* END PERF-FIX */


/* ── §25 override (02 only) · re-show card actions on mobile ──────
   polish.css §25 hides .cc-card-actions ≤768 sitewide. On THIS page the
   actions are a frosted pill overlaid bottom-right on the card art (not
   in the body), so §25's row-geometry concern doesn't apply. Higher
   specificity (.lib-card …) beats §25 without !important. */
@media (max-width: 768px) {
  .lib-card .cc-card-actions {
    display: inline-flex;
  }
}
</style>

<style id="cc-shop-header-motion">
/* PAGE-UNIQUE · Catalogue header signature "Quick beat" (Phase-5 motion).
   02 is transactional — light/snappy, NOT cinematic. Enriches the EXISTING header
   reveal only: eyebrow -> title -> sub already stagger via [data-reveal] + .d1/.d2
   delays; here they arrive with a crisper, more confident fade-rise so the shop opens
   with one clean beat, then the grid is immediately usable. Transition-only, driven by
   the existing .is-revealed toggle; delays baked in so the block owns header timing.
   No JS, no keyframes, no markup change, NO scale (keeps .gradient-text crisp + fast).
   Desktop + no-reduced-motion only; below 1025px / reduced-motion keep polish's plain
   fade (mobile hides eyebrow + sub anyway). */
@media (min-width: 1025px) and (prefers-reduced-motion: no-preference) {
  .lib-page-header .eyebrow[data-reveal] {
    opacity: 0;
    transform: translateY(14px);
    transition:
      opacity   0.50s cubic-bezier(0.22, 1, 0.36, 1) 0s,
      transform 0.50s cubic-bezier(0.22, 1, 0.36, 1) 0s;
  }
  .lib-page-header__title[data-reveal] {
    opacity: 0;
    transform: translateY(22px);
    transition:
      opacity   0.60s cubic-bezier(0.22, 1, 0.36, 1) 0.05s,
      transform 0.60s cubic-bezier(0.22, 1, 0.36, 1) 0.05s;
  }
  .lib-page-header__sub[data-reveal] {
    opacity: 0;
    transform: translateY(16px);
    transition:
      opacity   0.55s cubic-bezier(0.22, 1, 0.36, 1) 0.14s,
      transform 0.55s cubic-bezier(0.22, 1, 0.36, 1) 0.14s;
  }
  .lib-page-header .eyebrow[data-reveal].is-revealed,
  .lib-page-header__title[data-reveal].is-revealed,
  .lib-page-header__sub[data-reveal].is-revealed {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
<!-- ─── Stage 3 JSON-LD: CollectionPage + BreadcrumbList ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "@id": "https://cryptocipher.in/instruments#webpage",
  "url": "https://cryptocipher.in/instruments",
  "name": "Indian Virtual Instruments for Kontakt",
  "isPartOf": { "@id": "https://cryptocipher.in/#website" },
  "about": { "@id": "https://cryptocipher.in/#organization" },
  "breadcrumb": { "@id": "https://cryptocipher.in/instruments#breadcrumb" }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "@id": "https://cryptocipher.in/instruments#breadcrumb",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://cryptocipher.in/" },
    { "@type": "ListItem", "position": 2, "name": "Instruments", "item": "https://cryptocipher.in/instruments" }
  ]
}
</script>

<!-- ─── Stage 4 AEO JSON-LD: FAQPage (catalogue) ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "@id": "https://cryptocipher.in/instruments#faq",
  "isPartOf": { "@id": "https://cryptocipher.in/#website" },
  "mainEntity": [
    { "@type": "Question", "name": "Do your libraries work with the free Kontakt Player?",
      "acceptedAnswer": { "@type": "Answer", "text": "Most Crypto Cipher libraries require Kontakt 6 Full or higher. The free Kontakt Player loads them for only 30 minutes per session — a Native Instruments restriction. Each library page lists its exact version requirement." } },
    { "@type": "Question", "name": "Can I use these libraries in commercial film, OTT, and game projects?",
      "acceptedAnswer": { "@type": "Answer", "text": "Yes. Every library ships with a single license covering commercial use across film, OTT, streaming, broadcast, advertising, and games — globally. All libraries are declared sync-cleared and AI-training-free." } },
    { "@type": "Question", "name": "How do I install and authorize a library?",
      "acceptedAnswer": { "@type": "Answer", "text": "After purchase you receive a download link and an instruction PDF. Most libraries load via Kontakt's File Browser; a few use Native Instruments' Add Library panel. Authorization is one-time via Native Access." } },
    { "@type": "Question", "name": "Where are these instruments recorded?",
      "acceptedAnswer": { "@type": "Answer", "text": "At our studio in India, active since 2010. The chain typically runs Royer 122 ribbons, Neumann and Schoeps condensers, and a modeled valve preamp chain, adjusted per instrument. Each library page lists its mic and engineer credits." } },
    { "@type": "Question", "name": "What is a curated suite — is that a discount bundle?",
      "acceptedAnswer": { "@type": "Answer", "text": "Suites are editorial bundles chosen for how composers use libraries together in real cues. Savings are real but it is not a sale — no countdowns. A prior single-library purchase credits toward the suite within 60 days." } },
    { "@type": "Question", "name": "What if the instrument I need is not in your catalogue?",
      "acceptedAnswer": { "@type": "Answer", "text": "Commission a custom recording. We have access to most Indian classical and folk instruments and master musicians across India. For one-time cue use, custom recording is often more cost-effective than buying a library." } }
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

@endverbatim

