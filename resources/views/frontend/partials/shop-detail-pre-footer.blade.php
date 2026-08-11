<!-- ═══════════════════════════════════════════════════════════════
     LICENSE TERMS MODAL — opens from buy-bar "License terms" button
     ═══════════════════════════════════════════════════════════════ -->
<div class="modal" id="license-modal" role="dialog" aria-modal="true" aria-labelledby="license-modal-title" aria-hidden="true">
  <div class="modal__backdrop" data-modal-close></div>
  <div class="modal__panel" role="document" data-lenis-prevent>
    <button class="modal__close" data-modal-close aria-label="Close license terms">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
    </button>

    <div class="modal__head">
      <span class="eyebrow">License Terms</span>
      <h2 class="modal__title" id="license-modal-title">One license. Clear use rights.</h2>
      <p class="modal__sub">What you can and can't do with {{ $product->name }} once you own it.</p>
    </div>
@verbatim

    <div class="modal__body">

      <div class="modal__row modal__row--allow">
        <div class="modal__row-label">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          You can
        </div>
        <ul class="modal__row-list">
          <li>Use in unlimited commercial projects — film, OTT, broadcast, advertising, sync, games</li>
          <li>Use across multiple clients and productions, royalty-free, in perpetuity</li>
          <li>Install on up to 2 active machines (Native Access authorization)</li>
          <li>Reinstall on replacement hardware as needed</li>
          <li>Use in productions with team members under your contract</li>
        </ul>
      </div>

      <div class="modal__row modal__row--deny">
        <div class="modal__row-label">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
          You can't
        </div>
        <ul class="modal__row-list">
          <li>Resell, redistribute, or share the library files with anyone</li>
          <li>Use the samples to train AI/ML models — declared AI-training-free at performance contract level</li>
          <li>Repackage the samples into another sample library or competing product</li>
          <li>Sell or distribute isolated, unprocessed samples (loops/one-shots) as standalone content</li>
          <li>Transfer the license to another person without contacting Crypto Cipher</li>
        </ul>
      </div>

      <div class="modal__foot">
        <p>For full legal text, see <a href="/license/full" class="modal__link">our complete EULA</a>. For sync clearance documentation, see <a href="/license/sync" class="modal__link">sync clearance terms</a>. Custom enterprise licensing available — <a href="/contact-us" class="modal__link">contact us</a>.</p>
      </div>

    </div>
  </div>
</div>



<!-- ═══════════════════════════════════════════════════════════════
     SIDENAV-001 mobile clearance · relocated from old FOOTER block
     The fixed 64px sidenav pull-tab on mobile needs body padding-bottom
     so it does not overlap page content. This rule belongs to the
     sidenav layout, not the footer — relocated during FOOTER-001 sync
     from homepage_148.html.
     ═══════════════════════════════════════════════════════════════ -->
<style>
@media (max-width: 768px) {
  body { padding-bottom: 64px; }
}
</style>

@endverbatim


