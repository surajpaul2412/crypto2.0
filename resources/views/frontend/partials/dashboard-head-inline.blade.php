@verbatim
<meta name="robots" content="noindex,nofollow">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Outfit:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

<style>
/* Critical: park skip-link before first paint (FOUC). */
.skip-link { position: absolute; left: 12px; top: -56px; z-index: 10000; }

/* ═══ SHARED · tokens + reset + cosmic-bg (canonical, matches every page) ═══ */
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
  --error: #e5837a;

  /* Motion */
  --ease: cubic-bezier(0.22, 1, 0.36, 1);

  /* Section rhythm */
  --section-gap-desktop: 4rem;
  --section-gap-tablet: 3rem;
  --section-gap-mobile: 2.5rem;
}

* { box-sizing: border-box; margin: 0; padding: 0; }

html {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background: var(--bg-deep, #0d1117);
}

body {
  font-family: "Outfit", sans-serif;
  background: transparent;
  color: var(--text-primary);
  line-height: 1.5;
  overflow-x: clip;
  overflow-anchor: none;
  position: relative;
  min-height: 100vh;
}

img { max-width: 100%; display: block; }
button { font-family: inherit; cursor: pointer; border: none; background: none; color: inherit; }
a { color: inherit; text-decoration: none; }

::selection { background: rgba(117,194,73,0.25); color: #fff; }
::-webkit-scrollbar { width: 10px; }
::-webkit-scrollbar-track { background: var(--bg-darker); }
::-webkit-scrollbar-thumb { background: rgba(117,194,73,0.18); border-radius: 10px; }
::-webkit-scrollbar-thumb:hover { background: rgba(117,194,73,0.32); }

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
}

/* ═══ COSMIC BG · floating stars + radial depth gradients ═══ */
.cosmic-bg {
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 0;
  overflow: hidden;
  transform: translate3d(0, 0, 0);
  will-change: transform;
  contain: strict;
  background: linear-gradient(180deg, #0d1117 0%, #0b1014 30%, #0a0e12 60%, #080b10 100%);
}
.cosmic-bg::before {
  content: "";
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 100% 50% at 50% 110%, rgba(20, 28, 38, 0.4) 0%, transparent 60%),
    radial-gradient(ellipse 30% 100% at 0% 50%, rgba(0,0,0, 0.35) 0%, transparent 50%),
    radial-gradient(ellipse 30% 100% at 100% 50%, rgba(0,0,0, 0.35) 0%, transparent 50%);
  opacity: 1;
}
.cosmic-bg::after {
  content: "";
  position: absolute;
  inset: -25%;
  background:
    radial-gradient(circle 700px at 12% 18%, rgba(40, 65, 90, 0.08), transparent 60%),
    radial-gradient(circle 800px at 88% 80%, rgba(35, 55, 80, 0.06), transparent 60%);
  filter: blur(18px);
  opacity: 0.85;
}
.cosmic-bg__beam {
  position: absolute;
  inset: 0;
  background:
    linear-gradient(180deg, rgba(255,255,255, 0.018) 0%, transparent 25%),
    linear-gradient(0deg, rgba(0,0,0, 0.35) 0%, transparent 22%);
  pointer-events: none;
}
.cosmic-bg__star {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.85);
  box-shadow: 0 0 4px rgba(255, 255, 255, 0.4);
  animation: none !important;
  opacity: 0.7;
}
.cosmic-bg__star--green {
  background: rgba(220, 230, 240, 0.75);
  box-shadow: 0 0 5px rgba(180, 200, 220, 0.40), 0 0 12px rgba(160, 185, 210, 0.16);
}
.cosmic-bg__star--bright {
  background: rgba(255, 255, 255, 0.95);
  box-shadow: 0 0 6px rgba(255, 255, 255, 0.55), 0 0 14px rgba(255, 255, 255, 0.22);
}
.cosmic-bg__star--far {
  background: rgba(255, 255, 255, 0.4);
  box-shadow: 0 0 1.5px rgba(255, 255, 255, 0.2);
  opacity: 0.4;
}
.cosmic-bg__glow {
  position: absolute;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(40, 65, 90, 0.10) 0%, rgba(40, 65, 90, 0.025) 50%, transparent 70%);
  filter: blur(18px);
  animation: none !important;
  opacity: 0.45;
}
@media (prefers-reduced-motion: reduce) {
  .cosmic-bg__star, .cosmic-bg__glow, .cosmic-bg::after { animation: none; }
}

/* ═══ CARD BASE · shared glass card, matches rest of site ═══ */
.cc-card {
  position: relative;
  background: var(--card-bg-tint), var(--card-bg);
  border: 1px solid var(--card-border);
  border-radius: 14px;
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  box-shadow: 0 6px 18px rgba(0,0,0, 0.28), inset 0 1px 0 rgba(255,255,255, 0.04);
  isolation: isolate;
}

.eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  font-family: "Outfit", sans-serif;
  font-size: 0.5rem;
  font-weight: 700;
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

/* ═══════════════════════════════════════════════════════════════
   CUSTOMER DASHBOARD
   ═══════════════════════════════════════════════════════════════ */
.dash-main {
  position: relative;
  z-index: 2;
  max-width: 1280px;
  margin: 0 auto;
  padding: 10rem 3rem 6rem;
}
@media (max-width: 1024px) { .dash-main { padding: 7rem 1.5rem 4rem; } }
@media (max-width: 560px)  { .dash-main { padding: 6.5rem 1.1rem 3rem; } }

.dash-head { margin-bottom: 2.6rem; display: flex; align-items: flex-end; justify-content: space-between; gap: 1.5rem; flex-wrap: wrap; }
.dash-title {
  font-family: "Playfair Display", serif;
  font-size: clamp(2rem, 4vw, 2.7rem);
  font-weight: 900;
  line-height: 1.1;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0.6rem 0 0.5rem;
}
.dash-title em { font-style: italic; color: var(--green-light); }
.dash-sub { font-size: 0.85rem; font-weight: 300; color: var(--text-muted); max-width: 560px; line-height: 1.6; }

.dash-logout {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.7rem 1.3rem;
  border-radius: 100px;
  background: rgba(255,255,255,0.03);
  border: 1px solid var(--glass-border);
  color: var(--text-secondary);
  font-size: 0.72rem;
  font-weight: 600;
  transition: all 0.3s var(--ease);
  flex-shrink: 0;
}
.dash-logout:hover { color: #fff; border-color: rgba(229,131,122,0.4); background: rgba(229,131,122,0.08); }
.dash-logout svg { width: 14px; height: 14px; }

.dash-status {
  display: flex;
  align-items: flex-start;
  gap: 0.6rem;
  background: rgba(117,194,73,0.08);
  border: 1px solid rgba(117,194,73,0.25);
  color: var(--green-light);
  padding: 0.8rem 1rem;
  border-radius: 10px;
  font-size: 0.78rem;
  line-height: 1.5;
  margin-bottom: 2rem;
  max-width: 640px;
}

/* ── Stat cards ── */
.dash-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
  margin-bottom: 3rem;
}
@media (max-width: 700px) { .dash-stats { grid-template-columns: 1fr; } }
.dash-stat {
  padding: 1.4rem 1.5rem;
  border-radius: 16px;
}
.dash-stat__label {
  font-size: 0.66rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--text-quiet);
  margin-bottom: 0.5rem;
}
.dash-stat__value {
  font-family: "Playfair Display", serif;
  font-size: 2.2rem;
  font-weight: 800;
  color: var(--text-primary);
  line-height: 1;
}

/* ── Section shell ── */
.dash-section { margin-bottom: 3.2rem; }
.dash-section__head {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  gap: 1rem;
  margin-bottom: 1.3rem;
}
.dash-section__title {
  font-family: "Playfair Display", serif;
  font-size: 1.3rem;
  font-weight: 800;
  color: var(--text-primary);
}
.dash-section__link {
  font-size: 0.7rem;
  font-weight: 600;
  color: var(--green-light);
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  transition: gap 0.3s var(--ease);
}
.dash-section__link:hover { gap: 0.55rem; }
.dash-section__link svg { width: 12px; height: 12px; }

/* ── Empty state ── */
.dash-empty {
  padding: 3.2rem 2rem;
  text-align: center;
  border-radius: 20px;
}
.dash-empty__icon { width: 46px; height: 46px; margin: 0 auto 1.2rem; color: var(--text-quiet); }
.dash-empty__icon svg { width: 100%; height: 100%; }
.dash-empty__title { font-family: "Playfair Display", serif; font-size: 1.25rem; font-weight: 800; color: var(--text-primary); margin: 0 0 0.5rem; }
.dash-empty__sub { font-size: 0.8rem; color: var(--text-muted); max-width: 380px; margin: 0 auto 1.5rem; line-height: 1.6; }
.dash-empty__cta {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  padding: 0.8rem 1.5rem;
  border-radius: 100px;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  color: #0a0d12;
  font-size: 0.8rem;
  font-weight: 600;
  box-shadow: 0 8px 24px rgba(0,0,0,0.35), inset 0 1px 0 rgba(255,255,255,0.22);
  transition: all 0.4s var(--ease);
}
.dash-empty__cta:hover { transform: translateY(-2px); box-shadow: 0 14px 36px rgba(0,0,0,0.4), 0 0 24px rgba(117,194,73,0.22); }
.dash-empty__cta svg { width: 14px; height: 14px; transition: transform 0.3s ease; }
.dash-empty__cta:hover svg { transform: translateX(4px); }

/* ── Orders list ── */
.dash-orders { display: flex; flex-direction: column; gap: 0.8rem; }
.dash-order {
  padding: 1.1rem 1.3rem;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  flex-wrap: wrap;
}
.dash-order__main { display: flex; flex-direction: column; gap: 0.3rem; min-width: 0; }
.dash-order__number {
  font-family: "Outfit", sans-serif;
  font-size: 0.8rem;
  font-weight: 700;
  color: var(--text-primary);
  letter-spacing: 0.02em;
}
.dash-order__meta { font-size: 0.72rem; color: var(--text-muted); }
.dash-order__items { font-size: 0.7rem; color: var(--text-quiet); }
.dash-order__right { display: flex; align-items: center; gap: 1.2rem; flex-shrink: 0; }
.dash-order__total {
  font-family: "Outfit", sans-serif;
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--green-light);
  font-variant-numeric: tabular-nums;
}
.dash-order__status {
  display: inline-flex;
  align-items: center;
  padding: 0.3rem 0.7rem;
  border-radius: 50px;
  background: rgba(117,194,73,0.12);
  border: 1px solid rgba(117,194,73,0.3);
  color: var(--green-light);
  font-size: 0.58rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
}

/* ── product grid (shared "rec-card" system, matches recommended-products elsewhere) ── */
.recommended {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.1rem;
}
@media (max-width: 1200px) { .recommended { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 860px)  { .recommended { grid-template-columns: repeat(2, 1fr); gap: 0.85rem; } }
@media (max-width: 480px)  { .recommended { grid-template-columns: 1fr; } }

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
  background-position: center top;
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

@media (max-width: 600px) {
  .rec-card { border-radius: 12px; }
  .rec-card__body { padding: 0.7rem 0.75rem 0.8rem; gap: 0.3rem; }
  .rec-card__meta { font-size: 0.42rem; letter-spacing: 0.16em; }
  .rec-card__name { font-size: 0.78rem; line-height: 1.2; }
  .dash-order { padding: 0.9rem 1rem; }
}
</style>
@endverbatim
