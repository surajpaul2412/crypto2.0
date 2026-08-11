@verbatim
<!-- Search engine verification — HUMAN: paste tokens from GSC + Bing -->
<meta name="google-site-verification" content="REPLACE_GSC_TOKEN">
<meta name="msvalidate.01" content="REPLACE_BING_TOKEN">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Outfit:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<link rel="preload" href="assets/img/logo.svg" as="image" type="image/svg+xml">

<style>
/* Critical: park skip-link before first paint (FOUC). */
.skip-link { position: absolute; left: 12px; top: -56px; z-index: 10000; }

/* ═══ SHARED · tokens + reset + cosmic-bg (canonical, matches every page) ═══ */
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

  --text-primary: #ffffff;
  --text-secondary: rgba(255,255,255,0.65);
  --text-muted: rgba(255,255,255,0.45);
  --text-quiet: rgba(255,255,255,0.3);
  --text-whisper: rgba(255,255,255,0.15);

  --glass-bg: rgba(255,255,255,0.04);
  --glass-bg-hover: rgba(255,255,255,0.08);
  --glass-border: rgba(255,255,255,0.05);
  --glass-border-hover: rgba(255,255,255,0.08);

  --card-bg: rgba(8, 12, 18, 0.65);
  --card-bg-tint: linear-gradient(160deg, rgba(255,255,255, 0.025) 0%, rgba(255,255,255, 0.01) 60%);
  --card-border: rgba(255,255,255, 0.07);

  --amber-glow: rgba(180,140,50,0.03);
  --warning: #d4b56e;
  --error: #e5837a;

  --ease: cubic-bezier(0.22, 1, 0.36, 1);

  --side-index-w: 340px;

  --section-gap-desktop: 4rem;
  --section-gap-tablet: 3rem;
  --section-gap-mobile: 2.5rem;

  --page-pad-top: 10rem;
  --page-pad-x-desktop: 3rem;
  --page-pad-x-mobile: 1.25rem;
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

/* ═══ COSMIC BG ═══ */
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

/* ═══ CARD BASE ═══ */
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
   CART PAGE
   ═══════════════════════════════════════════════════════════════ */
.cart-main {
  position: relative;
  z-index: 2;
  max-width: 1280px;
  margin: 0 auto;
  padding: 10rem 3rem 6rem;
}
@media (max-width: 1024px) { .cart-main { padding: 7rem 1.5rem 4rem; } }
@media (max-width: 560px)  { .cart-main { padding: 6.5rem 1.1rem 3rem; } }

.cart-head { margin-bottom: 2.5rem; }
.cart-title {
  font-family: "Playfair Display", serif;
  font-size: clamp(2rem, 4.2vw, 3rem);
  font-weight: 900;
  line-height: 1.1;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0.7rem 0 0.6rem;
}
.cart-sub {
  font-size: 0.85rem;
  font-weight: 300;
  color: var(--text-muted);
  max-width: 560px;
  line-height: 1.6;
}

.cart-status {
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

.cart-empty {
  padding: 4rem 2rem;
  text-align: center;
  border-radius: 20px;
}
.cart-empty__icon {
  width: 52px;
  height: 52px;
  margin: 0 auto 1.4rem;
  color: var(--text-quiet);
}
.cart-empty__icon svg { width: 100%; height: 100%; }
.cart-empty__title {
  font-family: "Playfair Display", serif;
  font-size: 1.5rem;
  font-weight: 800;
  color: var(--text-primary);
  margin: 0 0 0.6rem;
}
.cart-empty__sub {
  font-size: 0.82rem;
  color: var(--text-muted);
  max-width: 380px;
  margin: 0 auto 1.8rem;
  line-height: 1.6;
}
.cart-empty__cta {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  padding: 0.85rem 1.6rem;
  border-radius: 100px;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  color: #0a0d12;
  font-size: 0.82rem;
  font-weight: 600;
  box-shadow: 0 8px 24px rgba(0,0,0,0.35), inset 0 1px 0 rgba(255,255,255,0.22);
  transition: all 0.4s var(--ease);
}
.cart-empty__cta:hover { transform: translateY(-2px); box-shadow: 0 14px 36px rgba(0,0,0,0.4), 0 0 24px rgba(117,194,73,0.22); }
.cart-empty__cta svg { width: 15px; height: 15px; transition: transform 0.3s ease; }
.cart-empty__cta:hover svg { transform: translateX(4px); }

/* ── layout: item list + sticky summary ── */
.cart-layout {
  display: grid;
  grid-template-columns: 1fr 360px;
  gap: 2rem;
  align-items: start;
}
@media (max-width: 960px) {
  .cart-layout { grid-template-columns: 1fr; }
}

.cart-list {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.cart-item {
  display: grid;
  grid-template-columns: 92px 1fr auto;
  gap: 1.2rem;
  align-items: center;
  padding: 1.1rem;
  border-radius: 16px;
  transition: opacity 0.32s var(--ease), transform 0.32s var(--ease);
}
.cart-item.is-removing {
  opacity: 0;
  transform: scale(0.96) translateX(8px);
  pointer-events: none;
}
.cart-item__thumb {
  width: 92px;
  height: 92px;
  border-radius: 10px;
  overflow: hidden;
  background: rgba(255,255,255,0.03);
  flex-shrink: 0;
}
.cart-item__thumb img { width: 100%; height: 100%; object-fit: cover; }

.cart-item__body {
  min-width: 0;
  display: flex;
  flex-direction: column;
  gap: 0.35rem;
}
.cart-item__name {
  font-family: "Playfair Display", serif;
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--text-primary);
  line-height: 1.25;
}
.cart-item__name a:hover { color: var(--green-light); }
.cart-item__edition {
  font-size: 0.66rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--green-light);
}
.cart-item__price {
  font-size: 0.76rem;
  color: var(--text-muted);
  font-variant-numeric: tabular-nums;
}

.cart-item__aside {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 0.7rem;
}
.cart-item__line-total {
  font-family: "Playfair Display", serif;
  font-size: 1.05rem;
  font-weight: 800;
  color: var(--text-primary);
  font-variant-numeric: tabular-nums;
  white-space: nowrap;
}

.cart-qty {
  display: inline-flex;
  align-items: center;
  border: 1px solid var(--glass-border);
  border-radius: 8px;
  overflow: hidden;
}
.cart-qty__btn {
  width: 26px;
  height: 26px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-secondary);
  font-size: 0.9rem;
  transition: background 0.25s ease, color 0.25s ease;
}
.cart-qty__btn:hover { background: rgba(117,194,73,0.12); color: var(--green-light); }
.cart-qty__btn:disabled { opacity: 0.3; cursor: not-allowed; }
.cart-qty__input {
  width: 34px;
  height: 26px;
  border: none;
  border-left: 1px solid var(--glass-border);
  border-right: 1px solid var(--glass-border);
  background: transparent;
  color: var(--text-primary);
  text-align: center;
  font-size: 0.76rem;
  font-variant-numeric: tabular-nums;
}
.cart-qty__input::-webkit-outer-spin-button,
.cart-qty__input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }

.cart-item__remove {
  display: inline-flex;
  align-items: center;
  gap: 0.3rem;
  font-size: 0.68rem;
  color: var(--text-quiet);
  transition: color 0.25s ease;
}
.cart-item__remove:hover { color: var(--error); }
.cart-item__remove svg { width: 12px; height: 12px; }

@media (max-width: 560px) {
  .cart-item { grid-template-columns: 64px 1fr; grid-template-areas: "thumb body" "aside aside"; }
  .cart-item__thumb { width: 64px; height: 64px; grid-area: thumb; }
  .cart-item__body { grid-area: body; }
  .cart-item__aside { grid-area: aside; flex-direction: row; align-items: center; justify-content: space-between; margin-top: 0.6rem; }
}

/* ── order summary (sticky sidebar) ── */
.cart-summary {
  position: sticky;
  top: 7rem;
  padding: 1.6rem 1.6rem 1.8rem;
  border-radius: 18px;
}
.cart-summary__title {
  font-family: "Playfair Display", serif;
  font-size: 1.1rem;
  font-weight: 800;
  color: var(--text-primary);
  margin-bottom: 1.2rem;
}
.cart-summary__row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 0.78rem;
  color: var(--text-muted);
  padding: 0.55rem 0;
}
.cart-summary__row span:last-child { color: var(--text-secondary); font-variant-numeric: tabular-nums; }
.cart-summary__divider { height: 1px; background: var(--glass-border); margin: 0.6rem 0 1rem; }
.cart-summary__total {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  margin-bottom: 1.4rem;
}
.cart-summary__total-label {
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--text-secondary);
}
.cart-summary__total-value {
  font-family: "Playfair Display", serif;
  font-size: 1.7rem;
  font-weight: 900;
  color: var(--text-primary);
  font-variant-numeric: tabular-nums;
}
.cart-summary__cta {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.6rem;
  width: 100%;
  padding: 1rem 1.5rem;
  border-radius: 100px;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  color: #0a0d12;
  font-size: 0.85rem;
  font-weight: 600;
  box-shadow: 0 8px 24px rgba(0,0,0, 0.35), inset 0 1px 0 rgba(255,255,255, 0.22);
  transition: all 0.4s var(--ease);
}
.cart-summary__cta:hover { transform: translateY(-2px); box-shadow: 0 14px 36px rgba(0,0,0, 0.4), 0 0 24px rgba(117,194,73, 0.22); }
.cart-summary__cta svg { width: 15px; height: 15px; transition: transform 0.3s ease; }
.cart-summary__cta:hover svg { transform: translateX(4px); }

.cart-summary__trust {
  margin-top: 1.4rem;
  padding-top: 1.2rem;
  border-top: 1px solid var(--glass-border);
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
}
.cart-summary__trust-item {
  display: flex;
  align-items: center;
  gap: 0.55rem;
  font-size: 0.7rem;
  color: var(--text-muted);
}
.cart-summary__trust-item svg { width: 14px; height: 14px; color: var(--green-light); flex-shrink: 0; }

.cart-continue {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  margin-top: 1.6rem;
  font-size: 0.76rem;
  color: var(--text-muted);
  transition: color 0.25s ease;
}
.cart-continue:hover { color: var(--green-light); }
.cart-continue svg { width: 13px; height: 13px; transform: rotate(180deg); }
</style>
@endverbatim
