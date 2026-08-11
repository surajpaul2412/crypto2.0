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

  /* Layout */
  --side-index-w: 340px;

  /* Section rhythm */
  --section-gap-desktop: 4rem;
  --section-gap-tablet: 3rem;
  --section-gap-mobile: 2.5rem;

  /* Page padding (top accounts for floating nav) */
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
   LOGIN PAGE
   ═══════════════════════════════════════════════════════════════ */
.login-section {
  position: relative;
  z-index: 2;
  padding: 3rem 1.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
}
@media (max-width: 768px) {
  .login-section { padding: 2rem 1.1rem; }
}

.login-wrap {
  width: 100%;
  max-width: 440px;
}

.login-card {
  padding: 2.75rem 2.5rem;
  border-radius: 22px;
  background: linear-gradient(135deg, rgba(15,20,28,0.85), rgba(8,12,18,0.85));
  border: 1px solid rgba(255,255,255, 0.06);
  border-top-color: rgba(255,255,255, 0.10);
  box-shadow: 0 24px 60px rgba(0,0,0,0.45), inset 0 1px 0 rgba(255,255,255,0.04);
}
.login-card::before {
  content: "";
  position: absolute;
  inset: -1px;
  border-radius: inherit;
  background: linear-gradient(160deg, rgba(90,160,70,0.12) 0%, transparent 30%, transparent 70%, rgba(75,145,65,0.08) 100%);
  z-index: -1;
  pointer-events: none;
}
@media (max-width: 480px) {
  .login-card { padding: 2rem 1.5rem; border-radius: 18px; }
}

.login-head { margin-bottom: 2rem; }
.login-title {
  font-family: "Playfair Display", serif;
  font-size: clamp(1.8rem, 4vw, 2.2rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.01em;
  color: var(--text-primary);
  margin: 0.7rem 0 0.6rem;
}
.login-sub {
  font-size: 0.82rem;
  font-weight: 300;
  line-height: 1.6;
  color: var(--text-muted);
}

.login-status {
  display: flex;
  align-items: flex-start;
  gap: 0.6rem;
  background: rgba(117,194,73,0.08);
  border: 1px solid rgba(117,194,73,0.25);
  color: var(--green-light);
  padding: 0.8rem 1rem;
  border-radius: 10px;
  font-size: 0.76rem;
  line-height: 1.5;
  margin-bottom: 1.75rem;
}

.login-form {
  display: flex;
  flex-direction: column;
  gap: 1.35rem;
}
.login-field { display: flex; flex-direction: column; gap: 0.55rem; }
.login-field label {
  font-size: 0.66rem;
  font-weight: 600;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--text-secondary);
}
.login-field input[type="email"],
.login-field input[type="password"],
.login-field input[type="text"] {
  width: 100%;
  background: rgba(255,255,255,0.03);
  border: 1px solid var(--glass-border);
  border-radius: 10px;
  padding: 0.85rem 1rem;
  color: var(--text-primary);
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  transition: border-color 0.3s var(--ease), background 0.3s var(--ease);
}
.login-field input::placeholder { color: var(--text-quiet); }
.login-field input:focus {
  outline: none;
  border-color: rgba(117,194,73,0.45);
  background: rgba(255,255,255,0.05);
}
.login-field input.is-invalid { border-color: rgba(229,131,122,0.55); }

.login-error {
  font-size: 0.7rem;
  font-weight: 400;
  color: var(--error);
  line-height: 1.5;
}

.login-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  flex-wrap: wrap;
  font-size: 0.76rem;
}
.login-remember {
  display: flex;
  align-items: center;
  gap: 0.55rem;
  color: var(--text-muted);
  cursor: pointer;
}
.login-remember input[type="checkbox"] {
  width: 15px;
  height: 15px;
  accent-color: var(--green-primary);
  cursor: pointer;
}
.login-forgot {
  color: var(--text-secondary);
  text-decoration: underline;
  text-decoration-color: rgba(117,194,73,0.3);
  text-underline-offset: 3px;
  transition: color 0.25s ease;
}
.login-forgot:hover { color: var(--green-light); }

.login-submit {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.6rem;
  width: 100%;
  padding: 1rem 1.5rem;
  border-radius: 100px;
  background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
  border: none;
  color: #0a0d12;
  font-family: "Outfit", sans-serif;
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: -0.01em;
  cursor: pointer;
  box-shadow: 0 8px 24px rgba(0,0,0, 0.35), inset 0 1px 0 rgba(255,255,255, 0.22);
  transition: all 0.4s var(--ease);
  margin-top: 0.4rem;
}
.login-submit:hover {
  transform: translateY(-2px);
  box-shadow: 0 14px 36px rgba(0,0,0, 0.4), 0 0 24px rgba(117,194,73, 0.22), inset 0 1px 0 rgba(255,255,255, 0.25);
}
.login-submit:active { transform: translateY(0); }
.login-submit svg { width: 16px; height: 16px; transition: transform 0.3s ease; }
.login-submit:hover svg { transform: translateX(4px); }

.login-footer-link {
  text-align: center;
  font-size: 0.8rem;
  font-weight: 300;
  color: var(--text-muted);
  margin-top: 2rem;
  padding-top: 1.6rem;
  border-top: 1px solid var(--glass-border);
}
.login-footer-link a {
  color: var(--green-light);
  font-weight: 600;
  text-decoration: none;
}
.login-footer-link a:hover { text-decoration: underline; }
</style>
@endverbatim
