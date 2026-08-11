@verbatim
<link rel="preload" href="assets/img/logo.svg" as="image" type="image/svg+xml">
<!-- Consolidated shared layers (Phase 1+2) · load before inline <style>, before polish.css -->
<style id="cc-nav-home-motion">
/* PAGE-UNIQUE homepage nav-motion overlay (loads right after shell.css, wins the cascade).
   The shared nav — markup, geometry, styling, menu items — comes from shell.css. This block
   ONLY re-adds the homepage's two motion behaviours on top:
     1. hero scroll-reveal: nav hidden over the hero, slides down once past ~80% hero-scroll
     2. cinematic hide-on-video (HVID-001): slow letterbox slide-out during playback, returns after
   Restored after the Phase-3 strip as genuine layer-7 page-unique CSS; the reveal + cinematic
   JS already live in this page's scripts and drive these classes. */

/* Homepage-specific: nav crosses the hero->libs boundary by sliding down from above */
.cc-nav {
  opacity: 0;
  pointer-events: none;
  transform: translateX(-50%) translateY(-120%);
  transition:
    opacity 0.6s cubic-bezier(0.22, 1, 0.36, 1),
    transform 0.7s cubic-bezier(0.22, 1, 0.36, 1),
    background 0.5s ease,
    box-shadow 0.5s ease;
}
.cc-nav.cc-nav--visible {
  opacity: 1;
  pointer-events: auto;
  transform: translateX(-50%) translateY(0);
}

@media (max-width: 768px) {
  .cc-nav { transform: translateX(-50%) translateY(-120%); }
  .cc-nav.cc-nav--visible { transform: translateX(-50%) translateY(0); }
}

/* Cinematic hide-on-video (HVID-001): slow letterbox slide-out during playback */
.cc-nav.cc-nav--cinematic,
.cc-nav.cc-nav--cinematic-returning {
  transition:
    transform 1.2s cubic-bezier(0.65, 0, 0.35, 1) 0.15s,
    opacity 1s cubic-bezier(0.65, 0, 0.35, 1) 0.2s !important;
}
.cc-nav.cc-nav--cinematic {
  transform: translate(-50%, -130%) !important;
  opacity: 0 !important;
  pointer-events: none !important;
}
</style>

<style>
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

/* Critical: park the skip-link off-screen before first paint.
   polish.css carries the full styling but loads late (last <link>),
   so without this the "Skip to content" text flashes top-left on reload. */
.skip-link { position: absolute; left: 12px; top: -56px; z-index: 10000; }

/* Critical: pre-animation hide for hero entrance elements (matches the
   later .js-ready set). html.js is added synchronously in <head>, so these
   start invisible at first paint, killing the CTA-pill flash on reload.
   No-JS / GSAP-failure path leaves html without .js -> elements stay visible. */
html.js .hero__subtitle,
html.js .hero__ctas,
html.js .hero__ctas-mobile,
html.js .hero__map-stage,
html.js .hero__scroll { opacity: 0; }

:root {
  --bg-deep: #0d1117;
  --bg-surface: #151b23;
  --green-primary: #75C249;
  --green-light: #BBD67A;
  --green-dark: #2F6942;
  --green-glow: rgba(117, 194, 73, 0.35);

  /* Heritage gold — used surgically for legacy moments only.
     NEVER on CTAs. NEVER as a background wash. NEVER in nav.
     Reserved: composer credits, archival eyebrows, legacy markers. */
  --heritage-gold: #D4A656;
  --heritage-gold-soft: rgba(212, 166, 86, 0.22);
  --heritage-gold-faint: rgba(212, 166, 86, 0.08);

  --text-primary: #ffffff;
  --text-secondary: rgba(255,255,255,0.65);
  --glass-bg: rgba(255,255,255,0.04);
  --glass-border: rgba(255,255,255,0.08);
  --glass-hover: rgba(255,255,255,0.08);

  /* Section rhythm tokens — uniform vertical pacing */
  --section-py-top: 6rem;
  --section-py-bottom: 4rem;
  --section-py-top-mobile: 4rem;
  --section-py-bottom-mobile: 3rem;
  --section-max: 1180px;

  /* Mobile consistency tokens — applied across all sections so titles,
     side breathing room, and title-to-content spacing are uniform
     (desktop already has a single title scale; this gives mobile one too). */
  --title-size-mobile: clamp(1.6rem, 6vw, 2rem);   /* one title size for all sections */
  --section-px-mobile: 1.25rem;                    /* side gutter so content never touches edges */
  --title-gap-mobile: 1.1rem;                      /* space below each section title */

  /* CTA hierarchy:
     primary   → only hero "Browse Instruments" + checkout flows
     secondary → in-section CTAs (View All, Watch Film, etc.)
     tertiary  → footer/nav links */
  --cta-primary-bg: linear-gradient(135deg, #75C249 0%, #BBD67A 100%);
  --cta-primary-fg: #0d1117;
  --cta-secondary-border: rgba(117,194,73,0.32);
  --cta-secondary-fg: #BBD67A;
}

/* scroll-behavior:smooth removed — causes mouse-wheel jank */

body {
  background: var(--bg-deep);
  color: var(--text-primary);
  font-family: "Outfit", sans-serif;
  overflow-x: hidden;
  overscroll-behavior-x: none;   /* no sideways rubber-band/drift */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -webkit-tap-highlight-color: transparent;
  -webkit-text-size-adjust: 100%;
  -webkit-touch-callout: none;
  width: 100%;
  min-height: 100vh;
}

/* Buttons/links should never show iOS tap flash */
button, a {
  -webkit-tap-highlight-color: transparent;
}

/* ═══════════════════════════════════════
   HERO — FULL VIEWPORT
   ═══════════════════════════════════════ */
.hero {
  position: relative;
  width: 100%;
  height: 100vh;
  /* NOT 100dvh: on Safari, dvh grows as the toolbar collapses during scroll,
     resizing the hero mid-scroll and jolting the section below (Featured
     Libraries). Stable 100vh removes that jump (confirmed live). */
  min-height: 700px;
  overflow: hidden;
  perspective: 1800px;
  perspective-origin: 50% 45%;
}

/* ═══ Spatial scene layers — soft, brand-aware ═══ */
.hero__keylight {
  position: absolute;
  top: -20%;
  left: -5%;
  width: 80%;
  height: 70vh;
  z-index: 1;
  pointer-events: none;
  background: radial-gradient(ellipse at 25% 20%,
    rgba(255, 245, 220, 0.05) 0%,
    rgba(255, 230, 190, 0.02) 30%,
    transparent 65%);
  filter: blur(18px);
  opacity: 0;
  transition: opacity 2s cubic-bezier(0.22, 1, 0.36, 1) 0.2s;
}
.js-ready .hero__keylight { opacity: 1; }

.hero__ground {
  position: absolute;
  left: 50%;
  bottom: -10%;
  transform: translateX(-50%);
  width: 140%;
  height: 45%;
  z-index: 1;
  pointer-events: none;
  background: radial-gradient(ellipse 60% 100% at 50% 100%,
    rgba(117, 194, 73, 0.08) 0%,
    rgba(80, 120, 60, 0.03) 35%,
    transparent 75%);
  filter: blur(18px);
  opacity: 0;
  transition: opacity 2.2s cubic-bezier(0.22, 1, 0.36, 1) 0.4s;
}
.js-ready .hero__ground { opacity: 1; }

.hero__horizon {
  position: absolute;
  left: -10%;
  right: -10%;
  bottom: 0;
  height: 60%;
  z-index: 1;
  pointer-events: none;
  background:
    radial-gradient(ellipse 70% 60% at 30% 100%, rgba(40, 60, 100, 0.10) 0%, transparent 65%),
    radial-gradient(ellipse 60% 50% at 75% 90%, rgba(120, 80, 60, 0.06) 0%, transparent 60%);
  filter: blur(18px);
  opacity: 0;
  transition: opacity 2.4s cubic-bezier(0.22, 1, 0.36, 1) 0.6s;
}
.js-ready .hero__horizon { opacity: 1; }

@media (prefers-reduced-motion: reduce) {
  .hero__keylight, .hero__ground, .hero__horizon {
    transition: none;
  }
}

/* ─── AMBIENT ATMOSPHERE ─── */
.hero__ambient {
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  pointer-events: none;
  z-index: 0;
}

.hero__ambient::before {
  content: "";
  position: absolute;
  top: -25%;
  right: -5%;
  width: 80vw;
  height: 80vw;
  max-width: 1100px;
  max-height: 1100px;
  background: radial-gradient(circle, rgba(47,105,66,0.14) 0%, rgba(117,194,73,0.03) 40%, transparent 70%);
  border-radius: 50%;
  /* Very slow, low-amplitude breathing — barely perceptible */
  animation: ambientPulse 32s ease-in-out infinite;
}

.hero__ambient::after {
  content: "";
  position: absolute;
  bottom: -30%;
  left: -15%;
  width: 50vw;
  height: 50vw;
  max-width: 700px;
  max-height: 700px;
  /* Static lower-left wash — no animation, just atmospheric depth */
  background: radial-gradient(circle, rgba(117,194,73,0.018) 0%, transparent 60%);
  border-radius: 50%;
  /* No animation — cosmic field stars provide the motion */
}

@keyframes ambientPulse {
  /* Tiny amplitude — only the top-right glow uses this now */
  0%, 100% { opacity: 0.92; }
  50%      { opacity: 1; }
}

/* Noise */
.hero__noise {
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  opacity: 0.022;
  z-index: 1;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  background-size: 200px;
  pointer-events: none;
}

/* Subtle grid */
.hero__grid {
  display: none; /* removed — grid pattern conflicts with cosmic space aesthetic */
}

/* ═══════════════════════════════════════
   DEEP-SPACE COSMIC ENVIRONMENT
   All elements (.cosmic-star, .cosmic-dust, .cosmic-blink, .shooting-star)
   are generated and randomized by JS on load. CSS only defines the
   per-element animation primitives — every property is overridable
   via inline style or CSS custom property.
   ═══════════════════════════════════════ */
.hero__particles {
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  pointer-events: none;
  z-index: 2;
  overflow: hidden;
}

/* ── Nebula wash — soft color clouds, slowly drifts ── */
.hero__particles::before {
  content: "";
  position: absolute;
  top: -10%; left: -10%; right: -10%; bottom: -10%;
  background:
    radial-gradient(ellipse 60% 40% at 20% 30%, rgba(120, 180, 255, 0.05) 0%, transparent 60%),
    radial-gradient(ellipse 50% 50% at 80% 70%, rgba(180, 120, 220, 0.04) 0%, transparent 65%),
    radial-gradient(ellipse 45% 35% at 50% 90%, rgba(117, 194, 73, 0.035) 0%, transparent 55%),
    radial-gradient(ellipse 35% 45% at 65% 15%, rgba(255, 200, 150, 0.025) 0%, transparent 60%);
  filter: blur(18px);
  animation: nebulaDrift 80s ease-in-out infinite;
}

@keyframes nebulaDrift {
  0%, 100% { transform: translate(0, 0) scale(1); }
  25% { transform: translate(2.5%, -1.5%) scale(1.06); }
  50% { transform: translate(-1%, 2.5%) scale(0.97); }
  75% { transform: translate(-2%, -2%) scale(1.03); }
}

/* ── Static stars — distant background, slow soft twinkle ── */
.cosmic-star {
  position: absolute;
  border-radius: 50%;
  pointer-events: none;
  will-change: opacity, transform;
  animation: starTwinkle var(--twinkle-dur, 6s) ease-in-out var(--twinkle-delay, 0s) infinite;
  visibility: hidden;
}
.cosmic-star.cosmic-ready { visibility: visible; }

@keyframes starTwinkle {
  0%, 100% { opacity: var(--twinkle-min, 0.3); transform: scale(var(--twinkle-min-scale, 0.85)); }
  50%      { opacity: var(--twinkle-max, 0.95); transform: scale(1); }
}

/* ── Bright stars — dot with glow halo (no cross flares) ── */
.cosmic-star--bright {
  box-shadow:
    0 0 var(--glow-r, 4px) var(--glow-c, rgba(255,255,255,0.6)),
    0 0 calc(var(--glow-r, 4px) * 2.5) var(--glow-c, rgba(255,255,255,0.3));
}

/* ── Drifting cosmic dust — particles with random direction & curved drift ── */
.cosmic-dust {
  position: absolute;
  border-radius: 50%;
  pointer-events: none;
  opacity: 0;
  will-change: transform, opacity;
  animation: dustFloat var(--dust-dur, 22s) linear var(--dust-delay, 0s) infinite;
  visibility: hidden;
  /* Direction tier: --dir-y is -1 (up) or 1 (down).
     --dir-x is curve direction sign. */
}
.cosmic-dust.cosmic-ready { visibility: visible; }

@keyframes dustFloat {
  0% {
    transform:
      translate(0, calc(var(--dir-y, -1) * -100vh))
      translateX(0);
    opacity: 0;
  }
  8%  { opacity: var(--dust-opacity, 0.55); }
  50% {
    transform:
      translate(0, calc(var(--dir-y, -1) * 0vh))
      translateX(var(--curve-x, 30px));
  }
  92% { opacity: var(--dust-opacity, 0.55); }
  100% {
    transform:
      translate(0, calc(var(--dir-y, -1) * 100vh))
      translateX(calc(var(--curve-x, 30px) * -0.4));
    opacity: 0;
  }
}

/* ── Shooting stars — JS reschedules each fire ── */
.shooting-star {
  position: absolute;
  height: 1px;
  background: linear-gradient(90deg,
    transparent 0%,
    rgba(255,255,255,0.85) 40%,
    var(--streak-tail, rgba(187,214,122,0.5)) 75%,
    transparent 100%);
  opacity: 0;
  /* drop-shadow removed — caused Firefox lightning at hero bottom.
     Gradient + thin height alone provides the streak effect. */
  visibility: hidden;
}

.shooting-star.cosmic-ready { visibility: visible; }

@keyframes shoot {
  0%   { transform: translate(0, 0) rotate(var(--shoot-angle, 15deg)); opacity: 0; }
  12%  { opacity: var(--shoot-opacity, 0.7); }
  40%  { opacity: var(--shoot-opacity, 0.7); }
  100% { transform: translate(var(--shoot-end-x, 120vw), var(--shoot-end-y, 30vh)) rotate(var(--shoot-angle, 15deg)); opacity: 0; }
}

/* ═══════════════════════════════════════
   MAP — INTERACTIVE KIT (iframe)
   Right-anchored, behind hero content
   ═══════════════════════════════════════ */
.hero__map-stage {
  position: absolute;
  top: 50%;
  right: -2%;
  transform: translateY(-50%);
  width: 58vw;
  height: 95vh;
  z-index: 3;
  opacity: 1;
  /* Promote the heavy SVG to its own compositor layer so page scroll doesn't
     repaint its 5000+ paths every frame (a source of scroll jitter). Layer
     promotion only — no `contain:paint`, which would clip the popup. */
  will-change: transform;
}

.hero__map-wrap {
  position: relative;
  width: 100%;
  height: 100%;
  /* Float starts AFTER the entrance settles (the 1.8s delay) so it no longer
     collides with the GSAP entrance transform on first load — that was the
     Safari jerk. NOTE: a persistent transform:translateZ(0)/backface here
     broke Firefox's SVG pointer hit-testing (states became hard to click), so
     the GPU layer is requested via will-change only — Firefox hit-tests
     correctly and the float still animates smoothly. */
  will-change: transform;
  animation: mapFloat 7s ease-in-out 1.8s infinite;
}

@keyframes mapFloat {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

/* Subtle green atmospheric glow behind iframe map */
.hero__map-glow {
  position: absolute;
  inset: 0;
  pointer-events: none;
  z-index: 2;
  background:
    radial-gradient(ellipse 70% 60% at 50% 50%, rgba(80, 110, 160, 0.10) 0%, transparent 70%),
    radial-gradient(ellipse 60% 50% at 50% 70%, rgba(220, 170, 110, 0.05) 0%, transparent 75%);
  filter: blur(18px);
  /* Stabilize: promote to own GPU layer so the blur is rasterized once
     and not recomputed every frame during parent's mapFloat translate.
     Fixes Firefox lightning/flicker at hero bottom. */
  transform: translateZ(0);
  will-change: transform;
}

/* ═══════════════════════════════════════
   LEFT CONTENT — TEXT BLOCK
   ═══════════════════════════════════════ */
.hero__content {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  z-index: 10;
  padding-left: clamp(2rem, 5vw, 5rem);
  max-width: 52%;
  display: flex;
  flex-direction: column;
  gap: 1.8rem;
  /* The content column overlaps the map's left edge. As a z-index:10 box it
     was intercepting hover/click meant for the states underneath (elementFromPoint
     returned hero__title over the map). Pass events through the container; the
     interactive children below re-enable themselves. */
  pointer-events: none;
}
/* Re-enable pointer events only on things that are actually interactive. */
.hero__content a,
.hero__content button,
.hero__ctas,
.hero__ctas-mobile,
.hero__logo {
  pointer-events: auto;
}

/* Logo */
.hero__logo {
  opacity: 1;
  margin-bottom: 0.5rem;
  display: block;
  line-height: 0;
}

.hero__logo-img {
  height: 80px;
  width: auto;
  display: block;
  filter: drop-shadow(0 0 40px rgba(117,194,73,0.18));
  transition: filter 0.5s ease;
}

.hero__logo:hover .hero__logo-img {
  filter: drop-shadow(0 0 55px rgba(117,194,73,0.35));
}

/* Title block */
.hero__title { opacity: 1; }

.hero__title-top {
  display: block;
  font-family: "Outfit", sans-serif;
  font-size: clamp(1.6rem, 3vw, 2.8rem);
  font-weight: 300;
  line-height: 1.25;
  color: var(--text-primary);
  letter-spacing: -0.01em;
  margin-bottom: 0.1em;
}

/* INDIA — MASSIVE */
.hero__title-main {
  display: block;
  font-family: "Playfair Display", serif;
  font-size: clamp(7rem, 15vw, 14rem);
  font-weight: 900;
  line-height: 0.88;
  letter-spacing: -0.04em;
  background: linear-gradient(160deg, #ffffff 0%, #f0f0f0 30%, #d8d8d8 60%, #ffffff 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  position: relative;
  text-shadow: none;
  padding-bottom: 0.05em;
}

/* Accent underline */
.hero__title-main::after {
  content: "";
  position: absolute;
  bottom: 0.05em;
  left: 0;
  width: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--green-primary), var(--green-light), transparent);
  opacity: 0;
  border-radius: 2px;
}

/* Subtitle */
.hero__subtitle {
  font-size: clamp(1rem, 1.5vw, 1.2rem);
  font-weight: 300;
  line-height: 1.75;
  color: var(--text-secondary);
  max-width: 480px;
  opacity: 1;
}

/* ─── CTA BUTTONS ─── */
.hero__ctas {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 0.75rem;
  opacity: 1;
  width: 100%;
  max-width: 580px;     /* prevents buttons from getting too wide on big screens */
}

.hero__cta {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.55rem;
  padding: 0.9rem 1.1rem;
  border-radius: 8px;
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  font-weight: 500;
  letter-spacing: 0.025em;
  text-decoration: none;
  cursor: pointer;
  transition:
    transform 0.5s cubic-bezier(0.22, 1, 0.36, 1),
    background 0.5s cubic-bezier(0.22, 1, 0.36, 1),
    border-color 0.5s ease,
    box-shadow 0.5s ease,
    color 0.4s ease;
  position: relative;
  overflow: hidden;
  white-space: nowrap;
  min-width: 0;
  isolation: isolate;
}


/* ═══════════════════════════════════════
   BOTTOM STATS BAR (5 stats per spec)
   ═══════════════════════════════════════ */
.hero__stats {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 15;
  border-top: 1px solid var(--glass-border);
  background: rgba(13,17,23,0.65);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  /* Default visible — GSAP animates entrance, but if GSAP fails the bar still shows */
  opacity: 1;
  transform: translateY(0);
}

/* GSAP-controlled hidden state, only when JS has loaded successfully */
.js-ready .hero__stats {
  opacity: 0;
  transform: translateY(20px);
}
.js-ready .hero__logo,
.js-ready .hero__title,
.js-ready .hero__subtitle,
.js-ready .hero__ctas,
.js-ready .hero__ctas-mobile,
.js-ready .hero__map-stage,
.js-ready .hero__scroll {
  opacity: 0;
}

.hero__stats-inner {
  max-width: 1440px;
  margin: 0 auto;
  padding: 1.1rem 3rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 1.2rem;
}

.hero__stat {
  display: flex;
  align-items: center;
  gap: 0.65rem;
  flex-shrink: 0;
}

.hero__stat-number {
  font-family: "Playfair Display", serif;
  font-size: 1.4rem;
  font-weight: 700;
  color: var(--green-light);
  white-space: nowrap;
  /* Prevent counter animation from shifting neighbor text:
     fixed-width digits + locked min-width sized for "20,000+" */
  font-variant-numeric: tabular-nums;
  font-feature-settings: "tnum" 1;
  display: inline-block;
  min-width: 6.5ch;
  text-align: right;
}

.hero__stat-label {
  font-size: 0.68rem;
  color: var(--text-secondary);
  letter-spacing: 0.03em;
  line-height: 1.45;
  max-width: 200px;
}

.hero__stat-divider {
  width: 1px;
  height: 34px;
  background: var(--glass-border);
}

/* ─── SCROLL INDICATOR ─── */
.hero__scroll {
  position: absolute;
  bottom: 5.5rem;
  right: 2.5rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.5rem;
  opacity: 1;
  z-index: 15;
}



@keyframes scrollLine {
  0% { top: -50%; }
  100% { top: 110%; }
}


/* Mobile CTAs (hidden on desktop) */
.hero__ctas-mobile {
  display: none;
}

/* ═══════════════════════════════════════
   RESPONSIVE
   ═══════════════════════════════════════ */
@media (max-width: 1200px) {
  .hero__map-stage { width: 55vw; right: -4%; }
  .hero__content { max-width: 50%; }
  .hero__logo-img { height: 68px; }
}

@media (max-width: 1024px) {
  .hero {
    height: auto;
    min-height: 100vh;
    min-height: 100dvh;
    display: flex;
    flex-direction: column;
    /* space-around distributes gaps before/after each child evenly,
       so CTAs naturally land mid-gap between map and stats bar. */
    justify-content: space-around;
    overflow: hidden;
  }

  .hero__noise { display: none; }
  /* Shooting stars stay visible on mobile (count already reduced via JS) */

  .hero__ctas { display: none !important; }

  /* ── Text section — top of hero ── */
  .hero__content {
    position: relative;
    top: auto;
    left: auto;
    transform: none;
    width: 100%;
    max-width: 100%;
    padding: 2.5rem 1.5rem 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    gap: 0.5rem;
    order: 1;
    flex: 0 0 auto;
  }

  .hero__logo {
    display: flex;
    justify-content: center;
    width: 100%;
    margin-bottom: 0;
  }

  .hero__logo-img { height: 64px; }

  .hero__title {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0;
  }

  .hero__title-top {
    text-align: center;
    margin: 0;
  }

  .hero__title-main {
    text-align: center;
    margin: 0;
  }

  .hero__title-main::after {
    left: 50%;
    transform: translateX(-50%);
  }

  .hero__subtitle {
    max-width: 88%;
    margin: 0 auto;
    text-align: center;
  }

  /* ── Map — anchor formula: India bbox center (0.502) shifted to 0.45 in viewport
     so India leans slightly left, leaving more breathing room on the right.
     --svg-size: square map dimension. left: calc(50vw - var(--svg-size) * 0.45) ── */
  .hero__map-stage {
    --svg-size: min(100dvh, 100vw);
    position: relative !important;
    top: auto !important;
    right: auto !important;
    bottom: auto !important;
    transform: none !important;
    /* Kill perspective on mobile — perspective creates a containing block that
       traps fixed-position children (popup), breaking viewport-relative centering. */
    perspective: none !important;
    width: var(--svg-size) !important;
    height: auto !important;
    aspect-ratio: 1 / 1 !important;
    flex: 0 1 auto !important;
    min-height: 0 !important;
    max-height: min(60vh, 100vw) !important;
    /* Horizontal anchor: 0.45 lifts India bbox left of viewport center */
    left: calc(50vw - var(--svg-size) * 0.45) !important;
    margin: 0 !important;
    padding: 0;
    order: 2;
    overflow: hidden;
    z-index: 3;
  }

  .hero__map-wrap {
    width: 100%;
    height: 100%;
    animation: none !important;
    transform: none !important;
    overflow: hidden;
  }

  .hero__map-glow {
    top: 5%;
    left: 15%;
    width: 70%;
    height: 70%;
  }

  /* ── CTAs — equal-width grid, never compress ── */
  .hero__ctas-mobile {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    justify-content: center;
    align-items: stretch;
    gap: 0.5rem;
    order: 3;
    width: 100%;
    padding: 0.6rem 0.85rem 0.5rem;
    z-index: 10;
    flex: 0 0 auto;
    /* Reserve space below for the stats bar (absolute-positioned overlay). */
    margin-bottom: 70px;
  }

  .hero__ctas-mobile .hero__cta {
    width: 100%;
    min-width: 0;
    padding: 0.75rem 0.5rem;
    font-size: 0.72rem;
    white-space: nowrap;
    justify-content: center;
    gap: 0.45rem;
  }

  /* ── Stats footer — single compact row on mobile ── */
  .hero__stats {
    position: relative;
    order: 4;
    width: 100%;
    border-top: 1px solid rgba(187, 214, 122, 0.22);
    background:
      linear-gradient(180deg,
        rgba(117, 194, 73, 0.06) 0%,
        rgba(13, 17, 23, 0.92) 100%);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    flex: 0 0 auto;
    box-shadow:
      0 -1px 0 rgba(255, 255, 255, 0.06) inset,
      0 -8px 24px rgba(117, 194, 73, 0.08);
  }

  /* Animated accent line at top — draws attention without being loud */
  .hero__stats::before {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60%;
    height: 1px;
    background: linear-gradient(90deg,
      transparent 0%,
      rgba(187, 214, 122, 0.6) 50%,
      transparent 100%);
    pointer-events: none;
    /* removed */
  }
  }

  .hero__stats-inner {
    display: flex;
    justify-content: space-around;
    align-items: center;
    gap: 0.8rem;
    padding: 1.1rem 1.1rem 1rem;
    max-width: 100%;
    width: 100%;
  }

  .hero__stat-divider { display: none !important; }

  .hero__stat {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.25rem;
    flex: 1 1 0;
    min-width: 0;
    padding: 0;
    text-align: center;
  }

  .hero__stat-label { display: none; }

  .hero__stat-number {
    font-size: 1.4rem;
    line-height: 1.05;
    text-align: center;
    min-width: 0;
    font-weight: 700;
    color: var(--green-light);
    letter-spacing: -0.01em;
  }

  .hero__stat::after {
    font-family: "Outfit", sans-serif;
    font-size: 0.6rem;
    font-weight: 500;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.6);
    line-height: 1;
  }
  .hero__stat:nth-child(1)::after { content: "Since"; }
  .hero__stat:nth-child(3)::after { content: "Countries"; }
  .hero__stat:nth-child(5)::after { content: "Downloads"; }
  .hero__stat:nth-child(7)::after { content: "Instruments"; }
  .hero__stat:nth-child(9)::after { content: "Mission"; }

  .hero__scroll { display: none; }

  .hero__ambient::before { width: 60vw; height: 60vw; right: -15%; }
  .hero__ambient::after { width: 40vw; height: 40vw; }




@media (max-width: 360px) {
  .hero__content {
    padding: 2.5rem 0.75rem 0.4rem;
    gap: 0.5rem;
  }
  .hero__logo-img { height: 46px; }
  .hero__title-main { font-size: 3.2rem; }
  .hero__title-top { font-size: 0.88rem; }
  .hero__subtitle { font-size: 0.78rem; }

  .hero__ctas-mobile {
    gap: 0.25rem;
    padding: 0.4rem 0.4rem 0.55rem;
  }

  .hero__ctas-mobile .hero__cta {
    padding: 0.5rem 0.25rem;
    font-size: 0.56rem;
    gap: 0.2rem;
  }


  .hero__stats-inner { padding: 0.75rem 0.55rem; gap: 0.3rem; }
  .hero__stat-number { font-size: 0.95rem; }
  .hero__stat::after { font-size: 0.45rem; letter-spacing: 0.12em; }
}

/* ═══════════════════════════════════════
   ACCESSIBILITY — REDUCED MOTION
   ═══════════════════════════════════════ */
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
  .hero__map-wrap { animation: none !important; }
  .cosmic-dust, .shooting-star { display: none !important; }
  .cosmic-star { animation: none !important; }
}

/* GPU performance hints */
.hero__ambient::before,
.hero__ambient::after {
  will-change: transform;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
}

/* Safe area on mobile */
@supports (padding: env(safe-area-inset-top)) {
  @media (max-width: 1024px) {
    .hero {
      padding-top: env(safe-area-inset-top);
      padding-left: env(safe-area-inset-left);
      padding-right: env(safe-area-inset-right);
    }
  }
}

/* Landscape phones */
@media (max-height: 500px) and (orientation: landscape) {
  .hero {
    height: auto;
    min-height: 100vh;
    min-height: 100dvh;
  }
  .hero__content { padding-top: 2rem; gap: 0.5rem; }
  .hero__title-main { font-size: clamp(2.5rem, 10vw, 4rem); }
  .hero__map-stage { height: 50vw; }
  .hero__stats-inner { padding: 0.5rem 1rem; }
}

/* Ultra-wide / 4K */
@media (min-width: 2560px) {
  .hero__content { padding-left: 8rem; }
  .hero__title-top { font-size: 3.2rem; }
  .hero__title-main { font-size: 16rem; }
  .hero__subtitle { font-size: 1.5rem; max-width: 600px; }
  .hero__logo-img { height: 100px; }
  .hero__cta { padding: 1.1rem 2rem; font-size: 1rem; }
  .hero__stat-number { font-size: 1.8rem; }
  .hero__stat-label { font-size: 0.85rem; }
}

/* Foldable phones */
@media (max-width: 300px) {
  .hero__title-main { font-size: 2.5rem; }
  .hero__title-top { font-size: 0.8rem; }
  .hero__logo-img { height: 38px; }
  .hero__ctas-mobile .hero__cta { padding: 0.4rem 0.45rem; font-size: 0.55rem; }
}


/* ════ KIT MAP CSS (inlined) ════ */








.cc-map {
  position: relative;
  min-height: 100vh;
  background:
    radial-gradient(ellipse at 30% 20%, rgba(117,194,73,0.04) 0%, transparent 50%),
    radial-gradient(ellipse at 70% 80%, rgba(180,140,50,0.03) 0%, transparent 50%),
    var(--bg-deep);
  padding: 0;
  display: grid;
  /* Desktop: 40% left (reserved for brand content) + 60% right (map + popup) */
  grid-template-columns: 40fr 60fr;
  align-items: stretch;
  overflow: hidden;
}

/* Atmospheric particles */
.cc-map::before {
  content: "";
  position: absolute; inset: 0;
  background-image:
    radial-gradient(1px 1px at 20% 30%, rgba(200,170,80,0.25), transparent),
    radial-gradient(1px 1px at 60% 70%, rgba(187,214,122,0.18), transparent),
    radial-gradient(1px 1px at 80% 20%, rgba(200,170,80,0.15), transparent),
    radial-gradient(1px 1px at 40% 80%, rgba(187,214,122,0.12), transparent);
  opacity: 0.6;
  pointer-events: none;
}

/* Map container — fills the right (60%) pane */
.map-stage {
  position: relative;
  grid-column: 2;
  grid-row: 1;
  width: 100%;
  height: 100vh;
  max-width: none;
  aspect-ratio: auto;
  perspective: 2000px;
  perspective-origin: 50% 35%;
  z-index: 2;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1.5rem 2rem;
  box-sizing: border-box;
  touch-action: manipulation;  /* kill 300ms tap delay; disable double-tap-to-zoom on map */
}

/* ═══ HOVER CLICK-CUE — pointing-hand icon with radiating rays ═══
   Pure visual cue near cursor. No text, no chip. The rays gently glow
   to signal energy. Hidden when popup is active. */
/* ═══ HOVER TOOLTIP — click icon + state name ═══
   Cream/white icon (high contrast on green-toned map states),
   surrounded by a lime glow halo for brand accent.
   Pill chip with state name beside the icon. */
.map-hover-label {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 50;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.4rem 0.85rem 0.4rem 0.55rem;
  background: rgba(8, 12, 18, 0.9);
  backdrop-filter: blur(16px) saturate(1.4);
  -webkit-backdrop-filter: blur(16px) saturate(1.4);
  border: 1px solid rgba(187, 214, 122, 0.32);
  border-radius: 50px;
  pointer-events: none;
  user-select: none;
  white-space: nowrap;
  opacity: 0;
  transform: scale(0.92);
  transition: opacity 0.18s ease, transform 0.22s cubic-bezier(0.22, 1, 0.36, 1);
  box-shadow:
    0 4px 14px rgba(0, 0, 0, 0.55),
    0 0 16px rgba(117, 194, 73, 0.18);
  will-change: transform, opacity, left, top;
}
.map-hover-label.visible {
  opacity: 1;
  transform: scale(1);
}

/* Icon — cream/white for high contrast against green map states.
   Lime glow halo via drop-shadow (the "rays of light" effect). */
.map-hover-label-icon {
  display: block;
  overflow: visible;
  flex-shrink: 0;
  color: rgba(255, 245, 220, 1);  /* warm cream — visible on any map background */
  filter:
    drop-shadow(0 0 4px rgba(187, 214, 122, 0.85))
    drop-shadow(0 0 10px rgba(117, 194, 73, 0.55));
}
/* Rays — slow pulsing glow */
.hover-icon-rays {
  animation: rays-glow 1.6s ease-in-out infinite;
}
@keyframes rays-glow {
  0%, 100% { opacity: 0.6;  stroke-width: 1.4; }
  50%      { opacity: 1;    stroke-width: 1.9; }
}
/* Hand — subtle tap bob */
.hover-icon-hand {
  animation: hand-tap 1.6s ease-in-out infinite;
  transform-origin: 16px 14px;
}
@keyframes hand-tap {
  0%, 100% { transform: translateY(0); }
  50%      { transform: translateY(1.5px); }
}

/* State name — uppercase, premium typography */
.map-hover-label-name {
  font-family: "Outfit", system-ui, sans-serif;
  font-size: 0.7rem;
  font-weight: 500;
  letter-spacing: 0.09em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.96);
}

/* Hide when popup is active */
.map-stage[data-active-state] .map-hover-label {
  opacity: 0 !important;
}

/* ═══ FIRST-LOAD AMBIENT PULSE ═══
   On page load, 3 random states briefly glow then fade.
   Demonstrates: "this map is alive."
   JS adds .first-pulse class with delay; CSS handles the animation. */
.state-group.first-pulse {
  animation: first-pulse-glow 1.4s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}
@keyframes first-pulse-glow {
  0% {
    filter: drop-shadow(0 0 0 rgba(255, 240, 210, 0));
  }
  35% {
    filter:
      drop-shadow(0 0 14px rgba(255, 240, 210, 0.55))
      drop-shadow(0 0 38px rgba(255, 220, 170, 0.35));
  }
  100% {
    filter: drop-shadow(0 0 0 rgba(255, 240, 210, 0));
  }
}

.map-tilt {
  position: relative;
  width: 100%;
  height: 100%;
  /* FLAT, not preserve-3d. The states are SVG inside this tilt; with
     preserve-3d + the hero's perspective, Firefox mis-hit-tests them (hover
     drifts / dead zones at desktop, fixed only when perspective is dropped at
     tablet width). flat removes the 3D coordinate space Firefox gets wrong
     while keeping the ±4° rotateX/Y tilt fully working. */
  transform-style: flat;
  transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1);
  will-change: transform;
}

/* Layered 3D shadow stack */
.map-shadow-far,
.map-shadow-mid,
.map-shadow-near {
  position: absolute;
  inset: 0;
  pointer-events: none;
}
.map-shadow-far,
.map-shadow-mid {
  display: none;
}
.map-shadow-near {
  background: radial-gradient(ellipse 65% 25% at 50% 92%,
    rgba(0, 0, 0, 0.55) 0%,
    rgba(0, 0, 0, 0.25) 35%,
    rgba(0, 0, 0, 0.08) 60%,
    transparent 80%);
  filter: blur(16px);
  opacity: 0.7;
  transform: translateY(28px);
  mix-blend-mode: multiply;
}

.map-svg-wrap {
  position: relative;
  width: 100%;
  height: 100%;
  transform: translateZ(0);
}

svg.india-map {
  width: 100%;
  height: 100%;
  overflow: visible;
  display: block;
}

/* State path styling */
/* ═══════════════════════════════════════════════════════════════
   STATE STYLING — Awwwards-grade cinematic system
   - At rest: states invisible (country reads as ONE landform)
   - Hover: 3-layer light bloom + neighbor focus-pull
   ═══════════════════════════════════════════════════════════════ */

.state-group {
  cursor: pointer;
  /* perf: filter intentionally NOT transitioned (expensive-props rule) */
  transition: opacity 0.4s ease;
  transform-origin: center;
  transform-box: fill-box;
}
/* Promote ONLY the hovered/active state to its own layer — applying
   will-change:filter to every state group permanently made Firefox
   pre-allocate dozens of layers and jitter on the map entrance. */
.state-group:hover,
.state-group.active { will-change: filter; }

/* State polygon — invisible base (transparent), only there for hover detection */
.state-frag {
  fill: transparent;
  stroke: transparent;
  stroke-width: 0;
  stroke-linejoin: round;
  vector-effect: non-scaling-stroke;
  transition:
    fill 0.45s cubic-bezier(0.4, 0, 0.2, 1),
    stroke 0.35s ease,
    stroke-width 0.3s ease;
  pointer-events: all;  /* receives clicks/hovers even when fill: transparent */
  cursor: pointer;
}

/* ═══ DIAMOND TILE MOSAIC ═══
   The visual layer at rest. Each tile is a rotated square with regional color.
   Pointer-events:none — hover passes through to state-frag below. */
.tile-mosaic {
  pointer-events: none;
}
/* ═══ Map pointer-event hygiene (future-proof hover/click) ═══
   Every decorative map layer is non-interactive so hover/click always reaches
   the state geometry. Only .state-frag (state polygons) and .ut-hit (enlarged
   small-state targets) receive events. Prevents any overlay from ever blocking
   interaction again — across all browsers. */
.country-shell-layer,
.country-shell,
.ambient-highlight,
.ambient-highlight *,
.tile-mosaic,
.hover-icon-rays,
.hover-icon-hand,
.map-hover-label,
.ut-ring {
  pointer-events: none;
}

.mosaic-tile {
  /* Decorative texture only — must NEVER catch pointer events, or it
     intercepts hover/click meant for the state polygons (this was the
     "states not hoverable / hard to click" bug, worst in Firefox which
     hit-tests the topmost painted element strictly). */
  pointer-events: none;
  transition:
    fill 0.4s cubic-bezier(0.4, 0, 0.2, 1),
    opacity 0.45s ease,
    filter 0.5s cubic-bezier(0.22, 1, 0.36, 1);
}

/* (Light-flow pulse CSS removed — map has no animated light overlay) */

/* ═══ HOVER LIGHT — cinematic gallery spotlight ═══
   Replaces ugly green glow with warm-white spotlight effect.
   Active state catches museum gallery light, tiles inside brighten. */
/* When popup is open, only the .active state catches light — fly-over hovers don't glow.
   When no popup is open, normal hover glow applies. */

/* No popup open: hover any state to glow */
.map-stage:not([data-active-state]) .state-group:hover {
  filter:
    drop-shadow(0 0 12px rgba(255,240,210,0.45))
    drop-shadow(0 0 32px rgba(255,220,170,0.28));
  z-index: 10;
}
.map-stage:not([data-active-state]) .state-group:hover .state-frag {
  fill: rgba(255, 240, 200, 0.04);
  stroke: rgba(255, 240, 210, 0.4);
  stroke-width: 0.6;
}
/* JS-applied glow for small states hovered via their invisible hitzone —
   mirrors the :hover look above so Sikkim etc. light up like every other state. */
.map-stage:not([data-active-state]) .state-group.hover-glow {
  filter:
    drop-shadow(0 0 12px rgba(255,240,210,0.45))
    drop-shadow(0 0 32px rgba(255,220,170,0.28));
  z-index: 10;
}
.map-stage:not([data-active-state]) .state-group.hover-glow .state-frag {
  fill: rgba(255, 240, 200, 0.04);
  stroke: rgba(255, 240, 210, 0.4);
  stroke-width: 0.6;
}

/* Popup open: ONLY the active state glows. Other hovers are silent. */
.state-group.active {
  filter:
    drop-shadow(0 0 12px rgba(255,240,210,0.55))
    drop-shadow(0 0 32px rgba(255,220,170,0.35));
  z-index: 10;
}
.state-group.active .state-frag {
  fill: rgba(255, 240, 200, 0.05);
  stroke: rgba(255, 240, 210, 0.5);
  stroke-width: 0.7;
}

/* When popup is showing (data-active-state attribute is set on stage),
   disable pointer-events on ALL state hit zones. This prevents any click
   from reaching state geometry beneath an open popup — the most common
   source of "click CTA, popup switches to wrong state" bugs.
   
   To switch to another state, user must dismiss the current popup first
   (Esc, ×, or click-outside). This is intentional behavior — once a popup
   is committed, the map is "locked" until explicit dismissal. */
.map-stage[data-active-state] .state-frag,
.map-stage[data-active-state] .ut-hit {
  pointer-events: none !important;
}

/* But the ACTIVE state's hit zone keeps pointer-events so user can click it again to unpin */
.map-stage[data-active-state] .state-group.active .state-frag,
.map-stage[data-active-state] .ut-hitzone.active .ut-hit {
  pointer-events: all !important;
}

/* When popup is open, hover events on non-active states produce ZERO visual change. */
.map-stage[data-active-state] .state-group:not(.active):hover {
  filter: none !important;
}
.map-stage[data-active-state] .state-group:not(.active):hover .state-frag {
  fill: transparent !important;
  stroke: transparent !important;
  stroke-width: 0 !important;
}
.map-stage[data-active-state] .ut-hitzone:not(.active):hover .ut-ring {
  fill: rgba(117, 194, 73, 0.08) !important;
  stroke: rgba(187, 214, 122, 0.55) !important;
  stroke-width: 1.2 !important;
  filter: none !important;
}

/* Cursor pointer on all state hit zones */
.state-group .state-frag,
.ut-hit {
  cursor: pointer;
}

/* ═══ TILE ILLUMINATION — hovered state's tiles brighten ═══
   When a state is hovered/active, all tiles with matching data-state
   become more luminous. Keeps each state's OWN color theme,
   just dialed up + warm-light tint. */
.tile-mosaic .mosaic-tile {
  transition:
    filter 0.45s cubic-bezier(0.4, 0, 0.2, 1),
    opacity 0.4s ease;
}

/* ═══ ACTIVE-STATE TILE BRIGHTNESS ═══
   JS will toggle a body-level data-active-state attribute on hover,
   which lights up matching tiles. -->
[data-active-state] .tile-mosaic .mosaic-tile {
  opacity: 0.55;
}
[data-active-state="state-jammu-kashmir"]    .mosaic-tile[data-state="state-jammu-kashmir"],
[data-active-state="state-ladakh"]            .mosaic-tile[data-state="state-ladakh"],
[data-active-state="state-himachal-pradesh"]  .mosaic-tile[data-state="state-himachal-pradesh"],
[data-active-state="state-uttarakhand"]       .mosaic-tile[data-state="state-uttarakhand"],
[data-active-state="state-punjab"]            .mosaic-tile[data-state="state-punjab"],
[data-active-state="state-haryana"]           .mosaic-tile[data-state="state-haryana"],
[data-active-state="state-chandigarh"]        .mosaic-tile[data-state="state-chandigarh"],
[data-active-state="state-delhi"]             .mosaic-tile[data-state="state-delhi"],
[data-active-state="state-rajasthan"]         .mosaic-tile[data-state="state-rajasthan"],
[data-active-state="state-gujarat"]           .mosaic-tile[data-state="state-gujarat"],
[data-active-state="state-dnhdd"]             .mosaic-tile[data-state="state-dnhdd"],
[data-active-state="state-uttar-pradesh"]     .mosaic-tile[data-state="state-uttar-pradesh"],
[data-active-state="state-madhya-pradesh"]    .mosaic-tile[data-state="state-madhya-pradesh"],
[data-active-state="state-bihar"]             .mosaic-tile[data-state="state-bihar"],
[data-active-state="state-jharkhand"]         .mosaic-tile[data-state="state-jharkhand"],
[data-active-state="state-chhattisgarh"]      .mosaic-tile[data-state="state-chhattisgarh"],
[data-active-state="state-west-bengal"]       .mosaic-tile[data-state="state-west-bengal"],
[data-active-state="state-odisha"]            .mosaic-tile[data-state="state-odisha"],
[data-active-state="state-sikkim"]            .mosaic-tile[data-state="state-sikkim"],
[data-active-state="state-arunachal-pradesh"] .mosaic-tile[data-state="state-arunachal-pradesh"],
[data-active-state="state-assam"]             .mosaic-tile[data-state="state-assam"],
[data-active-state="state-meghalaya"]         .mosaic-tile[data-state="state-meghalaya"],
[data-active-state="state-nagaland"]          .mosaic-tile[data-state="state-nagaland"],
[data-active-state="state-manipur"]           .mosaic-tile[data-state="state-manipur"],
[data-active-state="state-mizoram"]           .mosaic-tile[data-state="state-mizoram"],
[data-active-state="state-tripura"]           .mosaic-tile[data-state="state-tripura"],
[data-active-state="state-maharashtra"]       .mosaic-tile[data-state="state-maharashtra"],
[data-active-state="state-goa"]               .mosaic-tile[data-state="state-goa"],
[data-active-state="state-andhra-pradesh"]    .mosaic-tile[data-state="state-andhra-pradesh"],
[data-active-state="state-telangana"]         .mosaic-tile[data-state="state-telangana"],
[data-active-state="state-karnataka"]         .mosaic-tile[data-state="state-karnataka"],
[data-active-state="state-tamil-nadu"]        .mosaic-tile[data-state="state-tamil-nadu"],
[data-active-state="state-kerala"]            .mosaic-tile[data-state="state-kerala"],
[data-active-state="state-puducherry"]        .mosaic-tile[data-state="state-puducherry"],
[data-active-state="state-lakshadweep"]       .mosaic-tile[data-state="state-lakshadweep"],
[data-active-state="state-andaman-nicobar"]   .mosaic-tile[data-state="state-andaman-nicobar"] {
  opacity: 1;
  filter: brightness(1.45) saturate(1.2);
  /* No per-tile transform — depth comes from group-level filter below.
     Per-tile scale on 9px diamonds creates gaps and shadow-stacking.
     Single cohesive group filter renders one clean depth profile. */
}


/* Group-level depth: the tile-mosaic gets a tight drop-shadow when ANY state is active.
   Crisp, not blurry — depth feels carved, not foggy. */
.map-stage[data-active-state] .tile-mosaic {
  filter: drop-shadow(0 2px 4px rgba(0,0,0,0.55)) drop-shadow(0 0 1px rgba(0,0,0,0.4));
  /* perf: no `transition: filter` — animating an SVG filter re-rasterizes the
     4.8k-tile mosaic every frame for 500ms (the popup-open jerk). Snap instead. */
}

/* ═══ FOCUS-DIM · popup-open subject isolation ═══
   When a state popup is open, dim the country-shell and the atmospheric
   overlay so the active state + its matching tiles read as "in focus".
   No blur — pure opacity/saturation lift, preserves map legibility. */
.map-stage[data-active-state] .country-shell {
  opacity: 0.5;
  transition: opacity 0.5s cubic-bezier(0.22, 1, 0.36, 1);
}
.map-stage[data-active-state] .atmospheric-layer {
  opacity: 0.25;
  transition: opacity 0.5s cubic-bezier(0.22, 1, 0.36, 1);
}
/* Active state's matching tiles get a subtle scale lift = "subject pops" */
[data-active-state] .tile-mosaic .mosaic-tile {
  transition: opacity 0.45s ease, filter 0.5s cubic-bezier(0.22, 1, 0.36, 1), transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);
}
.country-shell,
.atmospheric-layer {
  transition: opacity 0.5s cubic-bezier(0.22, 1, 0.36, 1);
}

/* ═══ COUNTRY SHELL ═══
   Single carved plinth — the embossed India landform.
   Sits behind all states. */
.country-shell {
  fill: url(#grad-shell);
  stroke: rgba(255, 240, 210, 0.18);
  stroke-width: 0.8;
  filter: url(#carved-edge);
  pointer-events: none;
}

/* ═══ ATMOSPHERIC GRADIENT OVERLAY ═══
   North-cool / south-warm bias painted across the entire landmass.
   mix-blend-mode: overlay so it tints the dots without overpowering.
   Brighter than before to add visible warmth at rest. */
.atmospheric-layer {
  mix-blend-mode: overlay;
  opacity: 0.5;
  pointer-events: none;
}

/* ═══ AMBIENT PULSE ═══
   Soft radial warmth under landmass that breathes slowly — country feels alive */
.ambient-pulse-layer {
  pointer-events: none;
  animation: pulse-ambient 6s ease-in-out infinite;
  mix-blend-mode: screen;
}

@keyframes pulse-ambient {
  0%, 100% { opacity: 0.6; }
  50% { opacity: 1; }
}

/* ═══ LIGHT SWEEP — slow scanning highlight ═══
   A subtle light bar slowly rotates across the landmass.
   Suggests the map is alive, scanning, ready to reveal. */
/* Static atmospheric highlight — no animation, premium gallery raked-light */
.ambient-highlight {
  pointer-events: none;
  mix-blend-mode: screen;
  opacity: 0.85;
}

/* Legacy layers — disabled */
.halftone-layer { display: none; }
.surface-grain { display: none; }

/* Island groups — circles are the visible layer (no dot overlay).
   Give them luminous fill to match dot field aesthetic. */
.island-group .state-frag {
  fill: #3d4348;
  stroke: rgba(0,0,0,0.6);
  stroke-width: 0.4;
}
.island-group:hover .state-frag,
.island-group.active .state-frag {
  fill: #75C249;
  stroke: rgba(187,214,122,0.7);
  stroke-width: 0.8;
}


/* ═══ TINY UT VISIBILITY + HIT ZONES ═══
   For 4 UTs (CHD/DEL/DNH/GOA) that are 4-15px native size:
   - Visible lime ring at rest (so user can SEE them)
   - Invisible larger circle (so user can CLICK them)
   - On hover/active, ring brightens
   - No labels, no connectors */

.ut-hitzone {
  cursor: pointer;
  transition: filter 0.35s ease;
  transform-origin: center;
  transform-box: fill-box;
}

.ut-ring {
  fill: rgba(117, 194, 73, 0.08);
  stroke: rgba(187, 214, 122, 0.55);
  stroke-width: 1.2;
  pointer-events: none;
  transition: all 0.35s ease;
}

.ut-hit {
  fill: transparent;
  stroke: transparent;
  stroke-width: 0;
  pointer-events: all;
  cursor: pointer;
}
/* Invisible-ring hit zones for small/thin STATES (not UTs): give Firefox a
   reliable enlarged hit target over tiny polygons without showing a dot.
   The ring is fully transparent; only the enlarged .ut-hit catches events. */
.ut-hitzone--invisible .ut-ring { fill: transparent !important; stroke: transparent !important; }
.ut-hitzone--invisible .ut-hit  { pointer-events: all; }

/* No popup open: UT hit zone glows on hover */
.map-stage:not([data-active-state]) .ut-hitzone:hover .ut-ring,
.map-stage:not([data-active-state]) .ut-hitzone.hover-glow .ut-ring {
  fill: rgba(117, 194, 73, 0.32);
  stroke: rgba(187, 214, 122, 1);
  stroke-width: 1.6;
  filter:
    drop-shadow(0 0 8px rgba(187,214,122,0.7))
    drop-shadow(0 0 18px rgba(117,194,73,0.45));
}

/* Popup open: only .active UT glows — fly-over hovers stay silent */
.ut-hitzone.active .ut-ring {
  fill: rgba(117, 194, 73, 0.42);
  stroke: rgba(187, 214, 122, 1);
  stroke-width: 1.8;
  filter:
    drop-shadow(0 0 10px rgba(187,214,122,0.85))
    drop-shadow(0 0 20px rgba(117,194,73,0.55));
}



/* ═══════════════════════════════════════════════════════════════
   STATE PANEL — fixed side rail (desktop) / bottom sheet (mobile)
   - Always present in viewport, never overlaps map
   - Content updates on hover, no show/hide flicker
   - No mouse-traversal gap — popup is in stable position
   ═══════════════════════════════════════════════════════════════ */

.state-popup {
  position: absolute;
  bottom: 6rem;
  right: 2rem;
  z-index: 20;
  width: 250px;
  max-height: 320px;
  display: flex;
  flex-direction: column;
  overscroll-behavior: contain;
  scroll-behavior: smooth;
  /* Solid glass instead of backdrop-filter: the live blur was re-sampled every
     frame of the open/close transition, causing lag on Safari & Firefox.
     A near-opaque layered background keeps the premium look at zero per-frame cost. */
  background:
    linear-gradient(135deg,
      rgba(255, 255, 255, 0.04) 0%,
      rgba(255, 255, 255, 0.02) 50%,
      rgba(255, 255, 255, 0.06) 100%),
    linear-gradient(180deg,
      rgba(17, 24, 32, 0.72) 0%,
      rgba(11, 16, 22, 0.78) 100%);
  backdrop-filter: blur(22px) saturate(1.3);
  -webkit-backdrop-filter: blur(22px) saturate(1.3);
  border: 1px solid rgba(255, 255, 255, 0.10);
  border-top-color: rgba(255, 255, 255, 0.18);
  border-bottom-color: rgba(255, 255, 255, 0.04);
  border-radius: 16px;
  overflow: hidden;
  padding: 1.1rem 1.1rem 1rem;
  box-sizing: border-box;
  box-shadow:
    0 1px 0 rgba(255, 255, 255, 0.08) inset,
    0 -1px 0 rgba(0, 0, 0, 0.3) inset,
    0 18px 40px rgba(0, 0, 0, 0.45),
    0 32px 80px rgba(0, 0, 0, 0.35);
  opacity: 0;
  transform: translateY(12px) scale(0.98);
  pointer-events: none;
  transition:
    opacity 0.2s ease,
    transform 0.26s cubic-bezier(0.22, 1, 0.36, 1),
    top 0.45s cubic-bezier(0.22, 1, 0.36, 1),
    bottom 0.45s cubic-bezier(0.22, 1, 0.36, 1),
    left 0.45s cubic-bezier(0.22, 1, 0.36, 1),
    right 0.45s cubic-bezier(0.22, 1, 0.36, 1);
}

/* Light-source shine — diagonal highlight across glass surface */
.state-popup::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(125deg,
    transparent 0%,
    rgba(255, 255, 255, 0.04) 40%,
    rgba(255, 255, 255, 0.08) 50%,
    rgba(255, 255, 255, 0.02) 60%,
    transparent 100%);
  pointer-events: none;
  z-index: 0;
}

.state-popup > * { position: relative; z-index: 1; }

.state-popup.state-active {
  opacity: 1;
  transform: translateY(0) scale(1);
  pointer-events: auto;
}

/* ═══ SHAKE — user tried to scroll while popup is open ═══
   Lateral wiggle: 5 keyframe stops, ~0.5s total. Subtle but unmistakable.
   Mobile uses translateX-only since the popup base transform IS translateX(-50%). */
@keyframes popup-shake {
  0%   { transform: translateY(0) scale(1) translateX(0); }
  15%  { transform: translateY(0) scale(1) translateX(-7px); }
  30%  { transform: translateY(0) scale(1) translateX(6px); }
  45%  { transform: translateY(0) scale(1) translateX(-4px); }
  65%  { transform: translateY(0) scale(1) translateX(3px); }
  85%  { transform: translateY(0) scale(1) translateX(-1.5px); }
  100% { transform: translateY(0) scale(1) translateX(0); }
}
@keyframes popup-shake-mobile {
  0%   { transform: translateX(-50%); }
  15%  { transform: translateX(calc(-50% - 7px)); }
  30%  { transform: translateX(calc(-50% + 6px)); }
  45%  { transform: translateX(calc(-50% - 4px)); }
  65%  { transform: translateX(calc(-50% + 3px)); }
  85%  { transform: translateX(calc(-50% - 1.5px)); }
  100% { transform: translateX(-50%); }
}
.state-popup.state-active.shake {
  animation: popup-shake 0.55s cubic-bezier(0.36, 0.07, 0.19, 0.97);
}
@media (max-width: 1024px) {
  .state-popup.state-active.shake {
    animation: popup-shake-mobile 0.55s cubic-bezier(0.36, 0.07, 0.19, 0.97);
  }
}

/* Pinned state — popup has been clicked, won't auto-close */
.state-popup.pinned {
  border-color: rgba(187,214,122,0.42);
  box-shadow: 0 24px 60px rgba(0,0,0, 0.6), inset 0 1px 0 rgba(255,255,255, 0.06);
}
.state-popup.pinned::before {
  content: "● PINNED";
  position: absolute;
  top: 0.5rem;
  left: 50%;
  transform: translateX(-50%);
  padding: 0.15rem 0.55rem;
  font-size: 0.4rem;
  font-weight: 600;
  letter-spacing: 0.2em;
  color: rgba(187,214,122,0.85);
  background: rgba(187,214,122,0.08);
  border: 1px solid rgba(187,214,122,0.25);
  border-radius: 999px;
  pointer-events: none;
  z-index: 2;
  white-space: nowrap;
}

/* When pinned, push region label down so the centered PINNED badge has
   its own clean strip above. Prevents collision with long region words
   like "NORTHEAST". */
.state-popup.pinned .popup-region {
  margin-top: 0.85rem;
}

.state-popup .popup-content { display: flex; flex-direction: column; flex: 1; min-height: 0; }

/* At rest — show brand prompt; on .state-active the data fields show */
/* Active state content — keep simple structure since empty state isn't shown */
.popup-content {
  display: flex;
  flex-direction: column;
  flex: 1;
  min-height: 0;
  animation: fade-in-content 0.4s cubic-bezier(0.22, 1, 0.36, 1);
}
@keyframes fade-in-content {
  from { opacity: 0; transform: translateY(6px); }
  to { opacity: 1; transform: translateY(0); }
}

/* ─── Header ─── */
/* ─── Close button (×) — always visible, dismisses popup immediately ─── */
.popup-close {
  position: absolute;
  top: 0.6rem;
  right: 0.6rem;
  width: 34px;
  height: 34px;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.06);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 50%;
  color: rgba(255, 255, 255, 0.55);
  cursor: pointer;
  /* Color/background-only transition — NO transform. A scale-on-hover here
     made the button edge move under the cursor, toggling hover on/off =
     the flicker. Color changes never move the element, so never flicker. */
  transition: background 0.2s ease, color 0.2s ease, border-color 0.2s ease;
  z-index: 5;
}
/* SVG inside close button is decorative — clicks register on the button itself */
.popup-close svg,
.popup-close svg * {
  pointer-events: none;
}
.popup-close:hover {
  background: rgba(187, 214, 122, 0.22);
  border-color: rgba(187, 214, 122, 0.6);
  color: rgba(255, 255, 255, 1);
}
.popup-close:active {
  background: rgba(187, 214, 122, 0.32);
}

/* ─── Popup header (close-button spacing only — drag removed) ─── */
.popup-header {
  flex-shrink: 0;
  padding: 0 0 0.85rem;
  border-bottom: 1px solid rgba(255,255,255,0.06);
  margin-bottom: 1rem;
  pointer-events: auto;
  position: relative;
  padding-right: 2rem;  /* space for × close button */
}

/* When popup is not active, NO child should catch pointer events.
   Otherwise the invisible popup intercepts taps on the map below. */
.state-popup:not(.state-active) .popup-header,
.state-popup:not(.state-active) .popup-close,
.state-popup:not(.state-active) * {
  pointer-events: none !important;
}

.popup-region {
  font-size: 0.55rem;
  font-weight: 600;
  letter-spacing: 0.32em;
  text-transform: uppercase;
  color: var(--green-light);
  margin-bottom: 0.5rem;
}

.popup-title {
  font-family: "Playfair Display", serif;
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 0.25rem;
  line-height: 1.15;
}

.popup-type {
  font-size: 0.62rem;
  font-weight: 500;
  letter-spacing: 0.18em;
  color: var(--text-quiet);
  text-transform: uppercase;
}

/* ─── Body ─── */
.popup-body {
  flex: 1 1 auto;
  overflow-y: auto;
  overflow-x: hidden;
  padding: 0 0.3rem 0 0;
  min-height: 0;
  scrollbar-gutter: stable;
  overscroll-behavior: contain;
  scroll-behavior: smooth;
  -webkit-overflow-scrolling: touch;
  scrollbar-width: thin;
  scrollbar-color: rgba(187,214,122,0.3) transparent;
  /* Half-cut text technique: bottom fade so users see content extends below */
  mask-image: linear-gradient(to bottom, #000 0%, #000 calc(100% - 32px), transparent 100%);
  -webkit-mask-image: linear-gradient(to bottom, #000 0%, #000 calc(100% - 32px), transparent 100%);
  position: relative;
}

/* Tiny scroll hint chevron — animates to signal scrollable */
.popup-body::after {
  content: "";
  position: sticky;
  bottom: 4px;
  left: 50%;
  margin-left: -6px;
  display: block;
  width: 12px;
  height: 12px;
  border-right: 1.5px solid rgba(187,214,122,0.6);
  border-bottom: 1.5px solid rgba(187,214,122,0.6);
  transform: translateY(-2px) rotate(45deg);
  pointer-events: none;
  animation: popupScrollHint 1.8s cubic-bezier(0.4, 0, 0.6, 1) infinite;
  opacity: 1;
  transition: opacity 0.3s ease;
}

@keyframes popupScrollHint {
  0%, 100% { transform: translateY(-2px) rotate(45deg); opacity: 0.4; }
  50%      { transform: translateY(2px)  rotate(45deg); opacity: 0.9; }
}

/* Hide hint + fade when scrolled to bottom */
.popup-body.is-at-end {
  mask-image: none;
  -webkit-mask-image: none;
}
.popup-body.is-at-end::after {
  opacity: 0;
  animation: none;
}

.popup-body::-webkit-scrollbar { width: 5px; }
.popup-body::-webkit-scrollbar-track { background: rgba(255,255,255,0.04); border-radius: 3px; }
.popup-body::-webkit-scrollbar-thumb {
  background: rgba(187,214,122,0.35);
  border-radius: 3px;
}
.popup-body::-webkit-scrollbar-thumb:hover {
  background: rgba(187,214,122,0.55);
}

.popup-tradition {
  font-size: 0.72rem;
  font-weight: 400;
  color: var(--text-secondary);
  line-height: 1.6;
  margin-bottom: 1.4rem;
}

.popup-instruments {
  font-size: 0.62rem;
  color: var(--text-muted);
  font-style: italic;
  line-height: 1.55;
  padding-bottom: 1rem;
}
.popup-instruments b {
  font-style: normal;
  color: var(--green-light);
  font-weight: 500;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  font-size: 0.55rem;
  display: block;
  margin-bottom: 0.4rem;
}

/* ─── Footer with CTAs ─── */
.popup-footer {
  flex-shrink: 0;
  padding: 0.7rem 0 0;
  border-top: 1px solid rgba(255,255,255,0.06);
  margin-top: auto;
  display: flex;
  flex-direction: column;
  gap: 0.35rem;
}

.popup-cta {
  display: inline-flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.4rem;
  font-size: 0.6rem;
  font-weight: 600;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  text-decoration: none;
  padding: 0.55rem 0.9rem;
  border-radius: 50px;
  transition: all 0.25s ease;
  cursor: pointer;
  border: 1px solid;
  position: relative;
  overflow: hidden;
}
/* Children of CTA do NOT receive pointer events — clicks always register on the <a> itself.
   This prevents click drift onto child elements (text node, ::after, etc.) from
   missing the CTA handlers. */
.popup-cta * {
  pointer-events: none;
}
.popup-cta::after {
  content: "→";
  display: inline-block;
  transition: transform 0.3s cubic-bezier(0.22, 1, 0.36, 1);
  font-size: 0.95rem;
  line-height: 1;
}
.popup-cta:hover::after,
.popup-cta:focus-visible::after {
  transform: translateX(5px);
}

.popup-cta.primary {
  color: #0a0d12;
  background: linear-gradient(135deg, var(--green-light), var(--green-primary));
  border-color: transparent;
}
.popup-cta.primary:hover {
  background: linear-gradient(135deg, rgba(117,194,73,0.4), rgba(187,214,122,0.26));
  border-color: rgba(117,194,73,0.65);
  box-shadow: 0 0 22px rgba(117,194,73,0.22);
}

.popup-cta.secondary {
  color: var(--text-secondary);
  background: rgba(255,255,255,0.02);
  border-color: rgba(255,255,255,0.1);
}
.popup-cta.secondary:hover {
  color: #fff;
  background: rgba(200,170,80,0.06);
  border-color: rgba(200,170,80,0.3);
}

/* ═══ MOBILE: stack with bottom-sheet popup ═══ */
/* ═══ MOBILE — full-screen map, centered on Ladakh ═══ */


/* ═══ TABLET — 60/40 split, scaled down ═══ */


/* Reduced motion */




/* ═══════════════════════════════════════════════════════════════
   INTEGRATED MAP — KIT CSS OVERRIDES
   The kit was originally a standalone hero with its own 40/60 grid.
   We're embedding it inside .hero__map-stage. These overrides
   neutralize the kit's full-page layout assumptions.
   ═══════════════════════════════════════════════════════════════ */
.hero__map-stage .cc-map {
  /* Override: not a grid hero, just a map container fitting parent */
  display: block !important;
  grid-template-columns: 1fr !important;
  min-height: 100% !important;
  height: 100% !important;
  background: transparent !important;
  overflow: visible !important;
}
/* Disable kit's atmospheric particles — we have our own cosmic field */
.hero__map-stage .cc-map::before { display: none !important; }
/* Make kit's map-stage fill its parent regardless of breakpoint */
.hero__map-stage .map-stage {
  grid-column: 1 / -1 !important;
  width: 100% !important;
  height: 100% !important;
  padding: 0.5rem 1rem !important;
}

/* Mobile inside kit: when the page itself is narrow, the kit's own
   @media (max-width: 768px) was already stripped in build.
   Apply our scoped mobile rules instead. */
@media (max-width: 1024px) {
  .hero__map-stage .map-stage {
    padding: 0 !important;
    height: 100% !important;
  }
  .hero__map-stage .map-tilt {
    transform: none !important;
    width: 100% !important;
    height: 100% !important;
  }
  .hero__map-stage .map-shadow-far,
  .hero__map-stage .map-shadow-mid,
  .hero__map-stage .map-shadow-near { display: none !important; }
  .hero__map-stage .map-svg-wrap {
    /* Container is square (aspect-ratio: 1/1). SVG fills it directly. */
    position: relative !important;
    width: 100% !important;
    height: 100% !important;
    left: auto !important;
    top: auto !important;
    transform: none !important;
    bottom: auto !important;
    display: block !important;
  }
  .hero__map-stage svg.india-map {
    width: 100% !important;
    height: 100% !important;
    max-width: 100% !important;
    overflow: visible !important;
    display: block !important;
  }
  /* Hide hover tooltip on touch devices */
  .hero__map-stage .map-hover-label { display: none !important; }
  /* Popup: narrow compact card centered at bottom of viewport */
  .hero__map-stage .state-popup {
    position: fixed !important;
    bottom: 1rem !important;
    left: 50% !important;
    right: auto !important;
    top: auto !important;
    transform: translateX(-50%) !important;
    width: min(calc(100% - 2.5rem), 300px) !important;
    max-width: 300px !important;
    max-height: 240px !important;
    padding: 0.85rem 0.95rem 0.8rem !important;
    z-index: 100 !important;
  }
  /* Tighten internal text sizes for the narrower card */
  .hero__map-stage .state-popup .popup-title {
    font-size: 1.1rem !important;
    line-height: 1.2 !important;
  }
  .hero__map-stage .state-popup .popup-tradition {
    font-size: 0.66rem !important;
  }
  .hero__map-stage .state-popup .popup-instruments {
    font-size: 0.58rem !important;
  }
  .hero__map-stage .state-popup .popup-header {
    padding-bottom: 0.6rem !important;
    margin-bottom: 0.7rem !important;
  }
  .hero__map-stage .state-popup .popup-cta {
    padding: 0.38rem 0.7rem !important;
    font-size: 0.55rem !important;
    letter-spacing: 0.05em !important;
    gap: 0.3rem !important;
  }
  .hero__map-stage .state-popup .popup-footer {
    padding-top: 0.55rem !important;
    margin-top: 0.55rem !important;
    gap: 0.4rem !important;
  }
  /* Make body region absorb the freed space */
  .hero__map-stage .state-popup .popup-body {
    flex: 1 1 auto !important;
    min-height: 0 !important;
  }
  .hero__map-stage .state-popup .popup-close {
    width: 22px !important;
    height: 22px !important;
    top: 0.55rem !important;
    right: 0.55rem !important;
  }
  /* visual stays 22px; hit-area expands to 36px via invisible padding */
  .hero__map-stage .state-popup .popup-close::before { content:""; position:absolute; top:-7px; left:-7px; right:-7px; bottom:-7px;
  }
}



/* ════ LIBS-001 STYLES ════ */

/* ── Page shell — matches library-inner34 design tokens ── */
:root {
  --bg-deep: #0d1117;
  --bg-darker: #080c12;
  --green-primary: #75C249;
  --green-light: #BBD67A;
  --green-dark: #2F6942;
}

* { margin: 0; padding: 0; box-sizing: border-box; }

/* scroll-behavior:smooth removed — causes mouse-wheel jank */

body {
  background: var(--bg-deep);
  color: #ffffff;
  font-family: "Outfit", sans-serif;
  font-weight: 300;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  min-height: 100vh;
  overflow-x: hidden;
}

/* body::before removed — cosmic-bg now provides the full fixed backdrop.
   Original blue/purple radial overlay was for standalone preview only. */

/* Scrollbar: brand-colored thin */
::-webkit-scrollbar { width: 10px; }
::-webkit-scrollbar-track { background: var(--bg-darker); }
::-webkit-scrollbar-thumb {
  background: rgba(117,194,73,0.25);
  border-radius: 5px;
  border: 2px solid var(--bg-darker);
}
::-webkit-scrollbar-thumb:hover { background: rgba(117,194,73,0.4); }


/* ══════════════════════════════════════════════════════════
   FEATURED LIBRARIES — section scope
   ══════════════════════════════════════════════════════════ */
.libs {
  position: relative;
  padding: var(--section-py-top) 0 var(--section-py-bottom);
  background: transparent;
  overflow: hidden;
  contain: layout paint style;
}




/* Mobile: shrink ambient blend-mode layers so they don't wash over the
   header / View All button area. */
@media (max-width: 1024px) {
  .libs__bleed {
    height: 200px;
    opacity: 0.7;
  }
  .libs__warmth {
    height: 280px;
    opacity: 0.6;
  }
}

/* ═══════════════════════════════════════════════════════════════
   STORY BACKGROUND — three layers
   1. .libs__bleed   — top-edge gradient blends hero's cosmic field
                       into libs section (no visible seam)
   2. .libs__strings — sitar/sarod string motif: faint horizontal lines
                       drifting across the section (the "sound" story)
   3. .libs__warmth  — bottom-edge warm amber glow (candle-lit recital
                       vibe, hands the user off into next section)
   ═══════════════════════════════════════════════════════════════ */

/* Layer 1: TRANSITION BLEED — soft amber/green nebula bloom at section top.
   Continues the cosmic story from hero. */
.libs__bleed {
  position: absolute;
  top: -1px;
  left: 0;
  right: 0;
  height: 420px;
  z-index: 0;
  pointer-events: none;
  background:
    radial-gradient(ellipse 70% 100% at 50% 0%,
      rgba(117, 194, 73, 0.12) 0%,
      rgba(80, 110, 60, 0.06) 30%,
      rgba(40, 50, 70, 0.04) 55%,
      transparent 80%),
    radial-gradient(ellipse 50% 80% at 20% 0%,
      rgba(220, 170, 110, 0.05) 0%,
      transparent 60%);
  filter: blur(16px);
  mix-blend-mode: screen;
  mask-image: linear-gradient(180deg, #000 0%, #000 55%, transparent 100%);
  -webkit-mask-image: linear-gradient(180deg, #000 0%, #000 55%, transparent 100%);
}

/* Layer 2: EMBERS — slow-drifting warm motes, like ember sparks
   from a recital lamp. Each ember rises bottom→top while drifting
   horizontally, fades in and out. Cinematic atmosphere. */
.libs__embers {
  position: absolute;
  inset: 0;
  z-index: 0;
  pointer-events: none;
  overflow: hidden;
}

.libs__ember {
  position: absolute;
  bottom: -10px;
  left: var(--x);
  width: var(--size);
  height: var(--size);
  border-radius: 50%;
  background: rgba(var(--tone), 0.85);
  box-shadow:
    0 0 4px rgba(var(--tone), 0.55),
    0 0 10px rgba(var(--tone), 0.25);
  filter: blur(0.4px);
  opacity: 0;
  animation: libs-ember-rise var(--duration, 22s) linear var(--delay, 0s) infinite;
  /* will-change removed — keyframes on transform/opacity already composite cheaply */
}

@keyframes libs-ember-rise {
  0% {
    transform: translate(0, 0);
    opacity: 0;
  }
  10% {
    opacity: 0.55;
  }
  50% {
    opacity: 0.75;
  }
  85% {
    opacity: 0.35;
  }
  100% {
    /* Rise full section height + horizontal drift */
    transform: translate(var(--drift, 12px), -110vh);
    opacity: 0;
  }
}

@media (prefers-reduced-motion: reduce) {
  .libs__ember { animation: none; opacity: 0; }
}

/* Layer 3: WARMTH — bottom-edge candle-lit amber glow. Story closure. */
.libs__warmth {
  position: absolute;
  bottom: -120px;
  left: 0;
  right: 0;
  height: 480px;
  z-index: 0;
  pointer-events: none;
  background:
    radial-gradient(ellipse 75% 100% at 50% 100%,
      rgba(220, 170, 110, 0.18) 0%,
      rgba(180, 120, 70, 0.10) 25%,
      rgba(117, 194, 73, 0.05) 50%,
      transparent 80%);
  filter: blur(18px);
  mix-blend-mode: screen;
}

/* ── Ambient layers (cosmic atmosphere) ── */
.libs__ambient,
.libs__noise,
.libs__depth {
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  z-index: 0;
  pointer-events: none;
}

.libs__ambient::before {
  content: "";
  position: absolute;
  top: -10%; right: -8%;
  width: 60vw; height: 60vw;
  max-width: 900px; max-height: 900px;
  background: radial-gradient(circle, rgba(47,105,66,0.10) 0%, rgba(117,194,73,0.03) 40%, transparent 70%);
  border-radius: 50%;
  filter: blur(18px);
}

.libs__ambient::after {
  content: "";
  position: absolute;
  bottom: -15%; left: -10%;
  width: 50vw; height: 50vw;
  max-width: 700px; max-height: 700px;
  background: radial-gradient(circle, rgba(117,194,73,0.025) 0%, transparent 60%);
  border-radius: 50%;
  filter: blur(16px);
}

.libs__noise {
  background-image:
    radial-gradient(circle, rgba(255,255,255,0.10) 1px, transparent 1px);
  background-size: 40px 40px;
  opacity: 0.35;
  mask-image: radial-gradient(ellipse at 50% 50%, rgba(0,0,0,1) 0%, rgba(0,0,0,0.4) 50%, transparent 75%);
  -webkit-mask-image: radial-gradient(ellipse at 50% 50%, rgba(0,0,0,1) 0%, rgba(0,0,0,0.4) 50%, transparent 75%);
}

.libs__depth {
  background:
    radial-gradient(ellipse at 50% 50%, transparent 30%, rgba(0,0,0,0.25) 100%);
  z-index: 1;
}

.libs__divider {
  position: absolute;
  top: 0;
  left: 10%;
  right: 10%;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(117,194,73,0.2), rgba(117,194,73,0.05), transparent);
  z-index: 2;
}

/* ══════════════════════════════════════════════════════════
   SECTION HEADER (eyebrow + title + sub)
   ══════════════════════════════════════════════════════════ */
.libs__header {
  position: relative;
  z-index: 5;
  max-width: 1400px;
  margin: 0 auto 3rem;
  padding: 0 clamp(1.5rem, 4vw, 4rem);
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  justify-content: space-between;
  gap: 2rem;
}

.libs__header-text {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  flex: 1;
}

@media (max-width: 768px) {
  .libs__header { flex-direction: column; align-items: flex-start; gap: 1rem; margin-bottom: 1.5rem; }
  .libs__header-text { width: 100%; gap: 0.75rem; }
}
@media (max-width: 480px) {
  .libs__header { gap: 0.85rem; margin-bottom: 1.25rem; }
}

.libs__eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: #BBD67A;
  margin-bottom: 0;
  opacity: 1;
  transform: translateY(0);
}
.js-libs-ready .libs__eyebrow { opacity: 0; transform: translateY(20px); }

.libs__eyebrow::before {
  content: "";
  width: 22px;
  height: 1px;
  background: linear-gradient(90deg, #75C249, transparent);
}

.libs__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  letter-spacing: -0.01em;
  line-height: 1.15;
  margin: 0;
  color: #fff;
  opacity: 1;
  transform: translateY(0);
}
.libs__title em {
  font-style: normal;
  display: inline-block;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  padding-bottom: 0.1em;
}
.js-libs-ready .libs__title { opacity: 0; transform: translateY(25px); }

.libs__subtitle {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.78rem, 1vw, 0.9rem);
  font-weight: 300;
  color: rgba(255,255,255,0.5);
  max-width: 580px;
  line-height: 1.65;
  margin: 0;
  opacity: 1;
  transform: translateY(0);
}
.js-libs-ready .libs__subtitle { opacity: 0; transform: translateY(20px); }

.libs__view-all {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.55rem;
  padding: 0.62rem 1.3rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.66rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  background: rgba(255, 255, 255, 0.015);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 50px;
  color: rgba(255, 255, 255, 0.65);
  text-decoration: none;
  cursor: pointer;
  position: relative;
  z-index: 6;
  flex-shrink: 0;
  overflow: hidden;
  transition: color 0.4s cubic-bezier(0.22, 1, 0.36, 1),
              border-color 0.4s cubic-bezier(0.22, 1, 0.36, 1),
              background 0.4s cubic-bezier(0.22, 1, 0.36, 1),
              transform 0.4s cubic-bezier(0.22, 1, 0.36, 1),
              box-shadow 0.4s cubic-bezier(0.22, 1, 0.36, 1);
  opacity: 1;
  white-space: nowrap;
}
.js-libs-ready .libs__view-all { opacity: 0; transform: translateY(15px); }

.libs__view-all:hover {
  color: #fff;
  border-color: rgba(187, 214, 122, 0.3);
  background: rgba(117, 194, 73, 0.05);
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
}

.libs__view-all::before {
  content: "";
  position: absolute;
  top: 0; left: -100%;
  width: 60%; height: 100%;
  background: linear-gradient(105deg, transparent 30%, rgba(187, 214, 122, 0.1) 50%, transparent 70%);
  transition: left 0.7s cubic-bezier(0.22, 1, 0.36, 1);
  pointer-events: none;
}
.libs__view-all:hover::before { left: 140%; }

.libs__view-all-arrow {
  transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
  display: inline-block;
  font-size: 0.95em;
}
.libs__view-all:hover .libs__view-all-arrow { transform: translateX(5px); }

@media (max-width: 768px) {
  .libs__view-all {
    align-self: stretch;
    margin-top: 0;
  }
}

/* ══════════════════════════════════════════════════════════
   HORIZONTAL SCROLL CAROUSEL
   Cards in a single row, drag-scroll on desktop, swipe on mobile.
   Edge fade masks. Hidden scrollbar.
   ══════════════════════════════════════════════════════════ */
.libs__grid-wrap {
  position: relative;
  z-index: 5;
  margin-bottom: 3rem;
}

.libs__grid-cards {
  display: flex;
  flex-wrap: nowrap;
  gap: 1.25rem;
  padding: 0.5rem clamp(1.5rem, 4vw, 4rem);
  overflow-x: auto;
  /* scroll-behavior:smooth removed */
  -webkit-overflow-scrolling: touch;
  scrollbar-width: none;
  scroll-snap-type: x proximity;
  cursor: grab;
}
.libs__grid-cards:active { cursor: grabbing; }
.libs__grid-cards::-webkit-scrollbar { display: none; }

/* Edge fade masks */
.libs__grid-wrap::before,
.libs__grid-wrap::after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  width: 60px;
  z-index: 6;
  pointer-events: none;
}
.libs__grid-wrap::before {
  left: 0;
  background: linear-gradient(90deg, var(--bg-deep, #0d1117), transparent);
}
.libs__grid-wrap::after {
  right: 0;
  background: linear-gradient(270deg, var(--bg-deep, #0d1117), transparent);
}

/* ══════════════════════════════════════════════════════════
   PRODUCT CARD (library-inner34 DNA, refactored for grid)
   ══════════════════════════════════════════════════════════ */
.libs__card {
  position: relative;
  flex: 0 0 240px;
  scroll-snap-align: start;
  border-radius: 16px;
  /* Premium layered glass — solid composite (no backdrop-filter, which
     was causing scroll jank on 14 simultaneously-visible cards). */
  background:
    linear-gradient(135deg,
      rgba(255, 255, 255, 0.05) 0%,
      rgba(255, 255, 255, 0.02) 50%,
      rgba(255, 255, 255, 0.04) 100%),
    rgba(15, 22, 30, 0.55);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-top-color: rgba(255, 255, 255, 0.15);
  border-bottom-color: rgba(255, 255, 255, 0.03);
  overflow: hidden;
  isolation: isolate;
  cursor: pointer;
  transition:
    transform 0.4s cubic-bezier(0.22, 1, 0.36, 1),
    border-color 0.4s ease,
    box-shadow 0.4s ease;
  display: flex;
  flex-direction: column;
  /* Tight resting shadow + subtle highlight */
  box-shadow:
    0 1px 0 rgba(255, 255, 255, 0.08) inset,
    0 1px 2px rgba(0, 0, 0, 0.25),
    0 8px 20px rgba(0, 0, 0, 0.18);
  opacity: 1;
  transform: translateY(0);
  /* Paint isolation — browser doesn't repaint card from outside changes */
  contain: layout paint style;
}
.js-libs-ready .libs__card {
  opacity: 0;
  transform: translateY(40px);
}

/* Continuous slow shimmer sweep (library-inner DNA) */
.libs__card::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 50%;
  height: 100%;
  background: linear-gradient(105deg,
    transparent 30%,
    rgba(255,255,255,0.015) 45%,
    rgba(255,255,255,0.04) 50%,
    rgba(255,255,255,0.015) 55%,
    transparent 70%);
  animation: libsCardSweep 9s ease-in-out infinite;
  pointer-events: none;
  z-index: 3;
}
@keyframes libsCardSweep {
  /* transform instead of `left`: GPU-composited, no per-frame repaint, so the
     nav backdrop-filter no longer re-samples a constantly-painting card. */
  0%, 100% { transform: translateX(-200%); }
  50%      { transform: translateX(240%); }
}

/* Border glow on hover */
.libs__card::before {
  content: "";
  position: absolute;
  inset: -1px;
  border-radius: inherit;
  background: linear-gradient(135deg, rgba(117,194,73,0.15), transparent 40%, transparent 60%, rgba(187,214,122,0.1));
  z-index: -1;
  opacity: 0;
  transition: opacity 0.5s cubic-bezier(0.22, 1, 0.36, 1);
}
.libs__card:hover::before { opacity: 1; }

.libs__card:hover {
  border-color: rgba(187, 214, 122, 0.22);
  border-top-color: rgba(187, 214, 122, 0.35);
  transform: translateY(-3px);
  box-shadow:
    0 1px 0 rgba(255, 255, 255, 0.12) inset,
    0 4px 8px rgba(0, 0, 0, 0.25),
    0 16px 36px rgba(0, 0, 0, 0.3),
    0 0 32px rgba(117, 194, 73, 0.06);
}

/* Glass press — soft compress inward, not a bouncy click.
   Mimics pressing on actual frosted glass: surface dims, depth shrinks. */
.libs__card:active {
  transform: translateY(-1px) scale(0.992);
  transition:
    transform 0.15s cubic-bezier(0.34, 0, 0.32, 1),
    border-color 0.2s ease,
    box-shadow 0.2s ease;
  box-shadow:
    0 1px 0 rgba(255, 255, 255, 0.06) inset,
    0 1px 2px rgba(0, 0, 0, 0.3),
    0 4px 10px rgba(0, 0, 0, 0.25);
  background:
    linear-gradient(135deg,
      rgba(255, 255, 255, 0.03) 0%,
      rgba(255, 255, 255, 0.01) 50%,
      rgba(255, 255, 255, 0.025) 100%),
    rgba(15, 22, 30, 0.32);
}

/* ── Card art (gradient placeholder, 4:5 ratio) ── */
.libs__card-art {
  position: relative;
  width: 100%;
  aspect-ratio: 4 / 5;
  overflow: hidden;
  background: #0a0e14;
}

.libs__card-gradient {
  position: absolute;
  inset: 0;
  z-index: 0;
  transition: transform 0.7s cubic-bezier(0.22, 1, 0.36, 1), filter 0.6s ease;
  will-change: transform;
}

.libs__card:hover .libs__card-gradient {
  transform: scale(1.08);
  filter: brightness(1.1);
}

/* Inner art vignette */
.libs__card-art::before {
  content: "";
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 30% 30%, transparent 0%, rgba(5,8,16,0.35) 90%),
    linear-gradient(to top, rgba(5,8,16,0.7) 0%, transparent 50%);
  z-index: 1;
  pointer-events: none;
}

/* ── Price badge (top-right pill) ── */
.libs__card-price {
  position: absolute;
  top: 0.7rem;
  right: 0.7rem;
  z-index: 4;
  display: inline-flex;
  align-items: center;
  padding: 0.32rem 0.65rem;
  border-radius: 50px;
  background: rgba(13,17,23,0.78);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255,255,255,0.10);
  font-family: "Outfit", sans-serif;
  font-size: 0.66rem;
  font-weight: 700;
  letter-spacing: 0.02em;
  color: #fff;
  font-variant-numeric: tabular-nums;
  box-shadow: 0 4px 14px rgba(0,0,0,0.35);
  transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
}
.libs__card:hover .libs__card-price {
  background: rgba(13,17,23,0.92);
  border-color: rgba(117,194,73,0.25);
}
.libs__card-price--free {
  background: rgba(117,194,73, 0.08);
  border-color: rgba(117,194,73, 0.20);
  color: #BBD67A;
  text-transform: uppercase;
  font-size: 0.56rem;
  letter-spacing: 0.16em;
}
.libs__card:hover .libs__card-price--free {
  background: rgba(117,194,73,0.28);
  border-color: rgba(117,194,73,0.55);
}

/* ══════════════════════════════════════════════════════════
   FORMAT CHIP — compatibility tag, BOTTOM-LEFT of card art
   Vocabulary: FOR KONTAKT · FOR KONTAKT PLAYER · STANDALONE APP · PLUGIN (VST3·AU)
   Position chosen so it never collides with top-left hover overlay
   (wishlist + cart) or top-right price badge.
   ══════════════════════════════════════════════════════════ */
.cc-format-chip {
  position: absolute;
  bottom: 0.7rem;
  left: 0.7rem;
  z-index: 4;
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  padding: 0.32rem 0.6rem;
  border-radius: 4px;
  background: rgba(13,17,23,0.75);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,0.10);
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.88);
  box-shadow: 0 4px 14px rgba(0,0,0,0.35);
  transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
  white-space: nowrap;
}
.cc-format-chip::before {
  content: "";
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: #75C249;
  box-shadow: 0 0 6px rgba(117,194,73,0.7);
}
.libs__card:hover .cc-format-chip {
  background: rgba(13,17,23,0.92);
  border-color: rgba(117,194,73,0.3);
  color: #fff;
}
@media (max-width: 768px) {
  .cc-format-chip {
    font-size: 0.42rem;
    letter-spacing: 0.14em;
    padding: 0.26rem 0.5rem;
    bottom: 0.55rem;
    left: 0.55rem;
  }
}

/* NEW-001 card faces have no price/overlay competition but DO have
   a card-body text strip at the bottom. Move chip to top-right inside
   this scope so it sits cleanly above the artwork. */
.newrel__card-face .cc-format-chip {
  top: 0.85rem;
  right: 0.85rem;
  bottom: auto;
  left: auto;
}
/* ══════════════════════════════════════════════════════════
   NEW · OVERLAY ICONS (top-right · stack of 2 · Heart + Cart)
   - Sits ABOVE price badge if both present (price is top-right;
     overlay icons sit just below it on hover, or replace it on
     small mobile to save vertical room)
   - Desktop: fade in on card hover
   - Mobile: always visible
   ══════════════════════════════════════════════════════════ */
.libs__card-overlay {
  /* DEPRECATED — replaced by inline .cc-card-actions in title row.
     Kept in DOM for safety (event handlers may reference these buttons),
     hidden visually. */
  display: none;
}

.libs__card:hover .libs__card-overlay,
.libs__card:focus-within .libs__card-overlay {
  opacity: 1;
  transform: translateY(0);
  pointer-events: auto;
}

.libs__icon-btn {
  position: relative;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: rgba(13,17,23,0.78);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border: 1px solid rgba(255,255,255,0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  padding: 0;
  color: rgba(255,255,255,0.85);
  transition:
    background 0.3s cubic-bezier(0.22, 1, 0.36, 1),
    border-color 0.3s cubic-bezier(0.22, 1, 0.36, 1),
    color 0.3s ease,
    transform 0.3s cubic-bezier(0.22, 1, 0.36, 1);
}

.libs__icon-btn:hover {
  background: rgba(117,194,73,0.18);
  border-color: rgba(117,194,73,0.45);
  color: #fff;
  transform: scale(1.08);
}

.libs__icon-btn:active { transform: scale(0.95); }

.libs__icon-btn svg {
  width: 14px;
  height: 14px;
  stroke-width: 1.8;
  fill: none;
  stroke: currentColor;
  transition: fill 0.3s ease;
}

/* Active states */
.libs__icon-btn--heart.is-active {
  background: rgba(117,194,73,0.22);
  border-color: rgba(117,194,73,0.55);
  color: #BBD67A;
}
.libs__icon-btn--heart.is-active svg {
  fill: #BBD67A;
  stroke: #BBD67A;
}

.libs__icon-btn--cart.is-active {
  background: rgba(117,194,73,0.22);
  border-color: rgba(117,194,73,0.55);
  color: #BBD67A;
}

/* Cart "+" badge appears when item added */
.libs__icon-btn--cart::after {
  content: "";
  position: absolute;
  top: -3px;
  right: -3px;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: #75C249;
  border: 2px solid #0d1117;
  font-size: 8px;
  font-weight: 700;
  color: #0d1117;
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1;
  opacity: 0;
  transform: scale(0);
  transition: opacity 0.25s, transform 0.3s cubic-bezier(0.22, 1, 0.36, 1);
}
.libs__icon-btn--cart.is-active::after {
  content: "+";
  opacity: 1;
  transform: scale(1);
}

/* Mobile: icons always visible (no hover state on touch) */
@media (max-width: 1024px) {
  .libs__card-overlay {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
  }
  .libs__icon-btn { width: 30px; height: 30px; }
  .libs__icon-btn svg { width: 13px; height: 13px; }
}

@media (max-width: 480px) {
  .libs__icon-btn { width: 28px; height: 28px; }
  .libs__icon-btn svg { width: 12px; height: 12px; }
}

/* ── Card body ── */
.libs__card-body {
  padding: 0.95rem 1.05rem 1.1rem;
  display: flex;
  flex-direction: column;
  gap: 0.45rem;
  position: relative;
  z-index: 2;
}

.libs__card-meta {
  display: flex;
  align-items: center;
  gap: 0.4rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: #BBD67A;
}
.libs__card-meta-divider {
  width: 3px;
  height: 3px;
  border-radius: 50%;
  background: rgba(187,214,122,0.4);
}
.libs__card-meta-region { color: rgba(255,255,255,0.45); }

.libs__card-name {
  font-family: "Playfair Display", serif;
  font-size: 0.92rem;
  font-weight: 700;
  line-height: 1.2;
  color: #fff;
  margin: 0;
  /* Allow truncation so inline action icons never get pushed out */
  min-width: 0;
  flex: 1 1 auto;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

/* ══════════════════════════════════════════════════════════
   SHARED CARD TITLE ROW + ACTIONS
   Used across homepage LIBS cards, library-shop lib-cards,
   and library-inner rec-cards.
   ══════════════════════════════════════════════════════════ */
.cc-card-title-row {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  min-width: 0;
}
.cc-card-actions {
  display: inline-flex;
  align-items: center;
  gap: 0.15rem;
  flex-shrink: 0;
}
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
/* Hover state — brighten and lift faintly */
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
/* Active state (already in wishlist / cart) */
.cc-card-action-btn.is-active {
  color: #BBD67A;
}
.cc-card-action-btn.is-active svg { fill: rgba(117,194,73,0.18); }

@media (max-width: 768px) {
  .cc-card-action-btn { width: 30px; height: 30px; padding: 0.4rem; }
  .cc-card-action-btn svg { width: 16px; height: 16px; }
}

.libs__card-tagline {
  font-family: "Outfit", sans-serif;
  font-size: 0.7rem;
  font-weight: 400;
  color: rgba(255,255,255,0.72);
  line-height: 1.55;
  margin: 0;
  /* Clamp to 2 lines — no scroll, no fade, no blur */
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* (Removed) Pulsing chevron at card-body bottom-right was confusing — long
   taglines clamp via CSS line-clamp instead of needing a scroll hint. */

/* Mobile body tighter */
@media (max-width: 1024px) {
  .libs__card { flex: 0 0 210px; }
}
@media (max-width: 768px) {
  .libs__card { flex: 0 0 185px; }
  .libs__grid-cards { gap: 1rem; }
}
@media (max-width: 600px) {
  .libs__card-body { padding: 0.7rem 0.8rem 0.85rem; gap: 0.3rem; }
  .libs__card-meta { font-size: 0.42rem; letter-spacing: 0.16em; }
  .libs__card-name { font-size: 0.78rem; }
  .libs__card-tagline { font-size: 0.6rem; }
}
@media (max-width: 480px) {
  .libs__card { flex: 0 0 170px; }
  .libs__grid-cards { gap: 0.85rem; padding: 0.5rem 1rem; }
}
@media (max-width: 360px) {
  .libs__card { flex: 0 0 175px; }
}

/* ══════════════════════════════════════════════════════════
   REDUCED MOTION
   ══════════════════════════════════════════════════════════ */
@media (prefers-reduced-motion: reduce) {
  .libs__eyebrow,
  .libs__title,
  .libs__subtitle,
  .libs__card,
  .libs__view-all {
    opacity: 1 !important;
    transform: none !important;
  }
  .libs__card::after,
  .libs__ambient::before,
  .libs__ambient::after {
    animation: none !important;
  }
}

</style>

<!-- ═══ NAV — verbatim from library-inner34.html ═══ -->
<style>

@media (prefers-reduced-motion: reduce) {
  .cc-nav, .cc-nav__link, .cc-nav__cta, .cc-nav__logo, .cc-nav__logo::before, .cc-nav__logo::after,
  .libs__eyebrow, .libs__title, .libs__subtitle, .libs__card, .libs__view-all,
  .libs__ambient::before, .libs__ambient::after {
    transition-duration: 0.01ms !important;
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
  }
  .libs__card, .libs__eyebrow, .libs__title, .libs__subtitle, .libs__view-all {
    opacity: 1 !important;
    transform: none !important;
  }
}

@keyframes logoTextureDrift {
  0%, 100% { transform: translate(0, 0) rotate(0deg); }
  33% { transform: translate(5%, -3%) rotate(1deg); }
  66% { transform: translate(-3%, 4%) rotate(-1deg); }
}

@keyframes svantraDrift {
  0%   { background-position: 0% 50%; }
  100% { background-position: 220% 50%; }
}

@keyframes svantraShine {
  to { left: 130%; }
}


/* Reserve scrollbar space ALWAYS so locking doesn't shift layout horizontally. */
html {
  scrollbar-gutter: stable;
  overscroll-behavior-x: none;
}

</style>
<!-- ─── JSON-LD: Organization · brand identity for SEO + AI search ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "@id": "https://cryptocipher.in/#organization",
  "name": "Crypto Cipher Audio Lab",
  "alternateName": "Crypto Cipher",
  "url": "https://cryptocipher.in",
  "logo": "https://cryptocipher.in/logo.svg",
  "description": "Premium Indian heritage music. Virtual instruments for Kontakt, recording services, sync licensing.",
  "foundingDate": "2010",
  "founder": {
    "@type": "Person",
    "name": "Sumit Kumar"
  },
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Delhi",
    "addressCountry": "IN"
  },
  "sameAs": [
    "https://www.instagram.com/cryptocipher/",
    "https://www.facebook.com/CryptoCipherAudioLab/",
    "https://www.youtube.com/@CryptoCipherLab",
    "https://in.linkedin.com/company/crypto-cipher"
  ]
}
</script>

<!-- ─── JSON-LD: WebSite · enables sitelinks search box in Google ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "@id": "https://cryptocipher.in/#website",
  "name": "Crypto Cipher Audio Lab",
  "url": "https://cryptocipher.in",
  "publisher": {
    "@type": "Organization",
    "name": "Crypto Cipher Audio Lab"
  },
  "potentialAction": {
    "@type": "SearchAction",
    "target": {
      "@type": "EntryPoint",
      "urlTemplate": "https://cryptocipher.in/search?q={search_term_string}"
    },
    "query-input": "required name=search_term_string"
  }
}
</script>

<!-- ═══ v2 Polish Layer · shared across all 14 pages ═══ -->

<style id="cc-critical-guard">
  /* refresh-flash guard: .msb (top-left "Browse states" button) and
     .cc-hm (statement bar) are styled by late body styles — this page
     carries 18/20 style blocks in <body>. Hidden until those parse;
     the mobile authority releases them. */
  .cc-hm, .msb { visibility: hidden; }
  @media (max-width: 768px) { .hero__logo { visibility: hidden; } } /* logo placed by late authority; hide until then to kill centered-then-jump flash */ /* all viewports: both are styled/hidden
     only by late body styles — guard until those parse */
</style>
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
@endverbatim

