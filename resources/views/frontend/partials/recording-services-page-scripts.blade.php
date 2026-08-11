@verbatim
<!-- ═══════════════════════════════════════════════════════════════
     RECSVC-FORM-001 v1 LOCKED · Request Session Modal
     Trigger: any [data-action="open-form" data-open-booking] button
     ═══════════════════════════════════════════════════════════════ -->
<div class="rec-modal" id="rec-modal" data-open="false" role="dialog" aria-modal="true" aria-labelledby="rec-modal-title" aria-hidden="true">
  <div class="rec-modal__backdrop" data-close-modal></div>
  <div class="rec-modal__inner">

    <header class="rec-modal__header">
      <div class="rec-modal__title-block">
        <h2 class="rec-modal__title" id="rec-modal-title">Request a session</h2>
        <p class="rec-modal__subtitle">Reply within 24 hours · NDA-friendly</p>
      </div>
      <button class="rec-modal__close" data-close-modal aria-label="Close">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </header>

    <div class="rec-modal__body">
      <form class="rec-form" id="rec-form" data-nda="false" novalidate>

        <!-- NDA toggle -->
        <div class="rec-form__nda">
          <div class="rec-form__nda-text">
            <div class="rec-form__nda-label">
              <svg class="rec-form__nda-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              I'm under NDA
            </div>
            <div class="rec-form__nda-desc">Skip project name · we'll request NDA before details</div>
          </div>
          <button type="button" class="rec-form__toggle" id="rec-form-nda-toggle" data-on="false" aria-label="Toggle NDA"></button>
        </div>

        <!-- GROUP 1 — Your Details -->
        <div class="rec-form__group">
          <div class="rec-form__group-label"><span class="rec-form__group-label-num">01</span>Your details</div>
          <div class="rec-form__row">
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-name">Full name</label>
              <input class="rec-form__input" id="rf-name" type="text" autocomplete="name" placeholder="Jane Composer" required>
            </div>
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-email">Email</label>
              <input class="rec-form__input" id="rf-email" type="email" autocomplete="email" inputmode="email" placeholder="jane@studio.com" required>
            </div>
          </div>
          <div class="rec-form__row">
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-studio">Studio · Company <span class="rec-form__label-optional">(optional)</span></label>
              <input class="rec-form__input" id="rf-studio" type="text" placeholder="e.g. Hans Zimmer Music">
            </div>
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-role">Role</label>
              <select class="rec-form__select" id="rf-role" required>
                <option value="">Select...</option>
                <option>Composer</option>
                <option>Sound Designer</option>
                <option>Director</option>
                <option>Producer</option>
                <option>Music Supervisor</option>
                <option>Other</option>
              </select>
            </div>
          </div>
          <div class="rec-form__row">
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-country">Country</label>
              <input class="rec-form__input" id="rf-country" type="text" autocomplete="country-name" placeholder="United Kingdom">
            </div>
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-tz">Time zone</label>
              <select class="rec-form__select" id="rf-tz">
                <option value="">Select...</option>
                <option>PST · UTC -8</option>
                <option>EST · UTC -5</option>
                <option>GMT · UTC ±0</option>
                <option>CET · UTC +1</option>
                <option>IST · UTC +5:30</option>
                <option>JST · UTC +9</option>
                <option>AEST · UTC +10</option>
                <option>Other</option>
              </select>
            </div>
          </div>
        </div>

        <!-- GROUP 2 — Project Context -->
        <div class="rec-form__group">
          <div class="rec-form__group-label"><span class="rec-form__group-label-num">02</span>Project context</div>
          <div class="rec-form__row">
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-ptype">Project type</label>
              <select class="rec-form__select" id="rf-ptype" required>
                <option value="">Select...</option>
                <option>Film</option>
                <option>Game</option>
                <option>OTT / Streaming</option>
                <option>Trailer</option>
                <option>Advertisement</option>
                <option>Album / Record</option>
                <option>Other</option>
              </select>
            </div>
            <div class="rec-form__field rec-form__field--nda-hide">
              <label class="rec-form__label" for="rf-pname">Project name <span class="rec-form__label-optional">(optional)</span></label>
              <input class="rec-form__input" id="rf-pname" type="text" placeholder="e.g. The Last Monsoon">
            </div>
          </div>
          <div class="rec-form__row">
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-distro">Distribution</label>
              <select class="rec-form__select" id="rf-distro">
                <option value="">Select...</option>
                <option>Regional</option>
                <option>Global</option>
                <option>Streaming</option>
                <option>Festival circuit</option>
                <option>Internal / Demo</option>
              </select>
            </div>
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-stage">Production stage</label>
              <select class="rec-form__select" id="rf-stage">
                <option value="">Select...</option>
                <option>Pre-production</option>
                <option>Score / Music</option>
                <option>Post-production</option>
              </select>
            </div>
          </div>
        </div>

        <!-- GROUP 3 — Musical Brief -->
        <div class="rec-form__group">
          <div class="rec-form__group-label"><span class="rec-form__group-label-num">03</span>Musical brief</div>
          <div class="rec-form__field">
            <label class="rec-form__label" for="rf-instrs">Instrument(s) needed</label>
            <input class="rec-form__input" id="rf-instrs" type="text" placeholder="e.g. Sarangi, Tabla, Hindustani Vocals" required>
          </div>
          <div class="rec-form__row--3" style="display: grid; gap: 0.75rem; grid-template-columns: 1fr 1fr 1fr;">
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-bpm">Tempo · BPM</label>
              <input class="rec-form__input" id="rf-bpm" type="text" inputmode="numeric" placeholder="92">
            </div>
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-key">Key · Scale <span class="rec-form__label-optional">(optional)</span></label>
              <input class="rec-form__input" id="rf-key" type="text" placeholder="e.g. D minor / Raga Bhairav">
            </div>
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-mood">Mood</label>
              <input class="rec-form__input" id="rf-mood" type="text" placeholder="Solemn, ritual, building">
            </div>
          </div>
          <div class="rec-form__field">
            <label class="rec-form__label" for="rf-brief">Detailed brief</label>
            <textarea class="rec-form__textarea" id="rf-brief" placeholder="Phrasing notes, articulations, role in the cue, what the player should land on, what to avoid..." required></textarea>
          </div>
        </div>

        <!-- GROUP 4 — Reference Links -->
        <div class="rec-form__group">
          <div class="rec-form__group-label"><span class="rec-form__group-label-num">04</span>Reference links <span style="font-style: italic; font-weight: 400; color: var(--text-quiet); letter-spacing: 0.04em; text-transform: none; font-size: 0.7rem;">paste only · no upload</span></div>
          <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: -0.3rem;">YouTube · SoundCloud · Vimeo · WeTransfer · Google Drive · Dropbox · any cloud storage.</p>
          <div class="rec-form__refs" id="rec-form-refs">
            <div class="rec-form__ref-row">
              <input class="rec-form__input" type="url" placeholder="https://...">
              <button type="button" class="rec-form__ref-remove" aria-label="Remove" data-ref-remove>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </button>
            </div>
            <div class="rec-form__ref-row">
              <input class="rec-form__input" type="url" placeholder="https://...">
              <button type="button" class="rec-form__ref-remove" aria-label="Remove" data-ref-remove>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </button>
            </div>
            <div class="rec-form__ref-row">
              <input class="rec-form__input" type="url" placeholder="https://...">
              <button type="button" class="rec-form__ref-remove" aria-label="Remove" data-ref-remove>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </button>
            </div>
          </div>
          <button type="button" class="rec-form__add-ref" id="rec-form-add-ref">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Add another link
          </button>
        </div>

        <!-- GROUP 5 — Deliverables & Licensing -->
        <div class="rec-form__group">
          <div class="rec-form__group-label"><span class="rec-form__group-label-num">05</span>Deliverables &amp; licensing</div>
          <div class="rec-form__row">
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-format">Format</label>
              <select class="rec-form__select" id="rf-format">
                <option value="">Select...</option>
                <option>Stems only</option>
                <option>Mixed only</option>
                <option>Both stems + mixed</option>
              </select>
            </div>
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-sr">Sample rate</label>
              <select class="rec-form__select" id="rf-sr">
                <option value="">Select...</option>
                <option>48 kHz · 24-bit (default)</option>
                <option>96 kHz · 24-bit</option>
                <option>192 kHz · 24-bit</option>
              </select>
            </div>
          </div>
          <div class="rec-form__row">
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-takes">Takes / variations</label>
              <input class="rec-form__input" id="rf-takes" type="text" placeholder="e.g. 2 alts + 1 dry">
            </div>
            <div class="rec-form__field">
              <label class="rec-form__label" for="rf-license">License type</label>
              <select class="rec-form__select" id="rf-license">
                <option value="">Select...</option>
                <option>Sync (default)</option>
                <option>Buyout</option>
                <option>Custom</option>
              </select>
            </div>
          </div>
        </div>

        <!-- GROUP 6 — Timeline -->
        <div class="rec-form__group">
          <div class="rec-form__group-label"><span class="rec-form__group-label-num">06</span>Timeline</div>
          <div class="rec-form__field">
            <label class="rec-form__label" for="rf-deadline">Deadline · delivery date needed</label>
            <input class="rec-form__input" id="rf-deadline" type="date">
          </div>
        </div>

      </form>
    </div>

    

  </div>
</div>
<script>
/* ─────────────────────────────────────────────────────────────
   RECSVC-001 v5 LOCKED — Page Interactions
   PATTERN: content visible by default · JS confirms before hiding
   ───────────────────────────────────────────────────────────── */

/* ── Hero choreography trigger (Stroke 1) ── */
(function() {
  const hero = document.querySelector('.rec-hero');
  if (hero && window.matchMedia('(min-width: 1025px)').matches &&
      window.matchMedia('(prefers-reduced-motion: no-preference)').matches) {
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        hero.classList.add('choreographed');
      });
    });
  }
})();

/* ── Generic data-reveal observer · REMOVED ──
   polish.js (last script in body) owns [data-reveal] → .is-revealed.
   See REFINEMENT-BRIEF §5 motion budget. */

/* ── Family filter tabs ── */
(function() {
  const tabs = document.querySelectorAll('.rec-instr__tab');
  const cards = document.querySelectorAll('.rec-instr__card');
  if (!tabs.length || !cards.length) return;

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const family = tab.dataset.family;
      tabs.forEach(t => {
        t.classList.toggle('active', t === tab);
        t.setAttribute('aria-selected', t === tab ? 'true' : 'false');
      });
      cards.forEach(card => {
        const show = (family === 'all') || (card.dataset.family === family);
        card.dataset.hidden = show ? 'false' : 'true';
      });
    });
  });
})();

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

/* ── Request session modal (RECSVC-FORM-001) — superseded by booking-modal · stub keeps page error-free ── */
(function() {
  const modal = document.getElementById('rec-modal');
  if (!modal) return;
  const openBtns = document.querySelectorAll('[data-action="open-form-old"]');
  const closeEls = document.querySelectorAll('[data-close-modal]');

  function openModal() {
    modal.dataset.open = 'true';
    document.body.classList.add('rec-modal-open');
    setTimeout(() => {
      const firstInput = modal.querySelector('input, select, textarea');
      if (firstInput) firstInput.focus();
    }, 100);
  }
  function closeModal() {
    modal.dataset.open = 'false';
    document.body.classList.remove('rec-modal-open');
  }

  openBtns.forEach(b => b.addEventListener('click', (e) => {
    e.preventDefault();
    openModal();
  }));
  closeEls.forEach(b => b.addEventListener('click', closeModal));

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.dataset.open === 'true') closeModal();
  });

  /* NDA toggle */
  const ndaToggle = document.getElementById('rec-form-nda-toggle');
  const form = document.getElementById('rec-form');
  if (ndaToggle && form) {
    ndaToggle.addEventListener('click', () => {
      const on = ndaToggle.dataset.on === 'true';
      ndaToggle.dataset.on = on ? 'false' : 'true';
      form.dataset.nda = on ? 'false' : 'true';
    });
  }

  /* Reference link add/remove */
  const refsContainer = document.getElementById('rec-form-refs');
  const addRefBtn = document.getElementById('rec-form-add-ref');
  if (addRefBtn && refsContainer) {
    addRefBtn.addEventListener('click', () => {
      const row = document.createElement('div');
      row.className = 'rec-form__ref-row';
      row.innerHTML = `
        <input class="rec-form__input" type="url" placeholder="https://...">
        <button type="button" class="rec-form__ref-remove" aria-label="Remove" data-ref-remove>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>`;
      refsContainer.appendChild(row);
    });
    refsContainer.addEventListener('click', (e) => {
      const btn = e.target.closest('[data-ref-remove]');
      if (!btn) return;
      const rows = refsContainer.querySelectorAll('.rec-form__ref-row');
      if (rows.length <= 1) {
        // Don't remove last row, just clear it
        const input = btn.parentElement.querySelector('input');
        if (input) input.value = '';
      } else {
        btn.parentElement.remove();
      }
    });
  }

  /* Submit handler (placeholder — wire to backend later) */
  const submitBtn = document.getElementById('rec-form-submit');
  if (submitBtn && form) {
    submitBtn.addEventListener('click', () => {
      // basic validation
      const required = form.querySelectorAll('[required]');
      let firstInvalid = null;
      required.forEach(el => {
        if (!el.value.trim() && !firstInvalid) {
          firstInvalid = el;
          el.style.borderColor = 'rgba(212,140,90,0.5)';
        }
      });
      if (firstInvalid) {
        firstInvalid.focus();
        return;
      }
      // Placeholder success — replace with backend POST
      submitBtn.innerHTML = '✓ Sent — reply within 24 hours';
      submitBtn.style.background = 'linear-gradient(135deg, #75C249, #2F6942)';
      setTimeout(() => {
        closeModal();
        submitBtn.innerHTML = 'Submit request <span aria-hidden="true">→</span>';
      }, 1800);
    });
  }
})();

/* ── SIDENAV-001 v1.7 interactions (mirrored from LIBINNER) ── */
(function() {
  const sidenav     = document.getElementById('sidenav');
  const sidenavPull = document.getElementById('sidenav-pull');

  function syncCenterState() {
    if (!sidenav) return;
    const anyExpanded = !!sidenav.querySelector('.sidenav__section.expanded');
    sidenav.classList.toggle('has-expanded', anyExpanded);
  }

  if (sidenav) {
    sidenav.querySelectorAll('.sidenav__section > .sidenav__section-head').forEach(head => {
      const section = head.parentElement;
      if (section.classList.contains('locked-open')) return;
      head.addEventListener('click', () => {
        const isOpen = section.classList.toggle('expanded');
        head.setAttribute('aria-expanded', isOpen);
        syncCenterState();
      });
    });

    const recSection = sidenav.querySelector('[data-section="recording-services"]');
    if (recSection) {
      recSection.querySelectorAll('.sidenav__instr > .sidenav__instr-head').forEach(head => {
        head.addEventListener('click', () => {
          const instr = head.parentElement;
          const wasOpen = instr.classList.contains('expanded');
          recSection.querySelectorAll('.sidenav__instr.expanded').forEach(other => {
            if (other !== instr) {
              other.classList.remove('expanded');
              const otherHead = other.querySelector('.sidenav__instr-head');
              if (otherHead) otherHead.setAttribute('aria-expanded', 'false');
            }
          });
          instr.classList.toggle('expanded', !wasOpen);
          head.setAttribute('aria-expanded', !wasOpen);
        });
      });
    }

    sidenav.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        sidenav.querySelectorAll('.sidenav__section.expanded:not(.locked-open)').forEach(s => {
          s.classList.remove('expanded');
          const h = s.querySelector('.sidenav__section-head');
          if (h) h.setAttribute('aria-expanded', 'false');
        });
        syncCenterState();
      }
    });

    syncCenterState();
  }

  /* Pull-tab open/close handled by cc-components.js · removed dup to avoid double-toggle */
})();

/* ════════════════════════════
   POLISH · Awwwards-grade micro-interactions
   · Magnetic CTAs (hero buttons gravitate toward cursor)
   · Cursor-aware spotlight on instrument cards
   Both gated by hover-capable pointer + reduced-motion checks.
   ════════════════════════════ */
(function(){
  'use strict';

  const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (!supportsHover || reducedMotion) return;

  /* Magnetic CTAs · handled by polish.js [data-magnetic] pattern · this block intentionally removed */

  /* Cursor-aware spotlight on instrument cards */
  document.querySelectorAll('.rec-instr__card').forEach(card => {
    let raf = 0;
    card.addEventListener('mousemove', (e) => {
      const r = card.getBoundingClientRect();
      const x = ((e.clientX - r.left) / r.width) * 100;
      const y = ((e.clientY - r.top) / r.height) * 100;
      cancelAnimationFrame(raf);
      raf = requestAnimationFrame(() => {
        card.style.setProperty('--mx', x + '%');
        card.style.setProperty('--my', y + '%');
      });
    });
  });
})();

/* ── Top nav scroll + hamburger: handled in the main components IIFE below
      (NAV-001 duplicate removed — two click handlers were toggling .open on the
      same tap, opening then instantly closing the menu). ── */
</script>




<!-- ═══════════════════════════════════════════════════════════════
     BOOKING MODAL · opens from "Book a session" CTA · esc/backdrop close
     ═══════════════════════════════════════════════════════════════ -->
<div class="booking-modal" id="bookingModal" role="dialog" aria-modal="true" aria-labelledby="bookingModalTitle" aria-hidden="true">
  <div class="booking-modal__backdrop" data-close-booking aria-hidden="true"></div>

  <div class="booking-modal__sheet" role="document">

    <button type="button" class="booking-modal__close" data-close-booking aria-label="Close booking form">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>

    <header class="booking-modal__head">
      <span class="booking-modal__eyebrow">Book a session</span>
      <h2 class="booking-modal__title" id="bookingModalTitle">
        Tell us about your <span class="booking-modal__title-accent">cue</span>
      </h2>
      <p class="booking-modal__sub">
        Five minutes. Honest brief. We confirm artist, studio date, and price within 24 hours.
      </p>
    </header>

    <form class="booking-form" id="bookingForm" autocomplete="on">

      <div class="booking-form__row">
        <label class="booking-form__field">
          <span class="booking-form__label">Your name</span>
          <input type="text" name="name" class="booking-form__input" placeholder="Composer name" required>
        </label>
        <label class="booking-form__field">
          <span class="booking-form__label">Email</span>
          <input type="email" name="email" class="booking-form__input" placeholder="you@studio.com" required>
        </label>
      </div>

      <div class="booking-form__row">
        <label class="booking-form__field">
          <span class="booking-form__label">Project name</span>
          <input type="text" name="project_name" class="booking-form__input" placeholder="The one project this recording is for" required>
        </label>
        <label class="booking-form__field">
          <span class="booking-form__label">Project type</span>
          <select name="project_type" class="booking-form__input booking-form__input--select" required>
            <option value="" disabled selected>Select project type</option>
            <option>Film score</option>
            <option>OTT / TV series</option>
            <option>Game audio</option>
            <option>Advertisement</option>
            <option>Album / single</option>
            <option>Trailer</option>
            <option>Documentary</option>
            <option>Other</option>
          </select>
        </label>
      </div>

      <div class="booking-form__field booking-form__field--full">
        <span class="booking-form__label">Instrument(s) requested</span>
        <div class="booking-form__multi" data-multi="instrument">
          <div class="booking-form__multi-row">
            <select name="instrument[]" class="booking-form__input booking-form__input--select" required>
              <option value="" disabled selected>Select an instrument</option>
              <optgroup label="Strings">
                <option>Sarangi</option><option>Sitar</option><option>Sarod</option>
                <option>Veena</option><option>Santoor</option><option>Esraj</option>
              </optgroup>
              <optgroup label="Winds">
                <option>Bansuri</option><option>Shehnai</option><option>Algoza</option>
              </optgroup>
              <optgroup label="Percussion">
                <option>Tabla</option><option>Dholak</option><option>Pakhawaj</option><option>Folk Percussion</option>
              </optgroup>
              <optgroup label="Vocals">
                <option>Hindustani Vocals</option><option>Folk Vocals</option>
              </optgroup>
            </select>
            <button type="button" class="booking-form__multi-remove" data-multi-remove aria-label="Remove instrument" hidden>&times;</button>
          </div>
        </div>
        <button type="button" class="booking-form__multi-add" data-multi-add="instrument">+ Add another instrument</button>
      </div>

      <div class="booking-form__row">
        <label class="booking-form__field">
          <span class="booking-form__label">Tempo / BPM</span>
          <input type="text" name="bpm" class="booking-form__input" placeholder="e.g. 90 BPM, free time, rubato">
        </label>
        <label class="booking-form__field">
          <span class="booking-form__label">Raga / scale / key</span>
          <input type="text" name="raga" class="booking-form__input" placeholder="e.g. Yaman, D minor, Phrygian">
        </label>
      </div>

      <label class="booking-form__field booking-form__field--full">
        <span class="booking-form__label">Brief · mood, role of the cue, what it must do</span>
        <textarea name="brief" class="booking-form__input booking-form__input--textarea" rows="4" placeholder="Tell us what your composition needs. Length, mood, dramatic role, any references."></textarea>
      </label>

      <div class="booking-form__row">
        <div class="booking-form__field">
          <span class="booking-form__label">Reference link(s)</span>
          <div class="booking-form__multi" data-multi="reference">
            <div class="booking-form__multi-row">
              <input type="url" name="reference[]" class="booking-form__input" placeholder="Dropbox · Drive · YouTube">
              <button type="button" class="booking-form__multi-remove" data-multi-remove aria-label="Remove link" hidden>&times;</button>
            </div>
          </div>
          <button type="button" class="booking-form__multi-add" data-multi-add="reference">+ Add another link</button>
        </div>
        <label class="booking-form__field">
          <span class="booking-form__label">Deadline</span>
          <input type="date" name="deadline" class="booking-form__input">
        </label>
      </div>

      <!-- How we work · collapsed on mobile, the trust + terms layer -->
      <details class="booking-form__how">
        <summary class="booking-form__how-summary">
          <span>How we work — please read before requesting</span>
          <span class="booking-form__how-chev" aria-hidden="true">â–¸</span>
        </summary>
        <div class="booking-form__how-body">
          <p><strong>This is a custom session, not a sample pack.</strong> A recording director and your chosen artist block dedicated studio time for your project alone. That focus is why the result feels composed <em>for</em> you — and why we take only one project into the room at a time.</p>
          <p><strong>We plan for 3–4 days from cleared payment.</strong> We've recorded for the industry for 15+ years and have never broken trust. We plan tightly and deliver our best — but live recording with real artists is human work. On rare occasions a session needs more time. When that happens, we tell you early. We'd rather protect the result than rush it.</p>
          <p><strong>A 50% advance opens the session.</strong> Work begins once it clears; the balance is due before final files are released.</p>
          <p><strong>One clear brief, no mid-project changes.</strong> We don't run revision rounds — we do one focused, properly planned session built around your brief. A settled vision is what lets the director deliver. If the brief shifts mid-way, the session can't. So tell us everything up front, and ask anything before we start. We're easy to talk to, and we'll push to make your project succeed.</p>
          <p><strong>What you can do with the recording.</strong> It's licensed for the one project you name above. You're free to use it within that composition — edit, arrange, mix, place it in your song or score — and <strong>sync rights are included</strong>, so you're cleared for film, TV, games, or ads for that project without chasing separate sync clearance. You may <strong>not</strong> resell the recording, raw or manipulated, as samples, stems, or a library, or reuse it in a different project. One recording, one project.</p>
          <p><strong>We love sharing the work.</strong> Crediting on release rests with you and your project — but our artists pour themselves into every session, and we're always glad when their contribution is acknowledged. When a project can be shared, seeing our artists' names travel with your success is the best part of what we do.</p>
          <p><strong>NDA if you need it — but the best projects love daylight.</strong> Tick the box below and we'll keep everything private. Honestly, though, our artists light up talking about the music they make, and sharing the craft is part of the joy here. If your project allows it, let it breathe.</p>
          <p class="booking-form__how-foot">Full licensing terms accompany your quote. Questions before you send? Just ask — we'd rather talk it through than have you guess.</p>

          <label class="booking-form__ack booking-form__ack--inhow" data-ack-row>
            <input type="checkbox" class="booking-form__ack-input" data-ack>
            <span class="booking-form__nda-box" aria-hidden="true"></span>
            <span class="booking-form__ack-label">I've read <strong>how Crypto Cipher works</strong>, and my brief reflects a clear, settled vision.</span>
          </label>
        </div>
      </details>

      <label class="booking-form__nda">
        <input type="checkbox" name="nda" class="booking-form__nda-input">
        <span class="booking-form__nda-box" aria-hidden="true"></span>
        <span class="booking-form__nda-label">
          Request an NDA for this project.
          <span class="booking-form__nda-note">Tick this only if your project is under wraps or you're bound by confidentiality.</span>
        </span>
      </label>

      <label class="booking-form__nda">
        <input type="checkbox" name="social_ok" class="booking-form__nda-input">
        <span class="booking-form__nda-box" aria-hidden="true"></span>
        <span class="booking-form__nda-label">
          You're welcome to share moments from my session on social media.
          <span class="booking-form__nda-note">We love posting the magic as it happens in the studio — the craft and the artists at work, never your unreleased composition.</span>
        </span>
      </label>

      <!-- Term acknowledgements · gate the submit (third tick lives inside How-we-work) -->
      <div class="booking-form__acks">
        <label class="booking-form__ack" data-ack-row>
          <input type="checkbox" class="booking-form__ack-input" data-ack>
          <span class="booking-form__nda-box" aria-hidden="true"></span>
          <span class="booking-form__ack-label">I understand work begins on a <strong>50% advance</strong>, with the balance due before final files are released.</span>
        </label>
        <label class="booking-form__ack" data-ack-row>
          <input type="checkbox" class="booking-form__ack-input" data-ack>
          <span class="booking-form__nda-box" aria-hidden="true"></span>
          <span class="booking-form__ack-label">I understand this recording is <strong>licensed for one named project</strong> — sync included — and may not be resold or reused in other projects.</span>
        </label>
      </div>

      <div class="booking-form__footer">
        <p class="booking-form__sr-status sr-only" data-sr-status role="status" aria-live="polite"></p>
        <p class="booking-form__gate" data-gate hidden>Please confirm the acknowledgements below — including reading <strong>How we work</strong> — before sending.</p>
        <p class="booking-form__gate" data-submit-error hidden>Something went wrong sending your brief — please try again.</p>
        <p class="booking-form__note">
          We reply within 24 hours with a complete plan: artist, session director, studio date, delivery timeline, total cost.
        </p>
        <button type="submit" class="booking-form__submit" data-submit aria-disabled="true">
          <span>Send brief</span>
          <span class="booking-form__submit-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
        </button>
      </div>

    </form>

    <div class="booking-confirm" data-confirm hidden>
      <div class="booking-confirm__check" aria-hidden="true">
        <svg viewBox="0 0 52 52">
          <circle class="booking-confirm__check-ring" cx="26" cy="26" r="24" fill="none"/>
          <path class="booking-confirm__check-tick" fill="none" d="M14 27 l8 8 l16 -18"/>
        </svg>
      </div>
      <h2 class="booking-confirm__title">Brief received.</h2>
      <p class="booking-confirm__body">
        Thank you — we've got your project. You'll hear from us within 24 hours with a complete plan: artist, session director, studio date, delivery timeline, and total cost.
      </p>
      <p class="booking-confirm__hint">Check your inbox (and spam, just in case).</p>
      <button type="button" class="booking-form__submit booking-confirm__done" data-confirm-done>
        <span>Done</span>
      </button>
    </div>

  </div>
</div>


<!-- Crypto Cipher · components JS · v1.0 -->
<script>
/* ═══════════════════════════════════════════════════════════════
   CRYPTO CIPHER® · COMPONENT JS · v1.0
   Floating nav · sidenav drawer · footer accordion · reveal observer
   Wrap in IIFE so multiple page scripts can coexist.
   ═══════════════════════════════════════════════════════════════ */
(function(){
  'use strict';

  /* ════════════════════════════
     NAV · scroll + hamburger
     ════════════════════════════ */
  const nav = document.getElementById('cc-nav');
  const hamburger = nav && nav.querySelector('.cc-nav__hamburger');
  const mobilePanel = document.getElementById('cc-nav-mobile');
  let scrollTick = false;

  if (nav) {
    window.addEventListener('scroll', function(){
      if (scrollTick) return;
      scrollTick = true;
      requestAnimationFrame(function(){
        nav.classList.toggle('scrolled', window.scrollY > 80);
        scrollTick = false;
      });
    }, { passive: true });
  }

  if (hamburger && mobilePanel) {
    hamburger.addEventListener('click', () => {
      const open = mobilePanel.classList.toggle('open');
      hamburger.classList.toggle('open', open);
      hamburger.setAttribute('aria-expanded', open);
      document.body.style.overflow = open ? 'hidden' : '';
    });
    mobilePanel.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        mobilePanel.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
  }

  /* ════════════════════════════
     NAV · Social dropdown (desktop)
     - Click toggles · click outside closes · Escape closes
     - aria-expanded + aria-hidden kept in sync
     ════════════════════════════ */
  (function initNavDropdowns(){
    var pairs = [
      ['.cc-nav__link--social',  'cc-nav-social-dropdown'],
      ['.cc-nav__link--account', 'cc-nav-account-dropdown']
    ].map(function (p) {
      var trigger = nav && nav.querySelector(p[0]);
      var dropdown = document.getElementById(p[1]);
      return (trigger && dropdown) ? { trigger: trigger, dropdown: dropdown } : null;
    }).filter(Boolean);
    if (!pairs.length) return;
    function setOpen(pair, open) {
      pair.dropdown.classList.toggle('open', open);
      pair.trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
      pair.dropdown.setAttribute('aria-hidden', open ? 'false' : 'true');
    }
    function closeAll(except) { pairs.forEach(function (p) { if (p !== except) setOpen(p, false); }); }
    pairs.forEach(function (pair) {
      pair.trigger.addEventListener('click', function (e) {
        e.stopPropagation();
        var willOpen = !pair.dropdown.classList.contains('open');
        closeAll(pair); setOpen(pair, willOpen);
      });
      pair.dropdown.querySelectorAll('a').forEach(function (a) {
        a.addEventListener('click', function () { setOpen(pair, false); });
      });
    });
    document.addEventListener('click', function (e) {
      pairs.forEach(function (pair) {
        if (!pair.dropdown.contains(e.target) && !pair.trigger.contains(e.target)) setOpen(pair, false);
      });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key !== 'Escape') return;
      pairs.forEach(function (pair) {
        if (pair.dropdown.classList.contains('open')) { setOpen(pair, false); pair.trigger.focus(); }
      });
    });
  })();

  /* CC · cart/wishlist count stub */
  window.CC = window.CC || {};
  window.CC.getCounts = window.CC.getCounts || function () { return { cart: 0, wishlist: 0 }; };
  window.CC.refreshBadges = function () {
    var c = window.CC.getCounts();
    document.querySelectorAll('[data-cart-count]').forEach(function (el) { el.textContent = c.cart; el.hidden = !(c.cart > 0); });
    document.querySelectorAll('[data-wishlist-count]').forEach(function (el) { el.textContent = c.wishlist; el.hidden = !(c.wishlist > 0); });
    document.querySelectorAll('[data-cart-total]').forEach(function (el) { el.textContent = c.cart; el.hidden = !(c.cart > 0); });
  };
  window.CC.refreshBadges();

  /* ════════════════════════════
     SVANTRA · magnetic hover
     - Mouse approach within button bounds shifts button toward cursor
     - Strength capped at 4px in any direction
     - Resets smoothly when cursor leaves
     - Disabled on touch/coarse pointers + reduced-motion
     ════════════════════════════ */
  (function initSvantraMagnetic(){
    const btn = nav && nav.querySelector('[data-magnetic]');
    if (!btn) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (window.matchMedia('(pointer: coarse)').matches) return;

    const STRENGTH = 0.18;
    const MAX = 4;

    function onMove(e) {
      const r = btn.getBoundingClientRect();
      const cx = r.left + r.width / 2;
      const cy = r.top + r.height / 2;
      let dx = (e.clientX - cx) * STRENGTH;
      let dy = (e.clientY - cy) * STRENGTH;
      dx = Math.max(-MAX, Math.min(MAX, dx));
      dy = Math.max(-MAX, Math.min(MAX, dy));
      btn.style.setProperty('--mx', dx + 'px');
      btn.style.setProperty('--my', dy + 'px');
    }
    function reset() {
      btn.style.setProperty('--mx', '0px');
      btn.style.setProperty('--my', '0px');
    }
    btn.addEventListener('mousemove', onMove);
    btn.addEventListener('mouseleave', reset);
    btn.addEventListener('blur', reset);
  })();

  /* ════════════════════════════
     SIDENAV-001 — unified nav interactions
     ════════════════════════════ */
  const sidenav     = document.getElementById('sidenav');
  const sidenavPull = document.getElementById('sidenav-pull');

  function syncCenterState() {
    if (!sidenav) return;
    const anyExpanded = !!sidenav.querySelector('.sidenav__section.expanded');
    sidenav.classList.toggle('has-expanded', anyExpanded);
  }

  if (sidenav) {
    /* Top-level section collapse/expand · skip .locked-open sections */
    sidenav.querySelectorAll('.sidenav__section > .sidenav__section-head').forEach(head => {
      const section = head.parentElement;
      if (section.classList.contains('locked-open')) return;
      head.addEventListener('click', () => {
        const isOpen = section.classList.toggle('expanded');
        head.setAttribute('aria-expanded', isOpen);
        syncCenterState();
      });
    });

    /* Recording Services — accordion: only one instrument expanded at a time */
    const recSection = sidenav.querySelector('[data-section="recording-services"]');
    if (recSection) {
      recSection.querySelectorAll('.sidenav__instr > .sidenav__instr-head').forEach(head => {
        head.addEventListener('click', () => {
          const instr = head.parentElement;
          const wasOpen = instr.classList.contains('expanded');
          recSection.querySelectorAll('.sidenav__instr.expanded').forEach(other => {
            if (other !== instr) {
              other.classList.remove('expanded');
              const otherHead = other.querySelector('.sidenav__instr-head');
              if (otherHead) otherHead.setAttribute('aria-expanded', 'false');
            }
          });
          instr.classList.toggle('expanded', !wasOpen);
          head.setAttribute('aria-expanded', !wasOpen);
        });
      });
    }

    /* Esc collapses non-locked sections */
    sidenav.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        sidenav.querySelectorAll('.sidenav__section.expanded:not(.locked-open)').forEach(s => {
          s.classList.remove('expanded');
          const h = s.querySelector('.sidenav__section-head');
          if (h) h.setAttribute('aria-expanded', 'false');
        });
        syncCenterState();
      }
    });

    syncCenterState();
  }

  if (sidenavPull && sidenav) {
    const pullLabel = document.getElementById('sidenav-pull-label');
    const pullClose = document.getElementById('sidenav-pull-close');

    function setDrawerState(isOpen) {
      sidenav.classList.toggle('open', isOpen);
      sidenavPull.setAttribute('aria-expanded', isOpen);
      sidenavPull.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
      if (pullLabel) pullLabel.textContent = isOpen ? 'Close' : 'Navigate';
    }

    /* Tap pull-tab itself: toggle open/close.
       Tap close button: always closes (stopPropagation prevents double-toggle). */
    sidenavPull.addEventListener('click', (e) => {
      // If the click came from the close button, the close handler runs;
      // skip the parent toggle so it doesn't immediately re-open.
      if (e.target.closest('.sidenav__pull-close')) return;
      setDrawerState(!sidenav.classList.contains('open'));
    });
    /* Keyboard support: Enter/Space on pull-tab toggles drawer */
    sidenavPull.addEventListener('keydown', (e) => {
      if (e.target.closest('.sidenav__pull-close')) return;
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        setDrawerState(!sidenav.classList.contains('open'));
      }
    });
    if (pullClose) {
      pullClose.addEventListener('click', (e) => {
        e.stopPropagation();
        setDrawerState(false);
      });
    }

    /* Auto-close drawer when a navigation link is tapped (mobile only) */
    sidenav.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        if (window.matchMedia('(max-width: 1024px)').matches) {
          setTimeout(() => setDrawerState(false), 200);
        }
      });
    });

    /* Esc closes the mobile drawer */
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && sidenav.classList.contains('open') &&
          window.matchMedia('(max-width: 1024px)').matches) {
        setDrawerState(false);
      }
    });
  }

  /* ════════════════════════════
     Generic [data-reveal] IO observer · REMOVED
     polish.js (last script in body) owns this pattern.
     ════════════════════════════ */


})();

</script>

<!-- Crypto Cipher · booking modal JS -->
<script>
/* Booking modal · open/close · esc · backdrop · focus return */
(function(){
  const modal = document.getElementById('bookingModal');
  if (!modal) return;
  const openers = document.querySelectorAll('[data-open-booking]');
  const closers = modal.querySelectorAll('[data-close-booking]');
  let lastFocused = null;

  function openModal() {
    lastFocused = document.activeElement;
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('booking-locked');
    // Focus first input
    setTimeout(() => {
      const firstInput = modal.querySelector('input, select, textarea, button');
      if (firstInput) firstInput.focus();
    }, 100);
  }
  function closeModal() {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('booking-locked');
    if (lastFocused && lastFocused.focus) lastFocused.focus();
  }

  openers.forEach(el => el.addEventListener('click', (e) => { e.preventDefault(); openModal(); }));
  closers.forEach(el => el.addEventListener('click', closeModal));

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
  });

  // Form submit · placeholder for backend wire-up
  const form = document.getElementById('bookingForm');
  if (form) {

    /* Multi-add rows · instrument + reference. Clones the first row,
       clears its value, shows the remove button. Remove deletes the row. */
    form.querySelectorAll('[data-multi-add]').forEach(function(addBtn){
      const key = addBtn.getAttribute('data-multi-add');
      const wrap = form.querySelector('[data-multi="' + key + '"]');
      if (!wrap) return;
      addBtn.addEventListener('click', function(){
        const rows = wrap.querySelectorAll('.booking-form__multi-row');
        const clone = rows[0].cloneNode(true);
        const field = clone.querySelector('select, input');
        if (field) {
          field.value = '';
          if (field.tagName === 'SELECT') field.selectedIndex = 0;
          field.removeAttribute('required');  // only the first row is required
        }
        const rm = clone.querySelector('[data-multi-remove]');
        if (rm) rm.hidden = false;
        wrap.appendChild(clone);
      });
    });
    form.addEventListener('click', function(e){
      const rm = e.target.closest('[data-multi-remove]');
      if (rm) { const row = rm.closest('.booking-form__multi-row'); if (row) row.remove(); }
    });

    /* Acknowledgement gating · single tick lives inside How-we-work.
       Send is click-THROUGH (not native-disabled) so a blocked click can
       teach: open the accordion, scroll the tick in, one-shot flash, message. */
    const ackEls  = Array.prototype.slice.call(form.querySelectorAll('[data-ack]'));
    const submitBtn = form.querySelector('[data-submit]');
    const how     = form.querySelector('.booking-form__how');
    const gateMsg = form.querySelector('[data-gate]');
    function allAcked(){ return ackEls.every(function(a){ return a.checked; }); }
    function syncGate(){
      if (!submitBtn) return;
      const ok = allAcked();
      submitBtn.setAttribute('aria-disabled', ok ? 'false' : 'true');
      if (ok && gateMsg) gateMsg.hidden = true;
    }
    ackEls.forEach(function(a){ a.addEventListener('change', syncGate); });
    syncGate();

    function teachGate(){
      if (gateMsg) gateMsg.hidden = false;             // show message
      // first unticked acknowledgement
      const firstMissing = ackEls.filter(function(a){ return !a.checked; })[0];
      const inHow = firstMissing && how && how.contains(firstMissing);
      if (inHow && !how.open) how.open = true;          // expand only if the missing tick is inside
      if (inHow && how) {                               // one-shot flash on the accordion
        how.classList.remove('is-flash');
        void how.offsetWidth;                           // reflow to restart anim
        how.classList.add('is-flash');
        how.addEventListener('animationend', function handler(){
          how.classList.remove('is-flash');
          how.removeEventListener('animationend', handler);
        });
      }
      const target = firstMissing ? firstMissing.closest('[data-ack-row]') : null;
      if (target && target.scrollIntoView) {
        target.scrollIntoView({ block: 'center', behavior: 'smooth' });
      }
    }

    const sheetHead = modal ? modal.querySelector('.booking-modal__head') : null;
    const confirmPanel = form.parentNode.querySelector('[data-confirm]');
    const confirmDone  = confirmPanel ? confirmPanel.querySelector('[data-confirm-done]') : null;

    function resetFormState(){
      form.reset();
      form.querySelectorAll('[data-multi]').forEach(function(w){
        const rows = w.querySelectorAll('.booking-form__multi-row');
        for (let i = rows.length - 1; i >= 1; i--) rows[i].remove();
      });
      syncGate();
    }
    function showForm(){
      if (confirmPanel) { confirmPanel.hidden = true; confirmPanel.removeAttribute('data-shown'); }
      form.hidden = false;
      if (sheetHead) sheetHead.hidden = false;
    }
    function showConfirm(){
      form.hidden = true;
      if (sheetHead) sheetHead.hidden = true;
      if (confirmPanel) {
        confirmPanel.hidden = false;
        void confirmPanel.offsetWidth;          // reflow so the one-shot draw runs
        confirmPanel.setAttribute('data-shown', '');
      }
    }
    if (confirmDone) {
      confirmDone.addEventListener('click', function(){
        closeModal();
        setTimeout(showForm, 450);   // restore form after close transition, ready for next open
      });
    }
    // If user dismisses via X / backdrop / Esc while on the confirmation, restore too.
    if (modal) {
      modal.addEventListener('click', function(e){
        if (e.target.closest('[data-close-booking]') && confirmPanel && !confirmPanel.hidden) {
          setTimeout(showForm, 450);
        }
      });
    }

    const errorMsg = form.querySelector('[data-submit-error]');

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      if (!allAcked()) { teachGate(); return; }

      const fd = new FormData(form);
      const payload = {
        name: fd.get('name') || '',
        email: fd.get('email') || '',
        project_name: fd.get('project_name') || '',
        project_type: fd.get('project_type') || '',
        instruments: fd.getAll('instrument[]').filter(Boolean),
        bpm: fd.get('bpm') || '',
        raga: fd.get('raga') || '',
        brief: fd.get('brief') || '',
        reference_links: fd.getAll('reference[]').filter(Boolean),
        deadline: fd.get('deadline') || '',
        nda: fd.get('nda') === 'on',
        social_ok: fd.get('social_ok') === 'on',
        meta: { submittedAt: new Date().toISOString(), surface: location.pathname }
      };

      if (errorMsg) errorMsg.hidden = true;
      if (submitBtn) submitBtn.disabled = true;

      const csrfMeta = document.querySelector('meta[name="csrf-token"]');
      fetch('/recording-requests', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': csrfMeta ? csrfMeta.content : ''
        },
        body: JSON.stringify(payload)
      }).then(function (res) {
        if (!res.ok) throw new Error('request failed');
        return res.json();
      }).then(function () {
        if (submitBtn) submitBtn.disabled = false;
        resetFormState();
        showConfirm();
      }).catch(function () {
        if (submitBtn) submitBtn.disabled = false;
        if (errorMsg) errorMsg.hidden = false;
      });
    });
  }
})();

</script>
<!-- ═══════════════════════════════════════════════════════════
     FOOTER-001 · synced from homepage_148.html (canonical source)
     Self-contained: styles, markup, behavior, and JSON-LD all here.
     Sidenav clearance (body padding-bottom:64px) preserved
     separately in SIDENAV CSS region — see top of file.
     ═══════════════════════════════════════════════════════════ -->
<!-- ═══════════════════════════════════════════════════════════
     FOOTER-001 · canonical · v-final (Svantra strip + whisper trust cards)
     Self-contained: styles, markup, behavior all here.
     ═══════════════════════════════════════════════════════════ -->
@endverbatim
