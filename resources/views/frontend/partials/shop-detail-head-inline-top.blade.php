@verbatim
<meta property="og:type" content="product">
<meta name="google-site-verification" content="REPLACE_GSC_TOKEN">
<meta name="msvalidate.01" content="REPLACE_BING_TOKEN">
<!-- Stage 8 · perf: connection hints (head-only) -->
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

  /* OVERRIDE the generic data-reveal motion for hero elements only.
     The choreography uses CSS animations (not transitions) so each
     element has its own curve and doesn't depend on .visible toggle. */
  .lib-hero [data-reveal] {
    opacity: 0;
    transform: none;
    transition: none;
  }
  .lib-hero.choreographed [data-reveal] {
    animation-fill-mode: both;
  }

  /* The H1 itself stays visible — words inside handle the choreography */
  .lib-hero.choreographed .lib-hero__title { opacity: 1; }

  /* 0.0s — Ambient bloom (radial light flares ramp up) */
  .lib-hero__ambient {
    opacity: 0;
    animation: heroAmbientBloom 1.8s cubic-bezier(0.22, 1, 0.36, 1) 0s forwards;
  }
  @keyframes heroAmbientBloom {
    0%   { opacity: 0; transform: scale(0.94); }
    100% { opacity: 0.6; transform: scale(1); }
  }

  /* 0.15s — Breadcrumb (small, fast, sets the stage) */
  .lib-hero.choreographed .lib-hero__breadcrumb {
    animation: heroFadeUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) 0.15s forwards;
  }

  /* 0.30s+ — Title word stagger
     Each word masks in from below with subtle blur-to-clear.
     Words use --w (0,1,2) for stagger delay. */
  .lib-hero__title-word {
    display: inline-block;
    opacity: 0;
    transform: translateY(0.6em);
    filter: blur(8px);
    /* Mask container for clip effect */
    will-change: transform, opacity, filter;
  }
  .lib-hero.choreographed .lib-hero__title-word {
    animation: heroTitleWord 1.05s cubic-bezier(0.16, 1, 0.3, 1) calc(0.30s + var(--w) * 0.14s) forwards;
  }
  @keyframes heroTitleWord {
    0%   { opacity: 0; transform: translateY(0.6em); filter: blur(8px); }
    60%  { opacity: 1; filter: blur(0); }
    100% { opacity: 1; transform: translateY(0); filter: blur(0); }
  }

  /* 0.95s — Tagline (italic ghost-in, lighter motion) */
  .lib-hero.choreographed .lib-hero__tagline {
    animation: heroFadeUp 0.95s cubic-bezier(0.22, 1, 0.36, 1) 0.85s forwards;
  }

  /* 1.15s — Video frame: bloom outward (shadow ring + scale-in) */
  .lib-hero.choreographed .lib-hero__video {
    animation: heroVideoBloom 1.2s cubic-bezier(0.22, 1, 0.36, 1) 1.05s forwards;
  }
  @keyframes heroVideoBloom {
    0%   { opacity: 0; transform: scale(0.97) translateY(20px); }
    100% { opacity: 1; transform: scale(1) translateY(0); }
  }

  /* 1.40s — Meta strip cascade (each item 60ms apart) */
  .lib-hero.choreographed .lib-hero__meta {
    animation: heroFadeUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) 1.35s forwards;
  }
  .lib-hero.choreographed .lib-hero__meta-item {
    opacity: 0;
    animation: heroFadeUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) calc(1.45s + var(--mi, 0) * 0.06s) forwards;
  }
  .lib-hero__meta-item:nth-child(1) { --mi: 0; }
  .lib-hero__meta-item:nth-child(2) { --mi: 1; }
  .lib-hero__meta-item:nth-child(3) { --mi: 2; }
.lib-hero__meta-item:nth-child(3),
.lib-hero__meta-item:nth-child(4),
.lib-hero__meta-item:nth-child(5) { display: none !important; } /* global 3-up: Format · Size · License */
  .lib-hero__meta-item:nth-child(4) { --mi: 3; }
  .lib-hero__meta-item:nth-child(5) { --mi: 4; }
  .lib-hero__meta-item:nth-child(6) { --mi: 5; }

  /* Shared keyframe for fade-up elements */
  @keyframes heroFadeUp {
    0%   { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
  }
}

/* Reduced motion · everything appears instantly */
@media (prefers-reduced-motion: reduce) {
  .lib-hero__title-word,
  .lib-hero [data-reveal] {
    opacity: 1 !important;
    transform: none !important;
    filter: none !important;
    animation: none !important;
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

/* Hero play-button bloom ring (playPulse). The button reveals itself
   on hover — no need to broadcast at idle. */
.lib-hero__play-btn::before {
  animation: none !important;
}

/* Videos panel button pulse (playPulse — second use). Same reasoning. */
.videos__panel-btn::before {
  animation: none !important;
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
.patch,
.credit-card,
.description__quote,
.description__stat,
.bundle-cta,
.buybox,
.player-box,
.process-step,
.rec-card__price,
.sidenav__pull,
.soft-cta {
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
/* (Removed orphan @media ≤768 .main-col gap:3.5rem — it conflicted with the
   canonical --section-gap-* token system below, which owns section rhythm:
   4rem desktop / 3rem ≤1024 / 2.5rem ≤560. The orphan caused a 3.5rem→2.5rem
   jump in the 561–768 band. Token system is now the single source.) */

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
   §1 HERO
   ─────────────────────────────────────────────── */
.lib-hero {
  position: relative;
  padding-bottom: 0;
}
.lib-hero__ambient {
  position: absolute;
  inset: -3rem;
  pointer-events: none;
  z-index: 0;
  opacity: 0.6;
}
.lib-hero__ambient::before {
  content: "";
  position: absolute;
  top: 0; left: -10%;
  width: 60%;
  height: 80%;
  background: radial-gradient(circle, rgba(47,105,66,0.20) 0%, transparent 60%);
  border-radius: 50%;
  filter: blur(16px);
}
.lib-hero__ambient::after {
  content: "";
  position: absolute;
  top: 20%; right: -10%;
  width: 50%;
  height: 70%;
  background: radial-gradient(circle, rgba(180,140,50,0.04) 0%, transparent 50%), radial-gradient(circle at 50% 50%, rgba(117,194,73,0.10) 0%, transparent 55%);
  border-radius: 50%;
  filter: blur(16px);
}
.lib-hero > * { position: relative; z-index: 2; }

.lib-hero__breadcrumb {
  font-family: "Outfit", sans-serif;
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
.lib-hero__breadcrumb::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.lib-hero__breadcrumb a { color: var(--text-quiet); transition: color 0.25s ease; text-decoration: none; }
.lib-hero__breadcrumb a:hover { color: var(--green-light); }
.lib-hero__breadcrumb-sep { opacity: 0.4; margin: 0 0.1rem; }
.lib-hero__breadcrumb-current { color: var(--green-light); }

.lib-hero__badges {
  display: flex;
  gap: 0.5rem;
  margin-bottom: 1rem;
}
.lib-hero__badge {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.3rem 0.7rem;
  border-radius: 50px;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.18em;
  text-transform: uppercase;
}
.lib-hero__badge--new { background: rgba(117,194,73,0.18); color: var(--green-light); border: 1px solid rgba(117,194,73,0.35); }
.lib-hero__badge--flagship { background: rgba(180,140,50,0.12); color: var(--warning); border: 1px solid rgba(180,140,50,0.32); }
.lib-hero__badge--format { background: rgba(13,17,23,0.75); color: rgba(255,255,255,0.88); border: 1px solid rgba(255,255,255,0.12); }
.lib-hero__badge--format::before {
  content: "";
  width: 5px; height: 5px;
  border-radius: 50%;
  background: #75C249;
  box-shadow: 0 0 6px rgba(117,194,73,0.7);
  margin-right: 0.1rem;
}

.lib-hero__title {
  font-family: "Playfair Display", serif;
  font-size: clamp(2.2rem, 4.6vw, 3.8rem);
  font-weight: 900;
  line-height: 1.05;
  letter-spacing: -0.02em;
  color: var(--text-primary);
  text-shadow: 0 2px 30px rgba(0,0,0,0.4);
  margin: 0 0 1rem 0;
}


/* ───────────────────────────────────────────────
   §1B PRICE PANEL — standalone section · full-width 2-col composition
   Sits below hero (after meta strip), before player.
   Left: price + features (60%) · Right: warning + Buy + secondary (40%)
   ─────────────────────────────────────────────── */
.price-panel {
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 2.5rem;
  padding: 1.6rem 2.2rem;
  border-radius: 18px;
  background: linear-gradient(135deg, rgba(15,20,28,0.85), rgba(8,12,18,0.85));
  border: 1px solid rgba(255,255,255, 0.06);
  border-top-color: rgba(255,255,255, 0.10);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  box-shadow: 0 18px 50px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.04);
  position: relative;
  align-items: center;
}

/* Hero → Price panel · negative pull tuned per breakpoint
   Desktop: ~48px gap (paired with hero meta strip)
   Mobile: ~40px gap (consistent with all other section gaps) */
#price-panel-section { margin-top: calc(-5rem + 4rem); }
@media (max-width: 1024px) {
  #price-panel-section { margin-top: 0; }
}
.price-panel::before {
  content: "";
  position: absolute;
  inset: -1px;
  border-radius: inherit;
  background: linear-gradient(160deg, rgba(90,160,70,0.12) 0%, transparent 30%, transparent 70%, rgba(75,145,65,0.08) 100%);
  z-index: -1;
  pointer-events: none;
}
@media (max-width: 900px) {
  .price-panel { grid-template-columns: 1fr; gap: 1.1rem; padding: 1.4rem 1.4rem; }
}
@media (max-width: 600px) {
  .price-panel { gap: 0.8rem; padding: 1rem 1rem; border-radius: 14px; }
  .price-panel__left { gap: 0.55rem; }
}

/* Left column: eyebrow + price */
.price-panel__left {
  display: flex;
  flex-direction: column;
  gap: 0.65rem;
}
.price-panel__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
}
.price-panel__price-row {
  display: flex;
  align-items: baseline;
  gap: 0.5rem;
}
.price-panel__price {
  font-family: "Playfair Display", serif;
  font-size: clamp(2.4rem, 4vw, 3rem);
  font-weight: 900;
  line-height: 1;
  color: var(--text-primary);
  font-variant-numeric: tabular-nums;
}
.price-panel__currency {
  font-size: 0.8rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  color: var(--text-muted);
}
@media (max-width: 600px) {
  .price-panel__price { font-size: 1.85rem !important; }
  .price-panel__currency { font-size: 0.7rem; }
}

/* Right column — Awwwards composition
   Vertical stack: Buy (focal) → Warning (below) → Secondary text-links (smallest)
   No card-y dividers, pure typographic hierarchy */
.price-panel__right {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  min-width: 0;
  align-items: stretch;
}

/* ── Buy CTA — Awwwards pill button with asymmetric inner content ── */
.price-panel__buy {
  display: grid;
  grid-template-columns: 1fr auto auto;
  align-items: center;
  gap: 0.9rem;
  padding: 1.05rem 1.5rem 1.05rem 1.6rem;
  border-radius: 100px;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  border: none;
  color: #0a0d12;
  font-family: "Outfit", sans-serif;
  text-decoration: none;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: all 0.45s var(--ease);
  box-shadow: 0 8px 24px rgba(0,0,0, 0.35), inset 0 1px 0 rgba(255,255,255, 0.22);
}
.price-panel__buy::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, var(--green-primary) 0%, var(--green-light) 100%);
  opacity: 0;
  transition: opacity 0.45s var(--ease);
  z-index: 0;
}
.price-panel__buy:hover {
  transform: translateY(-2px);
  box-shadow: 0 14px 36px rgba(0,0,0, 0.4), 0 0 24px rgba(117,194,73, 0.22), inset 0 1px 0 rgba(255,255,255, 0.25);
}
.price-panel__buy:hover::before { opacity: 1; }
.price-panel__buy:active { transform: translateY(0); }
.price-panel__buy > * { position: relative; z-index: 1; }

.price-panel__buy-label {
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: -0.01em;
  color: var(--bg-deep);
}
.price-panel__buy-price {
  font-family: "Playfair Display", serif;
  font-size: 1rem;
  font-weight: 800;
  color: var(--bg-deep);
  font-variant-numeric: tabular-nums;
  padding-left: 0.9rem;
  border-left: 1px solid rgba(0,0,0,0.18);
  letter-spacing: -0.005em;
}
.price-panel__buy-arrow {
  width: 16px;
  height: 16px;
  color: var(--bg-deep);
  transition: transform 0.4s var(--ease);
}
.price-panel__buy:hover .price-panel__buy-arrow { transform: translateX(4px); }

/* ── Warning — sits BELOW button (the structural change) ── */
.price-panel__warning {
  display: flex;
  align-items: flex-start;
  gap: 0.55rem;
  padding: 0;
  background: none;
  border: none;
  font-size: 0.66rem;
  font-weight: 400;
  color: var(--text-muted);
  line-height: 1.55;
}
.price-panel__warning svg {
  width: 13px;
  height: 13px;
  color: var(--warning);
  flex-shrink: 0;
  margin-top: 2px;
  opacity: 0.85;
}
.price-panel__warning strong { color: var(--warning); font-weight: 600; opacity: 0.95; }

/* ── Secondary — pure text-links, no chip backgrounds ── */
.price-panel__secondary {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 1rem;
  margin-top: 0.15rem;
}
.price-panel__divider {
  width: 1px;
  height: 11px;
  background: rgba(255,255,255,0.12);
}
.price-panel__link {
  display: inline-flex;
  align-items: center;
  gap: 0.45rem;
  padding: 0.5rem 0; /* tap area; visual text unchanged */
  border: none;
  background: none;
  color: var(--text-secondary);
  font-size: 0.78rem;
  font-weight: 500;
  font-family: "Outfit", sans-serif;
  cursor: pointer;
  position: relative;
  transition: color 0.3s var(--ease);
  letter-spacing: 0;
}
.price-panel__link::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -4px;
  width: 100%;
  height: 1px;
  background: currentColor;
  opacity: 0.35;
  transform: scaleX(1);
  transform-origin: left center;
  transition: transform 0.4s var(--ease), opacity 0.3s var(--ease);
}
.price-panel__link:hover { color: var(--green-light); }
.price-panel__link:hover::after { opacity: 1; }
.price-panel__link svg {
  width: 13px;
  height: 13px;
  color: var(--green-light);
  transition: all 0.3s var(--ease);
}
.price-panel__link.active { color: var(--green-light); }
.price-panel__link.active svg { fill: var(--green-light); stroke: var(--green-light); }

@media (max-width: 600px) {
  .price-panel__buy { padding: 0.75rem 1rem; grid-template-columns: 1fr auto; gap: 0.7rem; }
  .price-panel__buy-arrow { display: none; }
  .price-panel__buy-label { font-size: 0.78rem; }
  .price-panel__buy-price { font-size: 0.9rem; padding-left: 0.75rem; }
  .price-panel__warning { font-size: 0.6rem; gap: 0.45rem; }
  .price-panel__warning svg { width: 11px; height: 11px; }
  .price-panel__right { gap: 0.85rem; }
  .price-panel__secondary { gap: 0.7rem; padding-top: 0.15rem; }
  .price-panel__link { font-size: 0.72rem; }
}

.lib-hero__tagline {
  font-family: "Playfair Display", serif;
  font-size: clamp(0.95rem, 1.4vw, 1.2rem);
  font-style: italic;
  line-height: 1.5;
  color: var(--text-secondary);
  font-weight: 400;
  max-width: 720px;
  margin: 0 0 1.5rem 0;
}

.lib-hero__meta {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3-up: Format · Size · License */
  gap: 1rem 1.25rem;
  padding-top: 1.2rem;
  padding-left: 28px;
  padding-right: 28px;
  /* Refined divider: a center-weighted gradient hairline that fades to nothing
     at both ends — no blunt full-width 1px rule touching the edges. Reads as a
     soft separation, not a drawn border. */
  border-top: 0;
  position: relative;
  margin-bottom: 2rem;
  max-width: none;
}
.lib-hero__meta::before {
  content: "";
  position: absolute;
  top: 0;
  left: 28px;
  right: 28px;
  height: 1px;
  background: linear-gradient(to right,
    transparent 0%,
    rgba(255,255,255,0.10) 25%,
    rgba(255,255,255,0.10) 75%,
    transparent 100%);
}
.lib-hero__meta-item {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}
.lib-hero__meta-label {
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.25em;
  text-transform: uppercase;
  color: var(--text-muted);
}
.lib-hero__meta-value {
  font-family: "Playfair Display", serif;
  font-size: 0.92rem;
  font-weight: 700;
  color: var(--text-primary);
}

/* Mobile meta — 3-col grid, smaller values, tighter spacing */
@media (max-width: 600px) {
  .lib-hero__meta {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.85rem 1rem;
    padding-top: 1rem;
    padding-left: 20px;
    padding-right: 20px;
    margin-bottom: 1.5rem;
  }
  .lib-hero__meta-item { gap: 0.2rem; }
  .lib-hero__meta-label { font-size: 0.46rem; letter-spacing: 0.18em; }
  .lib-hero__meta-value { font-size: 0.78rem; line-height: 1.25; }
  .lib-hero__meta::before { left: 20px; right: 20px; }
}

/* Hero video — heritage aesthetic
   28px radius · deep cinematic shadow · golden edge gradient · mouse-follow highlight · 88px play button
   Matches /mnt/project/heritage-video.html DNA */
.lib-hero__video {
  position: relative;
  aspect-ratio: 16 / 9;
  border-radius: 28px;
  overflow: hidden;
  background: linear-gradient(135deg, #1a1f28, #0d1117);
  /* 1px border removed — leaked as a faint hairline at the rounded corners over
     the video/poster. The ::before edge gradient + box-shadow define the edge. */
  box-shadow:
    0 30px 80px rgba(0,0,0,0.6),
    0 8px 30px rgba(0,0,0,0.4),
    0 0 60px rgba(75,145,65,0.04);
  isolation: isolate;
  margin-top: 0.5rem;
  cursor: pointer;
  transition: transform 0.6s var(--ease), box-shadow 0.6s ease;
}
/* Mobile · taller cinematic 4:3 ratio so video anchors hero attention */
@media (max-width: 600px) {
  .lib-hero__video { aspect-ratio: 4 / 3; border-radius: 20px; }
  .lib-hero__video::before { border-radius: 21px; }
}
.lib-hero__video:hover {
  transform: scale(1.005);
  box-shadow:
    0 40px 100px rgba(0,0,0,0.7),
    0 12px 40px rgba(0,0,0,0.5),
    0 0 0 1px rgba(255,255,255,0.06),
    0 0 80px rgba(75,145,65,0.06);
}
/* Golden edge gradient (heritage signature) */
.lib-hero__video::before {
  content: "";
  position: absolute;
  inset: -1px;
  border-radius: 29px;
  background: linear-gradient(160deg, rgba(90,160,70,0.12) 0%, transparent 30%, transparent 70%, rgba(75,145,65,0.06) 100%);
  z-index: 10;
  pointer-events: none;
}
/* Inner ambient gradient */
.lib-hero__video::after {
  content: "";
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 30% 30%, rgba(117,194,73,0.10) 0%, transparent 55%),
    radial-gradient(ellipse at 70% 70%, rgba(180,140,50,0.10) 0%, transparent 55%),
    linear-gradient(135deg, #1a2a1a 0%, #0d1117 60%);
  z-index: 0;
}
/* When a real video thumbnail is painted on the frame, drop the opaque base of
   ::after (keep only the translucent colour tints) so the thumbnail is visible.
   Without this the hero's opaque ::after hides the loaded thumbnail entirely. */
.lib-hero__video.has-thumb::after {
  /* When a thumbnail is shown the poster (z1) covers the dark ::after base, so
     here we only need a shallow bottom scrim for title legibility. */
  background:
    linear-gradient(to top, rgba(6,9,14,0.70) 0%, rgba(6,9,14,0.18) 18%, transparent 38%);
  z-index: 2;   /* scrim above the poster so it darkens the image's bottom edge */
}
/* Dedicated poster layer — the thumbnail paints HERE (not the frame bg, which
   sits beneath the opaque ::after base). z1 = above the dark ::after base,
   below the scrim/vignette/play overlays. The proven homepage poster pattern. */
.lib-hero__poster {
  position: absolute;
  inset: 0;
  z-index: 1;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  border-radius: inherit;
  opacity: 0;
  transition: opacity 0.5s ease;
}
.lib-hero__poster.has-thumb { opacity: 1; }
/* Specular top edge + refined depth ring — simulates light catching a glass
   surface. Pure white at very low alpha, no colour. */
.lib-hero__video.has-thumb {
  box-shadow:
    0 30px 80px rgba(0,0,0,0.6),
    0 8px 30px rgba(0,0,0,0.4),
    inset 0 1px 0 rgba(255,255,255,0.14),
    inset 0 0 0 1px rgba(255,255,255,0.05);
}
/* Soft neutral vignette overlay swap when a thumbnail is present (the default
   vignette stays; this just ensures corners read as cinematic, not coloured). */
.lib-hero__video.has-thumb .lib-hero__video-vignette {
  background: radial-gradient(ellipse at center, transparent 62%, rgba(0,0,0,0.28) 100%);
}
/* Mouse-follow highlight (heritage signature) */
.lib-hero__video-highlight {
  position: absolute;
  width: 300px;
  height: 300px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(187,214,122,0.07) 0%, transparent 70%);
  z-index: 5;
  pointer-events: none;
  opacity: 0;
  transform: translate(-50%, -50%);
  transition: opacity 0.4s ease;
}
.lib-hero__video:hover .lib-hero__video-highlight { opacity: 1; }
/* Inner vignette for cinematic feel */
.lib-hero__video-vignette {
  position: absolute;
  inset: 0;
  z-index: 4;
  pointer-events: none;
  background: radial-gradient(ellipse at center, transparent 50%, rgba(0,0,0,0.35) 100%);
}

/* Badges overlay — top-left of video */
.lib-hero__video-badges {
  position: absolute;
  top: 1.2rem;
  left: 1.2rem;
  z-index: 6;
  display: flex;
  gap: 0.45rem;
}

.lib-hero__play {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  z-index: 8;
}
.lib-hero__play-btn {
  width: 88px;
  height: 88px;
  border-radius: 50%;
  /* Dark radial base UNDER the glass tint so the triangle always has a
     dark backing and never washes out on light/busy thumbnails. The glass
     highlight sits on top; the dark center guarantees contrast. */
  background:
    radial-gradient(circle at 50% 45%, rgba(5,8,16,0.92) 0%, rgba(5,8,16,0.78) 60%, rgba(5,8,16,0.55) 100%),
    rgba(255,255,255,0.06);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border: 1px solid rgba(187,214,122,0.18);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.4s var(--ease);
  box-shadow: 0 12px 40px rgba(0,0,0,0.5), 0 0 30px rgba(117,194,73,0.10);
  position: relative;
}
.lib-hero__play-btn::before {
  content: "";
  position: absolute;
  inset: -6px;
  border-radius: 50%;
  border: 1px solid rgba(187,214,122,0.22);
  animation: playPulse 2.4s ease-in-out infinite;
}
@keyframes playPulse {
  0%, 100% { transform: scale(1); opacity: 0.6; }
  50% { transform: scale(1.12); opacity: 0; }
}
.lib-hero__play-btn svg { width: 30px; height: 30px; fill: #fff; transform: translateX(2px); }
.lib-hero__video:hover .lib-hero__play-btn {
  transform: scale(1.06);
  background: rgba(117,194,73,0.18);
  border-color: rgba(187,214,122,0.4);
  box-shadow: 0 16px 50px rgba(0,0,0,0.6), 0 0 40px rgba(117,194,73,0.18);
}
/* ── Premium GLASS play button (only when a real thumbnail is shown) ──
   Clear/white frosted glass instead of green tint — reads as a material
   object sitting on the photo. Re-enables backdrop-filter for THIS button
   only (the global cull forces it off; this specific override wins). */
.lib-hero__video.has-thumb .lib-hero__play-btn {
  background:
    radial-gradient(circle at 50% 45%, rgba(5,8,16,0.9) 0%, rgba(5,8,16,0.74) 60%, rgba(5,8,16,0.5) 100%),
    linear-gradient(160deg, rgba(255,255,255,0.18) 0%, rgba(255,255,255,0.06) 100%);
  backdrop-filter: blur(14px) saturate(1.2);
  -webkit-backdrop-filter: blur(14px) saturate(1.2);
  border: 1px solid rgba(255,255,255,0.32);
  box-shadow:
    0 14px 44px rgba(0,0,0,0.42),
    inset 0 1px 0 rgba(255,255,255,0.5),    /* top specular highlight */
    inset 0 -1px 3px rgba(0,0,0,0.2);        /* bottom inner shade */
}
.lib-hero__video.has-thumb .lib-hero__play-btn::before {
  border-color: rgba(255,255,255,0.28);     /* neutral pulse ring */
}
.lib-hero__video.has-thumb:hover .lib-hero__play-btn {
  transform: scale(1.06);
  background:
    radial-gradient(circle at 50% 45%, rgba(5,8,16,0.85) 0%, rgba(5,8,16,0.68) 60%, rgba(5,8,16,0.45) 100%),
    linear-gradient(160deg, rgba(255,255,255,0.26) 0%, rgba(255,255,255,0.10) 100%);
  border-color: rgba(255,255,255,0.5);
  box-shadow:
    0 18px 54px rgba(0,0,0,0.5),
    inset 0 1px 0 rgba(255,255,255,0.65),
    inset 0 -1px 3px rgba(0,0,0,0.22);
}

.lib-hero__video-overlay {
  position: absolute;
  bottom: 0; left: 0; right: 0;
  padding: 1.4rem 1.8rem;
  background: linear-gradient(to top, rgba(5,8,16,0.9), transparent);
  /* Match the frame's bottom corners. The frame uses transform (reveal anim) +
     isolation, which on mobile can make overflow:hidden clip imperfectly at the
     bottom corners — so the overlay's square corners leaked past the rounded
     frame there. Rounding the overlay's own bottom corners removes the leak
     regardless of the parent clip. */
  border-bottom-left-radius: 28px;
  border-bottom-right-radius: 28px;
  z-index: 7;
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  pointer-events: none;
}
@media (max-width: 600px) {
  .lib-hero__video-overlay {
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
  }
}
.lib-hero__video-label {
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
  margin-bottom: 0.3rem;
}
.lib-hero__video-name {
  font-family: "Playfair Display", serif;
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--text-primary);
}
.lib-hero__video-duration {
  font-size: 0.66rem;
  color: var(--text-muted);
  letter-spacing: 0.1em;
  font-variant-numeric: tabular-nums;
}

@media (max-width: 768px) {
  /* Hero featured-video overlay — premium pass (Phase 3 mobile):
     Thumbnail is a YouTube image we don't control, so its baked text can
     sit anywhere. Can't avoid arbitrary clashes by POSITION — instead the
     overlay text gets its own legible zone via a taller, denser scrim, so
     whatever's behind the band is suppressed and our text always reads.
     Desktop (88px button + lighter scrim) intentionally untouched. */

  /* (1) premium scrim — taller + denser than desktop so the text band is
     always clean over any thumbnail */
  .lib-hero__video-overlay {
    padding: 2.4rem 1.2rem 1.1rem;
    background: linear-gradient(to top,
      rgba(5,8,16,0.94) 0%,
      rgba(5,8,16,0.82) 38%,
      rgba(5,8,16,0.45) 70%,
      transparent 100%);
    gap: 0.75rem;
    align-items: flex-end;
  }
  /* (2) clean geometry — title block flexes/truncates, duration pinned */
  .lib-hero__video-overlay > div { min-width: 0; flex: 1; }
  .lib-hero__video-label { margin-bottom: 0.35rem; letter-spacing: 0.24em; }
  .lib-hero__video-name {
    font-size: 0.92rem; line-height: 1.25;
    overflow: hidden; text-overflow: ellipsis;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
  }
  .lib-hero__video-duration {
    flex-shrink: 0; white-space: nowrap; padding-bottom: 0.1rem;
  }
  /* (3) play button — desktop 88px is fine; oversized on mobile */
  .lib-hero__play-btn { width: 58px; height: 58px; }
  .lib-hero__play-btn svg { width: 22px; height: 22px; }
}


/* Hero compatibility warning — pulled out from old buy block, always visible */
.lib-hero__warning {
  display: flex;
  align-items: flex-start;
  gap: 0.6rem;
  margin-top: 1.4rem;
  padding: 0.85rem 1rem;
  border-radius: 10px;
  background: rgba(180,140,50,0.05);
  border: 1px solid rgba(180,140,50,0.18);
  font-size: 0.72rem;
  font-weight: 400;
  color: var(--text-secondary);
  line-height: 1.55;
  max-width: 700px;
}
.lib-hero__warning svg { width: 14px; height: 14px; color: var(--warning); flex-shrink: 0; margin-top: 2px; }
.lib-hero__warning strong { color: var(--warning); font-weight: 600; }


/* ───────────────────────────────────────────────
   §1C TECHNICAL SPECS — inline horizontal rows (Apple-spec-sheet pattern)
   Each row: label (left, 200px) | values (right, flex 1, separated by ·)
   Compact, professional, proportional to content
   ─────────────────────────────────────────────── */
.tech-specs {
  display: flex;
  flex-direction: column;
  border-radius: 12px;
  background: rgba(255,255,255,0.02);
  border: 1px solid var(--glass-border);
  overflow: hidden;
}
.tech-row {
  display: grid;
  grid-template-columns: 200px 1fr;
  gap: 2rem;
  padding: 0.85rem 1.4rem;
  border-bottom: 1px solid rgba(255,255,255,0.04);
  align-items: baseline;
  transition: background 0.25s ease;
}
.tech-row:last-child { border-bottom: none; }
.tech-row:hover { background: rgba(117,194,73,0.025); }

.tech-row__label {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
  white-space: nowrap;
}
.tech-row__values {
  font-size: 0.7rem;
  font-weight: 300;
  line-height: 1.55;
  color: var(--text-muted);
}
.tech-row__sep {
  color: rgba(255,255,255,0.18);
  margin: 0 0.45rem;
}

@media (max-width: 900px) {
  .tech-row { grid-template-columns: 1fr; gap: 0.3rem; padding: 0.85rem 1.1rem; }
}


/* ───────────────────────────────────────────────
   LICENSE MODAL
   ─────────────────────────────────────────────── */
.modal {
  position: fixed;
  inset: 0;
  z-index: 1100;
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
  overscroll-behavior: contain;
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



/* ───────────────────────────────────────────────
   §2 COMPOSER CUES — framed box wrapping SoundCloud-style player
   Box: dark glass card with internal heading
   Player: vertical stack · 10+ demos · all visible · no scroll
   Each row: compressed (~35% smaller than v1) — round play btn · meta/title/wave on right
   ─────────────────────────────────────────────── */

/* ── Outer box (frames the whole demo reel) ── */
.player-box {
  position: relative;
  padding: 1.5rem 1.6rem;
  border-radius: 18px;
  background: linear-gradient(135deg, rgba(15,20,28,0.78), rgba(8,12,18,0.78));
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  box-shadow:
    0 22px 60px rgba(0,0,0,0.4),
    0 0 0 1px rgba(255,255,255,0.03),
    inset 0 1px 0 rgba(255,255,255,0.04);
  isolation: isolate;
}
.player-box::before {
  content: "";
  position: absolute;
  inset: -1px;
  border-radius: inherit;
  background: linear-gradient(160deg, rgba(90,160,70,0.06) 0%, transparent 35%, transparent 70%, rgba(75,145,65,0.04) 100%);
  z-index: -1;
  pointer-events: none;
}

/* Box header */
.player-box__head {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 1rem;
  padding-bottom: 1.2rem;
  margin-bottom: 1.2rem;
  border-bottom: 1px solid var(--glass-border);
}
.player-box__head-left {
  display: flex;
  flex-direction: column;
  gap: 0.35rem;
  min-width: 0;
}
.player-box__eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 0.45rem;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--green-light);
}
.player-box__eyebrow svg { width: 12px; height: 12px; }
.player-box__title {
  font-family: "Playfair Display", serif;
  font-size: 1.2rem;
  font-weight: 800;
  line-height: 1.2;
  color: var(--text-primary);
  margin: 0;
}
.player-box__sub {
  font-size: 0.68rem;
  color: var(--text-muted);
  font-weight: 300;
  line-height: 1.45;
  margin: 0;
}
.player-box__sub em {
  /* Auto-play hint — reads as a system label, not body copy */
  font-style: italic;
  color: var(--green-light);
  opacity: 0.85;
}
.player-box__count {
  font-size: 0.6rem;
  font-weight: 600;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: var(--text-quiet);
  font-variant-numeric: tabular-nums;
  white-space: nowrap;
  flex-shrink: 0;
}

/* ── Player-box right cluster · toggle + count ── */
.player-box__head-right {
  display: flex;
  align-items: center;
  gap: 1.2rem;
  flex-shrink: 0;
}


/* ── Loading + error states ── */
.player__row.is-loading .player__play {
  pointer-events: none;
}
.player__row.is-loading .player__play-icon,
.player__row.is-loading .player__pause-icon {
  opacity: 0 !important;
}
.player__row.is-loading .player__play::after {
  content: "";
  position: absolute;
  inset: 25%;
  border: 2px solid var(--green-light);
  border-top-color: transparent;
  border-radius: 50%;
  animation: playerSpin 0.8s linear infinite;
}
@keyframes playerSpin {
  to { transform: rotate(360deg); }
}
.player__row.is-error {
  opacity: 0.5;
}
.player__row.is-error .player__title::after {
  content: " · audio unavailable";
  font-size: 0.65rem;
  color: #d44;
  font-style: italic;
  font-weight: 400;
}

/* Autoplay-blocked state (mobile only typically) — user must tap to continue.
   Browser blocks audio.play() mid-chain when the page is backgrounded or
   the chain exceeds the original user-gesture credit. Visible hint replaces
   the standard play icon with a subtle pulse so the user sees the next row
   is ready, just waiting for a tap. */
.player__row.is-blocked .player__play {
  animation: playerBlockedPulse 1.6s ease-in-out infinite;
  background: linear-gradient(135deg, rgba(212, 169, 85, 0.28), rgba(180, 140, 50, 0.18));
  border-color: rgba(212, 169, 85, 0.55);
}
.player__row.is-blocked .player__title::after {
  content: " · tap to play";
  font-size: 0.65rem;
  color: #d4a955;
  font-style: italic;
  font-weight: 400;
  margin-left: 0.4rem;
}
@keyframes playerBlockedPulse {
  0%, 100% { box-shadow: 0 4px 12px rgba(0,0,0,0.3), 0 0 0 0 rgba(212, 169, 85, 0.32); }
  50%      { box-shadow: 0 4px 12px rgba(0,0,0,0.3), 0 0 0 8px rgba(212, 169, 85, 0);    }
}
@media (prefers-reduced-motion: reduce) {
  .player__row.is-blocked .player__play { animation: none; }
}

/* ── Waveform cursor states · scrub-ready ── */
.player__wave {
  cursor: pointer;
}

@media (max-width: 600px) {
  .player-box { padding: 1.2rem 1rem; border-radius: 14px; }
  .player-box__head { flex-direction: column; align-items: flex-start; gap: 0.6rem; padding-bottom: 0.9rem; margin-bottom: 0.9rem; }
  .player-box__title { font-size: 1.05rem; }
  .player-box__head-right { width: 100%; justify-content: space-between; gap: 0.5rem; }
}

/* ── Player list (inside box) ── */
.player {
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
}

.player__row {
  display: grid;
  /* Single-line layout: play btn · info (badge+title+meta) · waveform · duration */
  grid-template-columns: 40px minmax(0, 1fr) 180px 60px;
  gap: 1rem;
  padding: 0.55rem 0.85rem;
  border-radius: 8px;
  background: rgba(255,255,255,0.02);
  border: 1px solid rgba(255,255,255,0.04);
  transition: all 0.3s var(--ease);
  align-items: center;
  position: relative;
}
.player__row:hover {
  border-color: rgba(117,194,73,0.18);
  background: rgba(117,194,73,0.025);
}
.player__row.playing {
  border-color: rgba(117,194,73,0.22);
  background: rgba(117,194,73,0.05);
  box-shadow: 0 6px 18px rgba(0,0,0,0.25);
}

/* Tablet (600–1100px): compact waveform (don't hide it — that was a bug,
   killed scrub on tablets too). Reduced height + lower padding column. */
@media (max-width: 1100px) and (min-width: 601px) {
  .player__row { grid-template-columns: 44px minmax(0, 1fr) 80px 60px; gap: 0.8rem; }
  .player__wave { height: 22px; }
}
/* Mobile: drop dedicated duration col — duration moves inline with title.
   Waveform moves to its own row spanning full width below info. */
@media (max-width: 600px) {
  /* Premium card · generous breathing room · 2-row grid: [play|info] / [waveform spans both] */
  .player__row {
    grid-template-columns: 44px minmax(0, 1fr);  /* 44px col for 44px button */
    grid-template-rows: auto auto;
    gap: 0.6rem 0.85rem;
    padding: 1rem 1rem;
    border-radius: 12px;
    align-items: start;
  }
  /* Play button aligns with title row (not the type tag above) */
  .player__play {
    align-self: start;
    margin-top: 1.3rem;  /* tuned for 44px button (was 1.55 for 36px) */
    grid-row: 1;
    grid-column: 1;
  }
  .player__info {
    grid-row: 1;
    grid-column: 2;
    gap: 0.55rem;
  }
  /* Waveform shows on mobile · spans full card width · compact 18px */
  .player__wave {
    display: block;
    grid-row: 2;
    grid-column: 1 / -1;
    height: 22px;
    margin-top: 0.4rem;
    border-radius: 3px;
  }
}

/* ── Round play/pause button ── */
.player__play {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: linear-gradient(135deg, rgba(117,194,73,0.20), rgba(47,105,66,0.30));
  border: 1px solid rgba(117,194,73,0.32);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  cursor: pointer;
  transition: all 0.35s var(--ease);
  position: relative;
  box-shadow: 0 4px 12px rgba(0,0,0,0.3), inset 0 1px 0 rgba(255,255,255,0.05);
}
.player__play:hover {
  background: linear-gradient(135deg, rgba(117,194,73,0.36), rgba(117,194,73,0.18));
  border-color: rgba(117,194,73,0.5);
  transform: scale(1.06);
  box-shadow: 0 6px 18px rgba(0,0,0,0.4), 0 0 16px rgba(117,194,73,0.18);
}
.player__row.playing .player__play {
  background: linear-gradient(135deg, var(--green-primary), var(--green-light));
  border-color: rgba(187,214,122,0.6);
  box-shadow: 0 4px 18px rgba(117,194,73,0.32), 0 0 18px rgba(117,194,73,0.18);
}
.player__play svg {
  position: absolute;
  width: 12px;
  height: 12px;
  fill: #fff;
  transition: opacity 0.3s ease, transform 0.3s ease;
}
.player__play .player__play-icon { transform: translateX(1px); opacity: 1; }
.player__play .player__pause-icon { opacity: 0; }
.player__row.playing .player__play .player__play-icon { opacity: 0; }
.player__row.playing .player__play .player__pause-icon { opacity: 1; fill: var(--bg-deep); }

@media (max-width: 600px) {
  .player__play { width: 44px; height: 44px; }  /* Apple HIG min touch target */
  .player__play svg { width: 13px; height: 13px; }
}

/* ── Info column (2-line micro-stack: badge+title / composer+context) ── */
.player__info {
  display: flex;
  flex-direction: column;
  gap: 0.15rem;
  min-width: 0;
}

.player__head {
  display: flex;
  align-items: baseline;
  gap: 0.55rem;
  min-width: 0;
}
.player__type {
  font-size: 0.46rem;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--green-light);
  padding: 0.16rem 0.48rem;
  border-radius: 50px;
  background: rgba(117,194,73,0.06);
  border: 1px solid rgba(117,194,73,0.18);
  white-space: nowrap;
  flex-shrink: 0;
  line-height: 1;
  align-self: center;
}
/* Title sits in head row alongside badge — single line, ellipsis */
.player__head .player__title {
  flex: 1 1 auto;
  min-width: 0;
}
/* Time hidden on desktop (duration column shows it instead).
   On mobile the duration column is dropped, so time becomes the only indicator inline. */
.player__time { display: none; }
@media (max-width: 600px) {
  .player__time {
    display: inline;
    font-size: 0.55rem;
    color: var(--text-quiet);
    font-variant-numeric: tabular-nums;
    letter-spacing: 0.08em;
    white-space: nowrap;
    flex-shrink: 0;
    margin-left: auto;
    font-weight: 500;
  }
  /* Mobile player__head becomes a 2-row layout:
     ROW 1: [TYPE TAG] ──────── [TIME CODE]   (meta row · subtle)
     ROW 2: full-width title    (hero · gets visual weight)
  */
  .player__head {
    flex-wrap: wrap;
    row-gap: 0.55rem;
    align-items: center;
  }
  /* Type tag stays small, anchored top-left */
  .player__type {
    order: 1;
  }
  /* Time goes after type on same row, pushed to right by margin-left:auto */
  .player__time {
    order: 2;
  }
  /* Title takes full width on its own row · the hero element */
  .player__head .player__title {
    order: 3;
    flex-basis: 100%;
    white-space: normal;
    overflow: visible;
    text-overflow: clip;
    font-size: 0.95rem;       /* up from 0.78rem · hero size */
    line-height: 1.3;
    letter-spacing: -0.01em;  /* tightens for editorial feel */
    margin-top: 0.1rem;
  }
  /* Meta context wrap on mobile · refined spacing */
  .player__meta {
    flex-wrap: wrap;
    row-gap: 0.3rem;
    font-size: 0.72rem;
    color: var(--text-secondary);
    margin-top: 0.1rem;
  }
  .player__composer {
    color: var(--green-light);
    font-weight: 500;
    font-style: normal;
    letter-spacing: 0.01em;
  }
  .player__sep { display: none; }  /* hide separator since composer + context now stack */
  .player__context {
    flex-basis: 100%;
    white-space: normal;
    overflow: visible;
    text-overflow: clip;
    line-height: 1.5;
    color: var(--text-muted);
    font-weight: 300;
    font-size: 0.7rem;
  }
}
.player__elapsed { color: var(--text-muted); }
.player__row.playing .player__elapsed { color: var(--green-light); }

/* Title — single-line, ellipsis when too long. Tooltip via title attr (added in HTML) */
.player__title {
  font-family: "Playfair Display", serif;
  font-size: 0.84rem;
  font-weight: 700;
  line-height: 1.25;
  color: var(--text-primary);
  margin: 0;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  min-width: 0;
}
.player__row.playing .player__title { color: #fff; }

/* Meta line: composer + context, single line, ellipsis when too long */
.player__meta {
  display: flex;
  align-items: baseline;
  gap: 0.4rem;
  font-size: 0.6rem;
  color: var(--text-muted);
  line-height: 1.35;
  font-weight: 300;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  min-width: 0;
}
.player__composer {
  color: var(--text-secondary);
  font-style: italic;
  font-weight: 400;
  flex-shrink: 0;
}
.player__sep { color: var(--text-quiet); flex-shrink: 0; }
.player__context {
  color: var(--text-quiet);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  min-width: 0;
}

/* Mobile premium player layout override · runs AFTER desktop so wins cascade */
@media (max-width: 600px) {
  .player__time {
    display: inline;
    font-size: 0.6rem;
    color: var(--text-quiet);
    font-variant-numeric: tabular-nums;
    letter-spacing: 0.08em;
    white-space: nowrap;
    flex-shrink: 0;
    margin-left: auto;
    font-weight: 500;
  }
  .player__head {
    flex-wrap: wrap;
    row-gap: 0.55rem;
    align-items: center;
    white-space: normal;
    overflow: visible;
  }
  .player__type { order: 1; }
  .player__time { order: 2; }
  .player__head .player__title {
    order: 3;
    flex-basis: 100%;
    white-space: normal;
    overflow: visible;
    text-overflow: clip;
    font-size: 0.95rem;
    line-height: 1.3;
    letter-spacing: -0.01em;
    margin: 0.1rem 0 0 0;
  }
  .player__meta {
    flex-wrap: wrap;
    row-gap: 0.3rem;
    font-size: 0.72rem;
    color: var(--text-secondary);
    white-space: normal;
    overflow: visible;
    margin-top: 0.1rem;
  }
  .player__composer {
    color: var(--green-light);
    font-weight: 500;
    font-style: normal;
    letter-spacing: 0.01em;
  }
  .player__sep { display: none; }
  .player__context {
    flex-basis: 100%;
    white-space: normal;
    overflow: visible;
    text-overflow: clip;
    line-height: 1.5;
    color: var(--text-muted);
    font-weight: 300;
    font-size: 0.7rem;
  }
}

/* ── Compact waveform · sits in its own column · 16px hairline ── */
.player__wave {
  position: relative;
  height: 18px;
  margin-top: 0;
  border-radius: 2px;
  overflow: hidden;
  cursor: pointer;
  /* touch-action: pan-y lets a vertical scroll-swipe that starts on the
     waveform pass through to the page (was 'none', which captured ALL
     gestures and fired play/seek on an accidental scroll-touch). Horizontal
     drag is still ours for scrubbing; JS adds a movement threshold so a
     scroll-start never counts as a tap. */
  touch-action: pan-y;
  -webkit-user-select: none;
  user-select: none;
}

/* ── Duration column · right side · always visible on desktop ── */
.player__duration {
  font-size: 0.62rem;
  color: var(--text-muted);
  font-variant-numeric: tabular-nums;
  letter-spacing: 0.08em;
  text-align: right;
  white-space: nowrap;
}
.player__row.playing .player__duration { color: var(--green-light); }
@media (max-width: 600px) {
  .player__duration { display: none; }
}


/* ───────────────────────────────────────────────
   §4 VIDEOS — desktop tabs / mobile thumb strip
   ─────────────────────────────────────────────── */
.videos__tabs {
  display: flex;
  gap: 0.4rem;
  margin-bottom: 1.4rem;
  flex-wrap: wrap;
  border-bottom: 1px solid var(--glass-border);
  padding-bottom: 1rem;
}
@media (max-width: 768px) {
  .videos__tabs { display: none; }
}
.videos__tab {
  padding: 0.55rem 1rem;
  border-radius: 50px;
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  font-size: 0.66rem;
  font-weight: 500;
  letter-spacing: 0.04em;
  color: var(--text-secondary);
  white-space: nowrap;
  transition: all 0.3s var(--ease);
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
}
.videos__tab:hover {
  color: #fff;
  border-color: rgba(117,194,73,0.25);
  background: rgba(117,194,73,0.05);
}
.videos__tab.active {
  background: linear-gradient(135deg, var(--green-primary), var(--green-light));
  color: var(--bg-deep);
  border-color: rgba(117,194,73,0.5);
  box-shadow: 0 0 18px rgba(117,194,73,0.18);
  font-weight: 600;
}
.videos__tab-duration {
  font-size: 0.55rem;
  opacity: 0.6;
  font-variant-numeric: tabular-nums;
}
.videos__tab.active .videos__tab-duration { opacity: 0.85; }

/* §4 Videos panel — heritage aesthetic
   28px radius · deep cinematic shadow · golden edge gradient · 88px play button · mouse-follow highlight */
/* Crossfade stage: all panels stack in one cell and fade between each other
   (opacity), instead of a hard display:none->block swap which popped/jerked. */
/* ── CAROUSEL ──────────────────────────────────────────────
   .videos__panel-stage = viewport (clips to one panel). Inside it a flex track
   (.videos__panel-track) holds all panels side by side; switching slides the
   TRACK via translateX. One panel visible at a time, others genuinely off-screen
   (clipped) — so no stacking and no "glimpse" is structurally possible. */
.videos__panel-stage {
  position: relative;
  aspect-ratio: 16 / 9;
  overflow: hidden;
  border-radius: 28px;
  touch-action: pan-y;   /* allow vertical page scroll; horizontal = our drag */
  /* The 1px border was leaking as a white hairline over the square-cornered
     inner carousel panels at the rounded corners/bottom (overflow clips at the
     inner border-box, the border draws at the outer radius → sliver). Removed
     it; the box-shadow already defines the frame edge with no leak. */
  box-shadow:
    0 30px 80px rgba(0,0,0,0.6),
    0 8px 30px rgba(0,0,0,0.4);
}
.videos__panel-track {
  display: flex;
  height: 100%;
  will-change: transform;
  transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
}
.videos__panel-track.is-dragging {
  transition: none;   /* follow the finger 1:1 while dragging */
}
.videos__panel {
  position: relative;
  flex: 0 0 100%;
  width: 100%;
  height: 100%;
  aspect-ratio: 16 / 9;
  /* The stage already provides the rounded clip + frame. Panels inside the
     carousel must have NO radius and NO white border/shadow of their own —
     otherwise the panel's white edge peeks past the stage clip as a thin white
     line (visible where the thumbnail is light, e.g. tutorial-2). The stage owns
     the frame; panels are flush fills. */
  border-radius: 0;
  overflow: hidden;
  background: linear-gradient(135deg, #1a1f28, #0d1117);
  border: 0;
  box-shadow: none;
  cursor: pointer;
}
/* Carousel arrows — DARK scrim backing so they stay visible on ANY thumbnail,
   light or dark (white-glass arrows vanished on light video frames). White icon
   on a dark frosted disc — the premium-standard readable-anywhere pattern. */
.videos__arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 48px; height: 48px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  z-index: 6;
  cursor: pointer;
  background: rgba(10, 13, 18, 0.62);
  backdrop-filter: blur(10px) saturate(1.1);
  -webkit-backdrop-filter: blur(10px) saturate(1.1);
  border: 1px solid rgba(255,255,255,0.22);
  box-shadow:
    0 8px 24px rgba(0,0,0,0.55),
    0 0 0 1px rgba(0,0,0,0.25),          /* dark hairline ring = separation on light bg */
    inset 0 1px 0 rgba(255,255,255,0.22);
  transition: background 0.3s ease, transform 0.3s ease, opacity 0.3s ease, border-color 0.3s ease;
}
.videos__arrow:hover {
  background: rgba(10, 13, 18, 0.8);
  border-color: rgba(255,255,255,0.38);
  transform: translateY(-50%) scale(1.08);
}
.videos__arrow svg { width: 20px; height: 20px; }
.videos__arrow--prev { left: 18px; }
.videos__arrow--next { right: 18px; }
.videos__arrow[disabled] { opacity: 0; pointer-events: none; }
@media (max-width: 768px) {
  .videos__arrow { display: none; }   /* mobile uses the thumb strip + swipe */
}
.videos__panel:hover {
  box-shadow:
    0 40px 100px rgba(0,0,0,0.7),
    0 12px 40px rgba(0,0,0,0.5),
    0 0 0 1px rgba(255,255,255,0.06),
    0 0 80px rgba(75,145,65,0.06);
}
/* Golden edge gradient (heritage signature) */
.videos__panel::before {
  content: "";
  position: absolute;
  inset: -1px;
  border-radius: 29px;
  background: linear-gradient(160deg, rgba(255,255,255,0.10) 0%, transparent 30%, transparent 70%, rgba(255,255,255,0.04) 100%);
  z-index: 10;
  pointer-events: none;
}
/* Inner ambient gradient */
.videos__panel::after {
  content: "";
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 30% 30%, rgba(255,255,255,0.05) 0%, transparent 55%),
    radial-gradient(ellipse at 70% 70%, rgba(255,255,255,0.03) 0%, transparent 55%);
  z-index: 0;
  pointer-events: none;
}
/* ── Premium glass treatment when a real thumbnail is loaded ──
   Strip the green/gold tints so the photographic thumbnail reads clean (matches
   the hero). ::before becomes a neutral edge sheen; ::after becomes a shallow
   bottom scrim for caption legibility; the play-button pulse ring goes neutral. */
.videos__panel.has-thumb::before {
  background: none;   /* white edge sheen removed — it leaked past the stage clip */
}
.videos__panel.has-thumb::after {
  background: linear-gradient(to top, rgba(6,9,14,0.70) 0%, rgba(6,9,14,0.16) 20%, transparent 42%);
  z-index: 2;   /* scrim above the thumbnail's bottom edge for text legibility */
}
.videos__panel.has-thumb .videos__panel-btn::before {
  border-color: rgba(255,255,255,0.26);   /* neutral pulse ring */
}
.videos__panel.has-thumb {
  border: 0;
  box-shadow: none;   /* stage owns the frame; no panel-level edges to leak */
}
/* Mouse-follow highlight for active panel */
.videos__panel-highlight {
  position: absolute;
  width: 300px;
  height: 300px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
  z-index: 5;
  pointer-events: none;
  opacity: 0;
  transform: translate(-50%, -50%);
  transition: opacity 0.4s ease;
}
.videos__panel:hover .videos__panel-highlight { opacity: 1; }
/* Inner vignette */
.videos__panel-vignette {
  position: absolute;
  inset: 0;
  z-index: 4;
  pointer-events: none;
  background: radial-gradient(ellipse at center, transparent 50%, rgba(0,0,0,0.35) 100%);
}
.videos__panel-play {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  z-index: 8;
}
.videos__panel-btn {
  width: 88px;
  height: 88px;
  border-radius: 50%;
  background:
    linear-gradient(160deg, rgba(255,255,255,0.18) 0%, rgba(255,255,255,0.06) 100%);
  backdrop-filter: blur(14px) saturate(1.2);
  -webkit-backdrop-filter: blur(14px) saturate(1.2);
  border: 1px solid rgba(255,255,255,0.32);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.4s var(--ease);
  box-shadow:
    0 14px 44px rgba(0,0,0,0.42),
    inset 0 1px 0 rgba(255,255,255,0.5),
    inset 0 -1px 3px rgba(0,0,0,0.2);
  position: relative;
}
.videos__panel-btn::before {
  content: "";
  position: absolute;
  inset: -6px;
  border-radius: 50%;
  border: 1px solid rgba(187,214,122,0.22);
  animation: playPulse 2.4s ease-in-out infinite;
}
.videos__panel-btn:hover {
  background: rgba(255,255,255,0.1);
  border-color: rgba(212,166,86,0.45);
  transform: scale(1.04);
  box-shadow: 0 16px 50px rgba(0,0,0,0.6), 0 0 32px rgba(212,166,86,0.18);
}
.videos__panel-btn svg { width: 30px; height: 30px; fill: #fff; transform: translateX(2px); }
.videos__panel-overlay {
  position: absolute;
  bottom: 0; left: 0; right: 0;
  padding: 1.4rem 1.8rem;
  background: linear-gradient(to top, rgba(5,8,16,0.9), transparent);
  z-index: 7;
  pointer-events: none;
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
}
.videos__panel-name {
  font-family: "Playfair Display", serif;
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--text-primary);
}

/* Mobile thumbnail strip */
.videos__strip {
  display: none;
  flex-direction: column;
  gap: 0.6rem;
}
@media (max-width: 768px) {
  .videos__strip { display: flex; }
  .videos__panel { display: none !important; }
  .videos__panel-stage { display: none !important; }
}
.videos__thumb {
  position: relative;
  aspect-ratio: 16 / 9;
  border-radius: 12px;
  overflow: hidden;
  /* Border removed: it leaked as a white hairline at the rounded corners over
     the playing YouTube iframe (overflow clips at the inner border-box, the
     border draws at the outer radius → corner sliver). The gradient bg + the
     overlay already define the tile; no border needed. */
  background: linear-gradient(135deg, #1a1f28, #0d1117);
  cursor: pointer;
}
.videos__thumb::before {
  content: "";
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 30% 30%, rgba(255,255,255,0.05) 0%, transparent 55%),
    radial-gradient(ellipse at 70% 70%, rgba(255,255,255,0.03) 0%, transparent 55%);
}
.videos__thumb-overlay {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: flex-end;
  padding: 0.8rem 1rem;
  background: linear-gradient(to top, rgba(5,8,16,0.85), transparent 50%);
}
.videos__thumb-meta { display: flex; flex-direction: column; gap: 0.15rem; flex: 1; }
.videos__thumb-label {
  font-size: 0.5rem;
  font-weight: 600;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--green-light);
}
.videos__thumb-name {
  font-family: "Playfair Display", serif;
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--text-primary);
}
.videos__thumb-play {
  width: 38px; height: 38px;
  border-radius: 50%;
  background:
    linear-gradient(160deg, rgba(255,255,255,0.20) 0%, rgba(255,255,255,0.07) 100%);
  backdrop-filter: blur(12px) saturate(1.2);
  -webkit-backdrop-filter: blur(12px) saturate(1.2);
  border: 1px solid rgba(255,255,255,0.30);
  box-shadow:
    0 6px 18px rgba(0,0,0,0.4),
    inset 0 1px 0 rgba(255,255,255,0.45);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.videos__thumb-play svg { width: 12px; height: 12px; fill: #fff; transform: translateX(1px); }
.videos__thumb-duration {
  position: absolute;
  top: 0.7rem;
  right: 0.85rem;
  font-size: 0.55rem;
  letter-spacing: 0.1em;
  color: rgba(255,255,255,0.7);
  background: rgba(0,0,0,0.5);
  padding: 0.15rem 0.45rem;
  border-radius: 4px;
  font-variant-numeric: tabular-nums;
}

/* ───────────────────────────────────────────────
   §5 PATCHES — 3-column grid
   ─────────────────────────────────────────────── */
.patches {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 0.85rem;
}
@media (max-width: 1024px) { .patches { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px) { .patches { grid-template-columns: 1fr; } }

.patch {
  padding: 1.1rem 1.2rem;
  border-radius: 12px;
  background: rgba(15, 22, 18, 0.55);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  display: flex;
  flex-direction: column;
  gap: 0.45rem;
  transition: all 0.3s var(--ease);
  position: relative;
}
.patch:hover {
  border-color: rgba(117,194,73,0.25);
  background: rgba(20, 32, 24, 0.65);
  transform: translateY(-2px);
}

.patch__head {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 0.6rem;
}
.patch__name {
  font-family: "Playfair Display", serif;
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--text-primary);
  line-height: 1.25;
}
.patch__play {
  flex-shrink: 0;
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background: rgba(117,194,73,0.10);
  border: 1px solid rgba(117,194,73,0.22);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s var(--ease);
}
.patch__play:hover { background: rgba(117,194,73,0.22); border-color: rgba(117,194,73,0.4); }
.patch__play svg { width: 9px; height: 9px; fill: var(--green-light); transform: translateX(1px); }
.patch__play.playing svg { fill: var(--green-light); transform: none; }

.patch__desc {
  font-size: 0.66rem;
  color: var(--text-muted);
  line-height: 1.5;
  font-weight: 300;
}

/* ───────────────────────────────────────────────
   §6 DESCRIPTION — 2-column: prose 60% / accent rail 40%
   ─────────────────────────────────────────────── */
.description {
  display: grid;
  grid-template-columns: 1.5fr 1fr;
  gap: 3rem;
  align-items: start;
}
@media (max-width: 1024px) {
  .description { grid-template-columns: 1fr; gap: 2rem; }
}

.description__prose {
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  line-height: 1.75;
  color: var(--text-secondary);
  font-weight: 300;
}
.description__prose p { margin-bottom: 1.2rem; }
.description__prose p:last-child { margin-bottom: 0; }
.description__prose strong { color: var(--text-primary); font-weight: 500; }

/* ── Accent rail — pull quote + stats ── */
.description__rail {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  position: sticky;
  top: 7rem;
}
@media (max-width: 1024px) {
  .description__rail { position: static; gap: 1.2rem; }
}

.description__quote {
  position: relative;
  padding: 1.6rem 1.8rem 1.4rem;
  border-radius: 14px;
  background: rgba(15, 22, 18, 0.55);
  border: 1px solid rgba(117,194,73, 0.20);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  overflow: hidden;
}
.description__quote::before {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 80% 30%, rgba(117,194,73, 0.08) 0%, transparent 55%);
  pointer-events: none;
}
.description__quote-mark {
  width: 24px;
  height: 24px;
  color: var(--green-light);
  opacity: 0.7;
  margin-bottom: 0.6rem;
  position: relative;
}
.description__quote-body {
  font-family: "Playfair Display", serif;
  font-size: 1rem;
  font-weight: 700;
  font-style: italic;
  line-height: 1.45;
  color: var(--text-primary);
  margin-bottom: 0.85rem;
  position: relative;
}
.description__quote-attr {
  font-size: 0.6rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--text-muted);
  position: relative;
}

.description__stats {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0.8rem;
}
.description__stat {
  padding: 1rem 1.1rem;
  border-radius: 12px;
  background: rgba(15, 22, 18, 0.55);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  display: flex;
  flex-direction: column;
  gap: 0.3rem;
  transition: all 0.3s var(--ease);
}
.description__stat:hover {
  border-color: rgba(117,194,73,0.25);
  background: rgba(20, 32, 24, 0.65);
}
.description__stat-num {
  font-family: "Playfair Display", serif;
  font-size: 1.5rem;
  font-weight: 900;
  line-height: 1;
  color: var(--green-light);
  font-variant-numeric: tabular-nums;
}
.description__stat-label {
  font-size: 0.6rem;
  color: var(--text-muted);
  line-height: 1.4;
  font-weight: 300;
}

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
.credits-list {
  display: flex;
  flex-direction: column;
  border-radius: 12px;
  background: rgba(255,255,255,0.02);
  border: 1px solid var(--glass-border);
  overflow: hidden;
}
.credit-row {
  display: grid;
  grid-template-columns: 140px 1fr;
  gap: 1.5rem;
  padding: 0.7rem 1.1rem;
  border-bottom: 1px solid rgba(255,255,255,0.04);
  align-items: baseline;
  transition: background 0.25s ease;
}
.credit-row:last-child { border-bottom: none; }
.credit-row:hover { background: rgba(117,194,73,0.025); }

.credit-row__role {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--green-light);
  white-space: nowrap;
}
.credit-row__body {
  font-size: 0.7rem;
  color: var(--text-secondary);
  line-height: 1.55;
  font-weight: 300;
}
.credit-row__body strong {
  color: var(--text-primary);
  font-weight: 500;
}
.credit-row__body em {
  font-style: italic;
  color: var(--text-quiet);
  font-size: 0.65rem;
  font-weight: 300;
  margin-left: 0.25rem;
}
.credit-row__sep {
  color: rgba(255,255,255,0.12);
  margin: 0 0.45rem;
}

@media (max-width: 768px) {
  .credit-row { grid-template-columns: 1fr; gap: 0.25rem; padding: 0.7rem 0.9rem; }
  .credit-row__role { font-size: 0.45rem; }
  .credit-row__body { font-size: 0.66rem; }
}

/* ───────────────────────────────────────────────
   §8 RECOMMENDED — small card grid
   ─────────────────────────────────────────────── */
.recommended {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
}
@media (max-width: 1024px) { .recommended { grid-template-columns: repeat(2, 1fr); gap: 0.85rem; } }
@media (max-width: 600px)  { .recommended { grid-template-columns: repeat(2, 1fr); gap: 0.75rem; } }

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
.rec-card:hover .cc-format-chip {
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
.bundle-cta {
  position: relative;
  padding: 2rem 2.2rem;
  border-radius: 16px;
  background: rgba(15, 22, 18, 0.55);
  border: 1px solid rgba(117,194,73, 0.20);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 1.5rem;
  align-items: center;
  overflow: hidden;
}
.bundle-cta::before {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 80% 50%, rgba(117,194,73, 0.08) 0%, transparent 55%);
  pointer-events: none;
}
@media (max-width: 768px) {
  .bundle-cta { grid-template-columns: 1fr; padding: 1.5rem 1.4rem; }
}

.bundle-cta__copy { display: flex; flex-direction: column; gap: 0.5rem; position: relative; }
.bundle-cta__eyebrow {
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
}
.bundle-cta__title {
  font-family: "Playfair Display", serif;
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--text-primary);
  line-height: 1.2;
}
.bundle-cta__price-row {
  display: flex;
  align-items: baseline;
  gap: 0.85rem;
  margin-top: 0.2rem;
}
.bundle-cta__price-now {
  font-family: "Playfair Display", serif;
  font-size: 1.6rem;
  font-weight: 900;
  color: var(--text-primary);
}
.bundle-cta__price-was {
  font-size: 0.72rem;
  color: var(--text-quiet);
  text-decoration: line-through;
}
.bundle-cta__save {
  font-size: 0.6rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--green-light);
}
.bundle-cta__note {
  font-size: 0.65rem;
  color: var(--text-quiet);
  font-style: italic;
  margin-top: 0.3rem;
  line-height: 1.5;
}
.bundle-cta__action { position: relative; }

/* ───────────────────────────────────────────────
   §10 RECORDING CTA + §11 HERITAGE — soft blocks
   ─────────────────────────────────────────────── */
.soft-cta {
  position: relative;
  padding: 1.8rem 2rem;
  border-radius: 16px;
  background: rgba(255,255,255,0.025);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(12px);
  display: grid;
  grid-template-columns: 56px 1fr auto;
  gap: 1.2rem;
  align-items: center;
}
@media (max-width: 768px) {
  .soft-cta { grid-template-columns: 1fr; padding: 1.4rem 1.4rem; }
  .soft-cta__icon { display: none; }
}

.soft-cta__icon {
  width: 56px;
  height: 56px;
  border-radius: 14px;
  background: linear-gradient(135deg, rgba(117,194,73,0.12), rgba(47,105,66,0.20));
  border: 1px solid rgba(117,194,73,0.22);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.soft-cta__icon svg { width: 22px; height: 22px; color: var(--green-light); }

.soft-cta__copy { display: flex; flex-direction: column; gap: 0.3rem; min-width: 0; }
.soft-cta__title {
  font-family: "Playfair Display", serif;
  font-size: 1rem;
  font-weight: 700;
  color: var(--text-primary);
  line-height: 1.25;
}
.soft-cta__sub {
  font-size: 0.7rem;
  color: var(--text-muted);
  font-weight: 300;
  line-height: 1.5;
}

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
  font-family: "Playfair Display", serif;
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
  content: "";
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
  /* grid-template-rows transition removed — Safari stutters animating it.
     The smooth open/close is carried by .faq__a (max-height/opacity/padding). */
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
  overflow: hidden;   /* clip the YouTube iframe's square white corners to the
                         rounded radius — without this the iframe corners leak
                         as white slivers on mobile (the reported bug). */
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
/* When video active · hide the original poster overlay elements */
.lib-hero__video.is-playing .lib-hero__play,
.lib-hero__video.is-playing .lib-hero__video-overlay,
.lib-hero__video.is-playing .lib-hero__video-badges,
.lib-hero__video.is-playing .lib-hero__video-highlight,
.lib-hero__video.is-playing .lib-hero__video-vignette {
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s ease;
}
/* Fix C — hide the decorative green edge (::before) while the video plays.
   It sits at z-10 with a 29px radius; the black video-embed (z-20, 28px
   radius) nests inside it, so the 1px radius/z mismatch left a thin green
   corner seam during playback. The edge is a poster-state flourish only —
   drop it while playing, no seam. */
.lib-hero__video.is-playing::before {
  opacity: 0;
  transition: opacity 0.3s ease;
}
.videos__panel.is-playing .videos__panel-play,
.videos__panel.is-playing .videos__panel-overlay,
.videos__panel.is-playing .videos__panel-highlight,
.videos__panel.is-playing .videos__panel-vignette {
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s ease;
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
.patch:hover, .description__stat:hover, .credit-card:hover, .recommended__card:hover {
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35), 0 0 24px rgba(117,194,73, 0.06);
}

/* 10. Composer + meta italics · refined to brand · for premium feel */
.composer-tag, .player__composer, .credit-card__role { font-feature-settings: "liga", "kern"; }

</style>

@endverbatim
