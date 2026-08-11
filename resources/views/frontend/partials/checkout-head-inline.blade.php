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
   CHECKOUT PAGE
   ═══════════════════════════════════════════════════════════════ */
.checkout-main {
  position: relative;
  z-index: 2;
  max-width: 1280px;
  margin: 0 auto;
  padding: 10rem 3rem 6rem;
}
@media (max-width: 1024px) { .checkout-main { padding: 7rem 1.5rem 4rem; } }
@media (max-width: 560px)  { .checkout-main { padding: 6.5rem 1.1rem 3rem; } }

.checkout-head { margin-bottom: 2rem; }
.checkout-title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.9rem, 4vw, 2.7rem);
  font-weight: 900;
  line-height: 1.1;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0.7rem 0 0.5rem;
}
.checkout-sub {
  font-size: 0.82rem;
  font-weight: 300;
  color: var(--text-muted);
}

/* ── step indicator ── */
.checkout-steps {
  display: flex;
  align-items: center;
  gap: 0.6rem;
  margin-bottom: 2.5rem;
  font-size: 0.68rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  color: var(--text-quiet);
}
.checkout-steps__step { display: flex; align-items: center; gap: 0.5rem; }
.checkout-steps__step.is-active,
.checkout-steps__step.is-done { color: var(--green-light); }
.checkout-steps__dot {
  width: 18px; height: 18px;
  border-radius: 50%;
  border: 1px solid currentColor;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.6rem;
}
.checkout-steps__step.is-done .checkout-steps__dot { background: var(--green-light); color: #0a0d12; border-color: var(--green-light); }
.checkout-steps__sep { width: 24px; height: 1px; background: var(--glass-border); }

.checkout-layout {
  display: grid;
  grid-template-columns: 1fr 380px;
  gap: 2rem;
  align-items: start;
}
@media (max-width: 960px) { .checkout-layout { grid-template-columns: 1fr; } }

/* ── form ── */
.checkout-form { display: flex; flex-direction: column; gap: 1.75rem; }
.checkout-section { padding: 1.6rem 1.7rem; border-radius: 16px; }
.checkout-section__title {
  display: flex;
  align-items: center;
  gap: 0.6rem;
  font-family: "Playfair Display", serif;
  font-size: 1.05rem;
  font-weight: 800;
  color: var(--text-primary);
  margin-bottom: 1.3rem;
}
.checkout-section__num {
  width: 22px; height: 22px;
  border-radius: 50%;
  background: rgba(117,194,73,0.14);
  color: var(--green-light);
  font-size: 0.68rem;
  font-weight: 700;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}

.checkout-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.1rem 1rem; }
@media (max-width: 560px) { .checkout-grid { grid-template-columns: 1fr; } }
.checkout-grid > .span-2 { grid-column: 1 / -1; }

.checkout-field { display: flex; flex-direction: column; gap: 0.5rem; }
.checkout-field label {
  font-size: 0.66rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--text-secondary);
}
.checkout-field input,
.checkout-field select {
  width: 100%;
  background: rgba(255,255,255,0.03);
  border: 1px solid var(--glass-border);
  border-radius: 10px;
  padding: 0.8rem 0.95rem;
  color: var(--text-primary);
  font-family: "Outfit", sans-serif;
  font-size: 0.82rem;
  transition: border-color 0.3s var(--ease), background 0.3s var(--ease);
}
.checkout-field select {
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23BBD67A' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 0.85rem center;
  background-size: 13px;
  padding-right: 2.2rem;
}
.checkout-field input::placeholder { color: var(--text-quiet); }
.checkout-field input:focus,
.checkout-field select:focus {
  outline: none;
  border-color: rgba(117,194,73,0.45);
  background: rgba(255,255,255,0.05);
}
.checkout-field input.is-invalid,
.checkout-field select.is-invalid { border-color: rgba(229,131,122,0.55); }
.checkout-error { font-size: 0.68rem; color: var(--error); }

/* ── payment method cards ── */
.payment-methods {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0.85rem;
}
@media (max-width: 560px) { .payment-methods { grid-template-columns: 1fr; } }

.payment-method {
  position: relative;
  display: flex;
  align-items: center;
  gap: 0.8rem;
  padding: 0.9rem 1rem;
  border-radius: 12px;
  border: 1px solid var(--glass-border);
  background: rgba(255,255,255,0.02);
  cursor: pointer;
  transition: all 0.3s var(--ease);
}
.payment-method:hover { border-color: rgba(117,194,73,0.25); background: rgba(117,194,73,0.03); }
.payment-method input { position: absolute; opacity: 0; pointer-events: none; }
.payment-method__icon {
  width: 36px; height: 36px;
  border-radius: 9px;
  background: rgba(117,194,73,0.08);
  color: var(--green-light);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.payment-method__icon svg { width: 18px; height: 18px; }
.payment-method__label { font-size: 0.8rem; font-weight: 600; color: var(--text-primary); }
.payment-method__sub { font-size: 0.66rem; color: var(--text-muted); margin-top: 0.1rem; }
.payment-method__check {
  margin-left: auto;
  width: 18px; height: 18px;
  border-radius: 50%;
  border: 1px solid var(--glass-border-hover);
  flex-shrink: 0;
  transition: all 0.25s var(--ease);
}
.payment-method.is-selected {
  border-color: var(--green-light);
  background: rgba(117,194,73,0.08);
  box-shadow: 0 0 0 1px rgba(117,194,73,0.25);
}
.payment-method.is-selected .payment-method__check {
  border-color: var(--green-light);
  background: var(--green-light);
  box-shadow: inset 0 0 0 3px var(--bg-deep);
}

.checkout-submit {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.6rem;
  width: 100%;
  padding: 1.05rem 1.5rem;
  border-radius: 100px;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  color: #0a0d12;
  font-size: 0.86rem;
  font-weight: 600;
  box-shadow: 0 8px 24px rgba(0,0,0, 0.35), inset 0 1px 0 rgba(255,255,255, 0.22);
  transition: all 0.4s var(--ease);
}
.checkout-submit:hover { transform: translateY(-2px); box-shadow: 0 14px 36px rgba(0,0,0, 0.4), 0 0 24px rgba(117,194,73, 0.22); }
.checkout-submit:disabled { opacity: 0.6; cursor: wait; transform: none; }
.checkout-submit svg { width: 15px; height: 15px; transition: transform 0.3s ease; }
.checkout-submit:hover svg { transform: translateX(4px); }

.checkout-secure-note {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.4rem;
  font-size: 0.68rem;
  color: var(--text-quiet);
  margin-top: 0.9rem;
}
.checkout-secure-note svg { width: 12px; height: 12px; }

/* ── order summary (sticky sidebar, shared look with cart) ── */
.checkout-summary {
  position: sticky;
  top: 7rem;
  padding: 1.6rem 1.6rem 1.8rem;
  border-radius: 18px;
}
.checkout-summary__title {
  font-family: "Playfair Display", serif;
  font-size: 1.05rem;
  font-weight: 800;
  color: var(--text-primary);
  margin-bottom: 1.2rem;
}
.checkout-summary__items {
  display: flex;
  flex-direction: column;
  gap: 0.9rem;
  margin-bottom: 1.2rem;
  padding-bottom: 1.2rem;
  border-bottom: 1px solid var(--glass-border);
  max-height: 320px;
  overflow-y: auto;
}
.checkout-summary__item {
  display: flex;
  align-items: center;
  gap: 0.7rem;
}
.checkout-summary__item-thumb {
  width: 46px; height: 46px;
  border-radius: 8px;
  overflow: hidden;
  flex-shrink: 0;
  background: rgba(255,255,255,0.03);
  position: relative;
}
.checkout-summary__item-thumb img { width: 100%; height: 100%; object-fit: cover; }
.checkout-summary__item-qty {
  position: absolute;
  top: -6px; right: -6px;
  min-width: 16px; height: 16px;
  padding: 0 3px;
  border-radius: 50%;
  background: var(--green-primary);
  color: #0a0d12;
  font-size: 0.56rem;
  font-weight: 700;
  display: flex; align-items: center; justify-content: center;
}
.checkout-summary__item-body { min-width: 0; flex: 1; }
.checkout-summary__item-name {
  font-size: 0.76rem;
  font-weight: 600;
  color: var(--text-primary);
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.checkout-summary__item-edition { font-size: 0.62rem; color: var(--text-muted); }
.checkout-summary__item-price {
  font-size: 0.76rem;
  font-weight: 700;
  color: var(--text-secondary);
  font-variant-numeric: tabular-nums;
  white-space: nowrap;
}

.checkout-summary__row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 0.78rem;
  color: var(--text-muted);
  padding: 0.4rem 0;
}
.checkout-summary__row span:last-child { color: var(--text-secondary); font-variant-numeric: tabular-nums; }
.checkout-summary__total {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  margin-top: 0.6rem;
  padding-top: 1rem;
  border-top: 1px solid var(--glass-border);
}
.checkout-summary__total-label {
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--text-secondary);
}
.checkout-summary__total-value {
  font-family: "Playfair Display", serif;
  font-size: 1.55rem;
  font-weight: 900;
  color: var(--text-primary);
  font-variant-numeric: tabular-nums;
}
</style>
@endverbatim
