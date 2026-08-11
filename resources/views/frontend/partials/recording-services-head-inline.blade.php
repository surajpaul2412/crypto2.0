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
   RECSVC-001 v5 LOCKED · Full page build
   Crypto Cipher® · Recording Services
   DNA continuity with LIBINNER-001 v4.12
   ═══════════════════════════════════════════════════════════════ */
* { box-sizing: border-box; margin: 0; padding: 0; }

html { /* scroll-behavior:smooth removed — Safari scroll-back jank; Lenis handles Chrome */ -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

body {
  font-family: "Outfit", sans-serif;
  color: var(--text-primary);
  line-height: 1.5;
  overflow-x: hidden;
  min-height: 100vh;
  background-color: #050810;
  background-image:
    radial-gradient(ellipse 80% 50% at 50% 0%, rgba(117,194,73,0.04), transparent 60%),
    linear-gradient(180deg, #0d1117 0%, #0a0e14 35%, #080c12 70%, #050810 100%);
  background-attachment: fixed, fixed;
  background-repeat: no-repeat, no-repeat;
  background-size: 100% 100%, 100% 100%;
}

img { max-width: 100%; display: block; }
button { font-family: inherit; cursor: pointer; border: none; background: none; color: inherit; }
a { color: inherit; text-decoration: none; }

/* Global noise texture · scroll-stable, no blend mode (avoids Chrome/Safari fixed-layer repaint glitches) */
body::before {
  content: "";
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 0;
  opacity: 0.025;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.7' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  background-size: 200px;
  transform: translateZ(0);
  -webkit-transform: translateZ(0);
  will-change: transform;
  backface-visibility: hidden;
}

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

@keyframes logoShimmer {
  0%, 100% { left: -100%; }
  50% { left: 150%; }
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

/* ───────────────────────────────────────────────
   §1 HERO
   ─────────────────────────────────────────────── */

/* ═══════════════════════════════════════════════════════════════
   HERO CHOREOGRAPHY · Stroke 1 (mirrored from LIBINNER v4.12)
   PATTERN: visible by default. Animations only when .choreographed
   class is added by JS (desktop, no reduced-motion).
   ═══════════════════════════════════════════════════════════════ */
@media (min-width: 1025px) and (prefers-reduced-motion: no-preference) {
  /* Only when .choreographed fires do we let elements start hidden */
  .rec-hero.choreographed [data-reveal] {
    transform: none;
    transition: none;
  }
  .rec-hero.choreographed .rec-hero__title { opacity: 1; }

  .rec-hero.choreographed .rec-hero__ambient {
    opacity: 0;
    animation: heroAmbientBloom 2.4s cubic-bezier(0.22, 1, 0.36, 1) 0s forwards;
    transform-origin: 35% 30%;
  }
  @keyframes heroAmbientBloom {
    0%   { opacity: 0; transform: scale(0.82); filter: blur(18px); }
    60%  { opacity: 0.7; }
    100% { opacity: 1; transform: scale(1); filter: blur(18px); }
  }

  .rec-hero.choreographed .rec-hero__top {
    animation: heroFadeUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) 0.15s forwards;
    opacity: 0;
  }

  .rec-hero__title-word {
    display: inline-block;
  }
  .rec-hero.choreographed .rec-hero__title-word {
    opacity: 0;
    filter: blur(12px);
    transform: translateY(8px);
    animation: heroTitleWord 1.05s cubic-bezier(0.16, 1, 0.3, 1) calc(0.30s + var(--w) * 0.14s) forwards;
  }
  @keyframes heroTitleWord {
    to { opacity: 1; filter: blur(0); transform: translateY(0); }
  }

  .rec-hero.choreographed .rec-hero__tagline {
    animation: heroFadeUp 0.95s cubic-bezier(0.22, 1, 0.36, 1) 0.95s forwards;
    opacity: 0;
  }

  .rec-hero.choreographed .rec-hero__ctas {
    animation: heroFadeUp 0.85s cubic-bezier(0.22, 1, 0.36, 1) 1.20s forwards;
    opacity: 0;
  }

  .rec-hero.choreographed .rec-hero__marquee {
    animation: heroFadeUp 0.85s cubic-bezier(0.22, 1, 0.36, 1) 1.45s forwards;
    opacity: 0;
  }

  @keyframes heroFadeUp {
    from { opacity: 0; transform: translateY(18px); }
    to { opacity: 1; transform: translateY(0); }
  }
}

@media (prefers-reduced-motion: reduce) {
  .rec-hero__title-word,
  .rec-hero [data-reveal] {
    opacity: 1 !important;
    transform: none !important;
    filter: none !important;
    animation: none !important;
  }
}

/* ═══════════════════════════════════════════════════════════════
   PAGE LAYOUT · LIBINNER pattern
   ═══════════════════════════════════════════════════════════════ */
.recsvc {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: var(--side-index-w) 1fr;
  gap: 5rem;
  max-width: 1440px;
  margin: 0 auto;
  padding: 10rem 3rem 4rem;
  align-items: start;
}
@media (max-width: 1024px) {
  .recsvc {
    grid-template-columns: 1fr;
    gap: 0;
    padding: 6.5rem 1.5rem 3rem;
    z-index: auto;
  }
}
@media (max-width: 560px) {
  .recsvc {
    padding: 6.5rem 1.1rem 2.5rem;
  }
}

.recsvc__main {
  min-width: 0;
  display: flex;
  flex-direction: column;
  gap: 6rem;
}
@media (max-width: 1024px) {
  .recsvc__main { gap: 4rem; }
}
@media (max-width: 560px) {
  .recsvc__main { gap: 2.5rem; }  /* 40px — matches 03 locked inter-section rhythm */
}

/* ═══════════════════════════════════════════════════════════════
   § 1 · HERO
   ═══════════════════════════════════════════════════════════════ */
.rec-hero {
  position: relative;
  padding: 0;
}

.rec-hero__ambient {
  position: absolute;
  inset: -7rem -3rem auto -3rem;
  height: 720px;
  pointer-events: none;
  z-index: 0;
  background:
    
    radial-gradient(ellipse 70% 55% at 50% 30%, rgba(40,65,90,0.16) 0%, transparent 60%),
    radial-gradient(ellipse 40% 30% at 22% 40%, rgba(35,55,80,0.10) 0%, transparent 55%),
    radial-gradient(ellipse 30% 25% at 78% 45%, rgba(48,75,105,0.07) 0%, transparent 55%);
  filter: blur(18px);
  opacity: 0.85;
}
@media (max-width: 1024px) {
  .rec-hero__ambient { inset: -5rem 0 auto 0; height: 560px; }
}
@media (max-width: 560px) {
  .rec-hero__ambient { inset: -4rem 0 auto 0; height: 460px; }
}

.rec-hero > *:not(.rec-hero__ambient) { position: relative; z-index: 2; }

.rec-hero__top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 2rem;
  margin-bottom: 0;
  flex-wrap: wrap;
}

.rec-hero__breadcrumb {
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
.rec-hero__breadcrumb::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.rec-hero__breadcrumb a {
  color: var(--text-quiet);
  transition: color 0.25s ease;
  text-decoration: none;
}
.rec-hero__breadcrumb a:hover { color: var(--green-light); }
.rec-hero__breadcrumb .sep { opacity: 0.4; margin: 0 0.1rem; color: var(--text-whisper); }
.rec-hero__breadcrumb .current { color: var(--green-light); }

.rec-hero__booking {
  display: inline-flex;
  align-items: center;
  gap: 0.65rem;
  padding: 0.5rem 1rem;
  background: rgba(255,255,255, 0.04);
  border: 1px solid rgba(255,255,255, 0.08);
  border-radius: 100px;
  font-size: 0.78rem;
  color: var(--text-secondary);
  letter-spacing: 0.04em;
}
.rec-hero__booking-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: var(--green-primary);
  animation: signalPulse 2.4s ease-in-out infinite;
}
@keyframes signalPulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.5; transform: scale(0.85); }
}
.rec-hero__booking-strong { color: var(--text-primary); font-weight: 500; }

@media (max-width: 640px) {
  .rec-hero__booking { display: none; }
}

.rec-hero__title {
  font-family: "Playfair Display", serif;
  font-weight: 700;
  font-size: clamp(1.85rem, 5.6vw, 4.8rem);
  line-height: 1.06;
  letter-spacing: -0.02em;
  margin-bottom: 1.5rem;
  max-width: 18ch;
}
.rec-hero__title-word { display: inline-block; }
.rec-hero__title-word--accent {
  background: linear-gradient(135deg, var(--green-primary) 0%, var(--green-light) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  font-style: italic;
  font-weight: 400;
}
.rec-hero__title-divider {
  display: inline-block;
  color: var(--text-whisper);
  margin: 0 0.4rem;
  font-weight: 300;
  font-style: normal;
}

.rec-hero__tagline {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-weight: 400;
  font-size: clamp(1.05rem, 1.7vw, 1.4rem);
  color: var(--text-secondary);
  max-width: 56ch;
  line-height: 1.5;
  margin-bottom: 2.5rem;
}

.rec-hero__ctas {
  display: flex;
  gap: 0.85rem;
  margin-bottom: 3rem;
  flex-wrap: wrap;
}
@media (max-width: 560px) {
  .rec-hero__ctas {
    flex-wrap: nowrap;
    gap: 0.55rem;
    margin-bottom: 2rem;
  }
  .rec-hero__cta {
    padding: 0.78rem 1rem;
    font-size: 0.66rem;
    letter-spacing: 0.06em;
    gap: 0.4rem;
    flex: 1 1 auto;
    justify-content: center;
    min-width: 0;
    white-space: nowrap;
  }
}
@media (max-width: 360px) {
  .rec-hero__cta {
    padding: 0.65rem 0.7rem;
    font-size: 0.6rem;
    letter-spacing: 0.04em;
  }
}
.rec-hero__cta {
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  padding: 0.85rem 1.6rem;
  border-radius: 100px;
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  transition: background 0.4s var(--ease), border-color 0.4s var(--ease), color 0.4s var(--ease), box-shadow 0.4s var(--ease);
  position: relative;
  overflow: hidden;
  cursor: pointer;
}
@media (prefers-reduced-motion: reduce) {
  .rec-hero__cta { transform: none !important; }
}
.rec-hero__cta--primary {
  background: linear-gradient(135deg, var(--green-light), var(--green-primary));
  border: none;
  color: #0a0d12;
  box-shadow: 0 8px 24px rgba(0,0,0, 0.35), inset 0 1px 0 rgba(255,255,255, 0.22);
}
.rec-hero__cta--primary:hover {
  color: #0a0d12;
  box-shadow: 0 14px 36px rgba(0,0,0, 0.4), 0 0 24px rgba(117,194,73, 0.22), inset 0 1px 0 rgba(255,255,255, 0.25);
}
.rec-hero__cta--ghost {
  background: rgba(255,255,255,0.025);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border: 1px solid rgba(255,255,255,0.08);
  color: rgba(255,255,255,0.55);
}
.rec-hero__cta--ghost:hover {
  background: rgba(255,255,255,0.05);
  border-color: rgba(255,255,255,0.15);
  color: #fff;
}
.rec-hero__cta-arrow {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  width: 1em;
  height: 1em;
  transition: transform 0.3s ease;
}
.rec-hero__cta-arrow svg {
  width: 100%;
  height: 100%;
  display: block;
  transform: translateY(-0.04em);
}
.rec-hero__cta:hover .rec-hero__cta-arrow { transform: translateX(4px); }
/* down-arrow variant nudges on Y, not X */
.rec-hero__cta:hover .rec-hero__cta-arrow--down { transform: translateY(3px); }

/* Marquee proof line */
.rec-hero__marquee {
  position: relative;
  padding: 1.1rem 0;
  border-top: 1px solid var(--glass-border);
  border-bottom: 1px solid var(--glass-border);
  overflow: hidden;
  background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.01) 50%, transparent 100%);
}
@media (prefers-reduced-motion: reduce) {
  .rec-hero__marquee { overflow: visible; }
}
.rec-hero__marquee::before,
.rec-hero__marquee::after {
  content: "";
  position: absolute;
  top: 0; bottom: 0;
  width: 100px;
  pointer-events: none;
  z-index: 2;
}
.rec-hero__marquee::before {
  left: 0;
  background: linear-gradient(90deg, var(--bg-deep) 0%, transparent 100%);
}
.rec-hero__marquee::after {
  right: 0;
  background: linear-gradient(270deg, var(--bg-deep) 0%, transparent 100%);
}
@media (prefers-reduced-motion: reduce) {
  .rec-hero__marquee::before,
  .rec-hero__marquee::after { display: none; }
}

.rec-hero__marquee-track {
  display: flex;
  flex-wrap: nowrap;
  align-items: center;
  gap: 4rem;
  width: max-content;
  animation: marqueeDrift 90s linear infinite;
}
.rec-hero__marquee:hover .rec-hero__marquee-track {
  animation-play-state: paused;
}
@keyframes marqueeDrift {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}
@media (prefers-reduced-motion: reduce) {
  .rec-hero__marquee-track {
    animation: none;
    flex-wrap: wrap;
    width: 100%;
    gap: 0.9rem 2.4rem;
  }
}

.rec-hero__marquee-item {
  display: inline-flex;
  align-items: center;
  gap: 1rem;
  font-size: 0.88rem;
  white-space: nowrap;
  flex-shrink: 0;
}
.rec-hero__marquee-label {
  font-size: 0.62rem;
  letter-spacing: 0.24em;
  text-transform: uppercase;
  color: var(--green-light);
  font-weight: 600;
}
.rec-hero__marquee-text {
  font-family: "Playfair Display", serif;
  font-style: italic;
  color: var(--text-primary);
}
.rec-hero__marquee-meta {
  font-size: 0.78rem;
  color: var(--text-muted);
  letter-spacing: 0.04em;
}
.rec-hero__marquee-sep {
  color: var(--text-whisper);
}

/* ═══════════════════════════════════════════════════════════════
   § 1B · CONDITIONAL DISCOUNT BAND
   ═══════════════════════════════════════════════════════════════ */
.rec-discount {
  display: none;
  padding: 1.4rem 2rem;
  background: linear-gradient(135deg, rgba(255,255,255,0.04) 0%, rgba(255,255,255,0.015) 100%);
  border: 1px solid rgba(255,255,255, 0.06);
  border-radius: 14px;
  position: relative;
  overflow: hidden;
}
.rec-discount[data-discount-active="true"] { display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap; }
.rec-discount::before {
  content: "";
  position: absolute;
  top: 0; left: 0;
  width: 3px;
  height: 100%;
  background: linear-gradient(180deg, var(--green-primary), transparent);
}
.rec-discount__label {
  font-size: 0.62rem;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--green-light);
  font-weight: 600;
  white-space: nowrap;
}
.rec-discount__pipe {
  color: var(--text-whisper);
  font-weight: 300;
}
.rec-discount__years {
  font-family: "Playfair Display", serif;
  font-size: 0.85rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--text-secondary);
  font-weight: 600;
}
.rec-discount__text {
  flex: 1;
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-size: 1.05rem;
  color: var(--text-primary);
  line-height: 1.4;
  min-width: 280px;
}
.rec-discount__text-quiet {
  display: block;
  font-family: "Outfit", sans-serif;
  font-style: normal;
  font-size: 0.82rem;
  color: var(--text-muted);
  letter-spacing: 0.04em;
  margin-top: 0.25rem;
}


/* ═══════════════════════════════════════════════════════════════
   § 3 · INSTRUMENTS & PRICING · Two-Tier Grid
   15 instruments · 3-level discount system · single-tier fallback
   ═══════════════════════════════════════════════════════════════ */
.rec-instr {
  display: flex;
  flex-direction: column;
  gap: 2.5rem;
}
.rec-instr__head {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  margin-bottom: 1.5rem;
  max-width: 760px;
}
.rec-instr__eyebrow {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  font-weight: 700;
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.rec-instr__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}

.rec-instr__title {
  font-family: "Playfair Display", serif;
  font-weight: 900;
  font-size: clamp(1.5rem, 2.6vw, 2.1rem);
  line-height: 1.15;
  letter-spacing: -0.01em;
}
.rec-instr__lede {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-size: 1rem;
  color: var(--text-secondary);
  max-width: 56ch;
  line-height: 1.5;
}

/* Tier legend */
.rec-instr__legend {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
  padding: 1.25rem 1.5rem;
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  border-radius: 14px;
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
}
@media (max-width: 720px) {
  .rec-instr__legend { grid-template-columns: 1fr; gap: 0.75rem; }
}
.rec-instr__legend-item {
  display: flex;
  align-items: flex-start;
  gap: 0.85rem;
}
.rec-instr__legend-dot {
  width: 9px;
  height: 9px;
  border-radius: 50%;
  margin-top: 7px;
  flex-shrink: 0;
}
.rec-instr__legend-dot--pro { background: var(--green-primary); box-shadow: 0 0 8px rgba(117,194,73,0.5); }
.rec-instr__legend-dot--rare { background: var(--green-light); box-shadow: 0 0 8px rgba(187,214,122,0.5); }
.rec-instr__legend-name {
  font-family: "Playfair Display", serif;
  font-weight: 700;
  font-size: 0.95rem;
  letter-spacing: -0.005em;
  margin-bottom: 0.2rem;
  color: var(--text-primary);
}
.rec-instr__legend-name--rare {
  background: linear-gradient(135deg, var(--green-primary) 0%, var(--green-light) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.rec-instr__legend-desc {
  font-size: 0.8rem;
  color: var(--text-muted);
  line-height: 1.4;
}

/* Family tabs (filter) */
.rec-instr__tabs {
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
  padding: 0.5rem 0;
  border-bottom: 1px solid var(--glass-border);
}
.rec-instr__tab {
  padding: 0.55rem 1rem;
  background: transparent;
  border: 1px solid transparent;
  border-radius: 100px;
  font-size: 0.82rem;
  color: var(--text-muted);
  letter-spacing: 0.04em;
  font-family: "Outfit", sans-serif;
  cursor: pointer;
  transition: all 0.3s var(--ease);
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
}
.rec-instr__tab:hover {
  color: var(--text-primary);
  background: var(--glass-bg);
}
.rec-instr__tab.active {
  color: var(--green-light);
  background: rgba(117,194,73,0.08);
  border-color: rgba(117,194,73,0.25);
}
.rec-instr__tab-count {
  font-size: 0.7rem;
  color: var(--text-quiet);
  font-variant-numeric: tabular-nums;
}
.rec-instr__tab.active .rec-instr__tab-count { color: var(--green-primary); }

/* Instruments grid · 3 cols desktop, 2 mid, 1 mobile */
.rec-instr__grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 1.25rem;
}
@media (max-width: 1100px) {
  .rec-instr__grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}
@media (max-width: 600px) {
  .rec-instr__grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0.7rem; }
}
@media (max-width: 360px) {
  .rec-instr__grid { gap: 0.5rem; }
}

.rec-instr__card[data-hidden="true"] { display: none; }

/* ─────────────────────────────────────────────────────────────
   AWWWARDS-GRADE INSTRUMENT CARD
   - Whole card clickable (anchor wrapper)
   - Embedded SVG instrument silhouette in upper 62%
   - Family chip top-left (only meta tag)
   - Sample play ghost icon top-right
   - Pro/Rare prices as subtle corner mark, low importance
   - Aspect ratio 3 / 4 portrait
   - Slow elegant motion · cinematic hover
   ───────────────────────────────────────────────────────────── */
.rec-instr__card {
  position: relative;
  display: flex;
  flex-direction: column;
  background: linear-gradient(180deg, rgba(255,255,255,0.025) 0%, rgba(255,255,255,0.015) 100%);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border: 1px solid rgba(255,255,255,0.06);
  border-radius: 20px;
  overflow: hidden;
  text-decoration: none;
  color: inherit;
  cursor: pointer;
  aspect-ratio: 4 / 5;
  transition:
    transform 0.7s cubic-bezier(0.22, 1, 0.36, 1),
    border-color 0.6s var(--ease),
    box-shadow 0.6s var(--ease),
    background 0.6s var(--ease);
  isolation: isolate;
  --mx: 50%;
  --my: 50%;
}
/* Cursor-aware spotlight — desktop only, fades in on hover, follows cursor */
.rec-instr__card::before {
  content: "";
  position: absolute;
  inset: 0;
  pointer-events: none;
  z-index: 3;
  opacity: 0;
  transition: opacity 0.5s var(--ease);
  background: radial-gradient(
    320px circle at var(--mx) var(--my),
    rgba(187, 214, 122, 0.16),
    rgba(117, 194, 73, 0.06) 35%,
    transparent 65%
  );
  /* mix-blend-mode removed — DESIGN-SYSTEM §11 ban */
}
@media (hover: hover) and (pointer: fine) {
  .rec-instr__card:hover::before { opacity: 1; }
}
@media (prefers-reduced-motion: reduce) {
  .rec-instr__card::before { display: none; }
}
.rec-instr__card::after {
  content: "";
  position: absolute;
  inset: 0;
  pointer-events: none;
  opacity: 0.03;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  background-size: 180px;
  z-index: 1;
}
.rec-instr__card:hover {
  transform: translateY(-6px);
  border-color: rgba(117,194,73,0.25);
  box-shadow:
    0 30px 80px -20px rgba(0,0,0,0.5),
    0 0 60px -20px rgba(117,194,73,0.15),
    inset 0 0 0 1px rgba(117,194,73,0.08);
  background: linear-gradient(180deg, rgba(117,194,73,0.04) 0%, rgba(255,255,255,0.015) 100%);
}

/* Media zone — upper 62% — instrument art */
.rec-instr__media {
  position: relative;
  flex: 0 0 55%;
  overflow: hidden;
  clip-path: inset(0);
  isolation: isolate;
  background:
    radial-gradient(ellipse 80% 60% at 50% 10%, rgba(255,255,255,0.02) 0%, transparent 60%), rgba(8,12,18,0.6);
  border-bottom: 1px solid rgba(255,255,255,0.04);
  transition: background 0.6s var(--ease);
}
/* Hover: media zone glow intensifies (no filter shadow on SVG — prevents bleed into title) */
.rec-instr__card:hover .rec-instr__media {
  background:
    radial-gradient(ellipse 80% 60% at 50% 10%, rgba(255,255,255,0.02) 0%, transparent 60%), rgba(8,12,18,0.6);
}
.rec-instr__media-art {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 1.2s cubic-bezier(0.22, 1, 0.36, 1);
}
.rec-instr__media-art svg {
  width: 64%;
  height: 64%;
  transition: opacity 0.4s var(--ease);
}
.rec-instr__card:hover .rec-instr__media-art {
  transform: scale(1.05) rotate(-1deg);
}
.rec-instr__media::before {
  content: "";
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 50%;
  background: linear-gradient(180deg, rgba(187,214,122,0.0) 0%, rgba(187,214,122,0.06) 100%);
  transform: rotate(-20deg) translateY(-100%);
  transition: transform 1.4s cubic-bezier(0.22, 1, 0.36, 1);
  pointer-events: none;
}
.rec-instr__card:hover .rec-instr__media::before {
  transform: rotate(-20deg) translateY(50%);
}

/* Top-left family chip (only meta tag) */
.rec-instr__cat {
  font-family: "Outfit", sans-serif;
  font-size: 0.55rem;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--green-light);
  margin: 0 0 0.4rem;
  display: block;
}

/* Body — instrument name + corner pricing */
.rec-instr__body {
  flex: 1;
  display: flex;
  flex-direction: column;
  padding: 1.1rem 1.25rem 1.1rem;
  position: relative;
  z-index: 2;
  min-height: 0;
}
.rec-instr__name {
  font-family: "Playfair Display", serif;
  font-weight: 700;
  font-size: 1.5rem;
  letter-spacing: -0.015em;
  line-height: 1.15;
  color: var(--text-primary);
  margin: 0 0 0.5rem;
  padding-bottom: 0.05rem;
  transition: color 0.4s var(--ease);
}
.rec-instr__card:hover .rec-instr__name {
  background: linear-gradient(135deg, var(--text-primary) 0%, var(--green-light) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

/* Character description — italic Playfair, low-key, 2 lines max */
.rec-instr__desc {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-weight: 400;
  font-size: 0.82rem;
  line-height: 1.45;
  color: var(--text-secondary);
  margin: 0;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  opacity: 0.85;
  transition: opacity 0.4s var(--ease);
}
.rec-instr__card:hover .rec-instr__desc {
  opacity: 1;
}

/* Bottom-row pricing — corner mark, low visual weight */
.rec-instr__pricing {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  gap: 0.75rem;
  margin-top: auto;
  padding-top: 0.7rem;
  border-top: 1px solid rgba(255,255,255,0.05);
}
.rec-instr__price {
  display: inline-flex;
  align-items: baseline;
  gap: 0.4rem;
  font-size: 0.68rem;
  letter-spacing: 0.04em;
  color: var(--text-quiet);
}
.rec-instr__price-label {
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.1em;
}
.rec-instr__price-amt {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-weight: 400;
  color: var(--text-secondary);
  font-size: 0.78rem;
}
.rec-instr__price--rare .rec-instr__price-amt {
  background: linear-gradient(135deg, var(--green-primary) 0%, var(--green-light) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.rec-instr__price-strike {
  text-decoration: line-through;
  color: var(--text-whisper);
  font-size: 0.66rem;
  margin-right: 0.2rem;
  font-weight: 400;
}
.rec-instr__price-onreq {
  font-family: "Playfair Display", serif;
  font-style: italic;
  color: var(--text-muted);
  font-size: 0.7rem;
}

/* Mobile compact — keep aspect ratio, tighten internals so 2-up fits */
@media (max-width: 600px) {
  /* Balanced: media 52% / body 48%. Body holds category eyebrow + name +
     2-line desc — the eyebrow needed the room back so the desc stops clipping.
     Art still leads with a 72% SVG. */
  .rec-instr__media { flex: 0 0 52%; }
  .rec-instr__media-art svg { width: 72%; height: 72%; }
  .rec-instr__body {
    padding: 0.7rem 0.75rem 0.75rem;
    gap: 0;
  }
  .rec-instr__name {
    font-size: 0.95rem;
    line-height: 1.15;
    margin: 0 0 0.25rem;
  }
  .rec-instr__desc {
    display: -webkit-box;
    font-size: 0.66rem;
    line-height: 1.35;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin: 0 0 0.35rem;
  }
  .rec-instr__pricing {
    margin-top: auto;
    padding-top: 0.4rem;
    gap: 0.35rem;
    flex-wrap: wrap;
  }
  .rec-instr__price { font-size: 0.58rem; gap: 0.22rem; flex-shrink: 1; min-width: 0; }
  .rec-instr__price-label { letter-spacing: 0.08em; }
  .rec-instr__price-amt { font-size: 0.66rem; }
  .rec-instr__price-strike { font-size: 0.55rem; }
  .rec-instr__price-onreq { font-size: 0.58rem; white-space: nowrap; }
}
@media (max-width: 360px) {
  .rec-instr__media { flex: 0 0 52%; }
  .rec-instr__name { font-size: 0.88rem; }
  .rec-instr__desc { font-size: 0.62rem; }
  .rec-instr__price { font-size: 0.54rem; }
  .rec-instr__price-amt { font-size: 0.62rem; }
}

/* ═══════════════════════════════════════════════════════════════
   § 4 · TRUST · Principles + Proof
   ═══════════════════════════════════════════════════════════════ */
.rec-trust {
  display: flex;
  flex-direction: column;
  gap: 3rem;
}
.rec-trust__head {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  margin-bottom: 1rem;
  max-width: 760px;
}
@media (max-width: 560px) {
  /* match 03 head→body rhythm (was 1rem — too tight on mobile) */
  .rec-trust__head { margin-bottom: 1.5rem; }
}
.rec-trust__eyebrow {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  font-weight: 700;
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}
.rec-trust__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}

.rec-trust__title {
  font-family: "Playfair Display", serif;
  font-weight: 900;
  font-size: clamp(1.5rem, 2.6vw, 2.1rem);
  line-height: 1.15;
  letter-spacing: -0.01em;
  margin-bottom: 0.5rem;
}
.rec-trust__lede {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-size: 1rem;
  color: var(--text-secondary);
  max-width: 56ch;
  line-height: 1.5;
}

/* Principles grid · 4 columns */
.rec-trust__principles {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 1rem;
}
@media (max-width: 1100px) {
  .rec-trust__principles { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}
@media (max-width: 480px) {
  .rec-trust__principles { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0.6rem; }
}
@media (max-width: 360px) {
  .rec-trust__principles { gap: 0.5rem; }
}
.rec-trust__principle {
  padding: 1.25rem;
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  border-radius: 14px;
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  transition: all 0.4s var(--ease);
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}
.rec-trust__principle:hover {
  background: var(--glass-bg-hover);
  border-color: var(--glass-border-hover);
  transform: translateY(-2px);
}
.rec-trust__principle-icon {
  width: 32px;
  height: 32px;
  border-radius: 8px;
  background: rgba(117,194,73,0.08);
  border: 1px solid rgba(117,194,73,0.18);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--green-light);
  margin-bottom: 0.35rem;
}
.rec-trust__principle-icon svg { width: 16px; height: 16px; }
.rec-trust__principle-name {
  font-family: "Playfair Display", serif;
  font-weight: 700;
  font-size: 1.05rem;
  letter-spacing: -0.005em;
  color: var(--text-primary);
}
.rec-trust__principle-desc {
  font-size: 0.82rem;
  color: var(--text-muted);
  line-height: 1.4;
}
@media (max-width: 480px) {
  .rec-trust__principle {
    padding: 0.85rem 0.85rem 0.9rem;
    gap: 0.35rem;
    border-radius: 12px;
  }
  .rec-trust__principle-icon {
    width: 26px; height: 26px;
    border-radius: 7px;
    margin-bottom: 0.2rem;
  }
  .rec-trust__principle-icon svg { width: 13px; height: 13px; }
  .rec-trust__principle-name { font-size: 0.85rem; line-height: 1.2; }
  .rec-trust__principle-desc { font-size: 0.66rem; line-height: 1.4; }
}
@media (max-width: 360px) {
  .rec-trust__principle { padding: 0.75rem 0.7rem 0.8rem; }
  .rec-trust__principle-name { font-size: 0.78rem; }
  .rec-trust__principle-desc { font-size: 0.62rem; }
}


/* ═══════════════════════════════════════════════════════════════
   § 5 · CONVERSION BAND
   ═══════════════════════════════════════════════════════════════ */
.rec-conversion {
  position: relative;
  padding: 3rem 2.5rem;
  background:
    rgba(255,255,255, 0.035);
  border: 1px solid rgba(255,255,255, 0.06);
  border-top-color: rgba(255,255,255, 0.10);
  border-radius: 18px;
  overflow: hidden;
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1.25rem;
}
.rec-conversion::before {
  content: "";
  position: absolute;
  top: 0; left: 50%;
  transform: translateX(-50%);
  width: 60%;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(117,194,73,0.5), transparent);
}
.rec-conversion::after {
  content: "";
  position: absolute;
  inset: 0;
  pointer-events: none;
  background: radial-gradient(ellipse 60% 40% at 50% 30%, rgba(117,194,73,0.05), transparent 70%);
}
.rec-conversion > * { position: relative; z-index: 1; }
.rec-conversion__title {
  font-family: "Playfair Display", serif;
  font-weight: 900;
  font-size: clamp(1.5rem, 2.6vw, 2.1rem);
  line-height: 1.15;
  letter-spacing: -0.01em;
  max-width: 24ch;
}
.rec-conversion__subtitle {
  font-family: "Playfair Display", serif;
  font-style: italic;
  font-size: 1rem;
  color: var(--text-secondary);
  max-width: 50ch;
}
.rec-conversion__ctas {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
  justify-content: center;
  margin-top: 0.5rem;
}

/* ═══════════════════════════════════════════════════════════════
   § 6 · FAQ
   ═══════════════════════════════════════════════════════════════ */
.rec-faq {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}
.rec-faq__head {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  padding-bottom: 0;
  margin-bottom: 2.4rem;
  border-bottom: none;
  max-width: 760px;
}
.rec-faq__eyebrow {
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  margin-bottom: 0;
}
.rec-faq__eyebrow::before {
  content: "";
  width: 22px; height: 1px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
}
.rec-faq__title {
  font-family: "Playfair Display", serif;
  font-weight: 900;
  font-size: clamp(1.5rem, 2.6vw, 2.1rem);
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
}
.rec-faq__sub {
  font-family: "Outfit", sans-serif;
  font-size: clamp(0.82rem, 1vw, 0.95rem);
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  margin: 0;
  max-width: 600px;
}
@media (max-width: 640px) {
  .rec-faq__head { gap: 0.55rem; margin-bottom: 1.5rem; }
  .rec-faq__title { font-size: 1.4rem; line-height: 1.2; }
  .rec-faq__sub { font-size: 0.78rem; line-height: 1.5; }
}
.rec-faq__list {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
}
.rec-faq__item {
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  border-radius: 12px;
  overflow: hidden;
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  transition: background 0.3s var(--ease), border-color 0.3s var(--ease);
}
.rec-faq__item:hover { border-color: var(--glass-border-hover); }
.rec-faq__item.expanded {
  background: var(--glass-bg-hover);
  border-color: rgba(117,194,73,0.18);
}
.rec-faq__q {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  padding: 1.1rem 1.4rem;
  cursor: pointer;
  font-family: "Playfair Display", serif;
  font-weight: 700;
  font-size: 0.98rem;
  color: var(--text-primary);
  letter-spacing: -0.005em;
  text-align: left;
  line-height: 1.35;
}
@media (max-width: 640px) {
  .rec-faq__q { font-size: 0.88rem; padding: 0.9rem 1rem; gap: 0.7rem; }
  .rec-faq__q-icon { width: 24px; height: 24px; }
  .rec-faq__q-icon svg { width: 10px; height: 10px; }
}
.rec-faq__q-icon {
  flex-shrink: 0;
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background: rgba(117,194,73,0.08);
  border: 1px solid rgba(117,194,73,0.2);
  color: var(--green-light);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.4s var(--ease), background 0.3s var(--ease);
}
.rec-faq__q-icon svg { width: 12px; height: 12px; }
.rec-faq__item.expanded .rec-faq__q-icon { transform: rotate(45deg); background: rgba(117,194,73,0.2); }
.rec-faq__a {
  display: grid;
  grid-template-rows: 0fr;
  transition: grid-template-rows 0.4s var(--ease);
}
.rec-faq__item.expanded .rec-faq__a { grid-template-rows: 1fr; }
.rec-faq__a-inner {
  overflow: hidden;
}
.rec-faq__a-pad {
  padding: 1.25rem 1.5rem 1.5rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  font-weight: 300;
  line-height: 1.65;
  color: var(--text-muted);
  border-top: 1px solid var(--glass-border);
}
@media (max-width: 640px) {
  .rec-faq__a-pad { padding: 1rem 1rem 1.1rem; }
}

/* ═══════════════════════════════════════════════════════════════
   § 7 · REQUEST FORM MODAL · RECSVC-FORM-001 v1
   Single long form · progressive disclosure (NDA toggle)
   ═══════════════════════════════════════════════════════════════ */
.rec-modal {
  position: fixed;
  inset: 0;
  z-index: 1100;
  display: none;
  align-items: flex-start;
  justify-content: center;
  padding: 5vh 1rem;
  overflow-y: hidden;
}
.rec-modal[data-open="true"] { display: flex; }
.rec-modal__backdrop {
  position: fixed;
  inset: 0;
  background: rgba(5,8,16,0.82);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  animation: modalBackdropFade 0.3s var(--ease);
}
@keyframes modalBackdropFade {
  from { opacity: 0; }
  to { opacity: 1; }
}
.rec-modal__inner {
  position: relative;
  width: 100%;
  max-width: 760px;
  background:
    linear-gradient(180deg, rgba(13,17,23,0.98) 0%, rgba(10,14,20,0.98) 100%);
  border: 1px solid rgba(117,194,73,0.2);
  border-radius: 22px;
  box-shadow:
    0 30px 80px rgba(0,0,0,0.6),
    0 8px 30px rgba(0,0,0,0.4),
    0 0 0 1px rgba(255,255,255,0.04),
    0 0 60px rgba(75,145,65,0.08);
  overflow: hidden;
  animation: modalSlideUp 0.5s var(--ease);
  margin: auto;
}
@keyframes modalSlideUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Modal header */
.rec-modal__header {
  position: sticky;
  top: 0;
  z-index: 5;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 1rem;
  padding: 1.5rem 1.75rem 1.25rem;
  background: linear-gradient(180deg, rgba(13,17,23,0.96) 0%, rgba(13,17,23,0.85) 100%);
  border-bottom: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
}
.rec-modal__title-block {
  flex: 1;
  min-width: 0;
}
.rec-modal__title {
  font-family: "Playfair Display", serif;
  font-weight: 700;
  font-size: 1.5rem;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin-bottom: 0.25rem;
}
.rec-modal__subtitle {
  font-size: 0.82rem;
  color: var(--text-muted);
  letter-spacing: 0.02em;
}
.rec-modal__close {
  flex-shrink: 0;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  color: var(--text-secondary);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s var(--ease);
}
.rec-modal__close:hover {
  background: rgba(255,255,255,0.08);
  color: var(--text-primary);
  transform: rotate(90deg);
}
.rec-modal__close svg { width: 14px; height: 14px; }

/* Modal body */
.rec-modal__body {
  padding: 0 1.75rem 1.5rem;
  max-height: 78vh;
  overflow-y: auto;
}
.rec-modal__body::-webkit-scrollbar { width: 6px; }
.rec-modal__body::-webkit-scrollbar-thumb { background: rgba(117,194,73,0.15); border-radius: 6px; }

/* NDA toggle */
.rec-form__nda {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  padding: 1rem 1.25rem;
  margin: 1.25rem 0 0.5rem;
  background: rgba(117,194,73,0.04);
  border: 1px solid rgba(117,194,73,0.18);
  border-radius: 12px;
}
.rec-form__nda-text {
  flex: 1;
}
.rec-form__nda-label {
  font-size: 0.92rem;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 0.18rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}
.rec-form__nda-icon {
  width: 14px;
  height: 14px;
  color: var(--green-light);
}
.rec-form__nda-desc {
  font-size: 0.78rem;
  color: var(--text-muted);
  line-height: 1.4;
}
.rec-form__toggle {
  flex-shrink: 0;
  position: relative;
  width: 44px;
  height: 24px;
  background: rgba(255,255,255,0.08);
  border-radius: 100px;
  border: 1px solid var(--glass-border);
  cursor: pointer;
  transition: all 0.3s var(--ease);
}
.rec-form__toggle::after {
  content: "";
  position: absolute;
  top: 2px;
  left: 2px;
  width: 18px;
  height: 18px;
  background: rgba(255,255,255,0.5);
  border-radius: 50%;
  transition: all 0.3s var(--ease);
}
.rec-form__toggle[data-on="true"] {
  background: var(--green-primary);
  border-color: var(--green-primary);
}
.rec-form__toggle[data-on="true"]::after {
  left: 22px;
  background: #0a0e14;
}

/* Form groups */
.rec-form__group {
  margin: 1.5rem 0 0;
  display: flex;
  flex-direction: column;
  gap: 0.85rem;
}
.rec-form__group-label {
  font-size: 0.62rem;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--green-light);
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 0.6rem;
  margin-bottom: 0.25rem;
}
.rec-form__group-label-num {
  font-family: "Playfair Display", serif;
  font-style: italic;
  color: var(--text-quiet);
  font-size: 0.78rem;
  letter-spacing: 0.04em;
  font-weight: 400;
}
.rec-form__group-label::after {
  content: "";
  flex: 1;
  height: 1px;
  background: linear-gradient(90deg, var(--glass-border), transparent);
}

.rec-form__row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0.75rem;
}
.rec-form__row--3 {
  grid-template-columns: 1fr 1fr 1fr;
}
@media (max-width: 600px) {
  .rec-form__row,
  .rec-form__row--3 { grid-template-columns: 1fr; }
}

.rec-form__field {
  display: flex;
  flex-direction: column;
  gap: 0.35rem;
}
.rec-form__field--full { grid-column: 1 / -1; }
.rec-form__label {
  font-size: 0.78rem;
  color: var(--text-secondary);
  letter-spacing: 0.02em;
  font-weight: 500;
}
.rec-form__label-optional {
  font-size: 0.7rem;
  color: var(--text-quiet);
  font-style: italic;
  font-weight: 400;
}
.rec-form__input,
.rec-form__select,
.rec-form__textarea {
  width: 100%;
  padding: 0.7rem 0.9rem;
  background: rgba(255,255,255,0.03);
  border: 1px solid var(--glass-border);
  border-radius: 10px;
  color: var(--text-primary);
  font-family: "Outfit", sans-serif;
  font-size: 0.92rem;
  letter-spacing: 0.01em;
  transition: all 0.3s var(--ease);
  outline: none;
}
.rec-form__input::placeholder,
.rec-form__textarea::placeholder { color: var(--text-quiet); }
.rec-form__input:focus,
.rec-form__select:focus,
.rec-form__textarea:focus {
  background: rgba(255,255,255,0.05);
  border-color: rgba(117,194,73,0.4);
  box-shadow: 0 0 0 3px rgba(117,194,73,0.08);
}
.rec-form__textarea {
  min-height: 110px;
  resize: vertical;
  line-height: 1.5;
}
.rec-form__select {
  appearance: none;
  -webkit-appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' fill='none' stroke='rgba(255,255,255,0.4)' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 0.85rem center;
  padding-right: 2.25rem;
}

/* Hide project name when NDA is on */
.rec-form[data-nda="true"] .rec-form__field--nda-hide { display: none; }

/* Reference links */
.rec-form__refs {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}
.rec-form__ref-row {
  display: flex;
  gap: 0.5rem;
  align-items: center;
}
.rec-form__ref-row .rec-form__input { flex: 1; }
.rec-form__ref-remove {
  flex-shrink: 0;
  width: 36px;
  height: 36px;
  border-radius: 10px;
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  color: var(--text-muted);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s var(--ease);
  cursor: pointer;
}
.rec-form__ref-remove:hover {
  color: var(--warning);
  border-color: rgba(212,181,110,0.3);
}
.rec-form__ref-remove svg { width: 12px; height: 12px; }
.rec-form__add-ref {
  align-self: flex-start;
  display: inline-flex;
  align-items: center;
  gap: 0.45rem;
  padding: 0.6rem 1rem;
  font-size: 0.7rem;
  font-weight: 600;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--green-light);
  background: rgba(117,194,73,0.05);
  border: 1px dashed rgba(117,194,73,0.25);
  border-radius: 100px;
  cursor: pointer;
  transition: all 0.3s var(--ease);
  margin-top: 0.25rem;
}
.rec-form__add-ref:hover {
  color: #fff;
  background: rgba(117,194,73,0.1);
  border-color: rgba(117,194,73,0.45);
  transform: translateY(-1px);
}
.rec-form__add-ref svg { width: 12px; height: 12px; }

/* Modal footer */
.rec-modal__footer {
  position: sticky;
  bottom: 0;
  z-index: 5;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  padding: 1.25rem 1.75rem;
  background: linear-gradient(0deg, rgba(13,17,23,0.96) 0%, rgba(13,17,23,0.85) 100%);
  border-top: 1px solid var(--glass-border);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  flex-wrap: wrap;
}
.rec-modal__footer-note {
  font-size: 0.74rem;
  color: var(--text-muted);
  display: flex;
  align-items: center;
  gap: 0.4rem;
  letter-spacing: 0.02em;
}
.rec-modal__footer-note svg {
  width: 12px;
  height: 12px;
  color: var(--green-light);
}
.rec-modal__footer-actions {
  display: flex;
  gap: 0.75rem;
}
.rec-form__btn {
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  padding: 0.85rem 1.6rem;
  border-radius: 100px;
  font-family: "Outfit", sans-serif;
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  cursor: pointer;
  transition: all 0.4s var(--ease);
  border: 1px solid transparent;
  position: relative;
  overflow: hidden;
}
.rec-form__btn--ghost {
  background: rgba(255,255,255,0.025);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border-color: rgba(255,255,255,0.08);
  color: rgba(255,255,255,0.55);
}
.rec-form__btn--ghost:hover {
  color: #fff;
  background: rgba(255,255,255,0.05);
  border-color: rgba(255,255,255,0.15);
  transform: translateY(-2px);
}
.rec-form__btn--primary {
  background: linear-gradient(135deg, var(--green-light), var(--green-primary));
  border-color: transparent;
  color: #0a0d12;
  box-shadow: 0 8px 24px rgba(0,0,0, 0.35), inset 0 1px 0 rgba(255,255,255, 0.22);
}
.rec-form__btn--primary:hover {
  color: #0a0d12;
  box-shadow: 0 14px 36px rgba(0,0,0, 0.4), 0 0 24px rgba(117,194,73, 0.22), inset 0 1px 0 rgba(255,255,255, 0.25);
  transform: translateY(-2px);
}

/* Scroll lock when modal open */
body.rec-modal-open { overflow: hidden; }

/* Mobile modal full-screen feel */
@media (max-width: 600px) {
  .rec-modal { padding: 0; }
  .rec-modal__inner { border-radius: 0; max-width: 100%; min-height: 100vh; }
  .rec-modal__body { max-height: none; }
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
   CC-TOKENS-V1 · APPENDED AT END so tokens override page styles
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
  --card-bg: rgba(10, 16, 12, 0.65);
  --card-bg-tint: linear-gradient(160deg, rgba(255,255,255, 0.025) 0%, rgba(255,255,255, 0.01) 60%);
  --card-border: rgba(255,255,255, 0.07);

  /* Action card surfaces · stronger green tint for CTA zones */
  --action-bg: rgba(8, 14, 10, 0.78);
  --action-bg-tint: linear-gradient(160deg, rgba(117,194,73, 0.08) 0%, rgba(255,255,255, 0.025) 60%);
  --action-border: rgba(117,194,73, 0.18);

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
  opacity: 0.04;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.7' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  background-size: 200px;
  /* mix-blend-mode removed — DESIGN-SYSTEM §11 ban */
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
}
.cosmic-bg::before {
  content: "";
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 80% 45% at 50% -20%, rgba(117,194,73, 0.08) 0%, transparent 60%),
    radial-gradient(ellipse 100% 60% at 50% 120%, rgba(47,105,66, 0.12) 0%, transparent 70%),
    radial-gradient(ellipse 40% 60% at -15% 50%, rgba(187,214,122, 0.04) 0%, transparent 55%),
    radial-gradient(ellipse 40% 60% at 115% 50%, rgba(117,194,73, 0.05) 0%, transparent 55%);
  opacity: 1;
}
.cosmic-bg::after {
  content: "";
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

/* Star particles · 3 variants */
.cosmic-bg__star {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.85);
  box-shadow: 0 0 3px rgba(255, 255, 255, 0.5), 0 0 6px rgba(255, 255, 255, 0.2);
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
  font-size: clamp(1.5rem, 2.6vw, 2.1rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0;
  padding-bottom: 0.05rem;
}
.instr-process__title-accent {
  font-style: italic;
  font-weight: 900;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 60%, #fff 100%);
  -webkit-background-clip: text;
          background-clip: text;
  -webkit-text-fill-color: transparent;
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
}

@media (prefers-reduced-motion: reduce) {
  .process-step:hover { transform: none !important; }
  .process-step:hover .process-step__num { transform: none !important; }
}

/* Mobile: numbered vertical rail (≤560). The 6 steps are a SEQUENCE (01→06),
   not 6 floating tiles — so we drop the grid + square and lay them as a single
   column of tight rows: oversized serif number as a left spine, title + meta
   stacked right. Content sets its own height → zero dead space. Body stays in
   DOM, hidden on mobile (shows ≥561px for desktop + SEO). */
@media (max-width: 560px) {
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
    grid-row: 1 / 3;          /* number spines down the left, across title+meta */
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

/* Submission confirmation panel */
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

/* Lock body scroll when modal is open */
body.booking-locked { overflow: hidden; }



</style>
<!-- ─── Stage 3 JSON-LD: Service + BreadcrumbList ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "@id": "https://cryptocipher.in/recording#service",
  "serviceType": "Remote Indian instrument recording",
  "name": "Custom Indian Master Musician Recording Sessions",
  "provider": { "@id": "https://cryptocipher.in/#organization" },
  "areaServed": "Worldwide",
  "url": "https://cryptocipher.in/recording",
  "description": "Remote recording sessions with vetted Indian classical musicians — sitar, sarod, sarangi, bansuri, tabla, vocals and full ensembles — delivered as edited stems."
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://cryptocipher.in/" },
    { "@type": "ListItem", "position": 2, "name": "Recording", "item": "https://cryptocipher.in/recording" }
  ]
}
</script>

<!-- ─── Stage 4 AEO JSON-LD: FAQPage + HowTo (6 on-page steps) + speakable ───
     HowTo steps mirror the VISIBLE on-page process (INSTR-PROCESS-001) only.
     Back-office payment/availability flow is intentionally NOT in schema (not on page). -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "@id": "https://cryptocipher.in/recording#faq",
  "isPartOf": { "@id": "https://cryptocipher.in/#website" },
  "about": { "@id": "https://cryptocipher.in/recording#service" },
  "mainEntity": [
    { "@type": "Question", "name": "How long does a custom recording take?",
      "acceptedAnswer": { "@type": "Answer", "text": "Three to four days from confirmed brief to delivered files. Faster turnaround is possible on simpler briefs — ask in your brief and we will quote against the deadline." } },
    { "@type": "Question", "name": "What's included in the license?",
      "acceptedAnswer": { "@type": "Answer", "text": "Sync clearance is included by default — film, TV, OTT, ad, game. Buyout and custom terms available on request. The license is signed and delivered with the files. AI training is excluded in writing." } },
    { "@type": "Question", "name": "Can I direct the performance?",
      "acceptedAnswer": { "@type": "Answer", "text": "Yes — and we lock direction before the session. Send phrasing notes, articulation requests, or a reference take with your brief. We pre-discuss with the artist so the first take is the take." } },
    { "@type": "Question", "name": "Do you record outside India?",
      "acceptedAnswer": { "@type": "Answer", "text": "All sessions are tracked in our studio in India. We do not subcontract to remote home studios. The room, the chain, and the artist roster are the brand — that is the point." } },
    { "@type": "Question", "name": "Can the same artist record for multiple cues?",
      "acceptedAnswer": { "@type": "Answer", "text": "Yes — multi-cue sessions are common and discounted at the brief stage. Add all cues to the request form so we can scope the session as a single block." } },
    { "@type": "Question", "name": "Is the recording AI-free?",
      "acceptedAnswer": { "@type": "Answer", "text": "Yes — and stated in writing on the license. No AI synthesis, no model-trained voice cloning, no algorithmic extension. Performances are tracked from a single artist in a single room, take by take." } },
    { "@type": "Question", "name": "How do you handle NDAs?",
      "acceptedAnswer": { "@type": "Answer", "text": "Toggle the NDA option on the request form and skip the project name. We send our standard NDA — or sign yours — before any project details or files are shared. Artists are bound under the same terms." } },
    { "@type": "Question", "name": "How do discounts and editorial rates work?",
      "acceptedAnswer": { "@type": "Answer", "text": "Three editorial signals: Introductory (first-session rate), Limited Series (short window, named project), Residency (longer multi-cue engagement). Service-wide bands run during studio anniversaries. No countdown timers." } }
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HowTo",
  "@id": "https://cryptocipher.in/recording#howto",
  "name": "How a directed Indian instrument recording session works",
  "description": "The six-step process for commissioning a custom remote recording with Crypto Cipher's studio in India and master musicians.",
  "totalTime": "P4D",
  "step": [
    { "@type": "HowToStep", "position": 1, "name": "Submit your brief", "text": "Tell us what your composition needs: instrument, tempo, raga or scale, mood, reference track, length, deadline, and the project the recording is for." },
    { "@type": "HowToStep", "position": 2, "name": "Receive your plan", "text": "Within 24 hours: confirmed instrument, assigned artist profile, session director, studio date, delivery timeline, and total cost, quoted around artist and brief complexity." },
    { "@type": "HowToStep", "position": 3, "name": "Lock the slot", "text": "Studio reserved, artist scheduled, session director briefed in advance with your reference and creative direction. Your project enters our calendar with no shared focus." },
    { "@type": "HowToStep", "position": 4, "name": "The directed recording", "text": "The artist plays in our studio while a session director shapes the performance live to your brief — slow and fast takes, melodic alternates, rhythmic and ornamentation options." },
    { "@type": "HowToStep", "position": 5, "name": "Multi-mic engineering", "text": "Recorded across multiple microphone positions — close, room, character — by an engineer who understands Indian instruments. Takes are reviewed, cleaned, organized, and labeled for your DAW." },
    { "@type": "HowToStep", "position": 6, "name": "Delivery", "text": "Raw multi-track WAV stems at 24-bit / 48 kHz, multiple takes and mic positions in organized folders, via secure download link, licensed for the project specified in your brief." }
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "@id": "https://cryptocipher.in/recording#webpage",
  "url": "https://cryptocipher.in/recording",
  "isPartOf": { "@id": "https://cryptocipher.in/#website" },
  "about": { "@id": "https://cryptocipher.in/recording#service" },
  "speakable": { "@type": "SpeakableSpecification", "cssSelector": [".rec-hero__title", ".rec-hero__tagline"] }
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
