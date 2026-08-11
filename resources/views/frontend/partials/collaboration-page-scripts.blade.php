@verbatim
<style id="cc-collab-faq">
/* FAQ — cloned verbatim from recording-services (rec-faq). Page-local. */
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
.rec-faq__title em {
  font-style: normal;
  background: linear-gradient(135deg, #ffffff 0%, #BBD67A 55%, #75C249 100%);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
}
</style>
<style id="cc-collab-tap-fix">
/* "Apply" was a 17px-tall text link acting as a primary action — give it
   real button tap height without changing its visual weight much */
@media (max-width: 768px) {
  .collab-role-card__apply {
    padding-top: 0.5rem !important; padding-bottom: 0.5rem !important;
    min-height: 32px;
  }
}
</style>
<style id="cc-collab-cards">
/* Role cards — refined glass box (shape B). Page-local (collab only).
   Tag eyebrow above title; open = neutral refractive edge + Apply.
   Closed = dashed + greyed + no Apply. Green kept to system uses only
   (eyebrow + tertiary Apply) to stay inside the green-budget rule. */
.collab-roles .collab-role-card {
  background: rgba(255,255,255,0.025);
  border: 1px solid var(--glass-border);
  border-top-color: rgba(255,255,255,0.10);
  border-radius: 14px;
  padding: 1.25rem 1.35rem 1.15rem;
  overflow-wrap: normal;
}
.collab-roles .collab-role-card__head {
  display: flex; flex-direction: column; align-items: flex-start;
  gap: 0.45rem; margin: 0 0 0.7rem;
}
.collab-roles .collab-role-card__tag {
  align-self: flex-start;
  font-size: 0.5rem; font-weight: 700; letter-spacing: 0.3em;
  text-transform: uppercase; color: var(--green-light);
}
.collab-roles .collab-role-card__title {
  overflow-wrap: normal; word-break: normal; hyphens: none;
  font-size: 1rem; line-height: 1.25;
  min-height: calc(2 * 1.25em);
}
.collab-roles .collab-role-card__body {
  font-size: 0.78rem; line-height: 1.55; margin: 0 0 0.95rem;
}
.collab-roles .collab-role-card--closed {
  border-style: dashed;
  border-color: rgba(255,255,255,0.12);
  opacity: 0.5;
}
.collab-roles .collab-role-card--closed .collab-role-card__tag { color: var(--text-muted); letter-spacing: 0.18em; }
.collab-roles .collab-role-card--closed .collab-role-card__title { color: var(--text-secondary); }

.collab-roles__partner {
  margin: 1.6rem 0 0; font-size: 0.82rem; line-height: 1.6; color: var(--text-muted);
}
.collab-roles__partner a { color: var(--green-light); text-decoration: none; font-weight: 600; }

@media (max-width: 640px) {
  .collab-roles__grid { grid-template-columns: 1fr; grid-auto-rows: auto; gap: 0.7rem; }
  .collab-roles .collab-role-card { height: auto; padding: 1.05rem 1.1rem 0.95rem; }
  .collab-roles .collab-role-card__title { font-size: 0.95rem; }
  .collab-roles .collab-role-card__tag { font-size: 0.5rem; }
}
</style>
<style id="cc-collab-balance">
/* ── Balance pass (page-local, wins by source order) ───────────────────── */

/* 1 · Uniform section rhythm — rely on .main-col gap (5rem/2.5rem); drop the
   stacked per-section margins that made top↔bottom spacing uneven
   (was 72/88/76 mobile, 120/152/128 desktop). */
.collab-hero, .collab-roles, .collab-how { margin-bottom: 0 !important; }

/* 2 · Within roles — equal space before the first group and between groups */
.collab-roles .collab-section-head__sub { margin-bottom: 2.5rem; }
.collab-roles__category { margin: 0 0 2.5rem; }
.collab-roles__category:last-child { margin-bottom: 0; }

/* 3 · Card geometry — symmetric vertical padding (was 1.25 top / 1.15 bottom) */
.collab-roles .collab-role-card { padding: 1.3rem 1.4rem; }

/* 4 · Closed cards — NOT dimmed (engine already greys the form path).
   Solid edge, neutral "Closed" tag is the only signal, no Apply. */
.collab-roles .collab-role-card--closed { border-style: solid; border-color: var(--glass-border); opacity: 1; }
.collab-roles .collab-role-card--closed .collab-role-card__title { color: var(--text-primary); }
.collab-roles .collab-role-card--closed .collab-role-card__tag {
  background: rgba(255,255,255,0.05);
  border-color: rgba(255,255,255,0.16);
  color: var(--text-muted);
}

/* 5 · FAQ header sized to this page's section heads (was smaller).
   Accordion items still match recording-services. */
.rec-faq__title { font-size: clamp(28px, 3vw, 40px); font-weight: 500; letter-spacing: -0.018em; }
.rec-faq__eyebrow { font-size: 0.62rem; letter-spacing: 0.32em; }
@media (max-width: 560px) { .rec-faq__title { font-size: clamp(24px, 6vw, 32px); } }

@media (max-width: 640px) {
  .collab-roles .collab-role-card { padding: 1.1rem 1.15rem; }
}
</style>
<style id="cc-collab-tighten">
/* ── Density pass · tighter type scale + spacing, all devices (page-local) ── */

/* Titles: smaller, tighter leading — closer ratio to body */
.collab-section-head__title,
.rec-faq__title { font-size: clamp(24px, 2.6vw, 31px); line-height: 1.12; }
@media (max-width: 560px) {
  .collab-section-head__title,
  .rec-faq__title { font-size: clamp(21px, 5.6vw, 27px); }
}

/* Descriptions: a touch smaller, tighter leading */
.collab-section-head__sub { font-size: 0.86rem; line-height: 1.5; }
.collab-roles .collab-role-card__body { font-size: 0.75rem; line-height: 1.5; margin: 0 0 0.7rem; }
.rec-faq__a-pad { font-size: 0.81rem; line-height: 1.55; }
.rec-faq__sub { font-size: clamp(0.8rem, 1vw, 0.88rem); line-height: 1.55; }
.collab-how__step-text { font-size: 0.81rem; line-height: 1.55; }

/* Sub-titles brought nearer the body */
.collab-roles .collab-role-card__title { font-size: 0.94rem; line-height: 1.2; }
@media (max-width: 560px) { .collab-roles .collab-role-card__title { font-size: 0.9rem; } }
.collab-how__step-title { font-size: 1.05rem; }
.rec-faq__q { font-size: 0.92rem; }

/* Spacing within roles + cards: tighter */
.collab-roles__category { margin: 0 0 1.9rem; }
.collab-roles__category:last-child { margin-bottom: 0; }
.collab-roles .collab-section-head__sub { margin-bottom: 1.9rem; }
.collab-roles__cat-head { margin: 0 0 1rem; padding-bottom: 0.7rem; }
.collab-roles .collab-role-card { padding: 1.1rem 1.2rem; }
.collab-roles .collab-role-card__head { margin: 0 0 0.5rem; gap: 0.38rem; }

/* FAQ block tighter */
.rec-faq { gap: 1.1rem; }
.rec-faq__head { margin-bottom: 1.8rem; }
.rec-faq__list { gap: 0.5rem; }

/* Hero — tighten title on desktop; pull CTAs up toward the tagline */
@media (min-width: 561px) {
  .collab-hero__title { font-size: clamp(32px, 3.4vw, 42px); line-height: 1.08; }
}
.collab-hero__title { margin-bottom: 1.2rem; }
.collab-hero__tagline { line-height: 1.55; margin-bottom: 1rem; }

@media (max-width: 640px) {
  .collab-roles .collab-role-card { padding: 0.95rem 1.05rem; }
}
</style>
<style id="cc-collab-flat">
/* ── Neutralise role cards → flat index (option A). Page-local, last. ──
   No glass box; hairline row dividers; tag is a plain eyebrow, not a pill. */
.collab-roles__grid { gap: 0 2.2rem; }

.collab-roles .collab-role-card {
  background: transparent;
  border: 0;
  border-top: 1px solid rgba(255,255,255,0.09);
  border-radius: 0;
  padding: 1.05rem 0 1.1rem;
  box-shadow: none;
}
.collab-roles .collab-role-card:hover {
  background: transparent;
  transform: none;
  box-shadow: none;
  border-color: transparent;
  border-top-color: rgba(255,255,255,0.2);
}

/* tag → plain green eyebrow (drop pill bg/border/padding) */
.collab-roles .collab-role-card__tag {
  background: transparent;
  border: 0;
  padding: 0;
}

/* group header → no underline; the row hairlines carry the structure */
.collab-roles__cat-head { border-bottom: 0; padding-bottom: 0; margin-bottom: 0.4rem; }

/* single-item group (Reach) spans full width so its hairline is full-width */
.collab-roles__category:last-child .collab-roles__grid { grid-template-columns: 1fr; }

/* closed row stays flat; neutral muted eyebrow */
.collab-roles .collab-role-card--closed { border-top-color: rgba(255,255,255,0.09); }
.collab-roles .collab-role-card--closed .collab-role-card__tag { background: transparent; border: 0; color: var(--text-muted); }
</style>
<style id="cc-collab-readable">
/* ── Flat-index readability (page-local, last) ──
   Title anchors each row; body legible; dividers clearer.
   Drop the per-card group eyebrow (redundant under the group header);
   keep the "Closed" status marker. */
.collab-roles .collab-role-card:not(.collab-role-card--closed) .collab-role-card__tag { display: none; }

.collab-roles .collab-role-card { border-top-color: rgba(255,255,255,0.13); padding: 1.2rem 0 1.25rem; }
.collab-roles .collab-role-card--closed { border-top-color: rgba(255,255,255,0.13); }
.collab-roles .collab-role-card__head { margin-bottom: 0.5rem; }

.collab-roles .collab-role-card__title { font-size: 1.05rem; line-height: 1.25; }
@media (max-width: 560px) { .collab-roles .collab-role-card__title { font-size: 1rem; } }

.collab-roles .collab-role-card__body {
  font-size: 0.8rem; line-height: 1.6; color: rgba(255,255,255,0.72); margin: 0 0 0.85rem;
}

@media (max-width: 640px) { .collab-roles .collab-role-card { padding: 1.05rem 0 1.1rem; } }
</style>
<style id="cc-collab-anchor">
/* ── Per-entry anchor for the flat index (page-local, last) ──
   Open rows get a small green rule (same device as the section eyebrow);
   closed rows keep the CLOSED label. Titles lead; dividers firmer. */
.collab-roles .collab-role-card:not(.collab-role-card--closed) .collab-role-card__head::before {
  content: "";
  display: block;
  width: 22px;
  height: 2px;
  background: linear-gradient(90deg, var(--green-primary), transparent);
  margin-bottom: 0.75rem;
}
.collab-roles .collab-role-card { border-top-color: rgba(255,255,255,0.14); padding: 1.35rem 0; }
.collab-roles .collab-role-card--closed { border-top-color: rgba(255,255,255,0.14); }
.collab-roles .collab-role-card__head { margin-bottom: 0.5rem; }
.collab-roles .collab-role-card__title { font-size: 1.1rem; }
@media (max-width: 560px) { .collab-roles .collab-role-card__title { font-size: 1.02rem; } }
@media (max-width: 640px) { .collab-roles .collab-role-card { padding: 1.15rem 0; } }
</style>
<style id="cc-collab-bands">
/* ── Soft alternating backgrounds → subtle pattern, easy to read ──
   No borders / shadows / hover-lift (not product cards); neutral tints only. */
.collab-roles .collab-role-card {
  border-top: 0;
  border-radius: 7px;
  padding: 1rem 1.15rem 1.05rem;
  background: rgba(255,255,255,0.016);
}
/* bands replace the per-entry green tick */
.collab-roles .collab-role-card:not(.collab-role-card--closed) .collab-role-card__head::before { content: none; }
.collab-roles__grid { gap: 0.5rem 1rem; }

/* desktop (2-col): band whole rows — top row of each group filled */
.collab-roles__grid > .collab-role-card:nth-child(4n/**/+1),
.collab-roles__grid > .collab-role-card:nth-child(4n/**/+2) { background: rgba(255,255,255,0.045); }

/* single-item group (Reach) gets a band */
.collab-roles__category:last-child .collab-role-card { background: rgba(255,255,255,0.045); }

/* mobile (1-col): classic zebra */
@media (max-width: 640px) {
  .collab-roles__grid > .collab-role-card { background: rgba(255,255,255,0.016); }
  .collab-roles__grid > .collab-role-card:nth-child(odd) { background: rgba(255,255,255,0.045); }
  .collab-roles .collab-role-card { padding: 0.95rem 1.05rem 1rem; }
}
</style>
<style id="cc-collab-uniform">
/* Every role card = identical surface; no hover state (flat list rows). */
.collab-roles .collab-role-card,
.collab-roles__grid > .collab-role-card:nth-child(4n/**/+1),
.collab-roles__grid > .collab-role-card:nth-child(4n/**/+2),
.collab-roles__category:last-child .collab-role-card,
.collab-roles .collab-role-card:hover {
  background: rgba(255,255,255,0.03);
}
.collab-roles .collab-role-card:hover { transform: none; box-shadow: none; border-color: transparent; }
@media (max-width: 640px) {
  .collab-roles__grid > .collab-role-card,
  .collab-roles__grid > .collab-role-card:nth-child(odd),
  .collab-roles__grid > .collab-role-card:hover { background: rgba(255,255,255,0.03); }
}
</style>
<style id="cc-collab-hero-m">
/* Hide the hero eyebrow on mobile; wrapper removal reclaims its margin (no gap). */
@media (max-width: 640px) {
  .collab-hero__section-head { display: none; }
}
</style>








<script>
/* collab page-local: role-card "Apply" links → scroll to the enquiry form (#apply).
   Their hrefs were per-programme anchors (#apply-composers, …) that don't exist,
   so a native click jumped nowhere. Route to the form; Lenis on Chrome (KNOWN
   scroll rule — window.__lenis.scrollTo, not window.scrollTo), native elsewhere. */
(function () {
  function go(e) {
    var t = document.getElementById('apply');
    if (!t) return;                       /* no form on page → leave default */
    e.preventDefault();
    if (window.__lenis && typeof window.__lenis.scrollTo === 'function')
      window.__lenis.scrollTo(t, { offset: -84 });
    else
      t.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
  function bind() {
    document.querySelectorAll('.collab-role-card__apply').forEach(function (a) {
      if (a.__ccApplyBound) return;        /* idempotent */
      a.__ccApplyBound = true;
      a.addEventListener('click', go);
    });
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', bind);
  else bind();
})();
</script>
<script>
/* collab FAQ accordion — matched to recording-services rec-faq */
/* ── FAQ accordion (single-open optional; here multi-open) ── */
(function() {
  const items = document.querySelectorAll('.rec-faq__item');
  items.forEach(item => {
    const btn = item.querySelector('.rec-faq__q');
    if (!btn) return;
    btn.addEventListener('click', () => {
      const isOpen = item.classList.toggle('expanded');
      btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
  });
})();
</script>
@endverbatim
